<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Redirect;
use Session;
use Image;
use File;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $model = Auth::user();
        return view('profile.edit', ['profile' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'sure_name' => 'required',
            'email' => 'required|email|max:255|unique:users,email,'.Auth::user()->id,
            'telephone' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect('profile/edit')
                ->withErrors($validator)
                ->withInput();
        } else {

            try {

                $user = Auth::user();

                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->sure_name = $request->sure_name;
                $user->email = $request->email;
                $user->telephone = $request->telephone;
                $filename = NULL;

                if($request->hasFile('avatar')){
                    $avatar = $request->file('avatar');
                    $filename = time() . '.' . $avatar->getClientOriginalExtension();
                    $pathname= Auth::user()->id;
                    $path = storage_path('app/public/uploads/avatars/'.$pathname.'' );
                    File::exists($path) or File::makeDirectory($path);

                    Image::make($avatar)->save( storage_path('app/public/uploads/avatars/'.$pathname.'/'.'origin_'.$filename ) );
                    Image::make($avatar)->resize(200, 200)->save( storage_path('app/public/uploads/avatars/'.$pathname.'/'.'200x200_'.$filename ) );
                    Image::make($avatar)->resize(150, 150)->save( storage_path('app/public/uploads/avatars/'.$pathname.'/'.'150x150_'.$filename ) );
                    Image::make($avatar)->resize(300, 300)->save( storage_path('app/public/uploads/avatars/'.$pathname.'/'.'300x300_'.$filename ) );
                    Image::make($avatar)->resize(30, 30)->save( storage_path('app/public/uploads/avatars/'.$pathname.'/'.'30x30_'.$filename ) );


                }
                $user->avatar = $filename;

                $user->save();

                Session::flash('alert-class', 'alert-success');
                Session::flash('message', 'Successfully edit profile!');
                return Redirect::to('profile');

            } catch (Exception $e) {

                Session::flash('alert-class', 'alert-danger');
                Session::flash('message', $e->getMessage());
                return redirect('profile/edit')
                    ->withErrors($validator)
                    ->withInput();

            } catch (QueryException $e) {

                Session::flash('alert-class', 'alert-danger');
                Session::flash('message', $e->getMessage());
                return redirect('profile/edit')
                    ->withErrors($validator)
                    ->withInput();

            }


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

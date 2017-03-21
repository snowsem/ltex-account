<?php

namespace App\Http\Controllers;

use App\Issue;
use Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Validator;
use Redirect;
use Session;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Issue::where('user_id','=', Auth::user()->id)->get();
        return view('issues.index', ['issues' => $model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('issues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'text' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect('issues/create')
                ->withErrors($validator)
                ->withInput();
        } else {

            try {

                $model = new Issue();
                $model->title = $request->title;
                $model->text = $request->text;
                $model->user_id = Auth::user()->id;
                $model->save();

                Session::flash('alert-class', 'alert-success');
                Session::flash('message', 'Successfully created issue!');
                return Redirect::to('issues/'.$model->id);

            } catch (Exception $e) {

                Session::flash('alert-class', 'alert-danger');
                Session::flash('message', $e->getMessage());
                return redirect('issues/create')
                    ->withErrors($validator)
                    ->withInput();

            } catch (QueryException $e) {

                Session::flash('alert-class', 'alert-danger');
                Session::flash('message', $e->getMessage());
                return redirect('issues/create')
                    ->withErrors($validator)
                    ->withInput();

            }


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $model = Issue::findOrFail($id);
            return view('issues.show', ['issue' => $model]);

        } catch (ModelNotFoundException $e) {

            Log::error($e->getMessage());
            Session::flash('alert-class', 'alert-danger');
            //Session::flash('message', $e->getMessage());
            Session::flash('message', 'Запись не найдена');
            return redirect('issues');

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

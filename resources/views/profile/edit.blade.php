@extends('layouts.app')

@section('content')
    <div class="container">

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Редактировать профиль</div>

                <div class="row personal-info">
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST"  action="{{ url('/profile') }}">
                    <!-- left column -->
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="text-center">
                            <img src="/storage/uploads/avatars/{{Auth::user()->id.'/200x200_'.Auth::user()->avatar}}" class="avatar img-circle img-thumbnail" alt="avatar">
                            <h6>Upload a different photo...</h6>
                            <input type="file" name="avatar" class="text-center center-block well well-sm">
                        </div>
                    </div>
                    <!-- edit form column -->
                    <div class="col-md-8 col-sm-6 col-xs-12">



                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Фамилия</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="last_name" value="{{ old('last_name', $profile->last_name) }}" required >

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Имя</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="first_name" value="{{ old('first_name', $profile->first_name) }}" required >

                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('sure_name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Отчество</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="sure_name" value="{{ old('sure_name', $profile->sure_name) }}" required >

                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sure_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('sure_name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Дата рождения</label>

                                <div class="col-md-6">
                                    <input type='text' class="form-control" id='datetimepicker4' />
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('sure_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <script type="text/javascript">
                                    $(function () {
                                        $('#datetimepicker4').datetimepicker();
                                    });
                                </script>
                            </div>


                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $profile->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Телефон</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="telephone" value="{{ old('telephone', $profile->telephone) }}" required >

                                    @if ($errors->has('telephone'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>




                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">
                                        Применить изменения
                                    </button>
                                    <span></span>
                                    <input class="btn btn-default" value="Отмена" type="reset">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>





@endsection

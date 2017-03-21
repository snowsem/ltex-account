@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Добавить отзыв</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('comments') }}">
                    {{ csrf_field() }}


                    <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Текст</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="text" value="{{ old('text') }}" required >

                            @if ($errors->has('text'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Добавить
                            </button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

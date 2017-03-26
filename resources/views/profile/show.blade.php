@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">show</div>

                <div class="panel-body">
                    {{$issue->title}}
                    <div>{{$issue->text}}</div>
                    <div>{{$issue->comments()->count()}}</div>
                    <h3>Комментарии</h3>

                        @foreach( $issue->comments()->with('user')->get() as $comment )
                            <div>От:{{$comment->user->email}} <br>{{$comment->text}} </div>
                        @endforeach

                    <form class="form-horizontal" role="form" method="POST" action="{{url('issues/'.$issue->id.'/')}}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Комментарий</label>

                            <div class="col-md-6">
                                <textarea id="name" type="text" class="form-control" name="text" equired >{{ old('text') }}</textarea>
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
                                    Оставить комментарий
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

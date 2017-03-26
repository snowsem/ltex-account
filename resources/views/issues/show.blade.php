@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">show</div>

                <div class="panel-body">
                    <div class="media-body">
                        <h4 class="media-heading">{{$issue->title}}</h4>

                        <p>{{$issue->text}}</p>
                        <ul class="list-inline list-unstyled">
                            <li><span><i class="glyphicon glyphicon-calendar"></i> {{$issue->created_at}} </span></li>
                            <li>|</li>
                            <span><i class="glyphicon glyphicon-comment"></i> Комментарии: {{$issue->comments()->count()}}</span>


                            <li>
                                <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                                <span><i class="fa fa-facebook-square"></i></span>
                                <span><i class="fa fa-twitter-square"></i></span>
                                <span><i class="fa fa-google-plus-square"></i></span>
                            </li>
                        </ul>
                    </div>

                    <div></div>

                    <h3>Комментарии</h3>

                        @foreach( $issue->comments()->with('user')->get() as $comment )


                        <div class="row">
                            <div class="col-sm-1">
                                <div >
                                    <img class="img-responsive user-photo img-circle avatar" src="/storage/uploads/avatars/{{$comment->user->id.'/150x150_'.Auth::user()->avatar}}">
                                </div><!-- /thumbnail -->
                            </div><!-- /col-sm-1 -->

                            <div class="col-sm-5">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <strong>{{$comment->user->email}} </strong> <span class="text-muted">c{{$comment->created_at}}</span>
                                    </div>
                                    <div class="panel-body">
                                        {{$comment->text}}
                                    </div><!-- /panel-body -->
                                </div><!-- /panel panel-default -->
                            </div><!-- /col-sm-5 -->


                        </div><!-- /row -->
                        @endforeach

                    <form class="form-horizontal" role="form" method="POST" action="{{url('issues/'.$issue->id.'/')}}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-2 control-label">Комментарий</label>

                            <div class="col-md-4">
                                <textarea id="name" type="text" class="form-control" name="text" equired >{{ old('text') }}</textarea>
                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Мои вопросы</div>

                <div class="panel-body">
                    <a href="{{url('issues/create')}}">Задать вопрос</a>
                    <div>
                    @foreach($issues as $issue)
                            <div class="media-body">
                                <h4 class="media-heading"> {{$issue->title}}</h4>
                                <ul class="list-inline list-unstyled">
                                    <li><span><i class="glyphicon glyphicon-calendar"></i> {{$issue->created_at}} </span></li>
                                    <li>|</li>
                                    <span><i class="glyphicon glyphicon-comment"></i> Комментарии: {{$issue->comments()->count()}}</span>
                                    <li>|</li>
                                    <span><i class="glyphicon glyphicon-link"></i> <a href="{{url('issues/'.$issue->id)}}">Читать</a></span>


                                    <li>
                                        <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
                                        <span><i class="fa fa-facebook-square"></i></span>
                                        <span><i class="fa fa-twitter-square"></i></span>
                                        <span><i class="fa fa-google-plus-square"></i></span>
                                    </li>
                                </ul>
                            </div>

                        <hr>
                    @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

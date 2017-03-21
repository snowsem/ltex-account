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
                        {{$issue->title}} {{$issue->id}}
                        <br>
                    @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

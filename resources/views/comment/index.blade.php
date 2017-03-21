@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Comments</div>

                <div class="panel-body">
                    <a href="{{url('comments/create')}}">Добавить отзыв</a>

                    <div>
                    @foreach($comments as $comment)
                        {{$comment->text}}
                        <br>
                    @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

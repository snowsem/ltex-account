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

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

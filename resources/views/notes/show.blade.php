@extends('layouts.base')

@section('content')
<div class="container text-xs-justify">
    <div class="row">
        <h2 class="display-3">
            {{($note->title)}}
        </h2>
        <div class="body">
            {{$note->body}}
        </div>
    </div>
</div>
@endsection
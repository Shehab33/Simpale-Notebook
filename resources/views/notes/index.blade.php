@extends('layouts.base')
@section('content')
            <!-- /navbar -->
            <!-- Main component for call to action -->
            <div class="container">
                <h1 class="pull-xs-left">
                    Notes
                </h1>
                <div class="pull-xs-right">
                    <a class="btn btn-primary" href="{{route('createNote',$book->id)}}" role="button">
                        New Note +
                    </a>
                </div>
                <div class="clearfix">
                </div>
                <!--============= notes=========== -->
                @foreach($notes as $note)
                <div class="list-group notes-group">

                    <!--note1 -->
                    <div class="card card-block">
                        <a href="{{route('note.show',$note->id)}}">
                            <h4 class="card-title">
                                {{$note->title}}
                            </h4>
                        </a>
                        <p class="card-text">
                            {{$note->body}}
                        </p>
                        <a class="btn btn-sm btn-info pull-xs-left" href="{{route('note.edit',$note->id)}}">
                            Edit
                        </a>
                        <form action="{{route('note.destroy',$note->id)}}" class="pull-xs-right" method="POST">
                        @method('Delete')
                            <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                         @csrf   
                        </form>
                    </div>
                @endforeach
            <!-- /container -->

@endsection
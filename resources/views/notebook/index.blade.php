@extends('layouts.base')
@section('content')
            <!-- Main component for call to action -->
            <div class="container text-center">
                <!-- heading -->
                <h1 class="pull-xs-left">
                    Your Notebooks
                </h1>
                <div class="pull-xs-right">
                    <a class="btn btn-primary" href="notebook/create" role="button">
                        New NoteBook +
                    </a>
                </div>

                <div class="clearfix">
                </div>
                <br>
                
                <!-- ================ Notebooks==================== -->
                <!-- notebook1 -->
              @foreach ($book as $book)
                <div class="col-sm-6 col-md-3">
                    <div class="card">
                        <div class="card-block">
                            <a href="{{route('notebook.show',$book->id)}}">
                                <h4 class="card-title">
                                    {{$book->name}}
                                </h4>
                            </a>
                        </div>
                        <a href="#">
                            <img alt="Responsive image" class="img-fluid" src="storage/notebook_images/{{$book->image}}">
                        </a>
                        <div class="card-block">
                            <a class="btn btn-sm btn-info pull-xs-left5 card-link" href="/notebook/{{$book->id}}/edit">
                                Edit Notebook
                            </a>
                            <form action="/notebook/{{$book->id}}" class="pull-xs-right5 card-link" method="POST" style="display:inline">
                            @method('Delete')
                                <input class="btn btn-sm btn-danger" type="submit" value="Delete">
                                </input>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
              @endforeach
@endsection              
@extends('layouts.base')
@section('content')
<div class="container">
<h3>Create Note</h3>
@if(count($errors)>0)

<ul>
    @foreach($errors->all() as $error)
    
    <li class="alert alert-danger">{{$error}}</li>

    @endforeach

</ul>

@endif
<form action="{{route('note.store')}}" method="Post">
        @csrf
          <div class="row form-group">
             <div class="col-md-12">
                <label for="">Title:</label>
                <input type="text" name="title"class="form-control">
                <label for="">Body:</label>
                <input type="text" name="body"class="form-control">
                <input type="hidden" name="notebookId"class="form-control" value="{{$id}}">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>  
       </form>
      </div>  
@endsection       
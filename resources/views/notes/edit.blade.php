@extends('layouts.base')
@section('content')
<div class="container">
<h3>Edit Form</h3>
@if(count($errors)>0)

<ul>
    @foreach($errors->all() as $error)
    
    <li class="alert alert-danger">{{$error}}</li>

    @endforeach

</ul>

@endif
<form action="{{route('note.update',$note->id)}}" method="Post">
@method('PUT')
        @csrf
          <div class="row form-group">
             <div class="col-md-8">
                <label for="">Title:</label>
                <input type="text" name="title"class="form-control" value="{{$note->title}}">
                <label for="">Body:</label>
                <input type="text" name="body"class="form-control" value="{{$note->body}}">
             </div>
             <input type="hidden" name="notebookId"class="form-control" value="{{$note->notebook_id}}">
           </div>
           <button type="submit" class="btn btn-primary">Edit</button>
       </form>
      </div>
</div>   
@endsection             

       <!-- the $up variable that i use in the notebookcontroller
       if i change it in controller i must change it here also 
       
       -->
@extends('layouts.base')
@section('content')
<div class="container">

<h3>Edit Form</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/notebook/{{$book->id}}" method="Post" enctype="multipart/form-data">
@method('PUT')
        @csrf
          <div class="row form-group">
             <div class="col-md-8">
                <label for="">Name:</label>
                <input type="text" name="Name"class="form-control" value="{{$book->name}}" >
                <input type="file" name="notebook_image"class="form-control">
             </div>
           </div>
                 <button type="submit" class="btn btn-primary w-50 float-right">Edit</button>   
       </form> 
       </dev>
@endsection
       <!-- the $up variable that i use in the notebookcontroller
       if i change it in controller i must change it here also 
       
       -->
@extends('layouts.base')
@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h3>Create Form</h3>
<form action="/notebook" method="Post" enctype="multipart/form-data">
        @csrf
          <div class="row form-group">
             <div class="col-md-8">
                <label for="">Name:</label>
                <input type="text" name="Name"class="form-control">
                <input type="file" name="notebook_image"class="form-control">
             </div>
           </div>
               <button type="submit" class="btn btn-primary w-50 float-right">Create</button>
       </form> 
</div>       
@endsection       
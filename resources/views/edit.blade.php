@extends('layouts.app')
@section('content')
<div class="container">
   <h1>Edditing blog</h1>
<form action="/update/{{$blog->id}}" method="POST">
    @csrf
  <div class="form-group row">
    <label for="content" class="col-sm-2 col-form-label">Content</label>
    <div class="col-sm-10">
      <textarea type="text" class="form-control" id="content" name="content" >{{$blog->content}}</textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <a href="/home" class="btn btn-secondary">Back</a>
    </div>
  </div>
</form>
</div>
@endsection
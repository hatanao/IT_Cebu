@extends('layouts.app')
@section('content')
<div class="container">
    <form method="post" action="/user/update/{{Auth::user()->id}}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="name" class="form-control" id="name" value="{{ $user->name }}" name="new_name">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" value="{{ $user->email }}" name="new_email">
    </div>
    <div class="form-group">
        <label for="current_password">Current Password</label>
        <input type="password" class="form-control" id="current_password" name="current_password">
    </div>
    <div class="form-group">
        <label for="new_password">New Password</label>
        <input type="password" class="form-control" id="new_password" name="password">
    </div>
    <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" class="form-control" id="confirm_password" name="password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>
@endsection
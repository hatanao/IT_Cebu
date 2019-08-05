@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="panel user-profile bg-white p-3">
                <div class="panel-body">
                    <div class="text-center">
                        <div class="avatar">
                            <div class="default">
                                <img src="/img/{{ Auth::user()->avatar }}" style="width:100px;height:100px;">
                            </div>
                        </div>

                        
                        <div class="py-2">
                            <h2>{{ Auth::user()->name }}</h2>
                            <a href="users/edit/{{Auth::user()->id}}" class="btn btn-primary">Edit profile</a>
                        </div>

                        <div class="dropdown-divider my-2"></div>

                        <div class="row mt-15">
                            <div class="col-sm-6">
                                <strong><a href="/user/followinglist">{{ Auth::user()->following()->count() }}</a></strong>
                                <div>following</div>
                            </div>
                                <div class="col-sm-6">
                                    <strong><a href="/user/followerslist">{{ Auth::user()->followers()->count() }}</a></strong>
                                <div>followers</div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown-divider my-3"></div>

                    <div class="media bg-light ">
                        <div class="media-body">
                            <div class="btn-group btn-group-justified d-flex justify-content-center py-2">
                                <div class="well text-center">
                                    <h4>{{$blogs->count()}}</h4>
                                    <small>blogs posted</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-8">
        @include('partials.newPost')
            <div class="activity-feed">
                <div class="well">
                    <div class="page-header mt-0 text-center"><h2>Blogs</h2></div>
                    @include('partials.blogs', ['blogs' => $blogs, 'can_edit' => true])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
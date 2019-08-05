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
                                <img src="/img/{{ $user->avatar }}" style="width:100px;height:100px;">
                            </div>
                        </div>

                        <div class="py-2">                        
                            <h2>{{ $user->name }}</h2>
                                @if(Auth::user()->is_following($user->id))
                                    <div class="ml-auto">
                                        <a href="/user/unfollow/{{$user->id}}" class="btn btn-danger"> Unfollow </a>
                                    </div>
                                @else
                                    <div class="ml-auto">
                                        <a href="/user/follow/{{$user->id}}" class="btn btn-primary"> Follow</a>
                                    </div>
                                @endif
                        </div>
                        <div class="dropdown-divider my-2"></div>

                        <div class="row mt-15">
                            <div class="col-sm-6">
                                <strong><a href="">{{ $user->following()->count() }}</a></strong>
                                <div>following</div>
                            </div>
                                <div class="col-sm-6">
                                    <strong><a href="">{{ $user->followers()->count() }}</a></strong>
                                <div>followers</div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown-divider my-3"></div>

                    <div class="media bg-light">
                        <div class="media-body">
                            <div class="btn-group btn-group-justified d-flex justify-content-center">
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
            <div class="activity-feed">
                <div class="well bg-white">
                    <div class="page-header mt-0 text-center"><h2>Blogs</h2></div>
                    @if(Auth::user()->is_following($user->id))
                        @include('partials.blogs', ['blogs' => $blogs, 'can_edit' => false])
                    @else
                        <p class="text-danger text-center">You are not following this user!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
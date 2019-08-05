@extends('layout')

@section('content')
    <div class="card-body">
        <blockquote class="blockquote mb-0">
        <p>{{$blog->content}}</p>
        <footer class="blockquote-footer">
            Posted {{$blog->created_at->diffForHumans()}}<cite></cite>
            <a href="/like/{{$blog->id}}" class="btn btn-primary">Like {{count($blog->likes)}}</a>      
            <a href="/dislike/{{$blog->id}}" class="btn btn-info">Dislike {{count($blog->likes)}}</a>
        </footer>
        @if ($blog->comments->count())
            <span class="badge badge-primary">
                コメント {{ $blog->comments->count() }}件
            </span>
        @endif
        </blockquote>
    </div>
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                {{ $blog->title }}
            </h1>

            <p class="mb-5">
                {!! nl2br(e($blog->body)) !!}
            </p>

            <section>
                <h2 class="h5 mb-4">
                    コメント
                </h2>

                @forelse($blog->comments as $comment)
                    <div class="border-top p-4">
                        <time class="text-secondary">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2">
                            {!! nl2br(e($comment->body)) !!}
                        </p>
                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </section>
        </div>
    </div>
@endsection
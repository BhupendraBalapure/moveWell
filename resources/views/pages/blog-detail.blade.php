@extends('layouts.app')

@section('title', $blog->title . ' | MoveWell Orthopaedics')

@section('content')

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <h1>{{ $blog->title }}</h1>
        <p class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> / <a href="{{ route('blogs') }}">Blogs</a> / {{ Str::limit($blog->title, 30) }}
        </p>
    </div>
</section>

<section style="padding: 80px 0;">
    <div class="container">
        <div style="max-width: 850px; margin: 0 auto;">
            @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" style="width:100%; height:400px; object-fit:cover; border-radius: 12px; margin-bottom: 30px;">
            @endif

            <div style="display:flex; align-items:center; gap:15px; margin-bottom:25px; flex-wrap:wrap;">
                <span style="background: var(--primary); color:#fff; padding:5px 15px; border-radius:50px; font-size:0.85rem; font-weight:700;">{{ $blog->category }}</span>
                <span style="color: var(--text-light); font-size: 0.9rem;"><i class="far fa-calendar-alt"></i> {{ $blog->published_at ? $blog->published_at->format('F d, Y') : $blog->created_at->format('F d, Y') }}</span>
            </div>

            <div class="blog-content" style="font-size: 1.05rem; line-height: 1.9; color: var(--text-body);">
                {!! nl2br(e($blog->content)) !!}
            </div>

            <div style="margin-top: 40px; padding-top: 30px; border-top: 1px solid var(--border);">
                <a href="{{ route('blogs') }}" style="color: var(--primary); font-weight: 700;"><i class="fas fa-arrow-left"></i> Back to All Blogs</a>
            </div>
        </div>

        @if($relatedBlogs->count() > 0)
            <div style="margin-top: 60px;">
                <div class="section-title">
                    <h2>Related Articles</h2>
                </div>
                <div class="blog-grid">
                    @foreach($relatedBlogs as $related)
                        <div class="blog-card fade-in">
                            <div class="blog-card-image">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}" style="width:100%; height:100%; object-fit:cover;">
                                @else
                                    <div class="blog-placeholder-img"><i class="fas fa-blog"></i></div>
                                @endif
                                <span class="blog-category">{{ $related->category }}</span>
                            </div>
                            <div class="blog-card-content">
                                <h3>{{ $related->title }}</h3>
                                <p>{{ Str::limit($related->excerpt, 100) }}</p>
                                <a href="{{ route('blog.detail', $related->slug) }}" class="learn-more">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

@endsection

@section('styles')
<style>
    .blog-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
    .blog-card { background: var(--card-bg); border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow); transition: var(--transition); }
    .blog-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); }
    .blog-card-image { position: relative; height: 200px; overflow: hidden; }
    .blog-placeholder-img { width:100%; height:100%; background: linear-gradient(135deg, var(--primary), var(--secondary)); display:flex; align-items:center; justify-content:center; }
    .blog-placeholder-img i { font-size: 3rem; color: rgba(255,255,255,0.3); }
    .blog-category { position: absolute; top:12px; left:12px; background:var(--primary); color:#fff; padding:4px 12px; border-radius:50px; font-size:0.8rem; font-weight:700; }
    .blog-card-content { padding: 20px; }
    .blog-card-content h3 { font-size: 1.05rem; margin-bottom: 8px; }
    .blog-card-content p { font-size: 0.9rem; color: var(--text-light); margin-bottom: 10px; }
    .learn-more { color:var(--primary); font-weight:700; font-size:0.9rem; display:inline-flex; align-items:center; gap:5px; }
</style>
@endsection

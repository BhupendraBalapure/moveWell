@extends('layouts.app')

@section('title', 'Blogs | MoveWell Orthopaedics')

@section('content')

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <h1>Our Blog</h1>
        <p class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> / Blogs
        </p>
    </div>
</section>

<!-- Blog Section -->
<section style="padding:80px 0;">
    <div class="container">
        <div class="section-title">
            <h2>Latest Articles & Insights</h2>
            <p>Stay informed about orthopaedic health, treatments, and recovery tips</p>
        </div>

        <div class="blog-grid">
            @forelse($blogs as $blog)
                <div class="blog-card fade-in">
                    <div class="blog-card-image">
                        @if($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" style="width:100%; height:100%; object-fit:cover;">
                        @else
                            <div class="blog-placeholder-img">
                                <i class="fas fa-blog"></i>
                            </div>
                        @endif
                        <span class="blog-category">{{ $blog->category }}</span>
                    </div>
                    <div class="blog-card-content">
                        <div class="blog-date"><i class="far fa-calendar-alt"></i> {{ $blog->published_at ? $blog->published_at->format('F d, Y') : $blog->created_at->format('F d, Y') }}</div>
                        <h3>{{ $blog->title }}</h3>
                        <p>{{ Str::limit($blog->excerpt, 150) }}</p>
                        <a href="{{ route('blog.detail', $blog->slug) }}" class="learn-more">Read More <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            @empty
                <div style="text-align:center; padding: 60px 0; grid-column: 1 / -1;">
                    <i class="fas fa-blog" style="font-size: 3rem; color: #ccc; margin-bottom: 15px; display: block;"></i>
                    <p style="color: #888; font-size: 1.1rem;">No blogs published yet. Check back soon!</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection

@section('styles')
<style>
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 30px;
    }
    .blog-card {
        background: var(--card-bg);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow);
        transition: var(--transition);
    }
    .blog-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-lg);
    }
    .blog-card-image {
        position: relative;
        height: 220px;
        overflow: hidden;
    }
    .blog-placeholder-img {
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .blog-placeholder-img i {
        font-size: 4rem;
        color: rgba(255, 255, 255, 0.3);
    }
    .blog-category {
        position: absolute;
        top: 15px;
        left: 15px;
        background: var(--primary);
        color: var(--white);
        padding: 5px 15px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 700;
    }
    .blog-card-content {
        padding: 25px;
    }
    .blog-date {
        font-size: 0.85rem;
        color: var(--text-light);
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .blog-card-content h3 {
        font-size: 1.15rem;
        margin-bottom: 12px;
        line-height: 1.4;
    }
    .blog-card-content p {
        font-size: 0.92rem;
        color: var(--text-light);
        margin-bottom: 15px;
        line-height: 1.7;
    }
    .blog-card-content .learn-more {
        color: var(--primary);
        font-weight: 700;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: var(--transition);
    }
    .blog-card-content .learn-more:hover {
        gap: 10px;
    }
    @media (max-width: 768px) {
        .blog-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

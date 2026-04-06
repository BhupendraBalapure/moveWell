@extends('layouts.app')

@section('title', 'Gallery | MoveWell Orthopaedics')

@section('content')

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <h1>Our Gallery</h1>
        <p class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> / Gallery
        </p>
    </div>
</section>

<!-- Gallery Section -->
<section style="padding:80px 0;">
    <div class="container">
        <div class="section-title">
            <h2>Clinic & Surgery Gallery</h2>
            <p>A glimpse into our state-of-the-art facility and surgical expertise</p>
        </div>

        <!-- Gallery Filter -->
        <div class="gallery-filters">
            <button class="gallery-filter active" data-filter="all">All</button>
            <button class="gallery-filter" data-filter="clinic">Clinic</button>
            <button class="gallery-filter" data-filter="surgery">Surgery</button>
            <button class="gallery-filter" data-filter="events">Events</button>
        </div>

        <div class="gallery-grid">
            @forelse($galleries as $item)
                <div class="gallery-item fade-in" data-category="{{ $item->category }}">
                    <div class="gallery-item-inner">
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" style="width:100%; height:100%; object-fit:cover;">
                        <div class="gallery-overlay">
                            <h4>{{ $item->title }}</h4>
                            <span>{{ ucfirst($item->category) }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div style="text-align:center; padding: 60px 0; grid-column: 1 / -1;">
                    <i class="fas fa-images" style="font-size: 3rem; color: #ccc; margin-bottom: 15px; display: block;"></i>
                    <p style="color: #888; font-size: 1.1rem;">Gallery images coming soon!</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection

@section('styles')
<style>
    .gallery-filters {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 40px;
        flex-wrap: wrap;
    }
    .gallery-filter {
        padding: 10px 25px;
        border: 2px solid var(--border);
        background: var(--white);
        border-radius: 50px;
        font-family: 'Nunito', sans-serif;
        font-weight: 700;
        font-size: 0.9rem;
        color: var(--text-body);
        cursor: pointer;
        transition: var(--transition);
    }
    .gallery-filter:hover,
    .gallery-filter.active {
        background: var(--primary);
        color: var(--white);
        border-color: var(--primary);
    }
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
    }
    .gallery-item {
        border-radius: var(--radius);
        overflow: hidden;
        transition: var(--transition);
    }
    .gallery-item.hidden { display: none; }
    .gallery-item-inner {
        position: relative;
        height: 260px;
        cursor: pointer;
        overflow: hidden;
    }
    .gallery-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.8));
        padding: 25px 20px 20px;
        transform: translateY(100%);
        transition: var(--transition);
    }
    .gallery-item-inner:hover .gallery-overlay {
        transform: translateY(0);
    }
    .gallery-item-inner:hover img {
        transform: scale(1.05);
    }
    .gallery-item-inner img {
        transition: var(--transition);
    }
    .gallery-overlay h4 {
        color: var(--white);
        font-size: 1rem;
        margin-bottom: 3px;
    }
    .gallery-overlay span {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.85rem;
    }
    @media (max-width: 768px) {
        .gallery-grid { grid-template-columns: repeat(2, 1fr); }
        .gallery-item-inner { height: 200px; }
    }
    @media (max-width: 480px) {
        .gallery-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.gallery-filter').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.gallery-filter').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            const filter = this.dataset.filter;
            document.querySelectorAll('.gallery-item').forEach(item => {
                if (filter === 'all' || item.dataset.category === filter) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    });
</script>
@endsection

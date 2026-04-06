@extends('layouts.app')

@section('title', 'Video Testimonials | MoveWell Orthopaedics')

@section('content')

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <h1>Video Testimonials</h1>
        <p class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> / Video Testimonials
        </p>
    </div>
</section>

<!-- Video Testimonials -->
<section class="video-testimonials-section">
    <div class="container">
        <div class="section-title">
            <h2>Patient Success Stories</h2>
            <p>Watch our patients share their recovery journey and experience with Dr. Sahil Lala</p>
        </div>

        <div class="video-grid">
            {{-- Add your YouTube/video embed URLs here --}}
            @php
                $videos = [
                    // ['url' => 'https://www.youtube.com/embed/VIDEO_ID', 'title' => 'Patient Name - ACL Recovery', 'desc' => 'Short description'],
                ];
            @endphp

            @if(count($videos) > 0)
                @foreach($videos as $video)
                    <div class="video-card">
                        <div class="video-wrapper">
                            <iframe src="{{ $video['url'] }}" title="{{ $video['title'] }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video-info">
                            <h3>{{ $video['title'] }}</h3>
                            <p>{{ $video['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="video-empty-state">
                    <i class="fas fa-video"></i>
                    <h3>Coming Soon</h3>
                    <p>Patient video testimonials will be added here shortly. Stay tuned!</p>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection

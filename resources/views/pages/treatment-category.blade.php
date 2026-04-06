@extends('layouts.app')

@section('title', $title . ' | MoveWell Orthopaedics')

@section('content')

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <h1>{{ $title }}</h1>
        <p class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> /
            <a href="{{ route('home') }}#services">Specializations</a> /
            {{ $title }}
        </p>
    </div>
</section>

<!-- Treatments Grid -->
<section class="services" style="padding:80px 0;">
    <div class="container">
        <div class="section-title">
            <h2>{{ $title }}</h2>
            <p>Click on any treatment to learn more about the condition and treatment options</p>
        </div>
        <div class="services-grid">
            @foreach($services as $service)
                <div class="service-card fade-in">
                    <div class="service-icon">
                        <i class="fas {{ $service['icon'] }}"></i>
                    </div>
                    <h3>{{ $service['title'] }}</h3>
                    <p>{{ $service['short_desc'] }}</p>
                    <a href="{{ route('service.detail', ['category' => $category, 'slug' => $service['slug']]) }}" class="learn-more">
                        Learn More <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

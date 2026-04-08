@extends('layouts.app')

@section('title', $service['title'] . ' | MoveWell Orthopaedics')

@section('content')

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <h1>{{ $service['title'] }}</h1>
        <p class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> /
            <a href="{{ route('home') }}#services">Services</a> /
            {{ ucfirst($category) }} /
            {{ $service['title'] }}
        </p>
    </div>
</section>

<!-- Service Detail -->
<section class="service-detail">
    <div class="container">
        <div class="service-detail-content">
            @foreach($service['sections'] as $index => $section)
                <h2>{{ $section['heading'] }}</h2>

                {{-- Section Images --}}
                @php
                    $sectionImages = $section['images'] ?? (!empty($section['image']) ? [$section['image']] : []);
                @endphp

                @if(count($sectionImages) === 1 && $index > 0 && ($section['layout'] ?? '') !== 'full-width')
                    {{-- Single image: alternate layout based on index --}}
                    <div class="service-section-row{{ $index % 2 !== 0 ? ' service-section-row-reverse' : '' }}">
                        <div class="service-img-box">
                            <img src="{{ asset($sectionImages[0]) }}" alt="{{ $section['heading'] }}">
                        </div>
                        <div class="service-section-text">
                            {!! $section['content'] !!}
                        </div>
                    </div>
                @elseif(($section['layout'] ?? '') === 'full-width' && count($sectionImages) >= 1)
                    {{-- Full width: image below heading, then content --}}
                    <div class="service-images">
                        <div class="service-img-box">
                            <img src="{{ asset($sectionImages[0]) }}" alt="{{ $section['heading'] }}">
                        </div>
                    </div>
                    {!! $section['content'] !!}
                @else
                    {{-- Content first, then images below --}}
                    {!! $section['content'] !!}

                    @if(count($sectionImages) === 1)
                        <div class="service-images">
                            <div class="service-img-box">
                                <img src="{{ asset($sectionImages[0]) }}" alt="{{ $section['heading'] }}">
                            </div>
                        </div>
                    @elseif(count($sectionImages) === 2)
                        <div class="service-images service-images-2">
                            @foreach($sectionImages as $img)
                                <div class="service-img-box">
                                    <img src="{{ asset($img) }}" alt="{{ $section['heading'] }}">
                                </div>
                            @endforeach
                        </div>
                    @elseif(count($sectionImages) >= 3)
                        <div class="service-images service-images-3">
                            @foreach($sectionImages as $img)
                                <div class="service-img-box">
                                    <img src="{{ asset($img) }}" alt="{{ $section['heading'] }}">
                                </div>
                            @endforeach
                        </div>
                    @elseif($index === 0 || $index === floor(count($service['sections']) / 2))
                        <div class="service-images">
                            <div class="service-img-placeholder">
                                <i class="fas fa-image"></i>
                                <span>{{ $section['heading'] }}</span>
                                <small>Image placeholder</small>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach

            <!-- FAQ Section -->
            @if(!empty($service['faqs']))
            <div class="service-faq">
                <h2><i class="fas fa-circle-question"></i> Frequently Asked Questions</h2>
                <div class="faq-accordion">
                    @foreach($service['faqs'] as $faqIndex => $faq)
                        <div class="faq-item">
                            <button class="faq-question" onclick="this.parentElement.classList.toggle('active')">
                                <span>{{ $faq['q'] }}</span>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="faq-answer">
                                <p>{!! $faq['a'] !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- CTA -->
            <div style="margin-top:50px;padding:40px;background:var(--light-bg);border-radius:var(--radius);text-align:center;">
                <h3 style="color:var(--primary);margin-bottom:15px;">Need Expert Consultation?</h3>
                <p style="margin-bottom:25px;">Dr. Sahil Lala provides personalized treatment plans for every patient. Book your appointment today.</p>
                <div style="display:flex;gap:15px;justify-content:center;flex-wrap:wrap;">
                    <a href="{{ route('contact') }}" class="btn btn-primary">
                        <i class="fas fa-calendar-check"></i> Book Appointment
                    </a>
                    <a href="https://wa.me/917892113380?text=Hello%20Dr.%20Sahil%2C%20I%20need%20consultation%20for%20{{ urlencode($service['title']) }}" target="_blank" class="btn-whatsapp">
                        <i class="fab fa-whatsapp"></i> WhatsApp Consult
                    </a>
                </div>
            </div>
        </div>

        <!-- Related Services Sidebar -->
        @if(count($relatedServices) > 0)
            <div class="service-sidebar">
                <h3><i class="fas fa-stethoscope"></i> Related {{ ucfirst($category) }} Services</h3>
                <ul>
                    @foreach($relatedServices as $related)
                        <li>
                            <a href="{{ route('service.detail', ['category' => $category, 'slug' => $related['slug']]) }}">
                                <i class="fas fa-chevron-right"></i> {{ $related['title'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>

@endsection

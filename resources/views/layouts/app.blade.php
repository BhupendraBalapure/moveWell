<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MoveWell Orthopaedics - Dr. Sahil Lala | Arthroscopy, Sports Injury, Knee & Shoulder Surgeon">
    <title>@yield('title', 'MoveWell Orthopaedics | Dr. Sahil Lala')</title>
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @yield('styles')
</head>
<body>

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <a href="https://maps.google.com/?q=Movewell+Orthopedics+Dhantoli+Nagpur" target="_blank"><i class="fas fa-map-marker-alt"></i> 108, Behind Neuron Hospital, West Park Road, Dhantoli, Nagpur-440012</a>
            </div>
            <div class="top-bar-right">
                <a href="mailto:sahillala7@gmail.com"><i class="fas fa-envelope"></i> sahillala7@gmail.com</a>
                <a href="tel:+917892113380"><i class="fas fa-phone"></i> +91 78921 13380</a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="header">
        <div class="container">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="MoveWell Orthopaedics">
                <div class="logo-text">
                    Dr. Sahil Lala
                    <span>MS Orthopaedics</span>
                    <span>Arthroscopy | Sports Injury</span>
                    <span>Knee & Shoulder Surgeon</span>
                </div>
            </a>

            <nav class="nav-menu">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>

                <!-- Treatments Dropdown -->
                @php
                    $categoryLabels = [
                        'knee' => ['label' => 'Knee', 'icon' => 'fa-bone'],
                        'shoulder' => ['label' => 'Shoulder', 'icon' => 'fa-hand-fist'],
                        'hip' => ['label' => 'Hip', 'icon' => 'fa-person-walking'],
                        'elbow' => ['label' => 'Elbow', 'icon' => 'fa-hand'],
                        'ankle' => ['label' => 'Ankle', 'icon' => 'fa-shoe-prints'],
                        'wrist' => ['label' => 'Wrist', 'icon' => 'fa-hand'],
                    ];
                @endphp
                <div class="nav-dropdown">
                    <a href="#" class="{{ request()->routeIs('treatments.category') || request()->routeIs('service.detail') ? 'active' : '' }}">Treatments</a>
                    <div class="nav-dropdown-menu">
                        @foreach($categoryLabels as $catKey => $catInfo)
                            <div class="nav-sub-dropdown">
                                <a href="{{ route('treatments.category', $catKey) }}"><i class="fas {{ $catInfo['icon'] }}"></i> {{ $catInfo['label'] }} <i class="fas fa-chevron-right sub-arrow"></i></a>
                                <div class="nav-sub-menu">
                                    @foreach(collect(config('services_data'))->where('category', $catKey) as $s)
                                        <a href="{{ route('service.detail', ['category' => $catKey, 'slug' => $s['slug']]) }}">{{ $s['title'] }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('blogs') }}" class="{{ request()->routeIs('blogs') ? 'active' : '' }}">Blogs</a>
                <div class="nav-dropdown">
                    <a href="#" class="{{ request()->routeIs('gallery') || request()->routeIs('video-testimonials') ? 'active' : '' }}">Gallery</a>
                    <div class="nav-dropdown-menu">
                        <a href="{{ route('gallery') }}"><i class="fas fa-images"></i> Image Gallery</a>
                        <a href="{{ route('video-testimonials') }}"><i class="fas fa-video"></i> Video Testimonials</a>
                    </div>
                </div>
                <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact Us</a>
            </nav>

            <div class="header-cta">
                <a href="https://wa.me/917892113380?text=Hello%20Dr.%20Sahil%2C%20I%20would%20like%20to%20share%20my%20MRI%2FX-Ray%20reports." target="_blank" class="btn-whatsapp">
                    <i class="fab fa-whatsapp"></i> WhatsApp your MRI and X-Ray
                </a>
                <div class="menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>

    <div class="nav-overlay"></div>

    <!-- Main Content -->
    @yield('content')

    <!-- WhatsApp CTA Section -->
    <section class="whatsapp-cta">
        <div class="container">
            <h2>Send Your MRI / X-Ray Report on WhatsApp</h2>
            <p>Get expert opinion from Dr. Sahil Lala. Click below to share your reports instantly.</p>
            <a href="https://wa.me/917892113380?text=Hello%20Dr.%20Sahil%2C%20I%20would%20like%20to%20share%20my%20reports." target="_blank" class="btn">
                <i class="fab fa-whatsapp"></i> Send on WhatsApp
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <a href="{{ route('home') }}" class="logo">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="MoveWell Orthopaedics" style="height:50px;filter:brightness(0) invert(1);">
                    </a>
                    <p>MoveWell Orthopaedics is dedicated to providing advanced orthopaedic care with precision-driven surgical techniques and personalized rehabilitation plans.</p>
                    <div class="footer-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="footer-links-col">
                    <h4>Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}"><i class="fas fa-chevron-right"></i> Home</a></li>
                        <li><a href="{{ route('about') }}"><i class="fas fa-chevron-right"></i> About</a></li>
                        <li><a href="{{ route('blogs') }}"><i class="fas fa-chevron-right"></i> Blogs</a></li>
                        <li><a href="{{ route('gallery') }}"><i class="fas fa-chevron-right"></i> Gallery</a></li>
                        <li><a href="{{ route('contact') }}"><i class="fas fa-chevron-right"></i> Contact</a></li>
                    </ul>
                </div>

                <div class="footer-links-col">
                    <h4>Our Services</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('service.detail', ['category' => 'knee', 'slug' => 'acl-injury']) }}"><i class="fas fa-chevron-right"></i> ACL Reconstruction</a></li>
                        <li><a href="{{ route('service.detail', ['category' => 'knee', 'slug' => 'knee-replacement']) }}"><i class="fas fa-chevron-right"></i> Knee Replacement</a></li>
                        <li><a href="{{ route('service.detail', ['category' => 'shoulder', 'slug' => 'rotator-cuff-injury']) }}"><i class="fas fa-chevron-right"></i> Rotator Cuff Repair</a></li>
                        <li><a href="{{ route('service.detail', ['category' => 'hip', 'slug' => 'hip-replacement']) }}"><i class="fas fa-chevron-right"></i> Hip Replacement</a></li>
                        <li><a href="{{ route('service.detail', ['category' => 'shoulder', 'slug' => 'shoulder-instability']) }}"><i class="fas fa-chevron-right"></i> Shoulder Surgery</a></li>
                    </ul>
                </div>

                <div>
                    <h4>Contact Info</h4>
                    <ul class="footer-contact">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Movewell Orthopedics, 108, Behind Neuron Hospital, West Park Road, Dhantoli, Nagpur-440012</span>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <span><a href="tel:+917892113380">+91 78921 13380</a></span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span><a href="mailto:sahillala7@gmail.com">sahillala7@gmail.com</a></span>
                        </li>
                        <li>
                            <i class="fas fa-clock"></i>
                            <span>Mon - Sat: 10:00 AM - 9:00 PM</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <p>&copy; {{ date('Y') }} MoveWell Orthopaedics | Dr. Sahil Lala. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp -->
    <a href="https://wa.me/917892113380" target="_blank" class="whatsapp-float" aria-label="Chat on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Back to Top -->
    <button class="back-to-top" aria-label="Back to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('scripts')
</body>
</html>

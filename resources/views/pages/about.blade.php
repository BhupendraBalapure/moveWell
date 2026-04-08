@extends('layouts.app')

@section('title', 'About Dr. Sahil Lala | MoveWell Orthopaedics')

@section('content')

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <h1>About Dr. Sahil Lala</h1>
        <p class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> / About
        </p>
    </div>
</section>

<!-- About Section -->
<section class="about" style="padding:80px 0;">
    <div class="container">
        <div class="about-image">
            <div class="about-image-wrapper">
                <div style="width:100%;height:500px;background:linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);display:flex;align-items:center;justify-content:center;color:white;font-size:1.5rem;font-weight:700;">
                    <div style="text-align:center;">
                        <i class="fas fa-user-doctor" style="font-size:5rem;margin-bottom:20px;display:block;"></i>
                        Dr. Sahil Lala
                    </div>
                </div>
            </div>
        </div>
        <div class="about-content">
            <div class="section-title">
                <h2>Dr. Sahil Lala</h2>
                <p>MS Orthopaedics | Arthroscopy, Sports Injury, Knee & Shoulder Surgeon</p>
            </div>
            <p>Dr. Sahil is a fellowship-trained orthopaedic surgeon known for precision-driven arthroscopic Knee and Shoulder surgeries. With a strong academic foundation and advanced surgical training, he specializes in restoring joint stability, function, and performance.</p>
            <p>He completed his MS in Orthopaedics from the prestigious <strong>Jawaharlal Nehru Medical College, Belgaum</strong>, one of the country's respected medical institutions, where he developed expertise in trauma management and complex joint disorders.</p>
            <p>He subsequently pursued <strong>Fellowship Training in Arthroscopy, Sports Injury & Joint Preservation (Knee Surgery)</strong> in Mumbai, followed by a dedicated <strong>Fellowship in Advanced Shoulder Surgery</strong>.</p>

            <h3 style="color:var(--primary);margin:30px 0 15px;">Surgical Expertise</h3>
            <ul class="about-specialties">
                <li><i class="fas fa-check-circle"></i> ACL / PCL Reconstruction</li>
                <li><i class="fas fa-check-circle"></i> Meniscus & Cartilage Repair</li>
                <li><i class="fas fa-check-circle"></i> Rotator Cuff Repair</li>
                <li><i class="fas fa-check-circle"></i> Shoulder Stabilization & Labral Surgery</li>
                <li><i class="fas fa-check-circle"></i> Shoulder Replacement Surgery</li>
                <li><i class="fas fa-check-circle"></i> Minimally Invasive Arthroscopic Procedures</li>
            </ul>

            <p style="margin-top:25px;">Dr. Sahil believes that successful orthopaedic care extends beyond surgery. His treatment philosophy integrates precision techniques, structured rehabilitation protocols, and individualized recovery plans to ensure optimal functional outcomes and long-term joint health. At Movewell Orthopaedics, he leads with a clear commitment.</p>

            <p class="about-tagline">"Restoring Strength. Renewing Motion."</p>

            <div style="margin-top:30px;">
                <a href="{{ route('contact') }}" class="btn btn-primary">Book Appointment</a>
            </div>
        </div>
    </div>
</section>


@endsection

@extends('layouts.app')

@section('title', 'MoveWell Orthopaedics | Dr. Sahil Lala - Knee & Shoulder Surgeon')

@section('content')

<!-- Hero Section -->
<section class="hero" style="background:url('{{ asset('assets/images/new2.png') }}') right center/cover no-repeat;">
    <div class="container">
        <div class="hero-form">
            <div class="hero-form-card">
                <h3><i class="fas fa-calendar-check"></i> Book Appointment</h3>
                <p>Fill in your details and we'll get back to you shortly</p>
                <form id="appointmentForm" action="{{ route('appointment.store') }}" method="POST">
                    @csrf
                    <div class="hero-form-group">
                        <input type="text" name="name" placeholder="Full Name *" required>
                    </div>
                    <div class="hero-form-group">
                        <input type="tel" name="phone" placeholder="Phone Number *" required>
                    </div>
                    <div class="hero-form-row">
                        <div class="hero-form-group">
                            <input type="date" name="preferred_date" min="{{ date('Y-m-d') }}">
                        </div>
                        <div class="hero-form-group">
                            <select name="preferred_time">
                                <option value="">Select Time</option>
                                <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
                                <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
                                <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
                                <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
                                <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
                            </select>
                        </div>
                    </div>
                    <div class="hero-form-group">
                        <select name="service">
                            <option value="">Select Service</option>
                            <option value="Knee Surgery">Knee Surgery</option>
                            <option value="Shoulder Surgery">Shoulder Surgery</option>
                            <option value="Hip Surgery">Hip Surgery</option>
                            <option value="Elbow Treatment">Elbow Treatment</option>
                            <option value="Ankle Treatment">Ankle Treatment</option>
                            <option value="Wrist Treatment">Wrist Treatment</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <button type="submit" class="hero-form-btn">
                        <i class="fas fa-paper-plane"></i> Book Now
                    </button>
                </form>
            </div>
            <div class="hero-form-socials">
                <a href="https://wa.me/917892113380" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/movewellortho" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="hero-content">
            <h1>Advanced<br><span>Orthopaedic</span><br>Care & <span>Treatment</span></h1>
            <p>Dr. Sahil Lala — Fellowship-trained Orthopaedic Surgeon specializing in Arthroscopy, Sports Injury, Knee & Shoulder Surgery. Precision-driven care for optimal recovery.</p>
            <div class="hero-buttons">
                <a href="https://wa.me/917892113380" target="_blank" class="btn btn-outline">
                    <i class="fab fa-whatsapp"></i> WhatsApp Consult
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Mobile Appointment Form -->
<section class="mobile-form-section">
    <div class="container">
        <div class="hero-form-card">
            <h3><i class="fas fa-calendar-check"></i> Book Appointment</h3>
            <p>Fill in your details and we'll get back to you shortly</p>
            <form id="mobileAppointmentForm" action="{{ route('appointment.store') }}" method="POST">
                @csrf
                <div class="hero-form-group">
                    <input type="text" name="name" placeholder="Full Name *" required>
                </div>
                <div class="hero-form-group">
                    <input type="tel" name="phone" placeholder="Phone Number *" required>
                </div>
                <div class="hero-form-row">
                    <div class="hero-form-group">
                        <input type="date" name="preferred_date" min="{{ date('Y-m-d') }}">
                    </div>
                    <div class="hero-form-group">
                        <select name="preferred_time">
                            <option value="">Select Time</option>
                            <option value="10:00 AM - 12:00 PM">10:00 AM - 12:00 PM</option>
                            <option value="12:00 PM - 02:00 PM">12:00 PM - 02:00 PM</option>
                            <option value="02:00 PM - 04:00 PM">02:00 PM - 04:00 PM</option>
                            <option value="04:00 PM - 06:00 PM">04:00 PM - 06:00 PM</option>
                            <option value="06:00 PM - 08:00 PM">06:00 PM - 08:00 PM</option>
                        </select>
                    </div>
                </div>
                <div class="hero-form-group">
                    <select name="service">
                        <option value="">Select Service</option>
                        <option value="Knee Surgery">Knee Surgery</option>
                        <option value="Shoulder Surgery">Shoulder Surgery</option>
                        <option value="Hip Surgery">Hip Surgery</option>
                        <option value="Elbow Treatment">Elbow Treatment</option>
                        <option value="Ankle Treatment">Ankle Treatment</option>
                        <option value="Wrist Treatment">Wrist Treatment</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <button type="submit" class="hero-form-btn">
                    <i class="fas fa-paper-plane"></i> Book Now
                </button>
            </form>
        </div>
        <div class="hero-form-socials hero-form-socials--mobile">
            <a href="https://wa.me/917892113380" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/movewellortho" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
</section>

<!-- About Preview -->
<section class="about section-reveal" id="about">
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
                <h2>About Dr. Sahil Lala</h2>
                <p>Arthroscopy, Sports Injury, Knee & Shoulder Surgeon</p>
            </div>
            <p>Dr. Sahil is a fellowship-trained orthopaedic surgeon known for precision-driven arthroscopic Knee and Shoulder surgeries. With a strong academic foundation and advanced surgical training, he specializes in restoring joint stability, function, and performance.</p>
            <p>He completed his MS in Orthopaedics from the prestigious Jawaharlal Nehru Medical College, Belgaum. He subsequently pursued Fellowship Training in Arthroscopy, Sports Injury & Joint Preservation in Mumbai, followed by a dedicated Fellowship in Advanced Shoulder Surgery.</p>

            <ul class="about-specialties">
                <li><i class="fas fa-check-circle"></i> ACL / PCL Reconstruction</li>
                <li><i class="fas fa-check-circle"></i> Meniscus & Cartilage Repair</li>
                <li><i class="fas fa-check-circle"></i> Rotator Cuff Repair</li>
                <li><i class="fas fa-check-circle"></i> Shoulder Stabilization</li>
                <li><i class="fas fa-check-circle"></i> Shoulder Replacement</li>
                <li><i class="fas fa-check-circle"></i> Minimally Invasive Surgery</li>
            </ul>

            <a href="{{ route('about') }}" class="btn btn-primary">Know More</a>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services section-reveal" id="services">
    <div class="container">
        <div class="section-title">
            <h2>Our Specializations</h2>
            <p>Comprehensive orthopaedic care for every joint</p>
        </div>
        <div class="services-grid">
            @php
                $categories = [
                    'knee' => ['image' => 'category/knee.avif', 'title' => 'Knee Treatment', 'desc' => 'ACL/PCL reconstruction, meniscus repair, cartilage restoration, knee replacement, and joint preservation surgery.'],
                    'shoulder' => ['image' => 'category/shoulder.jpg', 'title' => 'Shoulder Treatment', 'desc' => 'Rotator cuff repair, shoulder stabilization, labral repair, AC joint treatment, and shoulder replacement.'],
                    'hip' => ['image' => 'category/hip.jpg', 'title' => 'Hip Treatment', 'desc' => 'Hip arthroscopy for labral tears & impingement, total and partial hip replacement surgery.'],
                    'elbow' => ['image' => 'category/elbow.jpg', 'title' => 'Elbow Treatment', 'desc' => 'Tennis elbow, golfer\'s elbow, ligament injuries, fractures, and elbow stiffness management.'],
                    'ankle' => ['image' => 'category/ankle.jpg', 'title' => 'Ankle Treatment', 'desc' => 'Ankle sprains, Achilles tendon repair, fractures, arthritis, and chronic instability treatment.'],
                    'wrist' => ['image' => 'category/wrist.jpg', 'title' => 'Wrist Treatment', 'desc' => 'Wrist sprains, carpal tunnel syndrome, fractures, De Quervain\'s tenosynovitis, and ganglion cysts.'],
                ];
            @endphp

            @foreach($categories as $catKey => $cat)
                <a href="{{ route('treatments.category', $catKey) }}" class="service-card img-card stagger-child" style="text-decoration:none;color:inherit;">
                    <div class="service-card-img">
                        <img src="{{ asset('assets/images/' . $cat['image']) }}" alt="{{ $cat['title'] }}">
                    </div>
                    <div class="service-card-body">
                        <h3>{{ $cat['title'] }}</h3>
                        <p>{{ $cat['desc'] }}</p>
                        <span class="learn-more">
                            View Treatments <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- WhatsApp CTA Section -->
<section class="whatsapp-cta section-reveal">
    <div class="container">
        <h2>Send Your MRI / X-Ray Report on WhatsApp</h2>
        <p>Get expert opinion from Dr. Sahil Lala. Click below to share your reports instantly.</p>
        <a href="https://wa.me/917892113380?text=Hello%20Dr.%20Sahil%2C%20I%20would%20like%20to%20share%20my%20reports." target="_blank" class="btn">
            <i class="fab fa-whatsapp"></i> Send on WhatsApp
        </a>
    </div>
</section>

<!-- Detailed Services List -->
<section class="services section-reveal" id="all-services" style="background:var(--white);">
    <div class="container">
        <div class="section-title">
            <h2>All Treatment Services</h2>
            <p>Click on any service to learn more about the condition and treatment options</p>
        </div>
        @php
            $mainSlugs = [
                'acl-injury', 'knee-replacement',
                'rotator-cuff-injury', 'shoulder-instability',
                'hip-replacement', 'ankle-ligament-injuries',
            ];
            $mainServices = collect(config('services_data'))->whereIn('slug', $mainSlugs);
        @endphp
        @php
            $treatmentImages = [
                'acl-injury' => 'treatments/acl.avif',
                'knee-replacement' => 'treatments/kneereplcaement.jpg',
                'rotator-cuff-injury' => 'treatments/rotatorcuff.jpg',
                'shoulder-instability' => 'treatments/shouldeInstability.jpg',
                'hip-replacement' => 'treatments/hipreplacement.jpg',
                'ankle-ligament-injuries' => 'treatments/ankleligament.avif',
            ];
        @endphp
        <div class="services-grid">
            @foreach($mainServices as $service)
                <a href="{{ route('service.detail', ['category' => $service['category'], 'slug' => $service['slug']]) }}" class="service-card img-card stagger-child" style="text-decoration:none;color:inherit;">
                    <div class="service-card-img">
                        <img src="{{ asset('assets/images/' . ($treatmentImages[$service['slug']] ?? 'category/knee.avif')) }}" alt="{{ $service['title'] }}">
                    </div>
                    <div class="service-card-body">
                        <h3>{{ $service['title'] }}</h3>
                        <p>{{ $service['short_desc'] }}</p>
                        <span class="learn-more">
                            Learn More <i class="fas fa-arrow-right"></i>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Image Gallery -->
<section class="section-reveal" style="padding:80px 0;background:var(--light-bg);">
    <div class="container">
        <div class="section-title">
            <h2>Image Gallery</h2>
            <p>A glimpse into our state-of-the-art facility and surgical expertise</p>
        </div>
        <div class="home-gallery-grid">
            @forelse($galleries as $item)
                <div class="home-gallery-item fade-in">
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                    <div class="home-gallery-overlay">
                        <h4>{{ $item->title }}</h4>
                    </div>
                </div>
            @empty
                <div style="text-align:center;padding:60px 0;grid-column:1/-1;">
                    <i class="fas fa-images" style="font-size:3rem;color:#ccc;margin-bottom:15px;display:block;"></i>
                    <p style="color:#888;font-size:1.1rem;">Gallery images coming soon!</p>
                </div>
            @endforelse
        </div>
        @if($galleries->count() > 0)
            <div style="text-align:center;margin-top:35px;">
                <a href="{{ route('gallery') }}" class="btn btn-primary">
                    View Full Gallery <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials section-reveal">
    <div class="container">
        <div class="section-title">
            <h2>Patient Testimonials</h2>
            <p>What our patients say about their experience</p>
        </div>
        <div class="testimonial-slider">
            <button class="testimonial-arrow testimonial-prev" onclick="moveTestimonial(-1)">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="testimonial-viewport">
                <div class="testimonial-track">

                    <div class="testimonial-card-premium">
                        <div class="testimonial-quote-icon"><i class="fas fa-quote-left"></i></div>
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"Dr. Sahil performed my ACL reconstruction surgery. His expertise and care throughout the process was exceptional. I'm back to playing football within 8 months!"</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar">RK</div>
                            <div class="testimonial-author-info">
                                <h4>Rahul K.</h4>
                                <p>ACL Reconstruction Patient</p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-card-premium">
                        <div class="testimonial-quote-icon"><i class="fas fa-quote-left"></i></div>
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"After years of shoulder pain, Dr. Sahil's rotator cuff repair gave me my life back. His attention to detail and follow-up care is outstanding."</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar">PM</div>
                            <div class="testimonial-author-info">
                                <h4>Priya M.</h4>
                                <p>Rotator Cuff Repair Patient</p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-card-premium">
                        <div class="testimonial-quote-icon"><i class="fas fa-quote-left"></i></div>
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"My mother had knee replacement surgery by Dr. Sahil. She is now walking comfortably without any pain. We are very grateful for his expertise and compassionate care."</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar">AS</div>
                            <div class="testimonial-author-info">
                                <h4>Amit S.</h4>
                                <p>Knee Replacement Patient's Family</p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-card-premium">
                        <div class="testimonial-quote-icon"><i class="fas fa-quote-left"></i></div>
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"I had a meniscus tear and was worried about surgery. Dr. Sahil explained everything clearly and the arthroscopic procedure was smooth. Recovered much faster than expected!"</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar">SK</div>
                            <div class="testimonial-author-info">
                                <h4>Sneha K.</h4>
                                <p>Meniscus Repair Patient</p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-card-premium">
                        <div class="testimonial-quote-icon"><i class="fas fa-quote-left"></i></div>
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"Dr. Sahil treated my shoulder dislocation issue. After the stabilization surgery, I haven't had a single episode. Truly life-changing treatment!"</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar">VP</div>
                            <div class="testimonial-author-info">
                                <h4>Vikram P.</h4>
                                <p>Shoulder Stabilization Patient</p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial-card-premium">
                        <div class="testimonial-quote-icon"><i class="fas fa-quote-left"></i></div>
                        <div class="testimonial-stars">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <p class="testimonial-text">"Had hip replacement at age 62. Dr. Sahil made me feel comfortable and confident. Walking pain-free now after years of suffering. Highly recommend!"</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar">MD</div>
                            <div class="testimonial-author-info">
                                <h4>Meena D.</h4>
                                <p>Hip Replacement Patient</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <button class="testimonial-arrow testimonial-next" onclick="moveTestimonial(1)">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
// Appointment Form AJAX
document.getElementById('appointmentForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = this;
    const btn = form.querySelector('.hero-form-btn');
    const origText = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
    btn.disabled = true;

    fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            showToast(data.message, 'success');
            form.reset();
        }
    })
    .catch(() => showToast('Something went wrong. Please try again.', 'error'))
    .finally(() => {
        btn.innerHTML = origText;
        btn.disabled = false;
    });
});

function showToast(msg, type) {
    const toast = document.createElement('div');
    toast.className = 'toast-msg toast-' + type;
    toast.innerHTML = '<i class="fas ' + (type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle') + '"></i> ' + msg;
    document.body.appendChild(toast);
    setTimeout(() => toast.classList.add('toast-show'), 10);
    setTimeout(() => {
        toast.classList.remove('toast-show');
        setTimeout(() => toast.remove(), 300);
    }, 4000);
}

// Testimonial Slider
(function() {
    const track = document.querySelector('.testimonial-track');
    const cards = document.querySelectorAll('.testimonial-card-premium');
    let currentIndex = 0;
    let autoTimer;

    function getVisibleCount() {
        if (window.innerWidth <= 768) return 1;
        if (window.innerWidth <= 1024) return 2;
        return 3;
    }

    function getCardWidth() {
        const card = cards[0];
        return card.offsetWidth + 25; // width + gap
    }

    function slideToIndex(index) {
        const visible = getVisibleCount();
        const maxIndex = cards.length - visible;
        if (index > maxIndex) index = 0;
        if (index < 0) index = maxIndex;
        currentIndex = index;
        const offset = currentIndex * getCardWidth();
        track.style.transform = `translateX(-${offset}px)`;
    }

    window.moveTestimonial = function(dir) {
        slideToIndex(currentIndex + dir);
        resetAuto();
    };

    function resetAuto() {
        clearInterval(autoTimer);
        autoTimer = setInterval(() => slideToIndex(currentIndex + 1), 4000);
    }

    resetAuto();
    window.addEventListener('resize', () => slideToIndex(currentIndex));
})();
</script>
@endsection

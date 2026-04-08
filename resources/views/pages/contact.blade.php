@extends('layouts.app')

@section('title', 'Contact Us | MoveWell Orthopaedics')

@section('content')

<!-- Page Hero -->
<section class="page-hero">
    <div class="container">
        <h1>Contact Us</h1>
        <p class="breadcrumb">
            <a href="{{ route('home') }}">Home</a> / Contact
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="contact">
    <div class="container">
        <div class="contact-wrapper">
            <div>
                <div class="section-title" style="text-align:left;">
                    <h2>Get In Touch</h2>
                    <p>We'd love to hear from you. Reach out for appointments, queries, or to share your reports.</p>
                </div>

                <div class="contact-info">
                    <div class="contact-info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Clinic Address</h4>
                            <p>Movewell Orthopedics, 108, Behind Neuron Hospital,<br>West Park Road, Dhantoli, Nagpur-440012</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4>Phone</h4>
                            <a href="tel:+917892113380">+91 78921 13380</a>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <a href="mailto:sahillala7@gmail.com">sahillala7@gmail.com</a>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h4>Working Hours</h4>
                            <p>Monday - Saturday: 10:00 AM - 9:00 PM<br>Sunday: By Appointment Only</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fab fa-whatsapp"></i>
                        <div>
                            <h4>WhatsApp</h4>
                            <a href="https://wa.me/917892113380" target="_blank">Send message or share reports</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <h3>Send a Message</h3>

                @if(session('success'))
                    <div style="background: #d4edda; color: #155724; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div style="background: #f8d7da; color: #721c24; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                        <ul style="margin:0; padding-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Your Name *" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" placeholder="Phone Number *" value="{{ old('phone') }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <select name="service">
                            <option value="">Select Service</option>
                            <option value="ACL Reconstruction" {{ old('service') == 'ACL Reconstruction' ? 'selected' : '' }}>ACL Reconstruction</option>
                            <option value="Knee Replacement" {{ old('service') == 'Knee Replacement' ? 'selected' : '' }}>Knee Replacement</option>
                            <option value="Shoulder Surgery" {{ old('service') == 'Shoulder Surgery' ? 'selected' : '' }}>Shoulder Surgery</option>
                            <option value="Hip Replacement" {{ old('service') == 'Hip Replacement' ? 'selected' : '' }}>Hip Replacement</option>
                            <option value="Sports Injury" {{ old('service') == 'Sports Injury' ? 'selected' : '' }}>Sports Injury</option>
                            <option value="Fracture Management" {{ old('service') == 'Fracture Management' ? 'selected' : '' }}>Fracture Management</option>
                            <option value="Other" {{ old('service') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Your Message *" required>{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section style="padding:0;">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238570.0324156095!2d78.93564787812497!3d21.16101421429498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd4c0a5a31faf13%3A0x19b37d06d0bb3e2b!2sNagpur%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1679900000000!5m2!1sen!2sin"
        width="100%"
        height="400"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</section>

@endsection

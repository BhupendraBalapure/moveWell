@extends('admin.layout')

@section('title', 'View Message')
@section('page-title', 'Message Details')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.contacts.index') }}" style="color: var(--text-muted); text-decoration: none; font-size: 0.88rem; font-weight: 500;">
        <i class="fas fa-arrow-left me-1"></i> Back to Messages
    </a>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <div style="width:44px;height:44px;border-radius:12px;background:linear-gradient(135deg,#1a6e7a,#2a8f9d);display:flex;align-items:center;justify-content:center;font-size:0.9rem;font-weight:700;color:#fff;">
                        {{ strtoupper(substr($contact->name, 0, 2)) }}
                    </div>
                    <div>
                        <h6 style="font-weight: 700; margin: 0;">{{ $contact->name }}</h6>
                        <small style="color: var(--text-muted);">{{ $contact->created_at->format('d M Y, h:i A') }} ({{ $contact->created_at->diffForHumans() }})</small>
                    </div>
                </div>
                @if($contact->is_read)
                    <span class="badge-pill badge-success"><i class="fas fa-check me-1"></i> Read</span>
                @else
                    <span class="badge-pill badge-danger"><i class="fas fa-bell me-1"></i> New</span>
                @endif
            </div>
            <div class="card-body">
                <div class="row g-4 mb-4">
                    <div class="col-sm-6">
                        <div style="background: #f6fafb; border-radius: var(--radius-sm); padding: 16px;">
                            <div style="font-size: 0.72rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 6px;">Phone</div>
                            <a href="tel:{{ $contact->phone }}" style="font-weight: 600; color: var(--text-primary); text-decoration: none; font-size: 0.95rem;">
                                <i class="fas fa-phone me-1" style="color: #1a6e7a; font-size: 0.82rem;"></i> {{ $contact->phone }}
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div style="background: #f6fafb; border-radius: var(--radius-sm); padding: 16px;">
                            <div style="font-size: 0.72rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 6px;">Email</div>
                            <span style="font-weight: 500; color: var(--text-primary); font-size: 0.95rem;">
                                @if($contact->email)
                                    <i class="fas fa-envelope me-1" style="color: #1a6e7a; font-size: 0.82rem;"></i> {{ $contact->email }}
                                @else
                                    <span style="color: var(--text-muted);">Not provided</span>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                @if($contact->service)
                <div class="mb-4">
                    <div style="font-size: 0.72rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 8px;">Service Interested In</div>
                    <span class="badge-pill badge-accent" style="font-size: 0.82rem; padding: 6px 14px;">{{ $contact->service }}</span>
                </div>
                @endif

                <div>
                    <div style="font-size: 0.72rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.8px; margin-bottom: 8px;">Message</div>
                    <div style="background: #f6fafb; border-radius: var(--radius); padding: 20px; line-height: 1.7; color: var(--text-primary); font-size: 0.95rem; border-left: 3px solid #1a6e7a;">
                        {{ $contact->message }}
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex gap-2 flex-wrap">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}" target="_blank" class="btn" style="background: #25d366; color: #fff; border: none; font-weight: 600; border-radius: var(--radius-sm); padding: 10px 20px;">
                    <i class="fab fa-whatsapp me-1"></i> Reply on WhatsApp
                </a>
                @if($contact->email)
                <a href="mailto:{{ $contact->email }}" class="btn btn-ghost">
                    <i class="fas fa-envelope me-1"></i> Send Email
                </a>
                @endif
                <a href="tel:{{ $contact->phone }}" class="btn btn-ghost">
                    <i class="fas fa-phone me-1"></i> Call
                </a>
                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="ms-auto" onsubmit="return confirm('Are you sure you want to delete this message?')">
                    @csrf @method('DELETE')
                    <button class="btn" style="background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; font-weight: 600; border-radius: var(--radius-sm); padding: 10px 20px;">
                        <i class="fas fa-trash-alt me-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 style="font-weight: 700; margin: 0;">Contact Info</h6>
            </div>
            <div class="card-body">
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:40px;height:40px;border-radius:10px;background:#e6f4f5;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-user" style="color:#1a6e7a;"></i>
                        </div>
                        <div>
                            <div style="font-size:0.72rem;color:var(--text-muted);font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Name</div>
                            <div style="font-weight:600;">{{ $contact->name }}</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:40px;height:40px;border-radius:10px;background:#e6f7f4;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-phone" style="color:#144f58;"></i>
                        </div>
                        <div>
                            <div style="font-size:0.72rem;color:var(--text-muted);font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Phone</div>
                            <div style="font-weight:600;">{{ $contact->phone }}</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <div style="width:40px;height:40px;border-radius:10px;background:#edf9fb;display:flex;align-items:center;justify-content:center;">
                            <i class="fas fa-clock" style="color:#2a8f9d;"></i>
                        </div>
                        <div>
                            <div style="font-size:0.72rem;color:var(--text-muted);font-weight:600;text-transform:uppercase;letter-spacing:0.5px;">Submitted</div>
                            <div style="font-weight:600;">{{ $contact->created_at->format('d M Y') }}</div>
                            <div style="font-size:0.78rem;color:var(--text-muted);">{{ $contact->created_at->format('h:i A') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

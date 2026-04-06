@extends('admin.layout')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Welcome Banner -->
<div class="card mb-4" style="background: linear-gradient(135deg, #0d3b42 0%, #1a6e7a 50%, #2a8f9d 100%); border: none;">
    <div class="card-body" style="padding: 30px 28px;">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h4 style="color: #fff; font-weight: 700; margin-bottom: 6px;">Welcome back, {{ Auth::user()->name }}!</h4>
                <p style="color: rgba(255,255,255,0.75); margin: 0; font-size: 0.92rem;">Here's what's happening with your website today.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-sm" style="background: rgba(255,255,255,0.15); color: #fff; border: 1px solid rgba(255,255,255,0.25); border-radius: 8px; font-weight: 600; padding: 8px 16px; backdrop-filter: blur(4px);">
                    <i class="fas fa-plus me-1"></i> New Blog
                </a>
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-sm" style="background: #fff; color: #1a6e7a; border: none; border-radius: 8px; font-weight: 600; padding: 8px 16px;">
                    <i class="fas fa-upload me-1"></i> Upload Image
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Stats -->
<div class="row g-4 mb-4">
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background: #fef2f2; color: #ef4444;">
                <i class="fas fa-bell"></i>
            </div>
            <div class="stat-value" style="color: #ef4444;">{{ $unreadContacts }}</div>
            <div class="stat-label">Unread Messages</div>
            <i class="fas fa-bell stat-pattern"></i>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background: #e6f4f5; color: #1a6e7a;">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="stat-value" style="color: #1a6e7a;">{{ $totalContacts }}</div>
            <div class="stat-label">Total Messages</div>
            <i class="fas fa-envelope stat-pattern"></i>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background: #e6f7f4; color: #0d3b42;">
                <i class="fas fa-images"></i>
            </div>
            <div class="stat-value" style="color: #0d3b42;">{{ $totalGallery }}</div>
            <div class="stat-label">Gallery Images</div>
            <i class="fas fa-images stat-pattern"></i>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="stat-card">
            <div class="stat-icon-wrap" style="background: #edf9fb; color: #2a8f9d;">
                <i class="fas fa-pen-nib"></i>
            </div>
            <div class="stat-value" style="color: #2a8f9d;">{{ $totalBlogs }}</div>
            <div class="stat-label">Blog Posts</div>
            <i class="fas fa-pen-nib stat-pattern"></i>
        </div>
    </div>
</div>

<!-- Recent Messages + Quick Actions -->
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h6 style="font-weight: 700; margin: 0;">Recent Messages</h6>
                    <small style="color: var(--text-muted);">Latest contact form submissions</small>
                </div>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-ghost btn-sm" style="padding: 6px 14px; font-size: 0.8rem;">
                    View All <i class="fas fa-arrow-right ms-1"></i>
                </a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Service</th>
                                <th>Received</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(\App\Models\Contact::latest()->take(5)->get() as $contact)
                                <tr class="{{ !$contact->is_read ? 'row-unread' : '' }}">
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div style="width:32px;height:32px;border-radius:8px;background:{{ !$contact->is_read ? '#e6f4f5' : '#f1f5f9' }};display:flex;align-items:center;justify-content:center;font-size:0.75rem;font-weight:700;color:{{ !$contact->is_read ? '#1a6e7a' : '#94a3b8' }};">
                                                {{ strtoupper(substr($contact->name, 0, 2)) }}
                                            </div>
                                            <div>
                                                <span style="font-weight: 600;">{{ $contact->name }}</span>
                                                @if(!$contact->is_read)
                                                    <span class="badge-pill badge-danger ms-1" style="font-size: 0.65rem;">NEW</span>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td style="color: var(--text-secondary);">{{ $contact->phone }}</td>
                                    <td>
                                        @if($contact->service)
                                            <span class="badge-pill badge-accent">{{ $contact->service }}</span>
                                        @else
                                            <span style="color: var(--text-muted);">--</span>
                                        @endif
                                    </td>
                                    <td style="color: var(--text-muted); font-size: 0.82rem;">{{ $contact->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('admin.contacts.show', $contact) }}" class="btn-icon btn-icon-view" title="View">
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="empty-state" style="padding: 40px;">
                                            <div class="empty-icon"><i class="fas fa-inbox"></i></div>
                                            <h5>No messages yet</h5>
                                            <p>When visitors submit the contact form, messages will appear here.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header">
                <h6 style="font-weight: 700; margin: 0;">Quick Actions</h6>
                <small style="color: var(--text-muted);">Common tasks</small>
            </div>
            <div class="card-body d-grid gap-2">
                <a href="{{ route('admin.gallery.create') }}" class="btn d-flex align-items-center gap-2" style="padding: 14px 16px; border-radius: var(--radius-sm); background: #e6f7f4; color: #0d3b42; border: 1px solid #b3dde2;">
                    <div style="width:36px;height:36px;border-radius:8px;background:#ccefea;display:flex;align-items:center;justify-content:center;">
                        <i class="fas fa-cloud-arrow-up" style="color:#144f58;"></i>
                    </div>
                    <div style="text-align:left;">
                        <div style="font-weight:600;font-size:0.88rem;">Upload Image</div>
                        <div style="font-size:0.75rem;color:#4a5568;">Add to gallery</div>
                    </div>
                </a>
                <a href="{{ route('admin.blogs.create') }}" class="btn d-flex align-items-center gap-2" style="padding: 14px 16px; border-radius: var(--radius-sm); background: #e6f4f5; color: #144f58; border: 1px solid #b3dde2;">
                    <div style="width:36px;height:36px;border-radius:8px;background:#ccefea;display:flex;align-items:center;justify-content:center;">
                        <i class="fas fa-pen-nib" style="color:#1a6e7a;"></i>
                    </div>
                    <div style="text-align:left;">
                        <div style="font-weight:600;font-size:0.88rem;">Write Blog</div>
                        <div style="font-size:0.75rem;color:#4a5568;">Create new post</div>
                    </div>
                </a>
                <a href="{{ route('admin.contacts.index') }}" class="btn d-flex align-items-center gap-2" style="padding: 14px 16px; border-radius: var(--radius-sm); background: #fffbeb; color: #d97706; border: 1px solid #fde68a;">
                    <div style="width:36px;height:36px;border-radius:8px;background:#fde68a;display:flex;align-items:center;justify-content:center;">
                        <i class="fas fa-inbox" style="color:#d97706;"></i>
                    </div>
                    <div style="text-align:left;">
                        <div style="font-weight:600;font-size:0.88rem;">View Messages</div>
                        <div style="font-size:0.75rem;color:#4a5568;">{{ $unreadContacts }} unread</div>
                    </div>
                </a>
                <a href="{{ route('home') }}" target="_blank" class="btn btn-ghost d-flex align-items-center gap-2" style="padding: 14px 16px; border-radius: var(--radius-sm);">
                    <div style="width:36px;height:36px;border-radius:8px;background:#f1f5f9;display:flex;align-items:center;justify-content:center;">
                        <i class="fas fa-globe" style="color:#64748b;"></i>
                    </div>
                    <div style="text-align:left;">
                        <div style="font-weight:600;font-size:0.88rem;">View Website</div>
                        <div style="font-size:0.75rem;color:#4a5568;">Open in new tab</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

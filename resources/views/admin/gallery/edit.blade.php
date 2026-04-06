@extends('admin.layout')

@section('title', 'Edit Image')
@section('page-title', 'Edit Image')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.gallery.index') }}" style="color: var(--text-muted); text-decoration: none; font-size: 0.88rem; font-weight: 500;">
        <i class="fas fa-arrow-left me-1"></i> Back to Gallery
    </a>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h6 style="font-weight: 700; margin: 0;">Edit Image</h6>
                <small style="color: var(--text-muted);">Update image details</small>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')

                    <div class="mb-4">
                        <label class="form-label">Current Image</label>
                        <div>
                            <img src="{{ asset('storage/' . $gallery->image) }}" class="img-preview" style="height: 180px; object-fit: cover;" alt="{{ $gallery->title }}">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title) }}" required>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Category *</label>
                            <select name="category" class="form-select" required>
                                <option value="clinic" {{ $gallery->category == 'clinic' ? 'selected' : '' }}>Clinic</option>
                                <option value="surgery" {{ $gallery->category == 'surgery' ? 'selected' : '' }}>Surgery</option>
                                <option value="events" {{ $gallery->category == 'events' ? 'selected' : '' }}>Events</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $gallery->sort_order) }}">
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Replace Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <small style="color: var(--text-muted); font-size: 0.78rem;">Leave empty to keep current image</small>
                    </div>
                    <div class="mb-4">
                        <label class="form-check d-flex align-items-center gap-2" style="cursor:pointer;padding:14px 16px;background:#f8fafc;border-radius:var(--radius-sm);border:1px solid var(--card-border);">
                            <input type="checkbox" name="is_active" class="form-check-input" {{ $gallery->is_active ? 'checked' : '' }} style="margin:0;">
                            <div>
                                <span style="font-weight:600;font-size:0.9rem;">Visible on website</span>
                                <div style="font-size:0.78rem;color:var(--text-muted);">When disabled, this image won't show on the gallery page</div>
                            </div>
                        </label>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-accent"><i class="fas fa-check me-1"></i> Update Image</button>
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-ghost">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

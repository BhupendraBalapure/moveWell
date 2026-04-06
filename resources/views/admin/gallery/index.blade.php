@extends('admin.layout')

@section('title', 'Gallery')
@section('page-title', 'Gallery')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h5 style="font-weight: 700; margin: 0;">Gallery Management</h5>
        <p style="color: var(--text-muted); font-size: 0.85rem; margin: 0;">Upload and manage clinic & surgery images</p>
    </div>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-accent">
        <i class="fas fa-plus me-1"></i> Add Image
    </a>
</div>

<div class="row g-3">
    @forelse($galleries as $gallery)
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="card h-100" style="overflow: hidden;">
                <div style="position: relative; height: 200px; overflow: hidden;">
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                         style="width:100%; height:100%; object-fit:cover; transition: transform 0.4s ease;">
                    <div style="position:absolute;top:12px;left:12px;display:flex;gap:6px;">
                        <span class="badge-pill badge-accent" style="backdrop-filter:blur(8px);background:rgba(26,110,122,0.9);color:#fff;">{{ ucfirst($gallery->category) }}</span>
                        @if(!$gallery->is_active)
                            <span class="badge-pill badge-warning">Hidden</span>
                        @endif
                    </div>
                </div>
                <div class="card-body" style="padding: 16px;">
                    <h6 style="font-weight: 600; font-size: 0.92rem; margin: 0 0 4px;">{{ $gallery->title }}</h6>
                    <small style="color: var(--text-muted);">{{ $gallery->created_at->format('d M Y') }}</small>
                </div>
                <div class="card-footer d-flex gap-2" style="padding: 12px 16px;">
                    <a href="{{ route('admin.gallery.edit', $gallery) }}" class="btn-icon btn-icon-edit flex-fill d-flex align-items-center justify-content-center gap-1" style="width:auto;height:34px;font-size:0.78rem;font-weight:600;">
                        <i class="fas fa-pen"></i> Edit
                    </a>
                    <form action="{{ route('admin.gallery.destroy', $gallery) }}" method="POST" class="flex-fill" onsubmit="return confirm('Delete this image?')">
                        @csrf @method('DELETE')
                        <button class="btn-icon btn-icon-danger w-100 d-flex align-items-center justify-content-center gap-1" style="width:auto;height:34px;font-size:0.78rem;font-weight:600;">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="empty-state">
                        <div class="empty-icon"><i class="fas fa-images"></i></div>
                        <h5>No images uploaded yet</h5>
                        <p>Start building your gallery by uploading clinic, surgery, and event photos.</p>
                        <a href="{{ route('admin.gallery.create') }}" class="btn btn-accent">
                            <i class="fas fa-cloud-arrow-up me-1"></i> Upload First Image
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforelse
</div>

@if($galleries->hasPages())
    <div class="mt-4 d-flex justify-content-center">{{ $galleries->links() }}</div>
@endif
@endsection

@section('styles')
<style>
    .col-xl-3 .card:hover img { transform: scale(1.08); }
</style>
@endsection

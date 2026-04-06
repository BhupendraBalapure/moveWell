@extends('admin.layout')

@section('title', 'Upload Image')
@section('page-title', 'Upload Image')

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
                <h6 style="font-weight: 700; margin: 0;">Image Details</h6>
                <small style="color: var(--text-muted);">Fill in the information below</small>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="e.g. Modern Operation Theatre" required>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Category *</label>
                            <select name="category" class="form-select" required>
                                <option value="clinic" {{ old('category') == 'clinic' ? 'selected' : '' }}>Clinic</option>
                                <option value="surgery" {{ old('category') == 'surgery' ? 'selected' : '' }}>Surgery</option>
                                <option value="events" {{ old('category') == 'events' ? 'selected' : '' }}>Events</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" placeholder="0">
                            <small style="color: var(--text-muted); font-size: 0.78rem;">Lower number = appears first</small>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Image *</label>
                        <div class="upload-zone" onclick="document.getElementById('imageInput').click()">
                            <i class="fas fa-cloud-arrow-up d-block"></i>
                            <p><strong>Click to upload</strong> or drag & drop</p>
                            <p style="font-size: 0.78rem; color: #cbd5e1;">JPEG, PNG, JPG, WEBP (Max 2MB)</p>
                            <img id="imagePreview" style="display:none; max-height:180px; border-radius:8px; margin-top:12px;">
                        </div>
                        <input type="file" name="image" id="imageInput" accept="image/*" required style="display:none;" onchange="previewImage(this)">
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-accent"><i class="fas fa-cloud-arrow-up me-1"></i> Upload Image</button>
                        <a href="{{ route('admin.gallery.index') }}" class="btn btn-ghost">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h6 style="font-weight: 700; margin: 0;"><i class="fas fa-lightbulb me-1" style="color: #f59e0b;"></i> Tips</h6>
            </div>
            <div class="card-body">
                <div class="d-flex flex-column gap-3" style="font-size: 0.85rem; color: var(--text-secondary);">
                    <div class="d-flex gap-2">
                        <i class="fas fa-check-circle" style="color: var(--success); margin-top: 3px;"></i>
                        <span>Use high-resolution images for best quality on the website</span>
                    </div>
                    <div class="d-flex gap-2">
                        <i class="fas fa-check-circle" style="color: var(--success); margin-top: 3px;"></i>
                        <span>Recommended size: 1200x800 pixels for gallery display</span>
                    </div>
                    <div class="d-flex gap-2">
                        <i class="fas fa-check-circle" style="color: var(--success); margin-top: 3px;"></i>
                        <span>Choose the right category so visitors can filter images</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { preview.src = e.target.result; preview.style.display = 'block'; };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection

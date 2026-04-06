@extends('admin.layout')

@section('title', 'Create Blog')
@section('page-title', 'New Blog Post')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.blogs.index') }}" style="color: var(--text-muted); text-decoration: none; font-size: 0.88rem; font-weight: 500;">
        <i class="fas fa-arrow-left me-1"></i> Back to Blogs
    </a>
</div>

<form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h6 style="font-weight: 700; margin: 0;">Blog Content</h6>
                    <small style="color: var(--text-muted);">Write your article content</small>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter a compelling title..." required style="font-size: 1.1rem; font-weight: 600; padding: 14px;">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Excerpt *</label>
                        <textarea name="excerpt" class="form-control" rows="3" placeholder="Brief description that appears in blog cards..." required style="resize:vertical;">{{ old('excerpt') }}</textarea>
                        <small style="color: var(--text-muted); font-size: 0.78rem;">This appears as the preview text on the blog listing page</small>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Content *</label>
                        <textarea name="content" class="form-control" rows="16" placeholder="Write your full article here..." required style="resize:vertical;line-height:1.8;">{{ old('content') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h6 style="font-weight: 700; margin: 0;">Publish Settings</h6>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <label class="form-label">Category *</label>
                        <input type="text" name="category" class="form-control" value="{{ old('category') }}" placeholder="e.g. Knee, Shoulder, Sports" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-check d-flex align-items-center gap-2" style="cursor:pointer;padding:14px 16px;background:#f8fafc;border-radius:var(--radius-sm);border:1px solid var(--card-border);">
                            <input type="checkbox" name="is_published" class="form-check-input" checked style="margin:0;">
                            <div>
                                <span style="font-weight:600;font-size:0.9rem;">Publish immediately</span>
                                <div style="font-size:0.78rem;color:var(--text-muted);">Make this article visible on the website</div>
                            </div>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-accent w-100" style="padding: 12px;">
                        <i class="fas fa-paper-plane me-1"></i> Publish Blog
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 style="font-weight: 700; margin: 0;">Featured Image</h6>
                </div>
                <div class="card-body">
                    <div class="upload-zone" onclick="document.getElementById('blogImage').click()" style="padding: 28px;">
                        <i class="fas fa-image d-block"></i>
                        <p><strong>Click to upload</strong></p>
                        <p style="font-size: 0.75rem; color: #cbd5e1;">Optional. Recommended: 1200x630px</p>
                        <img id="blogPreview" style="display:none; max-height:140px; border-radius:8px; margin-top:10px;">
                    </div>
                    <input type="file" name="image" id="blogImage" accept="image/*" style="display:none;" onchange="previewBlog(this)">
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
function previewBlog(input) {
    const preview = document.getElementById('blogPreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { preview.src = e.target.result; preview.style.display = 'block'; };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection

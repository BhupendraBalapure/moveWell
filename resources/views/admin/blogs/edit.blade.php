@extends('admin.layout')

@section('title', 'Edit Blog')
@section('page-title', 'Edit Blog Post')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.blogs.index') }}" style="color: var(--text-muted); text-decoration: none; font-size: 0.88rem; font-weight: 500;">
        <i class="fas fa-arrow-left me-1"></i> Back to Blogs
    </a>
</div>

<form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h6 style="font-weight: 700; margin: 0;">Blog Content</h6>
                    <small style="color: var(--text-muted);">Edit your article</small>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <label class="form-label">Title *</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}" required style="font-size: 1.1rem; font-weight: 600; padding: 14px;">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Excerpt *</label>
                        <textarea name="excerpt" class="form-control" rows="3" required style="resize:vertical;">{{ old('excerpt', $blog->excerpt) }}</textarea>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Content *</label>
                        <textarea name="content" id="blogEditor" class="form-control" rows="16" required style="resize:vertical;line-height:1.8;">{{ old('content', $blog->content) }}</textarea>
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
                        <input type="text" name="category" class="form-control" value="{{ old('category', $blog->category) }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-check d-flex align-items-center gap-2" style="cursor:pointer;padding:14px 16px;background:#f8fafc;border-radius:var(--radius-sm);border:1px solid var(--card-border);">
                            <input type="checkbox" name="is_published" class="form-check-input" {{ $blog->is_published ? 'checked' : '' }} style="margin:0;">
                            <div>
                                <span style="font-weight:600;font-size:0.9rem;">Published</span>
                                <div style="font-size:0.78rem;color:var(--text-muted);">Article is visible on the website</div>
                            </div>
                        </label>
                    </div>
                    @if($blog->published_at)
                        <div class="mb-4" style="background:#f8fafc;border-radius:var(--radius-sm);padding:12px 14px;">
                            <small style="color:var(--text-muted);font-weight:600;">Published on</small>
                            <div style="font-weight:600;font-size:0.9rem;">{{ $blog->published_at->format('d M Y, h:i A') }}</div>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-accent w-100" style="padding: 12px;">
                        <i class="fas fa-check me-1"></i> Update Blog
                    </button>
                    @if($blog->is_published)
                        <a href="{{ route('blog.detail', $blog->slug) }}" target="_blank" class="btn btn-ghost w-100 mt-2" style="padding: 10px;">
                            <i class="fas fa-external-link-alt me-1"></i> View on Website
                        </a>
                    @endif
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 style="font-weight: 700; margin: 0;">Featured Image</h6>
                </div>
                <div class="card-body">
                    @if($blog->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $blog->image) }}" class="img-preview" style="width:100%; height:160px; object-fit:cover;" alt="">
                        </div>
                    @endif
                    <div class="upload-zone" onclick="document.getElementById('blogImage').click()" style="padding: 20px;">
                        <i class="fas fa-image d-block"></i>
                        <p style="margin-bottom:0;"><strong>{{ $blog->image ? 'Replace image' : 'Upload image' }}</strong></p>
                        <img id="blogPreview" style="display:none; max-height:120px; border-radius:8px; margin-top:10px;">
                    </div>
                    <input type="file" name="image" id="blogImage" accept="image/*" style="display:none;" onchange="previewBlog(this)">
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
function previewBlog(input) {
    const preview = document.getElementById('blogPreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { preview.src = e.target.result; preview.style.display = 'block'; };
        reader.readAsDataURL(input.files[0]);
    }
}

ClassicEditor
    .create(document.querySelector('#blogEditor'), {
        toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'blockQuote', 'insertTable', 'undo', 'redo']
    })
    .catch(err => console.error(err));
</script>
@endsection

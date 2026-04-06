@extends('admin.layout')

@section('title', 'Blogs')
@section('page-title', 'Blogs')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h5 style="font-weight: 700; margin: 0;">Blog Management</h5>
        <p style="color: var(--text-muted); font-size: 0.85rem; margin: 0;">Create and manage blog articles</p>
    </div>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-accent">
        <i class="fas fa-plus me-1"></i> New Blog Post
    </a>
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Article</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Published</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    @if($blog->image)
                                        <img src="{{ asset('storage/' . $blog->image) }}" style="width:56px;height:40px;object-fit:cover;border-radius:8px;flex-shrink:0;" alt="">
                                    @else
                                        <div style="width:56px;height:40px;border-radius:8px;background:linear-gradient(135deg,#1a6e7a,#2a8f9d);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                            <i class="fas fa-pen-nib" style="color:rgba(255,255,255,0.5);font-size:0.85rem;"></i>
                                        </div>
                                    @endif
                                    <div style="min-width:0;">
                                        <div style="font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 280px;">{{ $blog->title }}</div>
                                        <div style="font-size: 0.78rem; color: var(--text-muted); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 280px;">{{ Str::limit($blog->excerpt, 50) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td><span class="badge-pill badge-accent">{{ $blog->category }}</span></td>
                            <td>
                                @if($blog->is_published)
                                    <span class="badge-pill badge-success"><i class="fas fa-circle" style="font-size:0.4rem;vertical-align:middle;margin-right:4px;"></i> Published</span>
                                @else
                                    <span class="badge-pill badge-secondary"><i class="fas fa-circle" style="font-size:0.4rem;vertical-align:middle;margin-right:4px;"></i> Draft</span>
                                @endif
                            </td>
                            <td>
                                <div style="font-size: 0.85rem; color: var(--text-secondary);">{{ $blog->published_at ? $blog->published_at->format('d M Y') : $blog->created_at->format('d M Y') }}</div>
                            </td>
                            <td>
                                <div class="d-flex gap-1 justify-content-end">
                                    @if($blog->is_published)
                                        <a href="{{ route('blog.detail', $blog->slug) }}" target="_blank" class="btn-icon btn-icon-view" title="View on site"><i class="fas fa-external-link-alt"></i></a>
                                    @endif
                                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn-icon btn-icon-edit" title="Edit"><i class="fas fa-pen"></i></a>
                                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this blog post?')">
                                        @csrf @method('DELETE')
                                        <button class="btn-icon btn-icon-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <div class="empty-icon"><i class="fas fa-pen-nib"></i></div>
                                    <h5>No blog posts yet</h5>
                                    <p>Start writing articles to share orthopaedic knowledge with your patients.</p>
                                    <a href="{{ route('admin.blogs.create') }}" class="btn btn-accent">
                                        <i class="fas fa-plus me-1"></i> Create First Post
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($blogs->hasPages())
        <div class="card-footer d-flex justify-content-center">{{ $blogs->links() }}</div>
    @endif
</div>
@endsection

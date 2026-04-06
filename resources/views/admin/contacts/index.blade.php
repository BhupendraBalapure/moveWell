@extends('admin.layout')

@section('title', 'Contact Messages')
@section('page-title', 'Messages')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h5 style="font-weight: 700; margin: 0;">Contact Messages</h5>
        <p style="color: var(--text-muted); font-size: 0.85rem; margin: 0;">Manage messages from the contact form</p>
    </div>
    @php $unreadCount = $contacts->where('is_read', false)->count(); @endphp
    @if($unreadCount > 0)
        <span class="badge-pill badge-danger" style="font-size: 0.8rem; padding: 6px 14px;">
            <i class="fas fa-bell me-1"></i> {{ $unreadCount }} unread
        </span>
    @endif
</div>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sender</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Service</th>
                        <th>Received</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                        <tr class="{{ !$contact->is_read ? 'row-unread' : '' }}">
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div style="width:38px;height:38px;border-radius:10px;background:{{ !$contact->is_read ? 'linear-gradient(135deg,#1a6e7a,#2a8f9d)' : '#f1f5f9' }};display:flex;align-items:center;justify-content:center;font-size:0.78rem;font-weight:700;color:{{ !$contact->is_read ? '#fff' : '#94a3b8' }};flex-shrink:0;">
                                        {{ strtoupper(substr($contact->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.contacts.show', $contact) }}" style="font-weight: 600; color: var(--text-primary); text-decoration: none;">
                                            {{ $contact->name }}
                                        </a>
                                        @if(!$contact->is_read)
                                            <span class="badge-pill badge-danger ms-1" style="font-size: 0.62rem; padding: 2px 8px;">NEW</span>
                                        @endif
                                        <div style="font-size: 0.78rem; color: var(--text-muted); margin-top: 1px;">{{ Str::limit($contact->message, 40) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="tel:{{ $contact->phone }}" style="color: var(--text-secondary); text-decoration: none;">
                                    <i class="fas fa-phone" style="font-size: 0.7rem; margin-right: 4px; color: var(--text-muted);"></i>{{ $contact->phone }}
                                </a>
                            </td>
                            <td style="color: var(--text-secondary);">{{ $contact->email ?? '--' }}</td>
                            <td>
                                @if($contact->service)
                                    <span class="badge-pill badge-accent">{{ $contact->service }}</span>
                                @else
                                    <span style="color: var(--text-muted);">--</span>
                                @endif
                            </td>
                            <td>
                                <div style="font-size: 0.82rem; color: var(--text-secondary);">{{ $contact->created_at->format('d M Y') }}</div>
                                <div style="font-size: 0.72rem; color: var(--text-muted);">{{ $contact->created_at->format('h:i A') }}</div>
                            </td>
                            <td>
                                <div class="d-flex gap-1 justify-content-end">
                                    <a href="{{ route('admin.contacts.show', $contact) }}" class="btn-icon btn-icon-view" title="View"><i class="fas fa-eye"></i></a>
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this message?')">
                                        @csrf @method('DELETE')
                                        <button class="btn-icon btn-icon-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <div class="empty-icon"><i class="fas fa-inbox"></i></div>
                                    <h5>No messages yet</h5>
                                    <p>When visitors submit the contact form, their messages will show up here.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($contacts->hasPages())
        <div class="card-footer d-flex justify-content-center">{{ $contacts->links() }}</div>
    @endif
</div>
@endsection

@extends('admin.layout')

@section('title', 'Appointments')
@section('page-title', 'Appointments')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h5 style="font-weight: 700; margin: 0;">Appointment Requests</h5>
        <p style="color: var(--text-muted); font-size: 0.85rem; margin: 0;">Manage appointment bookings from patients</p>
    </div>
    @php $pendingCount = $appointments->where('status', 'pending')->count(); @endphp
    @if($pendingCount > 0)
        <span class="badge-pill badge-warning" style="font-size: 0.8rem; padding: 6px 14px; background: #fef3c7; color: #92400e;">
            <i class="fas fa-clock me-1"></i> {{ $pendingCount }} pending
        </span>
    @endif
</div>

@if(session('success'))
    <div class="alert alert-success d-flex align-items-center gap-2" style="border-radius: var(--radius-sm); border: none; background: #ecfdf5; color: #065f46; font-weight: 600; font-size: 0.85rem; padding: 12px 16px; margin-bottom: 20px;">
        <i class="fas fa-check-circle"></i> {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Patient</th>
                        <th>Phone</th>
                        <th>Service</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                        <th>Booked On</th>
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appt)
                        <tr class="{{ $appt->status === 'pending' ? 'row-unread' : '' }}">
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div style="width:38px;height:38px;border-radius:10px;background:{{ $appt->status === 'pending' ? 'linear-gradient(135deg,#1a6e7a,#2a8f9d)' : ($appt->status === 'confirmed' ? 'linear-gradient(135deg,#059669,#10b981)' : '#f1f5f9') }};display:flex;align-items:center;justify-content:center;font-size:0.78rem;font-weight:700;color:{{ in_array($appt->status, ['pending','confirmed']) ? '#fff' : '#94a3b8' }};flex-shrink:0;">
                                        {{ strtoupper(substr($appt->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <span style="font-weight: 600; color: var(--text-primary);">{{ $appt->name }}</span>
                                        @if($appt->email)
                                            <div style="font-size: 0.78rem; color: var(--text-muted);">{{ $appt->email }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="tel:{{ $appt->phone }}" style="color: var(--text-secondary); text-decoration: none;">
                                    <i class="fas fa-phone" style="font-size: 0.7rem; margin-right: 4px; color: var(--text-muted);"></i>{{ $appt->phone }}
                                </a>
                            </td>
                            <td>
                                @if($appt->service)
                                    <span class="badge-pill badge-accent">{{ $appt->service }}</span>
                                @else
                                    <span style="color: var(--text-muted);">--</span>
                                @endif
                            </td>
                            <td>
                                @if($appt->preferred_date)
                                    <div style="font-size: 0.82rem; color: var(--text-secondary);">
                                        <i class="fas fa-calendar" style="font-size: 0.7rem; margin-right: 4px; color: var(--text-muted);"></i>
                                        {{ $appt->preferred_date->format('d M Y') }}
                                    </div>
                                @endif
                                @if($appt->preferred_time)
                                    <div style="font-size: 0.75rem; color: var(--text-muted);">
                                        <i class="fas fa-clock" style="font-size: 0.65rem; margin-right: 4px;"></i>
                                        {{ $appt->preferred_time }}
                                    </div>
                                @endif
                                @if(!$appt->preferred_date && !$appt->preferred_time)
                                    <span style="color: var(--text-muted);">--</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('admin.appointments.status', $appt) }}" method="POST" class="d-inline">
                                    @csrf @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" style="padding:4px 8px;border-radius:6px;border:1.5px solid {{ $appt->status === 'pending' ? '#fbbf24' : ($appt->status === 'confirmed' ? '#10b981' : ($appt->status === 'completed' ? '#6366f1' : '#ef4444')) }};font-size:0.78rem;font-weight:600;color:{{ $appt->status === 'pending' ? '#92400e' : ($appt->status === 'confirmed' ? '#065f46' : ($appt->status === 'completed' ? '#3730a3' : '#991b1b')) }};background:{{ $appt->status === 'pending' ? '#fef3c7' : ($appt->status === 'confirmed' ? '#ecfdf5' : ($appt->status === 'completed' ? '#eef2ff' : '#fef2f2')) }};cursor:pointer;">
                                        <option value="pending" {{ $appt->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $appt->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="completed" {{ $appt->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $appt->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </form>
                            </td>
                            <td>
                                <div style="font-size: 0.82rem; color: var(--text-secondary);">{{ $appt->created_at->setTimezone('Asia/Kolkata')->format('d M Y') }}</div>
                                <div style="font-size: 0.72rem; color: var(--text-muted);">{{ $appt->created_at->setTimezone('Asia/Kolkata')->format('h:i A') }}</div>
                            </td>
                            <td>
                                <div class="d-flex gap-1 justify-content-end">
                                    @if($appt->phone)
                                        <a href="https://wa.me/91{{ preg_replace('/[^0-9]/', '', $appt->phone) }}?text=Hello%20{{ urlencode($appt->name) }}%2C%20your%20appointment%20has%20been%20confirmed." target="_blank" class="btn-icon" style="background:#ecfdf5;color:#059669;" title="WhatsApp">
                                            <i class="fab fa-whatsapp"></i>
                                        </a>
                                    @endif
                                    <form action="{{ route('admin.appointments.destroy', $appt) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this appointment?')">
                                        @csrf @method('DELETE')
                                        <button class="btn-icon btn-icon-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">
                                    <div class="empty-icon"><i class="fas fa-calendar-check"></i></div>
                                    <h5>No appointments yet</h5>
                                    <p>When patients book appointments from the website, they will appear here.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($appointments->hasPages())
        <div class="card-footer d-flex justify-content-center">{{ $appointments->links() }}</div>
    @endif
</div>
@endsection

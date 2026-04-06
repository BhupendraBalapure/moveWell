<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - MoveWell</title>
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-w: 270px;
            --sidebar-bg: #0d3b42;
            --sidebar-hover: rgba(26,110,122,0.15);
            --sidebar-active: rgba(26,110,122,0.25);
            --body-bg: #f0f8f9;
            --card-bg: #ffffff;
            --card-border: #e2e8f0;
            --card-shadow: 0 1px 3px rgba(0,0,0,0.04), 0 1px 2px rgba(0,0,0,0.06);
            --card-shadow-hover: 0 10px 25px rgba(0,0,0,0.08);
            --text-primary: #1a2a2e;
            --text-secondary: #4a5568;
            --text-muted: #718096;
            --accent: #1a6e7a;
            --accent-dark: #144f58;
            --accent-light: #2a8f9d;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #2a8f9d;
            --radius: 12px;
            --radius-sm: 8px;
            --radius-lg: 16px;
            --transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--body-bg);
            color: var(--text-primary);
            font-size: 0.9rem;
            -webkit-font-smoothing: antialiased;
        }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        /* ── Sidebar ── */
        .sidebar {
            position: fixed; top: 0; left: 0;
            width: var(--sidebar-w); height: 100vh;
            background: linear-gradient(180deg, #0d3b42 0%, #0f4a53 100%);
            z-index: 1050;
            display: flex; flex-direction: column;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
        }

        .sidebar-header {
            padding: 24px 22px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .sidebar-header .brand {
            display: flex; align-items: center; gap: 12px;
            text-decoration: none;
        }
        .sidebar-header .brand-logo {
            width: 42px; height: 42px; border-radius: 10px; overflow: hidden;
            background: rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center;
        }
        .sidebar-header .brand-logo img {
            width: 100%; height: 100%; object-fit: contain; padding: 4px;
            filter: brightness(0) invert(1);
        }
        .sidebar-header .brand-text h5 {
            font-size: 1.05rem; font-weight: 700; color: #fff; margin: 0; letter-spacing: -0.3px;
        }
        .sidebar-header .brand-text span {
            font-size: 0.72rem; color: rgba(255,255,255,0.5); font-weight: 400; letter-spacing: 0.5px; text-transform: uppercase;
        }

        .sidebar-nav { flex: 1; overflow-y: auto; padding: 16px 12px; }
        .nav-label {
            font-size: 0.68rem; font-weight: 600; color: rgba(255,255,255,0.3);
            text-transform: uppercase; letter-spacing: 1.2px;
            padding: 16px 14px 8px; margin-top: 4px;
        }
        .nav-link {
            display: flex; align-items: center; gap: 12px;
            padding: 11px 14px; margin: 2px 0;
            color: rgba(255,255,255,0.55); text-decoration: none;
            border-radius: var(--radius-sm);
            font-size: 0.88rem; font-weight: 500;
            transition: var(--transition);
            position: relative;
        }
        .nav-link:hover {
            background: var(--sidebar-hover); color: rgba(255,255,255,0.9);
        }
        .nav-link.active {
            background: var(--sidebar-active);
            color: #fff;
        }
        .nav-link.active::before {
            content: '';
            position: absolute; left: 0; top: 50%; transform: translateY(-50%);
            width: 3px; height: 20px;
            background: var(--accent-light);
            border-radius: 0 3px 3px 0;
        }
        .nav-link i {
            width: 20px; text-align: center; font-size: 1rem;
            opacity: 0.7; transition: var(--transition);
        }
        .nav-link:hover i, .nav-link.active i { opacity: 1; }
        .nav-link .nav-badge {
            margin-left: auto;
            background: var(--danger);
            color: #fff;
            font-size: 0.68rem; font-weight: 700;
            padding: 2px 7px; border-radius: 50px;
            min-width: 20px; text-align: center;
            animation: pulse-badge 2s infinite;
        }
        @keyframes pulse-badge {
            0%, 100% { box-shadow: 0 0 0 0 rgba(239,68,68,0.4); }
            50% { box-shadow: 0 0 0 6px rgba(239,68,68,0); }
        }

        .sidebar-footer {
            padding: 16px; border-top: 1px solid rgba(255,255,255,0.08);
        }
        .sidebar-user {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 12px; border-radius: var(--radius-sm);
            background: rgba(255,255,255,0.06);
        }
        .sidebar-user .avatar {
            width: 36px; height: 36px; border-radius: 10px;
            background: linear-gradient(135deg, var(--accent), var(--accent-light));
            display: flex; align-items: center; justify-content: center;
            font-size: 0.82rem; font-weight: 700; color: #fff;
        }
        .sidebar-user .user-info { flex: 1; min-width: 0; }
        .sidebar-user .user-info p { margin: 0; font-size: 0.82rem; font-weight: 600; color: #e2e8f0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .sidebar-user .user-info span { font-size: 0.7rem; color: rgba(255,255,255,0.45); }
        .sidebar-user .logout-btn {
            background: none; border: none; color: rgba(255,255,255,0.4); cursor: pointer;
            padding: 4px; border-radius: 6px; transition: var(--transition);
        }
        .sidebar-user .logout-btn:hover { color: var(--danger); background: rgba(239,68,68,0.15); }

        /* ── Main Content ── */
        .main-wrap { margin-left: var(--sidebar-w); min-height: 100vh; display: flex; flex-direction: column; }

        .topbar {
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--card-border);
            padding: 0 32px;
            height: 64px;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 100;
        }
        .topbar-left { display: flex; align-items: center; gap: 16px; }
        .topbar-left .btn-toggle {
            display: none; background: none; border: 1px solid var(--card-border);
            border-radius: var(--radius-sm); padding: 8px 10px; cursor: pointer;
            color: var(--text-secondary); transition: var(--transition);
        }
        .topbar-left .btn-toggle:hover { background: #f8fafc; border-color: #cbd5e1; }
        .topbar .page-title {
            font-size: 1.1rem; font-weight: 700; color: var(--text-primary);
            letter-spacing: -0.3px;
        }
        .topbar-right { display: flex; align-items: center; gap: 12px; }
        .topbar-right .topbar-date {
            font-size: 0.82rem; color: var(--text-muted); font-weight: 500;
        }
        .topbar-right .btn-site {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 7px 14px; font-size: 0.8rem; font-weight: 600;
            border: 1px solid var(--card-border); border-radius: 50px;
            background: #fff; color: var(--text-secondary);
            text-decoration: none; transition: var(--transition);
        }
        .topbar-right .btn-site:hover {
            border-color: var(--accent); color: var(--accent); background: rgba(26,110,122,0.04);
        }

        .content { flex: 1; padding: 28px 32px; }

        /* ── Alerts ── */
        .alert-premium {
            border: none; border-radius: var(--radius); padding: 14px 20px;
            font-size: 0.88rem; font-weight: 500;
            display: flex; align-items: center; gap: 10px;
            animation: slideDown 0.3s ease;
        }
        .alert-premium.alert-success {
            background: linear-gradient(135deg, #e6f7f4, #ccefea); color: #0d3b42;
        }
        .alert-premium.alert-danger {
            background: linear-gradient(135deg, #fef2f2, #fecaca); color: #991b1b;
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ── Premium Cards ── */
        .card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: var(--radius);
            box-shadow: var(--card-shadow);
            transition: var(--transition);
            overflow: hidden;
        }
        .card:hover { box-shadow: var(--card-shadow-hover); }
        .card-header {
            background: transparent;
            border-bottom: 1px solid var(--card-border);
            padding: 18px 22px;
            font-weight: 600;
        }
        .card-body { padding: 22px; }
        .card-footer {
            background: #f8fafb;
            border-top: 1px solid var(--card-border);
            padding: 14px 22px;
        }

        /* ── Tables ── */
        .table { margin: 0; font-size: 0.88rem; }
        .table thead th {
            background: #f6fafb; border-bottom: 2px solid var(--card-border);
            font-weight: 600; color: var(--text-secondary);
            text-transform: uppercase; font-size: 0.72rem; letter-spacing: 0.8px;
            padding: 14px 18px; white-space: nowrap;
        }
        .table tbody td {
            padding: 14px 18px; vertical-align: middle;
            border-bottom: 1px solid #f1f5f9; color: var(--text-primary);
        }
        .table tbody tr { transition: var(--transition); }
        .table tbody tr:hover { background: #f6fafb; }
        .table tbody tr:last-child td { border-bottom: none; }

        /* ── Badges ── */
        .badge-pill {
            padding: 5px 12px; border-radius: 50px;
            font-size: 0.72rem; font-weight: 600; letter-spacing: 0.3px;
        }
        .badge-success { background: #e6f7f4; color: #144f58; }
        .badge-danger { background: #fef2f2; color: #dc2626; }
        .badge-warning { background: #fffbeb; color: #d97706; }
        .badge-info { background: #e6f4f5; color: #1a6e7a; }
        .badge-secondary { background: #f1f5f9; color: #475569; }
        .badge-accent { background: #e6f4f5; color: #144f58; }

        /* ── Buttons ── */
        .btn-accent {
            background: linear-gradient(135deg, var(--accent), var(--accent-light));
            border: none; color: #fff; font-weight: 600;
            padding: 10px 22px; border-radius: var(--radius-sm);
            font-size: 0.88rem; transition: var(--transition);
            box-shadow: 0 2px 8px rgba(26,110,122,0.3);
        }
        .btn-accent:hover {
            transform: translateY(-1px); color: #fff;
            box-shadow: 0 6px 20px rgba(26,110,122,0.4);
        }
        .btn-ghost {
            background: transparent; border: 1px solid var(--card-border);
            color: var(--text-secondary); font-weight: 500;
            padding: 10px 22px; border-radius: var(--radius-sm);
            font-size: 0.88rem; transition: var(--transition);
        }
        .btn-ghost:hover { background: #f8fafc; border-color: #cbd5e1; color: var(--text-primary); }
        .btn-icon {
            width: 36px; height: 36px; padding: 0;
            display: inline-flex; align-items: center; justify-content: center;
            border-radius: var(--radius-sm); border: 1px solid var(--card-border);
            background: #fff; color: var(--text-secondary);
            transition: var(--transition); font-size: 0.85rem;
        }
        .btn-icon:hover { background: #f8fafc; }
        .btn-icon.btn-icon-danger:hover { background: #fef2f2; border-color: #fecaca; color: var(--danger); }
        .btn-icon.btn-icon-edit:hover { background: #e6f4f5; border-color: #b3dde2; color: var(--accent); }
        .btn-icon.btn-icon-view:hover { background: #e6f7f4; border-color: #a7e8d8; color: #0d3b42; }

        .btn-success-soft {
            background: #e6f7f4; color: #144f58; border: 1px solid #b3dde2;
            font-weight: 600; transition: var(--transition);
        }
        .btn-success-soft:hover { background: #ccefea; color: #0d3b42; }

        /* ── Forms ── */
        .form-control, .form-select {
            border: 1.5px solid var(--card-border);
            border-radius: var(--radius-sm);
            padding: 10px 14px; font-size: 0.9rem;
            transition: var(--transition);
            background: #fff;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(26,110,122,0.12);
        }
        .form-label {
            font-size: 0.82rem; font-weight: 600; color: var(--text-secondary);
            margin-bottom: 6px; letter-spacing: 0.2px;
        }
        .form-check-input:checked { background-color: var(--accent); border-color: var(--accent); }

        /* ── Stat Cards ── */
        .stat-card {
            background: var(--card-bg); border: 1px solid var(--card-border);
            border-radius: var(--radius); padding: 24px;
            box-shadow: var(--card-shadow); transition: var(--transition);
            position: relative; overflow: hidden;
        }
        .stat-card:hover { box-shadow: var(--card-shadow-hover); transform: translateY(-2px); }
        .stat-card .stat-icon-wrap {
            width: 48px; height: 48px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem; margin-bottom: 16px;
        }
        .stat-card .stat-value {
            font-size: 2rem; font-weight: 800; letter-spacing: -1px;
            line-height: 1; margin-bottom: 4px;
        }
        .stat-card .stat-label { font-size: 0.82rem; color: var(--text-muted); font-weight: 500; }
        .stat-card .stat-pattern {
            position: absolute; right: -10px; bottom: -10px;
            font-size: 5rem; opacity: 0.04;
        }

        /* ── Image Preview ── */
        .img-preview {
            border-radius: var(--radius); overflow: hidden;
            border: 2px solid var(--card-border);
        }

        /* ── File Upload ── */
        .upload-zone {
            border: 2px dashed #b3dde2; border-radius: var(--radius);
            padding: 40px; text-align: center; cursor: pointer;
            transition: var(--transition); background: #f6fafb;
        }
        .upload-zone:hover { border-color: var(--accent); background: rgba(26,110,122,0.03); }
        .upload-zone i { font-size: 2rem; color: #b3dde2; margin-bottom: 10px; }
        .upload-zone p { margin: 0; color: var(--text-muted); font-size: 0.88rem; }

        /* ── Empty State ── */
        .empty-state {
            text-align: center; padding: 60px 20px;
        }
        .empty-state .empty-icon {
            width: 80px; height: 80px; border-radius: 20px;
            background: #e6f4f5; display: inline-flex;
            align-items: center; justify-content: center;
            font-size: 2rem; color: #2a8f9d; margin-bottom: 16px;
        }
        .empty-state h5 { font-weight: 600; color: var(--text-primary); margin-bottom: 6px; }
        .empty-state p { color: var(--text-muted); font-size: 0.9rem; margin-bottom: 16px; }

        /* ── Row highlight for unread ── */
        .row-unread { background: #f0faf9 !important; }
        .row-unread:hover { background: #e6f7f4 !important; }

        /* ── Responsive ── */
        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.show { transform: translateX(0); }
            .main-wrap { margin-left: 0; }
            .topbar-left .btn-toggle { display: flex; }
            .content { padding: 20px 16px; }
            .topbar { padding: 0 16px; }
        }

        .sidebar-overlay {
            display: none; position: fixed; inset: 0;
            background: rgba(13,59,66,0.6); z-index: 1040;
            backdrop-filter: blur(4px);
        }
        .sidebar-overlay.show { display: block; }

        .content { animation: fadeIn 0.3s ease; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
    @yield('styles')
</head>
<body>
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('admin.dashboard') }}" class="brand">
                <div class="brand-logo">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="MoveWell">
                </div>
                <div class="brand-text">
                    <h5>MoveWell</h5>
                    <span>Admin Panel</span>
                </div>
            </a>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-label">Main</div>
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> Dashboard
            </a>

            <div class="nav-label">Management</div>
            <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                <i class="fas fa-inbox"></i> Messages
                @php $unread = \App\Models\Contact::where('is_read', false)->count(); @endphp
                @if($unread > 0)
                    <span class="nav-badge">{{ $unread }}</span>
                @endif
            </a>
            <a href="{{ route('admin.appointments.index') }}" class="nav-link {{ request()->routeIs('admin.appointments.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-check"></i> Appointments
                @php $pendingAppts = \App\Models\Appointment::where('status', 'pending')->count(); @endphp
                @if($pendingAppts > 0)
                    <span class="nav-badge">{{ $pendingAppts }}</span>
                @endif
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="nav-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <i class="fas fa-images"></i> Gallery
            </a>
            <a href="{{ route('admin.blogs.index') }}" class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}">
                <i class="fas fa-pen-nib"></i> Blogs
            </a>

            <div class="nav-label">Quick Links</div>
            <a href="{{ route('home') }}" target="_blank" class="nav-link">
                <i class="fas fa-arrow-up-right-from-square"></i> View Website
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
                <div class="user-info">
                    <p>{{ Auth::user()->name }}</p>
                    <span>Administrator</span>
                </div>
                <button class="logout-btn" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-right-from-bracket"></i>
                </button>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        </div>
    </aside>

    <div class="main-wrap">
        <header class="topbar">
            <div class="topbar-left">
                <button class="btn-toggle" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <span class="page-title">@yield('page-title', 'Dashboard')</span>
            </div>
            <div class="topbar-right">
                <span class="topbar-date d-none d-md-inline">{{ now()->format('l, d M Y') }}</span>
                <a href="{{ route('home') }}" target="_blank" class="btn-site">
                    <i class="fas fa-globe"></i> Visit Site
                </a>
            </div>
        </header>

        <main class="content">
            @if(session('success'))
                <div class="alert-premium alert-success mb-3">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert-premium alert-danger mb-3">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
            document.getElementById('sidebarOverlay').classList.toggle('show');
        }
        document.querySelectorAll('.alert-premium').forEach(el => {
            setTimeout(() => { el.style.opacity = '0'; el.style.transform = 'translateY(-10px)'; setTimeout(() => el.remove(), 300); }, 4000);
        });
    </script>
    @yield('scripts')
</body>
</html>

@extends('layouts.admin.app')

@section('title', 'Manajemen User')
@section('page_title', 'INFORMASI USER')

@section('content')
<div class="container-fluid dashboard-body py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-11">
            <!-- Page Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-5">
                <div>
                    <h1 class="h2 mb-1 dashboard-text-primary">
                        <i class="fas fa-users me-2"></i>Manajemen User
                    </h1>
                    <p class="text-muted mb-0">Kelola pengguna dan akses sistem</p>
                </div>
                <div>
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Tambah User
                    </a>
                </div>
            </div>

            <!-- Main Card -->
            <div class="card shadow-lg mb-4">
                <div class="card-header py-3">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h5 class="mb-0 text-white">
                                <i class="fas fa-list me-2"></i>Daftar User Sistem
                            </h5>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <span class="badge badge-primary stats-badge">
                                Total: {{ $users->total() }} User
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <!-- Search & Filter Form -->
                    <form action="{{ route('admin.user.index') }}" method="GET" class="search-form mb-4">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-4">
                                <label class="form-label small text-muted mb-1">Pencarian</label>
                                <input type="text" 
                                    class="form-control" 
                                    placeholder="Cari nama atau email..."
                                    name="search" 
                                    value="{{ request('search') }}">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label small text-muted mb-1">Filter Role</label>
                                <select name="role" class="form-control">
                                    placeholder="Cari nama atau email..."
                                    <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="operator" {{ request('role') == 'operator' ? 'selected' : '' }}>Operator</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label class="form-label small text-muted mb-1">&nbsp;</label>
                                <div class="d-grid gap-2 d-md-flex">
                                    <button type="submit" class="btn btn-primary flex-fill">
                                        <i class="fas fa-search me-2"></i>Cari
                                    </button>
                                    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary flex-fill">
                                        <i class="fas fa-refresh me-2"></i>Reset
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Users Table -->
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Kontak</th>
                                    <th>Role</th>
                                    <th>Bergabung</th>
                                    <th>Status</th>
                                    <th width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                                                     style="width: 40px; height: 40px;">
                                                    <i class="fas fa-user text-white"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <strong class="text-gray-900">{{ $user->name }}</strong>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="small text-muted">{{ $user->email }}</div>
                                    </td>
                                    <td>
                                        @if($user->role == 'admin')
                                            <span class="badge badge-success stats-badge">
                                                <i class="fas fa-crown me-1"></i>Administrator
                                            </span>
                                        @else
                                            <span class="badge badge-info stats-badge">
                                                <i class="fas fa-user me-1"></i>Operator
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-dark stats-badge">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ $user->created_at->format('d/m/Y') }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($user->id === auth()->id())
                                            <span class="badge badge-primary stats-badge">
                                                <i class="fas fa-star me-1"></i>Anda
                                            </span>
                                        @else
                                            <span class="badge badge-secondary stats-badge">
                                                <i class="fas fa-check me-1"></i>Aktif
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-buttons d-flex justify-content-center">
                                            <a href="{{ route('admin.user.show', $user->id) }}" 
                                               class="btn btn-info btn-sm" 
                                               title="Detail User"
                                               data-bs-toggle="tooltip">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.user.edit', $user->id) }}" 
                                               class="btn btn-warning btn-sm" 
                                               title="Edit User"
                                               data-bs-toggle="tooltip">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            @if($user->id !== auth()->id())
                                            <form action="{{ route('admin.user.destroy', $user->id) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm" 
                                                        onclick="return confirm('Apakah Anda yakin menghapus user ini?')"
                                                        title="Hapus User"
                                                        data-bs-toggle="tooltip">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            @else
                                            <button class="btn btn-danger btn-sm" 
                                                    disabled 
                                                    title="Tidak dapat menghapus akun sendiri"
                                                    data-bs-toggle="tooltip">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="fas fa-users fa-2x mb-3"></i>
                                            <p>Tidak ada data user ditemukan</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($users->hasPages())
                    <div class="pagination-container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="page-info">
                                    Menampilkan <strong>{{ $users->firstItem() }}</strong> sampai 
                                    <strong>{{ $users->lastItem() }}</strong> dari 
                                    <strong>{{ $users->total() }}</strong> user
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-end">
                                    {{ $users->appends(request()->query())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card border-left-primary h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <i class="fas fa-users fa-2x text-primary"></i>
                                </div>
                                <div class="col-9">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Users
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $users->total() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-left-success h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <i class="fas fa-crown fa-2x text-success"></i>
                                </div>
                                <div class="col-9">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Administrator
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $users->where('role', 'admin')->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card border-left-info h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-3">
                                    <i class="fas fa-user fa-2x text-info"></i>
                                </div>
                                <div class="col-9">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Operator
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ $users->where('role', 'operator')->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Custom styles untuk konsistensi dengan CSS utama */
.management-header {
    color: var(--text-primary) !important;
    font-weight: 700 !important;
    margin-bottom: 1.5rem !important;
}

.user-table {
    background: #000000 !important;
    border-radius: 12px !important;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08) !important;
}

.user-table thead {
    background: linear-gradient(135deg, var(--primary-dark), var(--primary)) !important;
}

.user-table th {
    color: #ffffff !important;
    font-weight: 600 !important;
    border: none !important;
    padding: 1rem 0.75rem !important;
    font-size: 0.875rem !important;
    text-transform: uppercase !important;
    letter-spacing: 0.5px !important;
}

.user-table td {
    padding: 1rem 0.75rem !important;
    vertical-align: middle !important;
    border-color: #e2e8f0 !important;
    color: var(--text-primary) !important;
}

.user-table tbody tr {
    transition: all var(--transition-speed) ease !important;
}

.user-table tbody tr:hover {
    background-color: #f8fafc !important;
    transform: translateX(4px);
}

.search-form .form-control {
    border-radius: 10px !important;
    border: 1px solid #cbd5e1 !important;
    padding: 0.75rem 1rem !important;
    transition: all var(--transition-speed) ease !important;
}

.search-form .form-control:focus {
    border-color: var(--primary) !important;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1) !important;
}

.action-buttons .btn {
    border-radius: 8px !important;
    padding: 0.5rem 0.75rem !important;
    margin: 0 2px !important;
    transition: all var(--transition-speed) ease !important;
    transform-style: preserve-3d !important;
}

.action-buttons .btn:hover {
    transform: translateY(-2px) scale(1.05) !important;
}

.pagination-container {
    background: #f8fafc;
    border-radius: 10px;
    padding: 1rem;
    margin-top: 1.5rem;
}

.stats-badge {
    font-size: 0.75rem !important;
    font-weight: 600 !important;
    padding: 0.5rem 0.75rem !important;
    border-radius: 8px !important;
}

.page-info {
    color: var(--text-secondary) !important;
    font-size: 0.875rem !important;
}

.border-left-primary { border-left: 4px solid var(--primary) !important; }
.border-left-success { border-left: 4px solid var(--secondary) !important; }
.border-left-info { border-left: 4px solid var(--accent) !important; }

.text-xs {
    font-size: 0.7rem !important;
}

@media (max-width: 768px) {
    .user-table {
        font-size: 0.875rem;
    }
    
    .user-table th,
    .user-table td {
        padding: 0.75rem 0.5rem !important;
    }
    
    .action-buttons .btn {
        padding: 0.4rem 0.6rem !important;
        margin: 0 1px !important;
    }
    
    .search-form .row {
        gap: 1rem;
    }
}
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });

    // Enhanced delete confirmation
    const deleteForms = document.querySelectorAll('form[action*="destroy"]');
    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: "Apakah Anda yakin ingin menghapus user ini? Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });

    // Auto-hide alerts
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });
});
</script>
@endsection
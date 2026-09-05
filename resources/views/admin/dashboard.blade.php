@extends('layouts.admin')

@section('content')
<section class="services-section" style="scroll-margin-top: 100px;">
    
    {{-- Header Title --}}
    <div class="section-header">
        <div>
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 6px; flex-wrap: wrap;">
                <span class="update-category-tag" style="margin-bottom: 0; background: rgba(245, 214, 152, 0.15); color: var(--accent-gold); border-color: var(--accent-gold);">
                    👑 ADMIN CONTROL PANEL
                </span>
                <span style="font-size: 11px; color: #ffffff; font-weight: 700;">LOGGED IN AS {{ strtoupper(Auth::user()->name) }}</span>
            </div>
            <h2 class="section-title">WORKSHOP MANAGEMENT DASHBOARD</h2>
            <p style="font-size: 13.5px; color: var(--text-muted); margin-top: 6px;">
                Panel kontrol administrasi data booking service, progres antrean workshop bay, dan akun pelanggan Wyne Store.
            </p>
        </div>
        <span class="section-subtitle-tag">ADMINISTRATOR</span>
    </div>

    {{-- 1. OVERVIEW METRICS GRID (#overview) --}}
    <div id="overview" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 220px), 1fr)); gap: 20px; margin-bottom: 32px; scroll-margin-top: 100px;">
        <div class="queue-card-mini" style="padding: 22px;">
            <div style="font-size: 11px; color: var(--text-muted); text-transform: uppercase; font-family: var(--font-sub); font-weight: 700; letter-spacing: 1px;">TOTAL BOOKINGS</div>
            <div style="font-family: var(--font-heading); font-size: 44px; color: #ffffff; line-height: 1.1;">{{ $totalBookings }}</div>
            <div style="font-size: 12px; color: var(--accent-gold); font-weight: 600;">Reservasi Masuk</div>
        </div>

        <div class="queue-card-mini" style="padding: 22px;">
            <div style="font-size: 11px; color: var(--text-muted); text-transform: uppercase; font-family: var(--font-sub); font-weight: 700; letter-spacing: 1px;">PENDING RESERVATIONS</div>
            <div style="font-family: var(--font-heading); font-size: 44px; color: #eab308; line-height: 1.1;">{{ $pendingBookings }}</div>
            <div style="font-size: 12px; color: #eab308; font-weight: 600;">Menunggu Konfirmasi</div>
        </div>

        <div class="queue-card-mini" style="padding: 22px;">
            <div style="font-size: 11px; color: var(--text-muted); text-transform: uppercase; font-family: var(--font-sub); font-weight: 700; letter-spacing: 1px;">ACTIVE WORKSHOP BAYS</div>
            <div style="font-family: var(--font-heading); font-size: 44px; color: var(--accent-gold); line-height: 1.1;">{{ $activeBays }}</div>
            <div style="font-size: 12px; color: var(--accent-gold); font-weight: 600;">Unit Dalam Garapan</div>
        </div>

        <div class="queue-card-mini" style="padding: 22px;">
            <div style="font-size: 11px; color: var(--text-muted); text-transform: uppercase; font-family: var(--font-sub); font-weight: 700; letter-spacing: 1px;">REGISTERED USERS</div>
            <div style="font-family: var(--font-heading); font-size: 44px; color: #3b82f6; line-height: 1.1;">{{ $users->count() }}</div>
            <div style="font-size: 12px; color: #3b82f6; font-weight: 600;">Akun Terdaftar</div>
        </div>
    </div>

    {{-- 2. BOOKING RESERVATIONS TABLE (#bookings) --}}
    <div id="bookings" style="background: var(--glass-bg); border: 1px solid var(--border-color); padding: 28px; border-radius: 6px; margin-bottom: 40px; scroll-margin-top: 100px;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; margin-bottom: 20px;">
            <div>
                <h3 style="font-family: var(--font-heading); font-size: 28px; color: #ffffff; text-transform: uppercase; line-height: 1.1;">
                    DAFTAR RESERVASI BOOKING SERVICE
                </h3>
                <p style="font-size: 12.5px; color: var(--text-muted);">Kelola dan perbarui status booking pelanggan yang tersimpan di MySQL.</p>
            </div>
            <div style="display: flex; gap: 10px; flex-wrap: wrap; width: 100%; max-width: 400px;">
                <input type="text" id="adminBookingSearch" onkeyup="filterAdminBookings()" class="form-input" placeholder="🔍 Cari Kode / Nama / Motor..." style="font-size: 13px; padding: 8px 12px;">
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table id="adminBookingsTable" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 13.5px; min-width: 760px;">
                <thead>
                    <tr style="border-bottom: 1px solid var(--border-color); color: var(--accent-gold); font-family: var(--font-sub); font-size: 11px; letter-spacing: 1px; text-transform: uppercase;">
                        <th style="padding: 12px;">KODE</th>
                        <th style="padding: 12px;">PELANGGAN</th>
                        <th style="padding: 12px;">MOTOR</th>
                        <th style="padding: 12px;">LAYANAN</th>
                        <th style="padding: 12px;">JADWAL</th>
                        <th style="padding: 12px;">STATUS</th>
                        <th style="padding: 12px;">AKSI UPDATE STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $b)
                        <tr class="booking-row" style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                            <td style="padding: 14px 12px; font-family: var(--font-sub); font-weight: 700; color: var(--accent-gold);">
                                {{ $b->booking_code }}
                            </td>
                            <td style="padding: 14px 12px;">
                                <div style="font-weight: 600; color: #ffffff;">{{ $b->customer_name }}</div>
                                <div style="font-size: 12px; color: var(--text-muted);">{{ $b->customer_phone }}</div>
                            </td>
                            <td style="padding: 14px 12px; color: var(--text-main);">
                                {{ $b->motorcycle_model }} ({{ $b->motorcycle_year ?? '-' }})
                            </td>
                            <td style="padding: 14px 12px; color: var(--text-muted);">
                                {{ $b->service ? $b->service->title : 'N/A' }}
                            </td>
                            <td style="padding: 14px 12px; color: var(--text-dim); font-size: 12px;">
                                <div style="color: var(--text-main); font-weight: 600;">{{ $b->booking_date }}</div>
                                <div>{{ $b->booking_time }}</div>
                            </td>
                            <td style="padding: 14px 12px;">
                                <span style="display: inline-block; padding: 4px 10px; border-radius: 4px; font-size: 10.5px; font-weight: 700; font-family: var(--font-sub); text-transform: uppercase;
                                    @if($b->status == 'pending') background: rgba(234,179,8,0.15); color: #eab308; border: 1px solid #eab308;
                                    @elseif($b->status == 'confirmed') background: rgba(59,130,246,0.15); color: #3b82f6; border: 1px solid #3b82f6;
                                    @elseif($b->status == 'in_workshop') background: rgba(245,214,152,0.15); color: var(--accent-gold); border: 1px solid var(--accent-gold);
                                    @elseif($b->status == 'completed') background: rgba(34,197,94,0.15); color: #22c55e; border: 1px solid #22c55e;
                                    @else background: rgba(239,68,68,0.15); color: #ef4444; border: 1px solid #ef4444; @endif">
                                    {{ $b->status }}
                                </span>
                            </td>
                            <td style="padding: 14px 12px;">
                                <form action="{{ route('admin.booking.status', $b->id) }}" method="POST" style="display: flex; gap: 8px; flex-wrap: wrap;">
                                    @csrf
                                    <select name="status" class="form-select" style="padding: 6px 10px; font-size: 12px; width: auto; flex: 1;">
                                        <option value="pending" {{ $b->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $b->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="in_workshop" {{ $b->status == 'in_workshop' ? 'selected' : '' }}>In Workshop</option>
                                        <option value="completed" {{ $b->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $b->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    <button type="submit" class="btn-gold" style="padding: 6px 14px; font-size: 11px;">UPDATE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- 3. WORKSHOP BAYS MANAGEMENT (#bays) --}}
    <div id="bays" style="background: var(--glass-bg); border: 1px solid var(--border-color); padding: 28px; border-radius: 6px; margin-bottom: 40px; scroll-margin-top: 100px;">
        <h3 style="font-family: var(--font-heading); font-size: 28px; color: #ffffff; margin-bottom: 6px; text-transform: uppercase;">
            MANAJEMEN PROGRES WORKSHOP BAY
        </h3>
        <p style="font-size: 12.5px; color: var(--text-muted); margin-bottom: 20px;">Perbarui persentase pengerjaan, tahap garapan, dan mekanik di setiap bay workshop.</p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 300px), 1fr)); gap: 20px;">
            @foreach($queues as $q)
                <div class="queue-card-mini" style="padding: 22px;">
                    <form action="{{ route('admin.queue.progress', $q->id) }}" method="POST">
                        @csrf
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                            <span class="queue-bay-badge">{{ $q->queue_code }} // {{ strtoupper($q->status) }}</span>
                            <span style="font-size: 13px; color: var(--accent-gold); font-weight: 700;">{{ $q->progress_percent }}%</span>
                        </div>
                        <div class="queue-bike-name" style="font-size: 19px; margin-bottom: 12px; color: #ffffff;">{{ $q->bike_name }}</div>

                        <div class="form-group" style="margin-bottom: 12px;">
                            <label class="form-label" style="font-size: 10px;">Tahap Garapan (Stage)</label>
                            <input type="text" name="stage" class="form-input" value="{{ $q->stage }}" style="padding: 8px 12px; font-size: 13px;" required>
                        </div>

                        <div class="form-group" style="margin-bottom: 12px;">
                            <label class="form-label" style="font-size: 10px;">Progres (%)</label>
                            <input type="number" name="progress_percent" class="form-input" min="0" max="100" value="{{ $q->progress_percent }}" style="padding: 8px 12px; font-size: 13px;" required>
                        </div>

                        <div class="form-group" style="margin-bottom: 16px;">
                            <label class="form-label" style="font-size: 10px;">Mekanik Penanggung Jawab</label>
                            <input type="text" name="mechanic_in_charge" class="form-input" value="{{ $q->mechanic_in_charge }}" style="padding: 8px 12px; font-size: 13px;">
                        </div>

                        <button type="submit" class="btn-gold" style="width: 100%; padding: 10px; font-size: 11px;">
                            UPDATE PROGRES BAY
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    {{-- 4. REGISTERED USERS OVERVIEW (#users) --}}
    <div id="users" style="background: var(--glass-bg); border: 1px solid var(--border-color); padding: 28px; border-radius: 6px; scroll-margin-top: 100px;">
        <h3 style="font-family: var(--font-heading); font-size: 28px; color: #ffffff; margin-bottom: 6px; text-transform: uppercase;">
            PENGGUNA TERDAFTAR SYSTEM
        </h3>
        <p style="font-size: 12.5px; color: var(--text-muted); margin-bottom: 20px;">Daftar akun pelanggan dan administrator yang terverifikasi dalam database.</p>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 13.5px; min-width: 600px;">
                <thead>
                    <tr style="border-bottom: 1px solid var(--border-color); color: var(--accent-gold); font-family: var(--font-sub); font-size: 11px; letter-spacing: 1px; text-transform: uppercase;">
                        <th style="padding: 12px;">ID</th>
                        <th style="padding: 12px;">NAMA PENGGUNA</th>
                        <th style="padding: 12px;">EMAIL ADDRESS</th>
                        <th style="padding: 12px;">ROLE / HAK AKSES</th>
                        <th style="padding: 12px;">TERDAFTAR SEJAK</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $u)
                        <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                            <td style="padding: 14px 12px; font-family: var(--font-sub); color: var(--text-dim);">#{{ $u->id }}</td>
                            <td style="padding: 14px 12px;">
                                <div style="font-weight: 700; color: #ffffff;">{{ $u->name }}</div>
                            </td>
                            <td style="padding: 14px 12px; color: var(--text-muted);">{{ $u->email }}</td>
                            <td style="padding: 14px 12px;">
                                <span style="display: inline-block; padding: 3px 9px; border-radius: 50px; font-size: 10px; font-weight: 700; font-family: var(--font-sub); text-transform: uppercase;
                                    @if($u->role === 'admin') background: rgba(245,214,152,0.15); color: var(--accent-gold); border: 1px solid var(--accent-gold);
                                    @else background: rgba(59,130,246,0.15); color: #3b82f6; border: 1px solid #3b82f6; @endif">
                                    {{ $u->role === 'admin' ? '👑 ADMIN' : '👤 USER' }}
                                </span>
                            </td>
                            <td style="padding: 14px 12px; color: var(--text-dim); font-size: 12px;">
                                {{ $u->created_at ? $u->created_at->format('d M Y') : '-' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

<script>
    function filterAdminBookings() {
        const input = document.getElementById('adminBookingSearch').value.toLowerCase();
        const rows = document.querySelectorAll('#adminBookingsTable .booking-row');
        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            row.style.display = text.includes(input) ? '' : 'none';
        });
    }
</script>
@endsection

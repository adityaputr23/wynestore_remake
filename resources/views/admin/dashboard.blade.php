@extends('layouts.admin')

@section('content')
<div class="admin-dashboard-container">
    
    {{-- 1. TOP ROW GRID: HERO CARD + STATUS DONUT CARD --}}
    <div class="dashboard-top-grid" id="overview">
        
        {{-- HERO CARD (LEFT ~65%) --}}
        <div class="dashboard-hero-card">
            <div class="hero-card-left">
                <div>
                    <h2 class="hero-greeting-title">Welcome back, {{ strtolower(Auth::user()->name ?? 'aditya') }}</h2>
                    <p class="hero-greeting-subtitle">Here is the latest performance of your portfolio.</p>
                </div>

                {{-- Metric Items List --}}
                <div class="hero-metrics-list">
                    {{-- Metric 1: Total Views / Bookings --}}
                    <div class="metric-stat-item">
                        <div class="metric-icon-box">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </div>
                        <div>
                            <div class="metric-val-num">{{ $totalBookings > 0 ? $totalBookings : 17 }}</div>
                            <div class="metric-val-label">Total views</div>
                        </div>
                    </div>

                    {{-- Metric 2: Likes / Pending --}}
                    <div class="metric-stat-item">
                        <div class="metric-icon-box">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="metric-val-num">{{ $pendingBookings }}</div>
                            <div class="metric-val-label">Likes</div>
                        </div>
                    </div>

                    {{-- Metric 3: Saves / Active Bays --}}
                    <div class="metric-stat-item">
                        <div class="metric-icon-box">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="metric-val-num">0</div>
                            <div class="metric-val-label">Saves</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Featured Card Preview Box --}}
            <div class="hero-card-right-preview">
                <div style="width: 100%; height: 100%; background: rgba(245, 214, 152, 0.12); border-radius: 12px; border: 1px dashed rgba(245, 214, 152, 0.3); display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 16px; text-align: center;">
                    <div style="font-family: var(--font-brand); font-size: 16px; color: var(--accent-gold); font-weight: 700; margin-bottom: 4px;">
                        WYNE WORKSHOP
                    </div>
                    <div style="font-size: 11px; color: var(--text-muted);">
                        Active Bay Highlights & Live Queue System
                    </div>
                </div>
            </div>
        </div>

        {{-- STATUS DONUT CARD (RIGHT ~35%) --}}
        <div class="dashboard-status-card">
            <div class="status-card-header">
                <h3 class="status-title">Project status</h3>
                <p class="status-subtitle">Your published projects and work in progress.</p>
            </div>

            {{-- SVG Donut Chart --}}
            <div class="donut-chart-wrapper">
                <svg width="160" height="160" viewBox="0 0 160 160">
                    <circle cx="80" cy="80" r="58" fill="none" stroke="#1c202d" stroke-width="14" />
                    <circle cx="80" cy="80" r="58" fill="none" stroke="var(--accent-gold)" stroke-width="14"
                        stroke-dasharray="364" stroke-dashoffset="90" stroke-linecap="round" transform="rotate(-90 80 80)" />
                </svg>
                <div class="donut-center-text">
                    <div style="font-family: var(--font-heading); font-size: 40px; font-weight: 700; color: #ffffff; line-height: 1;">1</div>
                    <div style="font-size: 11px; color: var(--text-muted); font-weight: 500;">Projects</div>
                </div>
            </div>

            {{-- Legend Footer --}}
            <div class="status-legend-footer">
                <div><span class="legend-dot" style="background: var(--accent-gold);"></span> Published <strong style="color: #ffffff;">1</strong></div>
                <div><span class="legend-dot" style="background: var(--text-dim);"></span> Drafts <strong style="color: #ffffff;">0</strong></div>
            </div>
        </div>
    </div>

    {{-- 2. CALENDAR COMPONENT (MATCHING IMAGE 1 EXACT) --}}
    <div class="dashboard-calendar-card">
        <div class="calendar-header-nav">
            <button class="calendar-nav-arrow" onclick="navigateMonth(-1)">‹</button>
            <span class="calendar-month-title" id="calendarMonthTitle">October 2026</span>
            <button class="calendar-nav-arrow" onclick="navigateMonth(1)">›</button>
        </div>

        <div class="calendar-weekdays-row">
            <div>Su</div>
            <div>Mo</div>
            <div>Tu</div>
            <div>We</div>
            <div>Th</div>
            <div>Fr</div>
            <div>Sa</div>
        </div>

        <div class="calendar-days-grid" id="calendarDaysGrid">
            {{-- Week 1 --}}
            <div class="calendar-day-cell">27</div>
            <div class="calendar-day-cell">28</div>
            <div class="calendar-day-cell">29</div>
            <div class="calendar-day-cell">30</div>
            {{-- Active Date "1" (Highlighted with solid gold block like Image 1) --}}
            <div class="calendar-day-cell active-highlight" id="day-cell-1" onclick="selectCalendarDay(1)">1</div>
            <div class="calendar-day-cell" onclick="selectCalendarDay(2)">2</div>
            <div class="calendar-day-cell" onclick="selectCalendarDay(3)">3</div>
            
            {{-- Week 2 --}}
            <div class="calendar-day-cell" onclick="selectCalendarDay(4)">4</div>
            <div class="calendar-day-cell" onclick="selectCalendarDay(5)">5</div>
            <div class="calendar-day-cell" onclick="selectCalendarDay(6)">6</div>
            <div class="calendar-day-cell" onclick="selectCalendarDay(7)">7</div>
            <div class="calendar-day-cell" onclick="selectCalendarDay(8)">8</div>
            <div class="calendar-day-cell" onclick="selectCalendarDay(9)">9</div>
            <div class="calendar-day-cell" onclick="selectCalendarDay(10)">10</div>
        </div>

        {{-- Selected Date Schedule Detail Drawer --}}
        <div id="selectedDateDetail" style="margin-top: 24px; padding-top: 20px; border-top: 1px solid var(--border-color); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;">
            <div style="display: flex; align-items: center; gap: 12px;">
                <span class="update-category-tag" style="margin-bottom: 0;">📅 SCHEDULER: 1 OKTOBER 2026</span>
                <span style="font-size: 13px; color: var(--text-muted);">{{ $totalBookings }} Reservasi terdaftar pada tanggal ini.</span>
            </div>
            <a href="#bookings" class="btn-gold" style="padding: 8px 18px; font-size: 11px;">LIHAT BOOKINGS</a>
        </div>
    </div>

    {{-- 3. DAFTAR RESERVASI BOOKING SERVICE (#bookings) --}}
    <div id="bookings" style="background: #12141e; border: 1px solid var(--border-color); padding: 28px; border-radius: 20px; scroll-margin-top: 80px;">
        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; margin-bottom: 20px;">
            <div>
                <h3 style="font-family: var(--font-heading); font-size: 28px; color: #ffffff; text-transform: uppercase; line-height: 1.1;">
                    DAFTAR RESERVASI BOOKING SERVICE
                </h3>
                <p style="font-size: 12.5px; color: var(--text-muted);">Kelola dan perbarui status booking pelanggan yang tersimpan di MySQL.</p>
            </div>
            <div style="display: flex; gap: 10px; flex-wrap: wrap; width: 100%; max-width: 400px;">
                <input type="text" id="adminBookingSearch" onkeyup="filterAdminBookings()" class="form-input" placeholder="🔍 Cari Kode / Nama / Motor..." style="font-size: 13px; padding: 10px 14px; border-radius: 10px;">
            </div>
        </div>

        <div style="overflow-x: auto;">
            <table id="adminBookingsTable" style="width: 100%; border-collapse: collapse; text-align: left; font-size: 13.5px; min-width: 760px;">
                <thead>
                    <tr style="border-bottom: 1px solid var(--border-color); color: var(--accent-gold); font-family: var(--font-sub); font-size: 11px; letter-spacing: 1px; text-transform: uppercase;">
                        <th style="padding: 14px 12px;">KODE</th>
                        <th style="padding: 14px 12px;">PELANGGAN</th>
                        <th style="padding: 14px 12px;">MOTOR</th>
                        <th style="padding: 14px 12px;">LAYANAN</th>
                        <th style="padding: 14px 12px;">JADWAL</th>
                        <th style="padding: 14px 12px;">STATUS</th>
                        <th style="padding: 14px 12px;">AKSI UPDATE STATUS</th>
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
                                <span style="display: inline-block; padding: 4px 10px; border-radius: 6px; font-size: 10.5px; font-weight: 700; font-family: var(--font-sub); text-transform: uppercase;
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
                                    <select name="status" class="form-select" style="padding: 6px 10px; font-size: 12px; width: auto; flex: 1; border-radius: 8px;">
                                        <option value="pending" {{ $b->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $b->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="in_workshop" {{ $b->status == 'in_workshop' ? 'selected' : '' }}>In Workshop</option>
                                        <option value="completed" {{ $b->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $b->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    <button type="submit" class="btn-gold" style="padding: 6px 14px; font-size: 11px; border-radius: 8px;">UPDATE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- 4. MANAJEMEN WORKSHOP BAY (#bays) --}}
    <div id="bays" style="background: #12141e; border: 1px solid var(--border-color); padding: 28px; border-radius: 20px; scroll-margin-top: 80px;">
        <h3 style="font-family: var(--font-heading); font-size: 28px; color: #ffffff; margin-bottom: 6px; text-transform: uppercase;">
            MANAJEMEN PROGRES WORKSHOP BAY
        </h3>
        <p style="font-size: 12.5px; color: var(--text-muted); margin-bottom: 20px;">Perbarui persentase pengerjaan, tahap garapan, dan mekanik di setiap bay workshop.</p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 300px), 1fr)); gap: 20px;">
            @foreach($queues as $q)
                <div class="queue-card-mini" style="padding: 22px; border-radius: 14px; background: rgba(10, 11, 14, 0.8);">
                    <form action="{{ route('admin.queue.progress', $q->id) }}" method="POST">
                        @csrf
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                            <span class="queue-bay-badge">{{ $q->queue_code }} // {{ strtoupper($q->status) }}</span>
                            <span style="font-size: 13px; color: var(--accent-gold); font-weight: 700;">{{ $q->progress_percent }}%</span>
                        </div>
                        <div class="queue-bike-name" style="font-size: 19px; margin-bottom: 12px; color: #ffffff;">{{ $q->bike_name }}</div>

                        <div class="form-group" style="margin-bottom: 12px;">
                            <label class="form-label" style="font-size: 10px;">Tahap Garapan (Stage)</label>
                            <input type="text" name="stage" class="form-input" value="{{ $q->stage }}" style="padding: 8px 12px; font-size: 13px; border-radius: 8px;" required>
                        </div>

                        <div class="form-group" style="margin-bottom: 12px;">
                            <label class="form-label" style="font-size: 10px;">Progres (%)</label>
                            <input type="number" name="progress_percent" class="form-input" min="0" max="100" value="{{ $q->progress_percent }}" style="padding: 8px 12px; font-size: 13px; border-radius: 8px;" required>
                        </div>

                        <div class="form-group" style="margin-bottom: 16px;">
                            <label class="form-label" style="font-size: 10px;">Mekanik Penanggung Jawab</label>
                            <input type="text" name="mechanic_in_charge" class="form-input" value="{{ $q->mechanic_in_charge }}" style="padding: 8px 12px; font-size: 13px; border-radius: 8px;">
                        </div>

                        <button type="submit" class="btn-gold" style="width: 100%; padding: 10px; font-size: 11px; border-radius: 8px;">
                            UPDATE PROGRES BAY
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    {{-- 5. REGISTERED USERS (#users) --}}
    <div id="users" style="background: #12141e; border: 1px solid var(--border-color); padding: 28px; border-radius: 20px; scroll-margin-top: 80px;">
        <h3 style="font-family: var(--font-heading); font-size: 28px; color: #ffffff; margin-bottom: 6px; text-transform: uppercase;">
            PENGGUNA TERDAFTAR SYSTEM
        </h3>
        <p style="font-size: 12.5px; color: var(--text-muted); margin-bottom: 20px;">Daftar akun pelanggan dan administrator yang terverifikasi dalam database.</p>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 13.5px; min-width: 600px;">
                <thead>
                    <tr style="border-bottom: 1px solid var(--border-color); color: var(--accent-gold); font-family: var(--font-sub); font-size: 11px; letter-spacing: 1px; text-transform: uppercase;">
                        <th style="padding: 14px 12px;">ID</th>
                        <th style="padding: 14px 12px;">NAMA PENGGUNA</th>
                        <th style="padding: 14px 12px;">EMAIL ADDRESS</th>
                        <th style="padding: 14px 12px;">ROLE / HAK AKSES</th>
                        <th style="padding: 14px 12px;">TERDAFTAR SEJAK</th>
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
                                <span style="display: inline-block; padding: 4px 10px; border-radius: 50px; font-size: 10px; font-weight: 700; font-family: var(--font-sub); text-transform: uppercase;
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
</div>

<script>
    function filterAdminBookings() {
        const input = document.getElementById('adminBookingSearch').value.toLowerCase();
        const rows = document.querySelectorAll('#adminBookingsTable .booking-row');
        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            row.style.display = text.includes(input) ? '' : 'none';
        });
    }

    let currentMonthIndex = 9; // October (0-indexed 9)
    let currentYear = 2026;
    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    function navigateMonth(direction) {
        currentMonthIndex += direction;
        if (currentMonthIndex < 0) {
            currentMonthIndex = 11;
            currentYear--;
        } else if (currentMonthIndex > 11) {
            currentMonthIndex = 0;
            currentYear++;
        }
        document.getElementById('calendarMonthTitle').innerText = `${monthNames[currentMonthIndex]} ${currentYear}`;
    }

    function selectCalendarDay(dayNum) {
        document.querySelectorAll('.calendar-day-cell').forEach(el => el.classList.remove('active-highlight'));
        const target = document.getElementById(`day-cell-${dayNum}`);
        if (target) {
            target.classList.add('active-highlight');
        }
        const detail = document.getElementById('selectedDateDetail');
        if (detail) {
            detail.querySelector('.update-category-tag').innerText = `📅 SCHEDULER: ${dayNum} ${monthNames[currentMonthIndex].toUpperCase()} ${currentYear}`;
        }
    }
</script>
@endsection

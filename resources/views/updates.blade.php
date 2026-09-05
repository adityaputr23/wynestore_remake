@extends('layouts.app')

@section('content')
<section class="services-section">
    <div class="section-header">
        <div>
            <h2 class="section-title">GARAGE UPDATES & NEWS</h2>
            <p style="font-size: 13.5px; color: var(--text-muted); margin-top: 6px;">
                Latest workshop builds, dyno calibrations, and shop announcements.
            </p>
        </div>
        <span class="section-subtitle-tag">NEWS & UPDATES</span>
    </div>

    <div style="display: flex; flex-direction: column; gap: 24px;">
        @foreach($garageUpdates as $update)
            <div class="service-card" style="min-height: auto; padding: 32px;">
                <div style="display: flex; justify-content: space-between; font-size: 11px; color: var(--text-dim); margin-bottom: 8px;">
                    <span>BY {{ strtoupper($update->author) }}</span>
                    <span>{{ $update->date_str }}</span>
                </div>
                <h3 class="service-card-title" style="font-size: 32px; color: var(--accent-gold);">{{ $update->title }}</h3>
                <p style="font-size: 15px; color: var(--text-main); line-height: 1.6; margin-bottom: 12px; font-weight: 500;">
                    {{ $update->summary }}
                </p>
                <div style="font-size: 14px; color: var(--text-muted); line-height: 1.6; border-top: 1px dashed var(--border-color); padding-top: 16px;">
                    {{ $update->content }}
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection

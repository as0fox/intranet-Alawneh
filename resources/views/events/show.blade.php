@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mb-0">{{ $event->title }}</h2>
                @if($hasRSVPed)
                    <span class="badge bg-success">Attending</span>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-4">
                        <h4>Details</h4>
                        <p><i class="far fa-calendar-alt me-2"></i> {{ $event->date->format('l, F j, Y') }}</p>
                        <p><i class="far fa-clock me-2"></i> {{ \Carbon\Carbon::parse($event->time)->format('g:i A') }}</p>
                        <p><i class="fas fa-map-marker-alt me-2"></i> {{ $event->location }}</p>
                    </div>
                    
                    <div class="mb-4">
                        <h4>Description</h4>
                        <p class="text-muted">{{ $event->description }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    @if($event->image)
                        <img src="{{ asset($event->image) }}" 
                             alt="{{ $event->title }}" 
                             class="img-fluid rounded mb-3">
                    @endif
                    
                    <div class="d-grid gap-2">
                        @if($hasRSVPed)
                            <button class="btn btn-success" disabled>
                                <i class="fas fa-check-circle me-2"></i>You're Attending
                            </button>
                        @else
                            <form id="rsvp-form" action="{{ route('events.rsvp', $event) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-calendar-plus me-2"></i>RSVP Now
                                </button>
                            </form>
                            @push('scripts')
                            <script>
                                document.getElementById('rsvp-form').addEventListener('submit', function(e) {
                                    e.preventDefault();
                                    fetch(this.action, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                        },
                                        body: JSON.stringify({})
                                    })
                                    .then(response => {
                                        if (response.redirected) {
                                            window.location.href = response.url;
                                        }
                                    });
                                });
                            </script>
                            @endpush
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

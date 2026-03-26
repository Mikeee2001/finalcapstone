<!-- Events Section -->
<section id="events" class="py-5 bg-light d-flex align-items-center justify-content-center" style="min-height:80vh;">
    <div class="container text-center">
        <!-- Heading with smaller margin -->

        <div class="row justify-content-center">
            @forelse ($events as $event)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-0 h-100">
                        <div class="card-header bg-primary text-white fw-bold">
                            {{ $event->event_name }}
                        </div>
                        <div class="card-body">
                            <p class="mb-1">
                                <i class="bi bi-geo-alt-fill text-danger"></i>
                                <span class="fw-semibold">{{ $event->location }}</span>
                            </p>
                            <p class="mb-2">
                                <i class="bi bi-calendar-event text-success"></i>
                                <strong>Date:</strong>
                                {{ \Carbon\Carbon::parse($event->start_time)->format('M d, Y H:i') }}
                                – {{ \Carbon\Carbon::parse($event->end_time)->format('M d, Y H:i') }}
                            </p>

                            @if (now()->between($event->start_time, $event->end_time))
                                <span class="badge bg-success rounded-pill px-3 py-2">Ongoing</span>
                            @elseif (now()->lt($event->start_time))
                                <span class="badge bg-info rounded-pill px-3 py-2">Upcoming</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning fw-bold">
                        No events available right now.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

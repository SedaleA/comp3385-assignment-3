<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Events Board</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body class="dashboard-page">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/dashboard') }}">Events Board</a>

            <div class="ms-auto d-flex align-items-center gap-2">
                <a href="{{ url('/community-events/add') }}" class="btn btn-success btn-sm">+ Create Event</a>

                <form method="POST" action="{{ url('/logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="mb-4">
            <h1 class="fw-bold mb-2">Dashboard</h1>
            <p class="text-muted mb-0">Manage and view your community events.</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($events->count())
            <div class="row g-4">
                @foreach($events as $event)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0 rounded-4">
                            @if($event->banner_image)
                                <img src="{{ asset('storage/' . $event->banner_image) }}"
                                     class="card-img-top rounded-top-4 event-image"
                                     alt="{{ $event->title }}">
                            @else
                                <div class="event-image placeholder-image d-flex align-items-center justify-content-center">
                                    <span class="text-muted">No Image</span>
                                </div>
                            @endif

                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $event->title }}</h5>
                                <p class="card-text text-muted mb-2">{{ $event->description }}</p>

                                <p class="mb-1"><strong>Venue:</strong> {{ $event->venue }}</p>
                                <p class="mb-0"><strong>Date:</strong> {{ $event->starts_at }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">
                No community events have been added yet.
            </div>
        @endif
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create-event.css') }}">
</head>
<body class="dashboard-page">

    <nav class="navbar navbar-expand-lg dashboard-navbar">
        <div class="container">
            <a class="navbar-brand brand d-flex align-items-center gap-2" href="{{ url('/dashboard') }}">
                <span class="brand-icon">📅</span>
                <span>Events Board</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active nav-pill" href="{{ url('/community-events/add') }}">Create Event</a>
                    </li>
                </ul>

                <div class="ms-auto">
                    <form method="POST" action="{{ url('/logout') }}" class="m-0">
                        @csrf
                        <button type="submit" class="logout-btn">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="container py-4 py-md-5">
        <div class="page-header mb-4">
            <h1 class="dashboard-title mb-1">Create New Event</h1>
            <p class="dashboard-subtitle mb-0">Fill out the details below to publish a new community event</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger rounded-4">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="event-form-card">
            <div class="event-form-card-body">
                <h3 class="form-section-title">Event Details</h3>
                <p class="form-section-subtitle">Basic information about the event</p>

                <form method="POST" action="{{ url('/community-events') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label custom-label">Event Title <span class="required-star">*</span></label>
                        <input
                            type="text"
                            class="form-control custom-input"
                            id="title"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="e.g. Summer Community Festival"
                            required
                        >
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="event_date" class="form-label custom-label">Event Date <span class="required-star">*</span></label>
                            <input
                                type="date"
                                class="form-control custom-input"
                                id="event_date"
                                name="event_date"
                                value="{{ old('event_date') }}"
                                required
                            >
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="event_time" class="form-label custom-label">Time <span class="required-star">*</span></label>
                            <input
                                type="time"
                                class="form-control custom-input"
                                id="event_time"
                                name="event_time"
                                value="{{ old('event_time') }}"
                                required
                            >
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="venue" class="form-label custom-label">Venue <span class="required-star">*</span></label>
                        <input
                            type="text"
                            class="form-control custom-input"
                            id="venue"
                            name="venue"
                            value="{{ old('venue') }}"
                            placeholder="e.g. Riverside Park, Main Pavilion"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label custom-label">Description <span class="required-star">*</span></label>
                        <textarea
                            class="form-control custom-input custom-textarea"
                            id="description"
                            name="description"
                            placeholder="Describe the event, what to expect, and any special instructions..."
                            required
                        >{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="banner_image" class="form-label custom-label">Banner Image</label>
                        <input
                            type="file"
                            class="form-control custom-input file-input"
                            id="banner_image"
                            name="banner_image"
                            accept=".png,.jpg,.jpeg,.webp"
                        >
                        <div class="form-hint">PNG, JPG, or WebP up to 5MB</div>
                    </div>

                    <button type="submit" class="btn publish-btn">Publish Event</button>
                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
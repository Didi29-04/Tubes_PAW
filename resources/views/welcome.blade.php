@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <!-- Bootstrap Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide mb-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/poster 1.jpeg') }}" class="d-block w-100" alt="Slide 1"
                    style="height: 500px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Discover Amazing Locations</h5>
                    <p>Explore outlets available in your city.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/poster 2.jpg') }}" class="d-block w-100" alt="Slide 2"
                    style="height: 500px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Find the Best Services</h5>
                    <p>We provide high-quality services at every outlet.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/poster3.png') }}" class="d-block w-100" alt="Slide 3"
                    style="height: 500px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Join Our Community</h5>
                    <p>Register today and start managing your outlets.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container mt-5">
    <!-- Map -->
    <div id="map" style="height: 400px; width: 100%; margin-bottom: 3rem;"></div>

    <!-- Outlet List -->
    <div class="mt-5">
        <h2 class="text-center mb-4">Outlet List</h2>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($outlets as $index => $outlet)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $outlet->name }}</td>
                        <td>{{ $outlet->address }}</td>
                        <td>{{ $outlet->latitude }}</td>
                        <td>{{ $outlet->longitude }}</td>
                        <td>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $outlet->phone_number) }}?text={{ urlencode('Halo, Apakah ini ' . $outlet->name . '?') }}"
                                target="_blank">
                                {{ $outlet->phone_number }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the map
        var map = L.map('map').setView([-7.275612, 112.6302816], 10);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var outlets = @json($outlets);
        outlets.forEach(function (outlet) {
            L.marker([outlet.latitude, outlet.longitude])
                .addTo(map)
                .bindPopup(`
                    <b>${outlet.name}</b><br>
                    ${outlet.address}<br>
                    <a href="https://wa.me/${outlet.phone_number.replace(/[^0-9]/g, '')}?text=${encodeURIComponent('Halo, Apakah ini ' + outlet.name + '?')}" target="_blank">
                        Contact via WhatsApp
                    </a>
                `);
        });
    });
</script>
@endsection

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4">Welcome to Outlet Location</h1>

    <!-- Map -->
    <div id="map" style="height: 400px; width: 100%;"></div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize the map
        var map = L.map('map').setView([-7.797068, 110.370529], 10);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var outlets = @json($outlets);
        outlets.forEach(function(outlet) {
            L.marker([outlet.latitude, outlet.longitude])
                .addTo(map)
                .bindPopup(`
                    <b>${outlet.name}</b><br>
                    ${outlet.address}<br>
                    <a href="/locations/${outlet.id}" class="btn btn-sm btn-primary mt-2">View Detail</a>
                `);
        });
    });
</script>
@endsection

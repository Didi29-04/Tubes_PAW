@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Outlet List</h1>
        <a href="{{ route('outlets.create') }}" class="btn btn-success">Create New Location</a>
    </div>

    <!-- Tabel Data -->
    <table id="outletsTable" class="table table-striped table-bordered responsive nowrap">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Outlet Name</th>
                <th class="text-center">Outlet Address</th>
                <th class="text-center">Latitude</th>
                <th class="text-center">Longitude</th>
                <th class="text-center">Phone Number</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($outlets as $index => $outlet)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $outlet->name }}</td>
                <td>{{ $outlet->address }}</td>
                <td class="text-center">{{ $outlet->latitude }}</td>
                <td class="text-center">{{ $outlet->longitude }}</td>
                <td class="text-center">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $outlet->phone_number) }}" target="_blank">
                        {{ $outlet->phone_number }}
                    </a>
                </td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="{{ route('outlets.show', $outlet->id) }}" class="btn" style="background-color: #17a2b8; color: white; padding: 5px 10px; border-radius: 5px; margin: 0 2px;" title="View">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('outlets.edit', $outlet->id) }}" class="btn" style="background-color: #ffc107; color: black; padding: 5px 10px; border-radius: 5px; margin: 0 2px;" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('outlets.destroy', $outlet->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" style="background-color: #dc3545; color: white; padding: 5px 10px; border-radius: 5px; margin: 0 2px;" title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>


            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@push('scripts')
<script>
    $(document).ready(function () {
        $('#outletsTable').DataTable({
            responsive: true,
            language: {
                search: "Search:",
                lengthMenu: "Show _MENU_ entries",
                info: "Showing _START_ to _END_ of _TOTAL_ entries",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                }
            }
        });
    });
</script>
@endpush
@endsection

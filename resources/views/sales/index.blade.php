<x-app-layout title="Sales">
    @push('style')
    @endpush
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Table Sales</h5>
            <a href="{{ route('sales.create') }}" class="btn btn-primary">Add</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Number</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                @foreach ($data as $key => $item)
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $key++ }}</strong></td>
                        <td>{{ $item->number }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->date)->format('d-m-Y') }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    @if (Auth::user()->role == 'superuser')
                                    <a class="dropdown-item" href="{{ route('sales.print', $item->id) }}"
                                        target="_blank"><i class='bx bx-printer me-1'></i>Print</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('sales.edit', ['id' => $item->id]) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <a class="dropdown-item" href="{{ route('sales.detail', ['id' => $item->id]) }}">
                                        <i class="bx bxs-detail me-1"></i> Detail
                                    </a>
                                    <form action="{{ route('sales.destroy', ['id' => $item->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item"
                                            onclick="return confirm('Are you sure you want to delete this item?')">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
    <!--/ Basic Bootstrap Table -->
    @push('JavaScript')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                @if(session('success'))
                    Swal.fire({
                        title: 'Congrats',
                        text: '{{ session('success') }}',
                        icon: 'success',
                    });
                @endif
            });
    </script>
    @endpush
</x-app-layout>
<x-app-layout title="Purchase">
    @push('style')
    @endpush
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Table Purchase</h5>
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
                                    <a class="dropdown-item" href="{{ route('manager.pruchase.print', $item->id) }}"
                                        target="_blank"><i class='bx bx-printer me-1'></i>Print
                                    </a>
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
    @endpush
</x-app-layout>
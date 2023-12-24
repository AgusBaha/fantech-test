<x-app-layout title="Inventory">
    @push('style')
    @endpush
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Table Inventories</h5>
            <a href="{{ route('datainventories.create') }}" class="btn btn-primary">Add</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                @foreach ($data as $key => $value)
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $key++ }}</strong></td>
                        <td>{{ $value->code }}</td>
                        <td>{{ $value->name }}</td>
                        <td>
                            {{ $value->price }}
                        </td>
                        <td>{{ $value->stock }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="{{ route('datainventories.edit', ['id' => $value->id]) }}">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('datainventories.destroy', ['id' => $value->id]) }}"
                                        method="post">
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
    @endpush
</x-app-layout>
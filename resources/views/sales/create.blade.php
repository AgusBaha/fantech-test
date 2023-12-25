<x-app-layout title="Sales Create">
    @push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush

    <!-- Form controls -->
    <div class="col-md">
        <div class="card mb-4">
            <h5 class="card-header">Form Sales</h5>
            <form id="my-form" action="{{ route('sales.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="number" class="form-label">Number</label>
                                <input type="number" class="form-control" id="number" name="number"
                                    placeholder="number.." />
                            </div>
                            <div class="mb-3">
                                @if(Auth::user()->role == 'sales')
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                @else
                                <label for="user_id" class="form-label">User</label>
                                <select class="form-select" id="user_id" name="user_id"
                                    aria-label="Default select example">
                                    <option selected disabled>Open this select user</option>
                                    @foreach ($data_user as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>

                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="date.." />
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn rounded-pill btn-primary">Simpan</button>
                    <a href="{{ route('sales.index') }}" class="btn rounded-pill btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    @push('JavaScript')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
                    $('#user_id').select2({
                        theme: 'bootstrap5',
                    });
                });
    </script>
    @endpush
</x-app-layout>
<x-app-layout title="Purchase Edit">
    @push('style')
    @endpush

    <!-- Form controls -->
    <div class="col-md">
        <div class="card mb-4">
            <h5 class="card-header">Edit Purchase</h5>
            <form id="my-form" action="{{ route('purchase.update', $purchase->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="number" class="form-label">Number</label>
                                <input type="number" class="form-control" id="number" name="number"
                                    placeholder="number.." value="{{ $purchase->number }}" />
                            </div>
                            <div class="mb-3">
                                @if(Auth::user()->role == 'purchase')
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                @else
                                <label for="user_id" class="form-label">User</label>
                                <select class="form-select" id="user_id" name="user_id"
                                    aria-label="Default select example">
                                    <option selected disabled>Open this select user</option>
                                    @foreach ($data_user as $user)
                                    <option value="{{ $user->id }}" {{ $purchase->user_id == $user->id ? 'selected' : ''
                                        }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>

                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" placeholder="date.."
                                    value="{{ $purchase->date }}" />
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn rounded-pill btn-primary">Update</button>
                    <a href="{{ route('purchase.index') }}" class="btn rounded-pill btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    @push('JavaScript')
    @endpush
</x-app-layout>
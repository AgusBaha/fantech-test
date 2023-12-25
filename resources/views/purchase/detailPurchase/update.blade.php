<x-app-layout title="Purchase Details Update">
    @push('style')
    @endpush

    <!-- Form controls -->
    <div class="col-md">
        <div class="card mb-4">
            <h5 class="card-header">Update Purchase Details</h5>
            <form id="my-form" action="{{ route('purchase.detail.update', ['id' => $purchaseDetail->id]) }}"
                method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="row">
                        <input type="hidden" id="number" name="purchase_id" value="{{ $purchase->id }}" />
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="inventories_id" class="form-label">Inventories</label>
                                <select class="form-select" id="inventories_id" name="inventories_id"
                                    aria-label="Default select example">
                                    <option selected disabled>Open this select inventories</option>
                                    @foreach ($data as $inventories)
                                    <option value="{{ $inventories->id }}" @if($inventories->id ==
                                        $purchaseDetail->inventories_id) selected @endif>{{ $inventories->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Qty</label>
                                <input type="number" class="form-control" id="number" name="qty" placeholder="Qty.."
                                    value="{{ $purchaseDetail->qty }}" />
                            </div>

                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="number" class="form-label">Price</label>
                                <input type="number" class="form-control" id="number" name="price" placeholder="Price.."
                                    value="{{ $purchaseDetail->price }}" />
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn rounded-pill btn-primary">Update</button>
                    <a href="{{ route('purchase.index') }}" class="btn rounded-pill btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    @push('JavaScript')
    @endpush
</x-app-layout>
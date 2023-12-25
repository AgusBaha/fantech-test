<x-app-layout title="Purchase Details">
    @push('style')
    @endpush

    <!-- Form controls -->
    <div class="col-md">
        <div class="card mb-4">
            <h5 class="card-header">Form Details</h5>
            <form id="my-form" action="{{ route('purchase.store.detail') }}" method="POST">
                @csrf

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
                                    <option value="{{ $inventories->id }}">{{ $inventories->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Qty</label>
                                <input type="number" class="form-control" id="number" name="qty" placeholder="Qty.." />
                            </div>

                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="number" class="form-label">Price</label>
                                <input type="number" class="form-control" id="number" name="price"
                                    placeholder="Price.." />
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn rounded-pill btn-primary">Simpan</button>
                    <a href="{{ route('purchase.index') }}" class="btn rounded-pill btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    @push('JavaScript')
    @endpush
</x-app-layout>
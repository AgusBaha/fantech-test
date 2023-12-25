<x-app-layout title="Sales Details Update">
    @push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush

    <!-- Form controls -->
    <div class="col-md">
        <div class="card mb-4">
            <h5 class="card-header">Update Sales Details</h5>
            <form id="my-form" action="{{ route('sales.detail.update', ['id' => $salesDetail->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="row">
                        <input type="hidden" id="number" name="sales_id" value="{{ $sales->id }}" />
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="inventories_id" class="form-label">Inventories</label>
                                <select class="form-select" id="inventories_id" name="inventories_id"
                                    aria-label="Default select example">
                                    <option selected disabled>Open this select inventories</option>
                                    @foreach ($data as $inventories)
                                    <option value="{{ $inventories->id }}" @if($inventories->id ==
                                        $salesDetail->inventories_id) selected @endif>{{ $inventories->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Qty</label>
                                <input type="number" class="form-control" id="number" name="qty" placeholder="Qty.."
                                    value="{{ $salesDetail->qty }}" />
                            </div>

                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="number" class="form-label">Price</label>
                                <input type="number" class="form-control" id="number" name="price" placeholder="Price.."
                                    value="{{ $salesDetail->price }}" />
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn rounded-pill btn-primary">Update</button>
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
                    $('#inventories_id').select2({
                        theme: 'bootstrap5',
                    });
                });
    </script>
    @endpush
</x-app-layout>
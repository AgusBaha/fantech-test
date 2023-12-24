<x-app-layout title="Inventories Create">
    @push('style')
    @endpush

    <!-- Form controls -->
    <div class="col-md">
        <div class="card mb-4">
            <h5 class="card-header">Form Inventories</h5>
            <form id="my-form" action="{{ route('datainventories.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="code" class="form-label">Code</label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="code.." />
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="price.." />
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="name.." />
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="text" class="form-control" id="stock" name="stock" placeholder="stock.." />
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn rounded-pill btn-primary">Simpan</button>
                    <a href="{{ route('datainventories') }}" class="btn rounded-pill btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    @push('JavaScript')
    @endpush
</x-app-layout>
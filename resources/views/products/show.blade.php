<x-app-layout>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products /</span> Show</h4>

        <div class="row">

            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header d-flex justify-content-between align-items-center">
                        Product Details
                        <a href="{{ route('products.edit', $product) }}" type="button" class="btn btn-primary">
                            <span class="tf-icons bx bx-edit"></span>&nbsp; Edit
                        </a>
                    </h5>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">NAME</label>
                            <p>{{ $product->name }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">PRICE</label>
                            <p>RM {{ Number::format($product->price, precision: 2) }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">DETAILS</label>
                            <p>{{ $product->details }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">PUBLISH</label>
                            <p>{{ $product->is_published ? 'Yes' : 'No' }}</p>
                        </div>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- / Content -->
</x-app-layout>

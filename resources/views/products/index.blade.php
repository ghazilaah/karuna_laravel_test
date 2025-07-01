<x-app-layout>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Products</h4>

        <div class="card">
            <h5 class="card-header d-flex justify-content-between align-items-center">
                <span>List of Products</span>
                <a href="{{ route('products.create') }}" type="button" class="btn btn-primary">
                    <span class="tf-icons bx bx-plus"></span>&nbsp; Create
                </a>
            </h5>


            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Price (RM)</th>
                        <th>Details</th>
                        <th>Publish</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ Number::format($product->price, precision: 2) }}</td>
                            <td class="text-wrap">{{ $product->details }}</td>
                            <td>
                            <span class="badge {{ $product->is_published ? 'bg-label-primary' : 'bg-label-danger' }} me-1">
                                {{ $product->is_published ? 'Yes' : 'No' }}
                            </span>
                            </td>
                            <td>
                                <a class="" href="{{ route('products.show', $product) }}">
                                    <i class="bx bx-file me-1"></i>Show
                                </a>
                                <a class="" href="{{ route('products.edit', $product) }}">
                                    <i class="bx bx-edit-alt me-1"></i>Edit
                                </a>
                                <a class="" href="javascript:void(0);">
                                    <i class="bx bx-trash me-1"></i>Delete
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No products found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- / Content -->

</x-app-layout>

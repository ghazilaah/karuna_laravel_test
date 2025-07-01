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
                                <div class="">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bx bx-file me-1"></i>Show
                                    </a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="bx bx-edit-alt me-1"></i>Edit
                                    </a>
                                    <button type="button"
                                            class="btn btn-sm btn-outline-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}">
                                        <i class="bx bx-trash me-1"></i>Delete
                                    </button>
                                </div>
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

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-body">
                        Are you sure you want to delete <strong id="productName"></strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Toast -->
    @if(session('success'))
    <div
        class="bs-toast toast toast-placement-ex m-2 bg-primary top-0 end-0"
        id="liveToast"
        role="alert"
        aria-live="assertive"
        aria-atomic="true"
        data-delay="2000"
    >
        <div class="toast-header">
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">{{ session('success') }}</div>
    </div>
    @endif
    <!-- Toast -->

    @push ('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const deleteModal = document.getElementById('deleteModal');

                deleteModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const id = button.getAttribute('data-id');
                    const name = button.getAttribute('data-name');
                    const productName = deleteModal.querySelector('#productName');
                    productName.textContent = name;

                    const form = deleteModal.querySelector('#deleteForm');
                    form.action = '/products/' + id;
                });
            });

            document.addEventListener('DOMContentLoaded', function () {
                const toastEl = document.getElementById('liveToast');
                if (toastEl) {
                    const toast = new bootstrap.Toast(toastEl);
                    toast.show();
                }
            });
        </script>
    @endpush
</x-app-layout>

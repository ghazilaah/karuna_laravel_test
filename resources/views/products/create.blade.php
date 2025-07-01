<x-app-layout>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Products /</span> Create</h4>

        <div class="row">

            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header d-flex justify-content-between align-items-center">
                        Product Details
                    </h5>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="name">NAME</label>
                                <input type="text" name="name" class="form-control @error('name') border-danger @enderror" id="name" placeholder="iPhone 16 Pro Max" value="{{ old('name') }}" />
                                @error('name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="price">PRICE (RM)</label>
                                <input type="number" name="price" class="form-control @error('price') border-danger @enderror" id="price" placeholder="5,900.00" value="{{ old('price') }}" step="0.01" />
                                @error('price')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="details">DETAILS</label>
                                <textarea id="details" name="details" class="form-control @error('details') border-danger @enderror" placeholder="Check out the new iPhone 16 Pro Max.">{{ old('details') }}</textarea>
                                @error('details')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="is_published">PUBLISH</label>
                                <div class="form-check">
                                    <input name="is_published" class="form-check-input @error('is_published') border-danger @enderror" type="radio" value="1" id="is_published_yes" {{ old('is_published') === '1' ? 'checked' : '' }}/>
                                    <label class="form-check-label" for="is_published_yes">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input name="is_published" class="form-check-input @error('is_published') border-danger @enderror" type="radio" value="0" id="is_published_no" {{ old('is_published') === '0' ? 'checked' : '' }}/>
                                    <label class="form-check-label" for="is_published_no">No</label>
                                </div>
                                @error('is_published')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- / Content -->
</x-app-layout>

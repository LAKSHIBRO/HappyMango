@extends('backend.app')

@section('content')
<div class="page-header">
    <h1 class="page-title my-auto">Edit Tour Package</h1>
    <div>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="/admin/dashboard">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/admin/tour-packages">Tour Packages</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form action="/admin/update-tour-package/{{ $tourPackage->id }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-title">Basic Information</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Package Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $tourPackage->name) }}" required>
                            @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="type" class="form-label">Package Type <span class="text-danger">*</span></label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="">Select Package Type</option>
                                <option value="tailor-made" {{ old('type', $tourPackage->type) == 'tailor-made' ? 'selected' : '' }}>Tailor Made</option>
                                <option value="round-tour" {{ old('type', $tourPackage->type) == 'round-tour' ? 'selected' : '' }}>Round Tour</option>
                            </select>
                            @error('type')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Price ($) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $tourPackage->price) }}" step="0.01" min="0" required>
                            @error('price')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="duration" class="form-label">Duration <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration', $tourPackage->duration) }}" required placeholder="e.g. 7 Days / 6 Nights">
                            @error('duration')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="locations" class="form-label">Locations <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="locations" name="locations" value="{{ old('locations', $tourPackage->locations) }}" required placeholder="e.g. Kandy, Galle, Colombo">
                            @error('locations')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" id="category_id" name="category_id">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $tourPackage->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="people_count" class="form-label">Number of People</label>
                            <input type="number" class="form-control" id="people_count" name="people_count" value="{{ old('people_count', $tourPackage->people_count) }}" min="0">
                            @error('people_count')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3 d-flex">
                            <div class="form-check me-4">
                                <input class="form-check-input" type="checkbox" id="featured" name="featured" value="1" {{ old('featured', $tourPackage->featured) ? 'checked' : '' }}>
                                <label class="form-check-label" for="featured">
                                    Featured
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="active" name="active" value="1" {{ old('active', $tourPackage->active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="active">
                                    Active
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="short_description" class="form-label">Short Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="short_description" name="short_description" rows="3" required>{{ old('short_description', $tourPackage->short_description) }}</textarea>
                            @error('short_description')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for="description" class="form-label">Full Description <span class="text-danger">*</span></label>
                            <textarea class="form-control tinymce" id="description" name="description" rows="6">{{ old('description', $tourPackage->description) }}</textarea>
                            @error('description')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for="image" class="form-label">Featured Image</label>
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $tourPackage->image) }}" alt="{{ $tourPackage->name }}" class="img-thumbnail" style="max-height: 200px;">
                            </div>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <small class="form-text text-muted">Leave empty to keep the current image.</small>
                            @error('image')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-title">Gallery Images</div>
                </div>
                <div class="card-body">
                    <div class="col-12 mb-3">
                        <label class="form-label">Current Gallery Images</label>
                        <div class="row">
                            @if($tourPackage->gallery_images && count($tourPackage->gallery_images) > 0)
                                @foreach($tourPackage->gallery_images as $image)
                                <div class="col-md-3 mb-3">
                                    <div class="position-relative">
                                        <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image" class="img-thumbnail" style="height: 150px; width:100%; object-fit: cover;">
                                        <div class="position-absolute top-0 end-0 p-1">
                                            <input type="checkbox" class="form-check-input bg-danger border-danger" name="remove_gallery_images[]" value="{{ $image }}" title="Mark to remove">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p>No gallery images uploaded yet.</p>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="col-12 mb-3">
                        <label for="gallery_images" class="form-label">Add New Gallery Images (Multiple)</label>
                        <input type="file" class="form-control" id="gallery_images" name="gallery_images[]" multiple accept="image/*">
                        <small class="form-text text-muted">Select new images to add them to the gallery. Check the box on existing images to remove them upon update.</small>
                        @error('gallery_images.*')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">Included & Excluded Items</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Included Items</h4>
                            <div id="includedItemsContainer">
                                @foreach($tourPackage->included as $index => $item)
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="included[]" value="{{ $item }}" placeholder="Enter included item" required>
                                    <button class="btn btn-danger remove-item" type="button" {{ count($tourPackage->included) === 1 ? 'disabled' : '' }}>
                                        <i class="fi fi-rr-trash"></i>
                                    </button>
                                </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-success btn-sm" id="addIncludedItem">
                                <i class="fi fi-rr-add"></i> Add Item
                            </button>
                        </div>

                        <div class="col-md-6">
                            <h4>Excluded Items</h4>
                            <div id="excludedItemsContainer">
                                @foreach($tourPackage->excluded as $index => $item)
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="excluded[]" value="{{ $item }}" placeholder="Enter excluded item" required>
                                    <button class="btn btn-danger remove-item" type="button" {{ count($tourPackage->excluded) === 1 ? 'disabled' : '' }}>
                                        <i class="fi fi-rr-trash"></i>
                                    </button>
                                </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-success btn-sm" id="addExcludedItem">
                                <i class="fi fi-rr-add"></i> Add Item
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">Itinerary</div>
                </div>
                <div class="card-body">
                    <div id="itineraryContainer">
                        @foreach($tourPackage->itinerary as $index => $day)
                        <div class="itinerary-item card mb-4">
                            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Day {{ $day->day }}</h5>
                                <button type="button" class="btn btn-sm btn-danger remove-itinerary" {{ count($tourPackage->itinerary) === 1 ? 'disabled' : '' }}>
                                    <i class="fi fi-rr-trash"></i> Remove
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <input type="hidden" name="itinerary[{{$index}}][id]" value="{{ $day->id }}">
                                    <input type="hidden" name="itinerary[{{$index}}][day]" value="{{ $day->day }}" class="day-number">

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="itinerary[{{$index}}][title]" value="{{ $day->title }}" required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Location <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="itinerary[{{$index}}][location]" value="{{ $day->location }}" required>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label">Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control itinerary-description" name="itinerary[{{$index}}][description]" rows="4" required>{{ $day->description }}</textarea>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Image</label>
                                        @if($day->image)
                                        <div class="mb-3">
                                            <img src="{{ asset('storage/' . $day->image) }}" alt="Day {{ $day->day }}" class="img-thumbnail" style="max-height: 150px;">
                                        </div>
                                        @endif
                                        <input type="file" class="form-control itinerary-image" name="itinerary[{{$index}}][image]" accept="image/*">
                                        <small class="form-text text-muted">Leave empty to keep the current image.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <button type="button" class="btn btn-success" id="addItineraryDay">
                        <i class="fi fi-rr-add"></i> Add Another Day
                    </button>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mb-5">
                <a href="/admin/tour-packages" class="btn btn-light">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Tour Package</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // Ensure TinyMCE content is synchronized with textareas before form submission
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function() {
                if (typeof tinymce !== 'undefined') {
                    tinymce.triggerSave();
                }
            });
        }
    });

    // Initialize TinyMCE
    function initTinyMCE(selector = '.tinymce, .itinerary-description') {
        if (typeof tinymce !== 'undefined') {
            tinymce.init({
                selector: selector,
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                height: 200
            });
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        initTinyMCE();
    });

    // Included Items
    const addIncludedBtn = document.getElementById('addIncludedItem');
    const includedContainer = document.getElementById('includedItemsContainer');
    if (addIncludedBtn && includedContainer) {
        addIncludedBtn.addEventListener('click', () => {
            const group = document.createElement('div');
            group.className = 'input-group mb-3';
            group.innerHTML = `
                <input type="text" class="form-control" name="included[]" placeholder="Enter included item" required>
                <button type="button" class="btn btn-danger remove-item">
                    <i class="fi fi-rr-trash"></i>
                </button>
            `;
            includedContainer.appendChild(group);
            updateRemoveButtons(includedContainer);
        });
        includedContainer.addEventListener('click', function (e) {
            if (e.target.closest('.remove-item')) {
                e.target.closest('.input-group').remove();
                updateRemoveButtons(includedContainer);
            }
        });
        function updateRemoveButtons(container) {
            const buttons = container.querySelectorAll('.remove-item');
            buttons.forEach(btn => btn.disabled = (buttons.length <= 1));
        }
        updateRemoveButtons(includedContainer);
    }

    // Excluded Items
    const addExcludedBtn = document.getElementById('addExcludedItem');
    const excludedContainer = document.getElementById('excludedItemsContainer');
    if (addExcludedBtn && excludedContainer) {
        addExcludedBtn.addEventListener('click', () => {
            const group = document.createElement('div');
            group.className = 'input-group mb-3';
            group.innerHTML = `
                <input type="text" class="form-control" name="excluded[]" placeholder="Enter excluded item" required>
                <button type="button" class="btn btn-danger remove-item">
                    <i class="fi fi-rr-trash"></i>
                </button>
            `;
            excludedContainer.appendChild(group);
            updateRemoveButtons(excludedContainer);
        });
        excludedContainer.addEventListener('click', function (e) {
            if (e.target.closest('.remove-item')) {
                e.target.closest('.input-group').remove();
                updateRemoveButtons(excludedContainer);
            }
        });
        function updateRemoveButtons(container) {
            const buttons = container.querySelectorAll('.remove-item');
            buttons.forEach(btn => btn.disabled = (buttons.length <= 1));
        }
        updateRemoveButtons(excludedContainer);
    }

    // Itinerary Days
    const addItineraryBtn = document.getElementById('addItineraryDay');
    const itineraryContainer = document.getElementById('itineraryContainer');
    function updateAllItineraryDays() {
        const items = itineraryContainer.querySelectorAll('.itinerary-item');
        items.forEach((item, i) => {
            // Update day number in heading
            const dayHeading = item.querySelector('h5');
            if (dayHeading) {
                dayHeading.textContent = `Day ${i + 1}`;
            }
            // Update hidden day input value
            const dayInput = item.querySelector('.day-number');
            if (dayInput) {
                dayInput.value = i + 1;
                dayInput.name = `itinerary[${i}][day]`;
            }
            // Update all input and textarea names
            item.querySelectorAll('input:not(.day-number), textarea').forEach(el => {
                if (el.name) {
                    const fieldMatch = el.name.match(/\[\d+\]\[([^\]]+)\]/);
                    if (fieldMatch && fieldMatch[1]) {
                        const fieldType = fieldMatch[1];
                        el.name = `itinerary[${i}][${fieldType}]`;
                    }
                }
            });
            // Enable/disable remove buttons based on total count
            const removeBtn = item.querySelector('.remove-itinerary');
            if (removeBtn) {
                removeBtn.disabled = (items.length <= 1);
            }
        });
    }
    if (addItineraryBtn && itineraryContainer) {
        addItineraryBtn.addEventListener('click', () => {
            const items = itineraryContainer.querySelectorAll('.itinerary-item');
            if (items.length === 0) return;
            const lastItem = items[items.length - 1];
            const newItem = lastItem.cloneNode(true);
            const newIndex = items.length;
            // Clear all input values and update names
            newItem.querySelectorAll('input:not(.day-number), textarea').forEach(el => {
                if (el.name) {
                    const fieldMatch = el.name.match(/\[\d+\]\[([^\]]+)\]/);
                    if (fieldMatch && fieldMatch[1]) {
                        const fieldType = fieldMatch[1];
                        el.name = `itinerary[${newIndex}][${fieldType}]`;
                        if (el.type === 'file') el.value = '';
                        if (el.type === 'text' || el.tagName === 'TEXTAREA') el.value = '';
                    }
                }
            });
            // Remove image preview if present
            const img = newItem.querySelector('img');
            if (img) img.remove();
            itineraryContainer.appendChild(newItem);
            updateAllItineraryDays();
            // Re-initialize TinyMCE for new textarea
            setTimeout(() => {
                initTinyMCE('textarea[name="itinerary[' + newIndex + '][description]"]');
            }, 0);
        });
        itineraryContainer.addEventListener('click', function(e) {
            const removeBtn = e.target.closest('.remove-itinerary');
            if (!removeBtn) return;
            const itemToRemove = removeBtn.closest('.itinerary-item');
            const items = itineraryContainer.querySelectorAll('.itinerary-item');
            if (items.length <= 1) {
                alert('At least one itinerary day is required.');
                return;
            }
            itemToRemove.remove();
            updateAllItineraryDays();
        });
        updateAllItineraryDays();
    }
</script>
@endpush
@extends('backend.app')

@section('content')
<div class="page-header">
    <h1 class="page-title my-auto">Add New Tour Package</h1>
    <div>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="/admin/dashboard">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/admin/tour-packages">Tour Packages</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Add New</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-12">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4">
            <i class="fi fi-rr-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4">
            <i class="fi fi-rr-exclamation-triangle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-4">
            <i class="fi fi-rr-exclamation-triangle me-2"></i>Please fix the following errors:
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="/admin/save-tour-package" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-title">Basic Information</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Package Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="type" class="form-label">Package Type <span class="text-danger">*</span></label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="">Select Package Type</option>
                                <option value="tailor-made" {{ old('type') == 'tailor-made' ? 'selected' : '' }}>Tailor Made</option>
                                <option value="round-tour" {{ old('type') == 'round-tour' ? 'selected' : '' }}>Round Tour</option>
                            </select>
                            @error('type')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="price" class="form-label">Price ($) <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
                            @error('price')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="duration" class="form-label">Duration <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="duration" name="duration" placeholder="e.g. 5 Days / 4 Nights" value="{{ old('duration') }}" required>
                            @error('duration')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="locations" class="form-label">Locations <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="locations" name="locations" placeholder="e.g. Kandy | Colombo | Galle" value="{{ old('locations') }}" required>
                            @error('locations')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" id="category_id" name="category_id">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="people_count" class="form-label">Number of People</label>
                            <input type="number" class="form-control" id="people_count" name="people_count" value="{{ old('people_count', 0) }}" min="0">
                            @error('people_count')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3 d-flex align-items-end">
                            <div class="form-check me-4">
                                <input class="form-check-input" type="checkbox" id="featured" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                                <label class="form-check-label" for="featured" style="color: white">
                                    Featured
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="active" name="active" value="1" {{ old('active', '1') ? 'checked' : '' }}>
                                <label class="form-check-label" for="active" style="color: white">
                                    Active
                                </label>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <label for="short_description" class="form-label">Short Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="short_description" name="short_description" rows="3" required>{{ old('short_description') }}</textarea>
                            @error('short_description')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <label for="description" class="form-label">Full Description <span class="text-danger">*</span></label>
                            <textarea class="form-control tinymce" id="description" name="description" rows="6">{{ old('description') }}</textarea>
                            @error('description')
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
                        <label for="gallery_images" class="form-label">Gallery Images (Multiple)</label>
                        <input type="file" class="form-control" id="gallery_images" name="gallery_images[]" multiple accept="image/*">
                        @error('gallery_images.*')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-title">Featured Image</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="image" class="form-label">Package Image <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                                <div class="form-text">Recommended size: 1200px x 800px</div>
                                @error('image')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <img id="imagePreview" src="#" alt="Preview" style="max-width: 300px; max-height: 200px; display: none;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-title">Included/Excluded</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label">Included Items <span class="text-danger">*</span></label>
                            @error('included')
                            <div class="alert alert-danger py-2">{{ $message }}</div>
                            @enderror
                            @error('included.*')
                            <div class="alert alert-danger py-2">{{ $message }}</div>
                            @enderror

                            <div id="includedItemsContainer">
                                @forelse(old('included', [null]) as $key => $value)
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="included[]" placeholder="E.g. Airport pickup and drop-off" value="{{ $value }}" required>
                                        <button type="button" class="btn btn-danger remove-item" {{ $loop->first && $loop->count == 1 ? 'disabled' : '' }}>
                                            <i class="fi fi-rr-trash"></i>
                                        </button>
                                    </div>
                                @empty
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="included[]" placeholder="E.g. Airport pickup and drop-off" required>
                                        <button type="button" class="btn btn-danger remove-item" disabled>
                                            <i class="fi fi-rr-trash"></i>
                                        </button>
                                    </div>
                                @endforelse
                            </div>
                            <button type="button" class="btn btn-sm btn-success mt-2" id="addIncludedItem">
                                <i class="fi fi-rr-add"></i> Add Another Item
                            </button>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Excluded Items <span class="text-danger">*</span></label>
                            @error('excluded')
                            <div class="alert alert-danger py-2">{{ $message }}</div>
                            @enderror
                            @error('excluded.*')
                            <div class="alert alert-danger py-2">{{ $message }}</div>
                            @enderror

                            <div id="excludedItemsContainer">
                                @forelse(old('excluded', [null]) as $key => $value)
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="excluded[]" placeholder="E.g. Personal expenses" value="{{ $value }}" required>
                                        <button type="button" class="btn btn-danger remove-item" {{ $loop->first && $loop->count == 1 ? 'disabled' : '' }}>
                                            <i class="fi fi-rr-trash"></i>
                                        </button>
                                    </div>
                                @empty
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="excluded[]" placeholder="E.g. Personal expenses" required>
                                        <button type="button" class="btn btn-danger remove-item" disabled>
                                            <i class="fi fi-rr-trash"></i>
                                        </button>
                                    </div>
                                @endforelse
                            </div>
                            <button type="button" class="btn btn-sm btn-success mt-2" id="addExcludedItem">
                                <i class="fi fi-rr-add"></i> Add Another Item
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
                    <div class="alert alert-info mb-3">
                        <i class="fi fi-rr-info-circle me-2"></i>
                        Create a day-by-day itinerary for your tour package. Each day should include a title, location, and description of activities. You can add as many days as needed.
                    </div>

                    @error('itinerary')
                    <div class="alert alert-danger py-2 mb-3">{{ $message }}</div>
                    @enderror
                    @error('itinerary.*')
                    <div class="alert alert-danger py-2 mb-3">{{ $message }}</div>
                    @enderror

                    <div id="itineraryContainer">
                        @if(old('itinerary'))
                            @foreach(old('itinerary') as $index => $day)
                                <div class="itinerary-item card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #02515A 0%, #086571 100%); border-bottom: 0;">
                                        <div class="d-flex align-items-center">
                                            <div class="day-badge me-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: rgba(255,255,255,0.2); border-radius: 50%;">
                                                <span class="text-white fw-bold">{{ $day['day'] ?? ($index + 1) }}</span>
                                            </div>
                                            <div>
                                                <h5 class="mb-0 text-white fw-bold"><i class="fi fi-rr-calendar-day me-2"></i> Day {{ $day['day'] ?? ($index + 1) }}</h5>
                                                <small class="text-white-50">Itinerary Details</small>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-danger remove-itinerary" {{ $loop->first && $loop->count == 1 ? 'disabled' : '' }} style="background-color: rgba(220, 53, 69, 0.8); border: none; backdrop-filter: blur(5px);">
                                            <i class="fi fi-rr-trash me-1"></i> Remove Day
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <input type="hidden" name="itinerary[{{ $index }}][day]" value="{{ $day['day'] ?? ($index + 1) }}" class="day-number">

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Title <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="itinerary[{{ $index }}][title]" value="{{ $day['title'] ?? '' }}" required>
                                                @error("itinerary.$index.title")
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Location <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="itinerary[{{ $index }}][location]" value="{{ $day['location'] ?? '' }}" required>
                                                @error("itinerary.$index.location")
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-12 mb-3">
                                                <label class="form-label">Description <span class="text-danger">*</span></label>
                                                <textarea id="itinerary-description-{{ $index }}-{{ time() }}" class="form-control itinerary-description" name="itinerary[{{ $index }}][description]" rows="4" required>{{ $day['description'] ?? '' }}</textarea>
                                                @error("itinerary.$index.description")
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="itinerary-item card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #02515A 0%, #086571 100%); border-bottom: 0;">
                                    <div class="d-flex align-items-center">
                                        <div class="day-badge me-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px; background: rgba(255,255,255,0.2); border-radius: 50%;">
                                            <span class="text-white fw-bold">1</span>
                                        </div>
                                        <div>
                                            <h5 class="mb-0 text-white fw-bold"><i class="fi fi-rr-calendar-day me-2"></i> Day 1</h5>
                                            <small class="text-white-50">Itinerary Details</small>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-danger remove-itinerary" disabled style="background-color: rgba(220, 53, 69, 0.8); border: none; backdrop-filter: blur(5px);">
                                        <i class="fi fi-rr-trash me-1"></i> Remove Day
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="itinerary[0][day]" value="1" class="day-number">

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Title <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="itinerary[0][title]" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Location <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="itinerary[0][location]" required>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea id="itinerary-description-1-{{ time() }}" class="form-control itinerary-description" name="itinerary[0][description]" rows="4" required></textarea>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Image (Optional)</label>
                                            <input type="file" class="form-control itinerary-image" name="itinerary[0][image]" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <button type="button" class="btn btn-success" id="addItineraryDay">
                        <i class="fi fi-rr-add"></i> Add Another Day
                    </button>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mb-5">
                <a href="/admin/tour-packages" class="btn btn-light">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Tour Package</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/tour-package-form.js') }}"></script>
<script>
    // Ensure TinyMCE content is synchronized with textareas before form submission
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function() {
                if (typeof tinymce !== 'undefined') {
                    tinymce.triggerSave();
                    console.log('TinyMCE content synchronized before form submission');
                }
            });
        }
    });
</script>
@endsection
@section('css')
<style>
    /* Itinerary item styles */
    .itinerary-item {
        transition: all 0.3s ease;
        border: none !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.07);
        overflow: hidden;
        border-radius: 8px !important;
    }

    .itinerary-item:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        transform: translateY(-2px);
    }

    .itinerary-item .card-header {
        padding: 1rem 1.25rem;
        position: relative;
        overflow: hidden;
    }

    .itinerary-item .card-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: url('data:image/svg+xml,<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M0 0 L10 10 L0 20 Z" fill="rgba(255,255,255,0.05)"/><path d="M20 0 L10 10 L20 20 Z" fill="rgba(255,255,255,0.05)"/></svg>') repeat;
        opacity: 0.5;
    }

    .day-badge {
        border: 2px solid rgba(255,255,255,0.3);
        box-shadow: 0 3px 8px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
        font-size: 1.1rem;
    }

    .itinerary-item:hover .day-badge {
        transform: scale(1.1);
        box-shadow: 0 5px 12px rgba(0,0,0,0.3);
    }

    /* Animation for new items */
    .itinerary-item.border-primary {
        animation: highlightBorder 2s;
    }

    @keyframes highlightBorder {
        0% { box-shadow: 0 0 0 3px #02515A; }
        100% { box-shadow: 0 2px 10px rgba(0,0,0,0.07); }
    }

    /* Fix for the file input */
    input[type="file"].form-control {
        padding: 0.375rem 0.75rem;
    }

    /* Make "Add Another Day" button more prominent */
    #addItineraryDay {
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #02515A 0%, #086571 100%);
        border: none;
        box-shadow: 0 4px 10px rgba(2, 81, 90, 0.2);
        padding: 0.5rem 1.5rem;
    }

    #addItineraryDay:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(2, 81, 90, 0.3);
    }

    #addItineraryDay:active {
        transform: translateY(0);
        box-shadow: 0 2px 5px rgba(2, 81, 90, 0.2);
    }

    /* Professional form styling */
    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(2, 81, 90, 0.25);
        border-color: #02515A;
    }

    /* Remove itinerary button styling */
    .remove-itinerary {
        transition: all 0.2s ease;
    }

    .remove-itinerary:hover:not(:disabled) {
        background-color: rgba(220, 53, 69, 1) !important;
        transform: translateY(-1px);
        box-shadow: 0 3px 8px rgba(0,0,0,0.15);
    }

    /* Itinerary container spacing */
    #itineraryContainer {
        margin-bottom: 2rem;
    }
</style>
@endsection
<script>
document.addEventListener("DOMContentLoaded", function() {

    //excluded items
    const addBtn = document.getElementById('addExcludedItem');
    const container = document.getElementById('excludedItemsContainer');

    addBtn.addEventListener('click', () => {
        alert('Please note that the excluded items are optional. You can leave them blank if not applicable.');
        const group = document.createElement('div');
        group.className = 'input-group mb-2';
        group.innerHTML = `
            <input type="text" class="form-control" name="excluded[]" placeholder="E.g. Personal expenses" required>
            <button type="button" class="btn btn-danger remove-item">
                <i class="fi fi-rr-trash"></i>
            </button>
        `;
        container.appendChild(group);
    });

    container.addEventListener('click', function (e) {
        if (e.target.closest('.remove-item')) {
            e.target.closest('.input-group').remove();
        }
    });

    //included items
    const addIncludedBtn = document.getElementById('addIncludedItem');
    const includedContainer = document.getElementById('includedItemsContainer');

    addIncludedBtn.addEventListener('click', () => {
        const group = document.createElement('div');
        group.className = 'input-group mb-2';
        group.innerHTML = `
            <input type="text" class="form-control" name="included[]" placeholder="E.g. Personal expenses" required>
            <button type="button" class="btn btn-danger remove-item">
                <i class="fi fi-rr-trash"></i>
            </button>
        `;
        includedContainer.appendChild(group);
    });

    includedContainer.addEventListener('click', function (e) {
        if (e.target.closest('.remove-item')) {
            e.target.closest('.input-group').remove();
        }
    });


    // Improved itinerary days functionality
    const addItineraryBtn = document.getElementById('addItineraryDay');
    const itineraryContainer = document.getElementById('itineraryContainer');

    // Add visual feedback for better UX
    function addVisualFeedback(element, className, duration = 1000) {
        element.classList.add(className);
        setTimeout(() => {
            element.classList.remove(className);
        }, duration);
    }

    // Update all itinerary days (numbers and field names)
    function updateAllItineraryDays() {
        const items = itineraryContainer.querySelectorAll('.itinerary-item');

        // Update each item
        items.forEach((item, i) => {
            // Update day number in heading
            const dayHeading = item.querySelector('h5');
            if (dayHeading) {
                dayHeading.innerHTML = `<i class="fi fi-rr-calendar-day me-2"></i> Day ${i + 1}`;
            }

            // Update day badge number
            const dayBadge = item.querySelector('.day-badge span');
            if (dayBadge) {
                dayBadge.textContent = i + 1;
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
                    // Get the field type (title, location, description, image)
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

    // Add new itinerary day
    addItineraryBtn.addEventListener('click', () => {
        try {
            // Get existing items
            const items = itineraryContainer.querySelectorAll('.itinerary-item');
            if (items.length === 0) {
                console.error('No itinerary items found');
                return;
            }

            // Clone last item
            const lastItem = items[items.length - 1];
            const newItem = lastItem.cloneNode(true);
            const newIndex = items.length;

            // Visual preparation
            newItem.style.opacity = '0';
            newItem.style.transform = 'translateY(20px)';
            newItem.style.transition = 'all 0.3s ease-in-out';

            // Update day number in heading
            const dayHeading = newItem.querySelector('h5');
            if (dayHeading) {
                dayHeading.textContent = `Day ${newIndex + 1}`;
            }

            // Update hidden day input value
            const dayInput = newItem.querySelector('.day-number');
            if (dayInput) {
                dayInput.value = newIndex + 1;
                dayInput.name = `itinerary[${newIndex}][day]`;
            }

            // Enable remove button
            const removeBtn = newItem.querySelector('.remove-itinerary');
            if (removeBtn) {
                removeBtn.disabled = false;
            }

            // Clear all input values and update names
            newItem.querySelectorAll('input:not(.day-number), textarea').forEach(el => {
                if (el.name) {
                    // Get the field type (title, location, description, image)
                    const fieldMatch = el.name.match(/\[\d+\]\[([^\]]+)\]/);
                    if (fieldMatch && fieldMatch[1]) {
                        const fieldType = fieldMatch[1];
                        el.name = `itinerary[${newIndex}][${fieldType}]`;

                        // Clear values
                        if (el.type === 'file') el.value = '';
                        if (el.type === 'text' || el.tagName === 'TEXTAREA') el.value = '';
                    }
                }
            });

            // Create a unique ID for the textarea
            const textarea = newItem.querySelector('.itinerary-description');
            if (textarea) {
                textarea.id = `itinerary-description-${newIndex + 1}-${Date.now()}`;
            }

            // Append to container
            itineraryContainer.appendChild(newItem);

            // Animate in
            setTimeout(() => {
                newItem.style.opacity = '1';
                newItem.style.transform = 'translateY(0)';

                // Add highlight effect
                setTimeout(() => {
                    addVisualFeedback(newItem, 'border-primary');
                }, 300);
            }, 10);

            // Scroll into view
            newItem.scrollIntoView({ behavior: 'smooth', block: 'center' });

            // Update all itinerary days to ensure consistency
            updateAllItineraryDays();

            // Add visual feedback to the Add button
            addVisualFeedback(addItineraryBtn, 'btn-info');

        } catch (error) {
            console.error('Error adding itinerary day:', error);
        }
    });

    // Remove itinerary day with improved handling
    itineraryContainer.addEventListener('click', function(e) {
        const removeBtn = e.target.closest('.remove-itinerary');
        if (!removeBtn) return; // Not clicking on a remove button

        try {
            const itemToRemove = removeBtn.closest('.itinerary-item');
            const items = itineraryContainer.querySelectorAll('.itinerary-item');

            // Don't allow removing the last item
            if (items.length <= 1) {
                alert('At least one itinerary day is required.');
                return;
            }

            // Add animation
            itemToRemove.style.transition = 'all 0.3s ease';
            itemToRemove.style.opacity = '0';
            itemToRemove.style.transform = 'translateY(20px)';

            // Remove after animation completes
            setTimeout(() => {
                itemToRemove.remove();
                // Update all remaining days
                updateAllItineraryDays();
            }, 300);

        } catch (error) {
            console.error('Error removing itinerary day:', error);
        }
    });
</script>

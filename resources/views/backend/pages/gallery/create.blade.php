@extends('backend.app')

@section('content')
<div class="page-header">
    <h1 class="page-title my-auto">Add New Gallery Item</h1>
    <div>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="/admin/dashboard">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/admin/gallery">Gallery</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Add New</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <form action="{{ url('/admin/save-gallery') }}" method="POST" enctype="multipart/form-data" id="createAlbumForm">
            @csrf
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Gallery Item Details</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="albumTitle" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="albumTitle" name="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="albumCaption" class="form-label">Caption</label>
                            <textarea class="form-control" id="albumCaption" name="caption" rows="3">{{ old('caption') }}</textarea>
                            @error('caption')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="albumImage" class="form-label">Image <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="albumImage" name="image" accept="image/*" required>
                            <img id="imagePreview" src="#" alt="Preview" class="img-thumbnail mt-2" style="display:none; max-height: 200px;"/>
                            @error('image')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="albumCategory" class="form-label">Category <span class="text-danger">*</span></label>
                            <select id="albumCategory" name="category_id" class="form-select" required>
                                <option value="" disabled selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="albumVisibility" class="form-label">Visibility <span class="text-danger">*</span></label>
                            <select id="albumVisibility" name="status_id" class="form-select" required>
                                <option value="1" {{ old('status_id', '1') == '1' ? 'selected' : '' }}>Show</option>
                                <option value="0" {{ old('status_id') == '0' ? 'selected' : '' }}>Hide</option>
                            </select>
                            @error('status_id')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer d-flex justify-content-end gap-2 mt-3">
                <a href="{{ url('/admin/gallery') }}" class="btn btn-light">Cancel</a>
                <button id="albumSaveBtn" type="submit" class="btn btn-primary">Upload Gallery Item</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('albumImage').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            const preview = document.getElementById('imagePreview');
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            document.getElementById('imagePreview').style.display = 'none';
        }
    });

    // Auto-generate slug from title (optional, if you add slug field back)
    // document.getElementById('albumTitle').addEventListener('input', function() {
    //     let title = this.value;
    //     let slug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
    //     document.getElementById('albumSlug').value = slug; // Assuming you have an albumSlug input
    // });
</script>
@endpush
@endsection

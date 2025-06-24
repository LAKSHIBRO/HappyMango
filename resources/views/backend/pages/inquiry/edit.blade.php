@extends('backend.app')

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Edit Inquiry</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="fe fe-home mr-2 fs-14"></i>Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.inquiries') }}">Inquiries</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Inquiry #{{ $inquiry->id }}</li>
        </ol>
    </div>
    <div class="page-rightheader">
        <a href="{{ route('admin.inquiries') }}" class="btn btn-secondary">
            <i class="fi fi-rr-arrow-left"></i> Back to Inquiries
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Inquiry Information</h3>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <form action="{{ route('admin.inquiry.update', $inquiry->id) }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Customer Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       value="{{ old('name', $inquiry->name) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="{{ old('email', $inquiry->email) }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone" 
                                       value="{{ old('phone', $inquiry->phone) }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Travel Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date" name="date" 
                                       value="{{ old('date', $inquiry->date->format('Y-m-d')) }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="adults">Number of Adults <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="adults" name="adults" 
                                       value="{{ old('adults', $inquiry->adults) }}" min="1" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="children">Number of Children</label>
                                <input type="number" class="form-control" id="children" name="children" 
                                       value="{{ old('children', $inquiry->children) }}" min="0">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tour_id">Tour Package <span class="text-danger">*</span></label>
                        <select class="form-control" id="tour_id" name="tour_id" required>
                            <option value="">Select a tour package</option>
                            @foreach(\App\Models\TourPackage::where('active', true)->orderBy('name')->get() as $package)
                                <option value="{{ $package->id }}" 
                                        {{ old('tour_id', $inquiry->tour_id) == $package->id ? 'selected' : '' }}>
                                    {{ $package->name }} ({{ ucfirst($package->type) }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="new" {{ old('status', $inquiry->status) == 'new' ? 'selected' : '' }}>New</option>
                            <option value="processing" {{ old('status', $inquiry->status) == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="responded" {{ old('status', $inquiry->status) == 'responded' ? 'selected' : '' }}>Responded</option>
                            <option value="confirmed" {{ old('status', $inquiry->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="cancelled" {{ old('status', $inquiry->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4">{{ old('message', $inquiry->message) }}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fi fi-rr-disk"></i> Update Inquiry
                        </button>
                        <a href="{{ route('admin.inquiries') }}" class="btn btn-secondary">
                            <i class="fi fi-rr-cross"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Form validation
    $('form').submit(function() {
        var isValid = true;
        
        // Check required fields
        $('input[required], select[required]').each(function() {
            if (!$(this).val()) {
                $(this).addClass('is-invalid');
                isValid = false;
            } else {
                $(this).removeClass('is-invalid');
            }
        });
        
        // Email validation
        var email = $('#email').val();
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email && !emailRegex.test(email)) {
            $('#email').addClass('is-invalid');
            isValid = false;
        }
        
        if (!isValid) {
            toastr.error('Please fill in all required fields correctly.');
            return false;
        }
    });
});
</script>
@endpush 
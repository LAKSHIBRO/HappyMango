@extends('backend.app')

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Create New Inquiry</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="fe fe-home mr-2 fs-14"></i>Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.inquiries') }}">Inquiries</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create New</li>
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
                <h3 class="card-title">New Inquiry Information</h3>
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

                <form action="{{ route('admin.inquiry.store') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Customer Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="{{ old('email') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone" 
                                       value="{{ old('phone') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Travel Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="date" name="date" 
                                       value="{{ old('date') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="adults">Number of Adults <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="adults" name="adults" 
                                       value="{{ old('adults', 1) }}" min="1" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="children">Number of Children</label>
                                <input type="number" class="form-control" id="children" name="children" 
                                       value="{{ old('children', 0) }}" min="0">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tour_id">Tour Package <span class="text-danger">*</span></label>
                        <select class="form-control" id="tour_id" name="tour_id" required>
                            <option value="">Select a tour package</option>
                            @foreach(\App\Models\TourPackage::where('active', true)->orderBy('name')->get() as $package)
                                <option value="{{ $package->id }}" 
                                        {{ old('tour_id') == $package->id ? 'selected' : '' }}>
                                    {{ $package->name }} ({{ ucfirst($package->type) }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="new" {{ old('status', 'new') == 'new' ? 'selected' : '' }}>New</option>
                            <option value="processing" {{ old('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="responded" {{ old('status') == 'responded' ? 'selected' : '' }}>Responded</option>
                            <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4">{{ old('message') }}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="fi fi-rr-disk"></i> Create Inquiry
                        </button>
                        <a href="{{ route('admin.inquiries') }}" class="btn btn-secondary">
                            <i class="fi fi-rr-cross"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Available Tour Packages</h3>
            </div>
            <div class="card-body">
                <div class="list-group">
                    @foreach(\App\Models\TourPackage::where('active', true)->orderBy('name')->take(5)->get() as $package)
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">{{ $package->name }}</h6>
                                <small class="text-muted">{{ ucfirst($package->type) }}</small>
                            </div>
                            <p class="mb-1">{{ $package->duration }} • ${{ number_format($package->price, 2) }}</p>
                            <small class="text-muted">{{ $package->locations }}</small>
                        </div>
                    @endforeach
                </div>
                
                @if(\App\Models\TourPackage::where('active', true)->count() > 5)
                    <div class="text-center mt-3">
                        <small class="text-muted">
                            Showing 5 of {{ \App\Models\TourPackage::where('active', true)->count() }} packages
                        </small>
                    </div>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Quick Tips</h3>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fi fi-rr-info text-info"></i>
                        <small>All fields marked with * are required</small>
                    </li>
                    <li class="mb-2">
                        <i class="fi fi-rr-calendar text-warning"></i>
                        <small>Travel date should be in the future</small>
                    </li>
                    <li class="mb-2">
                        <i class="fi fi-rr-users text-success"></i>
                        <small>At least one adult is required</small>
                    </li>
                    <li class="mb-2">
                        <i class="fi fi-rr-plane text-primary"></i>
                        <small>Select an active tour package</small>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Set default date to tomorrow
    if (!$('#date').val()) {
        var tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        $('#date').val(tomorrow.toISOString().split('T')[0]);
    }
    
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
        
        // Date validation
        var selectedDate = new Date($('#date').val());
        var today = new Date();
        today.setHours(0, 0, 0, 0);
        if (selectedDate < today) {
            $('#date').addClass('is-invalid');
            toastr.error('Travel date must be in the future.');
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
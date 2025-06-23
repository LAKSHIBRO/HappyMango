@extends('backend.app')

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Inquiry Details</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="fe fe-home mr-2 fs-14"></i>Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.inquiries') }}">Inquiries</a></li>
            <li class="breadcrumb-item active" aria-current="page">Inquiry #{{ $inquiry->id }}</li>
        </ol>
    </div>
    <div class="page-rightheader">
        <a href="{{ route('admin.inquiries') }}" class="btn btn-secondary">
            <i class="fi fi-rr-arrow-left"></i> Back to Inquiries
        </a>
        <a href="{{ route('admin.inquiry.edit', $inquiry->id) }}" class="btn btn-warning">
            <i class="fi fi-rr-edit"></i> Edit Inquiry
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Customer Information</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Name:</strong></td>
                                <td>{{ $inquiry->name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td><a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Phone:</strong></td>
                                <td><a href="tel:{{ $inquiry->phone }}">{{ $inquiry->phone }}</a></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Travel Date:</strong></td>
                                <td>{{ $inquiry->date->format('F d, Y') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Adults:</strong></td>
                                <td>{{ $inquiry->adults }}</td>
                            </tr>
                            <tr>
                                <td><strong>Children:</strong></td>
                                <td>{{ $inquiry->children ?? 0 }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                @if($inquiry->message)
                <div class="row mt-3">
                    <div class="col-12">
                        <h5>Message:</h5>
                        <div class="alert alert-info">
                            {{ $inquiry->message }}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tour Package Information</h3>
            </div>
            <div class="card-body">
                @if($inquiry->tourPackage)
                    <div class="row">
                        <div class="col-md-4">
                            @if($inquiry->tourPackage->image)
                                <img src="{{ asset('storage/' . $inquiry->tourPackage->image) }}" 
                                     alt="{{ $inquiry->tourPackage->name }}" 
                                     class="img-fluid rounded">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <span class="text-muted">No Image</span>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h4>{{ $inquiry->tourPackage->name }}</h4>
                            <p class="text-muted">{{ ucfirst($inquiry->tourPackage->type) }} Package</p>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Duration:</strong> {{ $inquiry->tourPackage->duration }}</p>
                                    <p><strong>Price:</strong> ${{ number_format($inquiry->tourPackage->price, 2) }}</p>
                                    <p><strong>People Count:</strong> {{ $inquiry->tourPackage->people_count ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Locations:</strong> {{ $inquiry->tourPackage->locations }}</p>
                                    <p><strong>Category:</strong> 
                                        @if($inquiry->tourPackage->category)
                                            {{ $inquiry->tourPackage->category->name }}
                                        @else
                                            N/A
                                        @endif
                                    </p>
                                    <p><strong>Featured:</strong> 
                                        <span class="badge badge-{{ $inquiry->tourPackage->featured ? 'success' : 'secondary' }}">
                                            {{ $inquiry->tourPackage->featured ? 'Yes' : 'No' }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="mt-3">
                                <a href="{{ route('admin.tour_package.edit', $inquiry->tourPackage->id) }}" 
                                   class="btn btn-sm btn-info">
                                    <i class="fi fi-rr-edit"></i> View Package Details
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    @if($inquiry->tourPackage->short_description)
                    <div class="row mt-3">
                        <div class="col-12">
                            <h5>Package Description:</h5>
                            <p>{{ $inquiry->tourPackage->short_description }}</p>
                        </div>
                    </div>
                    @endif
                @else
                    <div class="alert alert-warning">
                        <i class="fi fi-rr-exclamation"></i>
                        The tour package associated with this inquiry could not be found. It may have been deleted.
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Inquiry Status</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label><strong>Current Status:</strong></label>
                    <select class="form-control status-select" data-inquiry-id="{{ $inquiry->id }}">
                        <option value="new" {{ $inquiry->status == 'new' ? 'selected' : '' }}>New</option>
                        <option value="processing" {{ $inquiry->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="responded" {{ $inquiry->status == 'responded' ? 'selected' : '' }}>Responded</option>
                        <option value="confirmed" {{ $inquiry->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="cancelled" {{ $inquiry->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                
                <div class="mt-3">
                    <p><strong>Inquiry ID:</strong> #{{ $inquiry->id }}</p>
                    <p><strong>Created:</strong> {{ $inquiry->created_at->format('F d, Y \a\t g:i A') }}</p>
                    <p><strong>Last Updated:</strong> {{ $inquiry->updated_at->format('F d, Y \a\t g:i A') }}</p>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Quick Actions</h3>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="mailto:{{ $inquiry->email }}?subject=Re: Inquiry #{{ $inquiry->id }}" 
                       class="btn btn-primary">
                        <i class="fi fi-rr-envelope"></i> Send Email
                    </a>
                    <a href="tel:{{ $inquiry->phone }}" class="btn btn-success">
                        <i class="fi fi-rr-phone-call"></i> Call Customer
                    </a>
                    <a href="{{ route('admin.inquiry.edit', $inquiry->id) }}" class="btn btn-warning">
                        <i class="fi fi-rr-edit"></i> Edit Inquiry
                    </a>
                    <button type="button" class="btn btn-danger delete-inquiry" data-id="{{ $inquiry->id }}">
                        <i class="fi fi-rr-trash"></i> Delete Inquiry
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this inquiry? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Status update
    $('.status-select').change(function() {
        const inquiryId = $(this).data('inquiry-id');
        const newStatus = $(this).val();
        
        $.ajax({
            url: `/admin/inquiry/${inquiryId}/status`,
            method: 'POST',
            data: {
                status: newStatus,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    toastr.success(response.message);
                }
            },
            error: function() {
                toastr.error('Failed to update status');
                location.reload();
            }
        });
    });

    // Delete confirmation
    $('.delete-inquiry').click(function() {
        const inquiryId = $(this).data('id');
        const deleteUrl = `/admin/inquiry/${inquiryId}/delete`;
        
        $('#deleteForm').attr('action', deleteUrl);
        $('#deleteModal').modal('show');
    });
});
</script>
@endpush 
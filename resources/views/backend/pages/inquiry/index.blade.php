@extends('backend.app')

@section('content')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title mb-0">Tour Inquiries</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="fe fe-home mr-2 fs-14"></i>Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Inquiries</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="mt-0 text-left">
                            <span class="fs-20 font-weight-semibold">{{ $totalInquiries }}</span>
                            <p class="text-muted mt-1 mb-0">Total Inquiries</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="icon1 bg-primary my-auto float-right">
                            <i class="fi fi-rr-envelope"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="mt-0 text-left">
                            <span class="fs-20 font-weight-semibold">{{ $newInquiries }}</span>
                            <p class="text-muted mt-1 mb-0">New Inquiries</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="icon1 bg-warning my-auto float-right">
                            <i class="fi fi-rr-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="mt-0 text-left">
                            <span class="fs-20 font-weight-semibold">{{ $processingInquiries }}</span>
                            <p class="text-muted mt-1 mb-0">Processing</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="icon1 bg-info my-auto float-right">
                            <i class="fi fi-rr-refresh"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div class="mt-0 text-left">
                            <span class="fs-20 font-weight-semibold">{{ $confirmedInquiries }}</span>
                            <p class="text-muted mt-1 mb-0">Confirmed</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="icon1 bg-success my-auto float-right">
                            <i class="fi fi-rr-check"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Inquiries</h3>
                <div class="card-options">
                    <a href="{{ route('admin.inquiry.create') }}" class="btn btn-primary btn-sm">
                        <i class="fi fi-rr-plus"></i> Add New Inquiry
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap" id="inquiries-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Package</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Travel Date</th>
                                <th>Adults</th>
                                <th>Children</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($inquiries as $inquiry)
                                <tr>
                                    <td>{{ $inquiry->id }}</td>
                                    <td>
                                        @if($inquiry->tourPackage)
                                            <strong>{{ $inquiry->tourPackage->name }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $inquiry->tourPackage->type }}</small>
                                        @else
                                            <span class="text-danger">Package not found</span>
                                        @endif
                                    </td>
                                    <td>{{ $inquiry->name }}</td>
                                    <td>{{ $inquiry->email }}</td>
                                    <td>{{ $inquiry->phone }}</td>
                                    <td>{{ $inquiry->date->format('M d, Y') }}</td>
                                    <td>{{ $inquiry->adults }}</td>
                                    <td>{{ $inquiry->children ?? 0 }}</td>
                                    <td>
                                        <select class="form-control form-control-sm status-select" 
                                                data-inquiry-id="{{ $inquiry->id }}"
                                                style="min-width: 120px;">
                                            <option value="new" {{ $inquiry->status == 'new' ? 'selected' : '' }}>New</option>
                                            <option value="processing" {{ $inquiry->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                            <option value="responded" {{ $inquiry->status == 'responded' ? 'selected' : '' }}>Responded</option>
                                            <option value="confirmed" {{ $inquiry->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="cancelled" {{ $inquiry->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </td>
                                    <td>{{ $inquiry->created_at->format('M d, Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.inquiry.show', $inquiry->id) }}" 
                                               class="btn btn-sm btn-info" 
                                               title="View Details">
                                                <i class="fi fi-rr-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.inquiry.edit', $inquiry->id) }}" 
                                               class="btn btn-sm btn-warning" 
                                               title="Edit">
                                                <i class="fi fi-rr-edit"></i>
                                            </a>
                                            <button type="button" 
                                                    class="btn btn-sm btn-danger delete-inquiry" 
                                                    data-id="{{ $inquiry->id }}"
                                                    title="Delete">
                                                <i class="fi fi-rr-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">No inquiries found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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

@push('styles')
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
@endpush

@push('scripts')
<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#inquiries-table').DataTable({
        "order": [[ 0, "desc" ]],
        "pageLength": 25,
        "responsive": true
    });

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
                    // Show success message
                    toastr.success(response.message);
                }
            },
            error: function() {
                toastr.error('Failed to update status');
                // Revert the select
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
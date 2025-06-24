@extends('backend.app')

@section('content')
<div class="page-header">
    <h1 class="page-title my-auto">Tour Inquiries</h1>
    <div>
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
                <a href="/admin/dashboard">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Inquiries</li>
        </ol>
    </div>
</div>
<div class="row top-row">
    <div class="container">
        <div class="row">
            <div class="col-12 d-inline-block mb-3">
                <div class="d-inline-flex float-end">
                    <button class="btn btn-primary d-flex align-items-center gap-2"
                        onclick="window.location='{{ route('admin.inquiry.create') }}'">
                        <i class="fi fi-rr-add"></i>
                        Create an Inquiry
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div>
                            <div class="icon">
                                <i class="fi fi-rr-envelope-open"></i>
                            </div>
                        </div>
                        <div class="text">
                            <p>Total Inquiries</p>
                            <h3>{{ $totalInquiries }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div>
                            <div class="icon">
                                <i class="fi fi-rr-clock-five"></i>
                            </div>
                        </div>
                        <div class="text">
                            <p>New Inquiries</p>
                            <h3>{{ $newInquiries }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div>
                            <div class="icon">
                                <i class="fi fi-rr-spinner"></i>
                            </div>
                        </div>
                        <div class="text">
                            <p>Processing</p>
                            <h3>{{ $processingInquiries }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div>
                            <div class="icon">
                                <i class="fi fi-rs-check-circle"></i>
                            </div>
                        </div>
                        <div class="text">
                            <p>Confirmed</p>
                            <h3>{{ $confirmedInquiries }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters could be added here if needed, similar to blog page -->
            {{-- <form class="col-12 filter-list my-4" action="" method="get">
                ...
            </form> --}}

            @if ($inquiries->total() > 0)
                <div class="overflow-x-auto overflow-y-hidden" style="white-space: nowrap; min-height: 300px">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="">Package</th>
                                <th class="">Customer Name</th>
                                <th class="">Email</th>
                                <th class="">Phone</th>
                                <th class="">Travel Date</th>
                                <th class="">Status</th>
                                <th class="">Created At</th>
                                <th class="d-table-cell justify-content-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inquiries as $inquiry)
                                <tr>
                                    <td class="text-left">
                                        @if($inquiry->tourPackage)
                                            <strong>{{ $inquiry->tourPackage->name }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $inquiry->tourPackage->type }}</small>
                                        @else
                                            <span class="text-danger">Package not found</span>
                                        @endif
                                    </td>
                                    <td class="text-left">{{ $inquiry->name }}</td>
                                    <td class="text-left">{{ $inquiry->email }}</td>
                                    <td class="text-left">{{ $inquiry->phone }}</td>
                                    <td class="text-left">{{ $inquiry->date->format('M d, Y') }}</td>
                                    <td class="text-left">
                                        <select class="form-select form-select-sm status-select"
                                                data-inquiry-id="{{ $inquiry->id }}"
                                                style="min-width: 120px;"
                                                onchange="updateInquiryStatus({{ $inquiry->id }}, this.value)">
                                            <option value="new" {{ $inquiry->status == 'new' ? 'selected' : '' }}>New</option>
                                            <option value="processing" {{ $inquiry->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                            <option value="responded" {{ $inquiry->status == 'responded' ? 'selected' : '' }}>Responded</option>
                                            <option value="confirmed" {{ $inquiry->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                            <option value="cancelled" {{ $inquiry->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </td>
                                    <td>{{ $inquiry->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-table-cell justify-content-end">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" type="button" id="dropdownMenuButton{{$inquiry->id}}"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fi fi-rs-menu-dots"></i>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{$inquiry->id}}">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center gap-2"
                                                            href="{{ route('admin.inquiry.show', $inquiry->id) }}"><i
                                                                class="fi fi-rr-eye"></i> View</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center gap-2"
                                                            href="{{ route('admin.inquiry.edit', $inquiry->id) }}"><i
                                                                class="fi fi-rr-edit"></i> Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center gap-2 delete-inquiry"
                                                             data-id="{{ $inquiry->id }}"
                                                             onclick="confirmDeleteInquiry({{ $inquiry->id }})"><i
                                                                class="fi fi-rr-trash"></i> Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="float-end">
                        {{ $inquiries->links() }}
                    </div>

                </div>
            @else
                <div class="col-12 pb-4">
                    <p class="text-white text-center">No Inquiries Found</p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteInquiryModal" tabindex="-1" aria-labelledby="deleteInquiryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteInquiryModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this inquiry? This action cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form id="deleteInquiryForm" method="POST" style="display: inline;">
                    @csrf
                    {{-- @method('DELETE') --}}
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
{{-- Removed DataTables CSS --}}
@endpush

@push('scripts')
{{-- Removed DataTables JS --}}

<script>
// Status update
function updateInquiryStatus(inquiryId, newStatus) {
    $.ajax({
        url: `/admin/inquiry/${inquiryId}/status`,
        method: 'POST',
        data: {
            status: newStatus,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (response.success) {
                toastr.success(response.message || 'Status updated successfully!');
            } else {
                toastr.error(response.message || 'Failed to update status.');
                // Optionally revert or reload
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX error: ", textStatus, errorThrown, jqXHR.responseText);
            toastr.error('An error occurred while updating status. Check console for details.');
            // Optionally revert or reload
            // location.reload();
        }
    });
}

// Delete confirmation
function confirmDeleteInquiry(inquiryId) {
    const deleteUrl = `/admin/inquiry/${inquiryId}/delete`; // Corrected URL
    $('#deleteInquiryForm').attr('action', deleteUrl);
    var modal = new bootstrap.Modal(document.getElementById('deleteInquiryModal'));
    modal.show();
}

// Handle delete button clicks if not using onclick attribute for some reason
// $(document).ready(function() {
//     $('.delete-inquiry').click(function() {
//         const inquiryId = $(this).data('id');
//         confirmDeleteInquiry(inquiryId);
//     });
// });

</script>
@endpush
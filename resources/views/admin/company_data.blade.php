@extends('layouts.app') 
@section('content')
<div class="container-fluid">
    <h2 class="page-title">Company Data </h2>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    Form header
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Info Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                       @foreach($company_data as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->info_type }}</td>
                                <td>{{ $company->data }}</td>
                                <td>
                                    <button class="btn btn-sm btn-primary edit-company" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editModal"
                                            data-id="{{ $company->id }}"
                                            data-info-type="{{ $company->info_type }}"
                                            data-data="{{ $company->data }}">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Company Info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editCompanyForm">
                @csrf
                <input type="hidden" id="company_id" name="id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_info_type" class="form-label">Info Type</label>
                        <input type="text" class="form-control" id="edit_info_type" name="info_type">
                    </div>
                    <div class="mb-3">
                        <label for="edit_data" class="form-label">Data</label>
                        <textarea class="form-control" id="edit_data" name="data" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // When edit button is clicked
    $('.edit-company').on('click', function() {
        var id = $(this).data('id');
        var infoType = $(this).data('info-type');
        var data = $(this).data('data');
        
        // Fill the modal with data
        $('#company_id').val(id);
        $('#edit_info_type').val(infoType);
        $('#edit_data').val(data);
    });

    // Handle form submission
    $('#editCompanyForm').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: "{{ route('company.update') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
                if(response.success) {
                    // Close the modal
                    $('#editModal').modal('hide');
                    // Show success message
                    alert('Company info updated successfully');
                    // Optionally, refresh the page or update the table row
                    location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    });
});
</script>

@endsection

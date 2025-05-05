$(document).ready(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    $("#createTaxSlabForm").on("submit", function (e) {
        e.preventDefault();
        if (!$(this).parsley().isValid()) {
            return;
        }

        let form = $(this);
        let actionUrl = form.attr("action");
        let formData = form.serialize();
        let method = $('#createTaxSlabForm input[name="_method"]').val() || 'POST';
        $.ajax({
            url: actionUrl,
            type: method,
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                form[0].reset();
                form.parsley().reset();
                $("#createTaxModal").modal("hide");

                Toast.fire({
                    icon: "success",
                    title: response.message || "Tax slab added successfully!",
                });
               
                setTimeout(() => {
                    window.location.reload();
                }, 2000);

            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMsg = "Something went wrong!";

                if (errors) {
                    errorMsg = Object.values(errors)
                        .map((err) => err[0])
                        .join("\n");
                }
                Toast.fire({
                    icon: "success",
                    title: errorMsg || "Something went wrong!",
                });
                //alert();
            },
        });
    });

    $('#createTaxModal').on('hidden.bs.modal', function () {
        $('#createTaxSlabForm')[0].reset();
        $('#createTaxSlabForm').parsley().reset();
        $('#createTaxSlabForm').attr('action', "{{ route('admin.tax.slab.store') }}");
        $('#createTaxSlabForm input[name="_method"]').remove();
        $('#createTaxModalLabel').text('Create Tax Slab');
    });
    

    $('.editTaxButton').on('click', function () {
        let button = $(this);

        let actionUrl = button.data('url');
        $('#createTaxSlabForm').attr('action', actionUrl);
    
        if ($('#createTaxSlabForm input[name="_method"]').length === 0) {
            $('#createTaxSlabForm').append('<input type="hidden" name="_method" value="PUT">');
        } else {
            $('#createTaxSlabForm input[name="_method"]').val('PUT');
        }
    
        $('#createTaxModalLabel').text('Edit Tax Slab');
    
        $('#name').val(button.data('name'));
        $('#cgst').val(button.data('cgst'));
        $('#sgst').val(button.data('sgst'));
        $('#igst').val(button.data('igst'));
    
        $('#createTaxModal').modal('show');
    });


    $('.delete-button').on('click', function (e) {
        e.preventDefault();
        let button = $(this);
        let deleteUrl = button.data('url');
    
        Swal.fire({
            title: 'Are you sure delete this tax slab?',
            text: 'You will not be able to recover this tax slab!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e3342f',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deleteUrl,
                    type: 'DELETE',
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    success: function (response) {
                        // Remove row from table
                        button.closest('tr').remove();
    
                        Toast.fire({
                            icon: "info",
                            title: response.message || "Tax slab has been deleted.",
                        });
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    },
                    error: function (xhr) {
                        Swal.fire(
                            'Error!',
                            'Something went wrong. Try again.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});

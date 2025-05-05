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
        },
    });
    $("#createCategoryForm").on("submit", function (e) {
        e.preventDefault();
        if (!$(this).parsley().isValid()) {
            return;
        }

        let form = $(this);
        let actionUrl = form.attr("action");
        let formData = form.serialize();

        $.ajax({
            url: actionUrl,
            type: "POST",
            data: formData,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                form[0].reset();
                form.parsley().reset();
                $("#createCategoryModal").modal("hide");

                Toast.fire({
                    icon: "success",
                    title: response.message || "Category added successfully!",
                });

                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;

                let errorMsg = "Something went wrong!";

                if (errors) {
                    errorMsg = Object.values(errors)
                        .map((err) => err[0])
                        .join(",");
                }
                Toast.fire({
                    icon: "success",
                    title: errorMsg || "Something went wrong!",
                });
                //alert();
            },
        });
    });

    $("#createCategoryModal").on("hidden.bs.modal", function () {
        let form = $("#createCategoryForm");
        form[0].reset();
        form.parsley().reset();
    });

    $('.edit-button').on('click', function () {
        let id = $(this).data('id');
        let name = $(this).data('name');
        let parentId = $(this).data('parent');
        let updateUrl = $(this).data('url');

        // Fill the modal form fields
        $('#createCategoryForm input[name="category_name"]').val(name);
        $('#createCategoryForm select[name="parent_category_id"]').val(parentId);
        $('#createCategoryForm').attr('action', updateUrl);

        // Add or update the hidden method field (_method = PUT)
        if ($('#createCategoryForm input[name="_method"]').length === 0) {
            $('#createCategoryForm').append('<input type="hidden" name="_method" value="PUT">');
        } else {
            $('#createCategoryForm input[name="_method"]').val('PUT');
        }

        // Open modal
        $('#createCategoryModal').modal('show');
    });

    $(".delete-button").on("click", function (e) {
        e.preventDefault();
        let button = $(this);
        let deleteUrl = button.data("url");

        Swal.fire({
            title: "Are you sure delete this category?",
            text: "You will not be able to recover this category!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#e3342f",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: deleteUrl,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                    success: function (response) {
                        // Remove row from table
                        button.closest("tr").remove();

                        Toast.fire({
                            icon: "info",
                            title:
                                response.message ||
                                "Category has been deleted.",
                        });
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    },
                    error: function (xhr) {
                        Swal.fire(
                            "Error!",
                            "Something went wrong. Try again.",
                            "error"
                        );
                    },
                });
            }
        });
    });
});

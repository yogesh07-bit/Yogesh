$(document).ready(function () {
    $(".toggle-status").click(function () {
        let element = $(this);
        let discountId = element.data("id");

        $.ajax({
            url: StatusUrl,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            data: {
                id: discountId,
            },
            success: function (response) {
                if (response.status == 1) {
                    element
                        .removeClass("badge-danger")
                        .addClass("badge-success")
                        .text("Active");
                } else {
                    element
                        .removeClass("badge-success")
                        .addClass("badge-danger")
                        .text("Inactive");
                }
            },
        });
    });

    $(".delete-button").click(function () {
        var discountId = $(this).data("id"); // Get the discount ID from the data-id attribute
        var DeleteUrl = $(this).data("url"); // Get the delete URL from the data-url attribute
        // Show SweetAlert confirmation
        Swal.fire({
            title: "Are you sure delete this discount?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                // Make AJAX request to delete the discount
                $.ajax({
                    url: DeleteUrl, // URL to handle delete
                    type: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute("content"),
                    },
                    data: {
                        id: discountId, // CSRF token
                    },
                    success: function (response) {
                        if (response.status==true) {
                            // Show success message
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your discount has been deleted.",
                                icon: "success",
                            });
                            $("#discount-row-" + discountId).remove();
                            window.location.reload();
                        } else {
                            // Show error message
                            Swal.fire({
                                title: "Error!",
                                text:
                                    response.message || "Something went wrong.",
                                icon: "error",
                            });
                            window.location.reload();
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle any errors
                        Swal.fire({
                            title: "Error!",
                            text: "Something went wrong. Please try again.",
                            icon: "error",
                        });
                        window.location.reload();
                    },
                });
            }
        });
    });
});

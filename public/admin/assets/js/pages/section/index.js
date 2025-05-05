$(document).ready(function () {
    $(document).on("click", ".toggle-display-title", function () {
        var sectionId = $(this).data("id");
        var $badge = $(this);

        $.ajax({
            url: changeTitleStatusUrl,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            data: {
                section_id: sectionId,
            },
            success: function (response) {
                if (response.status === "success") {
                    if (response.display_title == 1) {
                        $badge
                            .removeClass("bg-danger")
                            .addClass("bg-success")
                            .text("Active");
                    } else {
                        $badge
                            .removeClass("bg-success")
                            .addClass("bg-danger")
                            .text("Inactive");
                    }
                } else {
                    alert("Something went wrong.");
                }
            },
            error: function () {
                alert("AJAX error occurred.");
            },
        });
    });

    $(document).on("click", ".toggle-status", function () {
        var sectionId = $(this).data("id");
        var $badge = $(this);

        $.ajax({
            url: changeStatusUrl,
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                    "content"
                ),
            },
            data: {
                section_id: sectionId,
            },
            success: function (response) {
                if (response.status === "success") {
                    if (response.display_title == 1) {
                        $badge
                            .removeClass("bg-danger")
                            .addClass("bg-success")
                            .text("Active");
                    } else {
                        $badge
                            .removeClass("bg-success")
                            .addClass("bg-danger")
                            .text("Inactive");
                    }
                } else {
                    alert("Something went wrong.");
                }
            },
            error: function () {
                alert("AJAX error occurred.");
            },
        });
    });

    $('#editSectionForm').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        var form = $(this);
        var url = form.attr('action'); // URL set from data-url in the button
        var formData = form.serialize(); // Serialize all form data

        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF Token
            },
            success: function (response) {
                // Optional: show a success message, refresh data, close modal
                $('#editSectionModal').modal('hide');
                Toast.fire({
                    icon: "success",
                    title:
                        response.message ||
                        "Section updated successfully.",
                });
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            },
            error: function (xhr) {
                // Optional: handle validation or server errors
                console.log(xhr.responseText);
                alert('Something went wrong. Please try again.');
            }
        });
    });
});

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

$(".delete-button").on("click", function (e) {
    e.preventDefault();
    let button = $(this);
    let deleteUrl = button.data("url");

    Swal.fire({
        title: "Are you sure delete this section?",
        text: "You will not be able to recover this section! and also remove products from this section.",
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
                        icon: "success",
                        title:
                            response.message ||
                            "Section has been removed.",
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

$(".editSectionDetails").on('click', function () {
    var button = $(this); // The button that was clicked

    // Set values in the modal
    $("#section_id").val(button.data('id'));
    $("#edit_section_title").val(button.data('section_title'));
    $("#edit_product_template").val(button.data('product_template'));
    $("#edit_section_template").val(button.data('section_template'));
    $("#edit_page_type").val(button.data('page_type'));
    $("#edit_display_section").val(button.data('display_section'));

    // Optionally, set form action URL dynamically
    $("#editSectionForm").attr('action', button.data('url'));
});




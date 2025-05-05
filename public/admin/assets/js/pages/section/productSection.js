$(document).ready(function () {
    $(".category-checkbox, #productSearch").on("change keyup", function () {
        searchProducts();
    });

    function searchProducts() {
        let search = $("#productSearch").val();
        let selectedCategories = [];

        $(".category-checkbox:checked").each(function () {
            selectedCategories.push($(this).val());
        });

        $.get(
            baseUrl,
            {
                category_ids: selectedCategories,
                search: search,
            },
            function (products) {
                $("#productResults").empty();

                if (products.length === 0) {
                    $("#productResults").append(
                        '<div class="col-12">No products found.</div>'
                    );
                    return;
                }

                products.forEach((product) => {
                    let imagePath = "default.jpg";

                    if (product.images && product.images.highlighted) {
                        imagePath = `${baseAppUrl}/${product.images.highlighted}`;
                    }

                    $("#productResults").append(`
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <img src="${imagePath}" class="card-img-top" alt="${
                        product.product_title
                    }" style="height: 200px; object-fit: contain;">
                                <div class="card-body">
                                    <h5>${product.product_title}</h5>
                                    <p>${product.small_description ?? ""}</p>
                                    <p><strong>MRP:</strong> ₹${product.mrp}</p>
                                    <button class="btn btn-success" onclick="addProduct(${
                                        product.id
                                    })">Add</button>
                                </div>
                            </div>
                        </div>
                    `);
                });
            }
        );
    }
});

$(".reloadPageEvent").on("click", function () {
    window.location.reload();
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

function addProduct(productId) {
    $.ajax({
        url: addSectionProductUrl,
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            section_id: sectionId,
            product_id: productId,
        },
        success: function (response) {
            Toast.fire({
                icon: "success",
                title:
                    response.message ||
                    "Product added successfully in this section!",
            });
        },
        error: function (xhr) {
            let message = "Something went wrong!";
            if (xhr.responseJSON && xhr.responseJSON.message) {
                message = xhr.responseJSON.message;
            }

            Toast.fire({
                icon: "error",
                title: message,
            });
        },
    });
}

$(".delete-button").on("click", function (e) {
    e.preventDefault();
    let button = $(this);
    let deleteUrl = button.data("url");

    Swal.fire({
        title: "Are you sure delete this product?",
        text: "You will not be able to recover this product!",
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
                            "Section Product has been removed.",
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

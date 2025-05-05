@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="page-title">Product Entry Form</h2>
</div> 
<div class="container-fluid">
    <div class="row">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

           @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 



    <div class="col-sm-12">
        <div class="card">
        <div class="card-header pb-0">
            Form header
        </div>



    <form class="form theme-form" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Product Title</label>
                    <input type="text" name="product_title" class="form-control form-control-lg" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">MRP</label>
                    <input type="number" name="mrp" class="form-control form-control-sm" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Tax Included</label>
                    <select name="tax_included" class="form-select digits required">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Tax Slab</label>
                    <select name="tax_slab_id" class="form-select digits">
                        <option value="">Select</option>
                        @foreach($taxslabs as $slab)
                            <option value="{{ $slab->id }}">{{ $slab->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Category</label>
                     <select name="category" class="form-select digits required">
                        <option value="">Select</option>
                        @foreach($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Sub Category</label>
                     <select name="subcategory" class="form-select digits">
                        <option value="">Select</option>                        
                    </select>
                </div>
            </div>
        </div>

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label class="form-label">Discount</label>
                <select name="discount_id" class="form-control">
                    <option value="">Select Discount</option>
                    @foreach ($discounts as $discount)
                        <option value="{{ $discount->id }}">
                            {{ $discount->name }} ({{ $discount->code }}) - {{ $discount->type }} {{ $discount->value }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

        


        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Offer Style</label>
                    <input type="number" name="offer_style" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Brand</label>
                    <select name="brand_id" class="form-select digits required">
                        <option value="">Select</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">HSN</label>
                    <select name="hsn_id" id="hsn_id" class="form-select digits">
                    <option value="">Select</option>
                    @foreach($hsncode as $hsn)
                        <option value="{{ $hsn->id }}" data-description="{{ $hsn->item_description }}">
                            {{ $hsn->code }}
                        </option>
                    @endforeach
                </select>
                </div>
                <div id="hsn-description" class="mt-2 text-muted"></div>

            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label class="form-label">Barcode</label>
                    <input type="text" name="barcode" class="form-control">
                </div>
            </div>
        </div>

        <!-- Product Descriptions -->
        <div id="description-section">
            <h4>Product Descriptions</h4>
            <div id="descriptions"></div>
            <button type="button" id="add-description" class="btn btn-primary">Add Description</button>
        </div>

        <!-- Product Images -->
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <h4>Product Images (Max: 5)</h4>
                    <input type="file" id="imageInput" name="images[]" class="form-control mb-3" multiple accept="image/*">
                    <div id="image-preview-area" class="row"></div>
                </div>
            </div>

            <!-- Hidden inputs to be submitted -->
            <div id="image-fields"></div>
        </div>
    </div>

    <!-- Footer Buttons -->
    <div class="card-footer text-end">
        <button class="btn btn-primary" type="submit">Submit</button>
        <input class="btn btn-light" type="reset" value="Cancel">
    </div>
</form>
    </div>
  </div>
  </div>
</div>

<script>
    //hsn_description
     document.addEventListener('DOMContentLoaded', function () {
        const hsnSelect = document.getElementById('hsn_id');
        const descriptionBox = document.getElementById('hsn-description');

        hsnSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const description = selectedOption.getAttribute('data-description');

            descriptionBox.textContent = description ? `Description: ${description}` : '';
        });
    });



    //product slug
    document.addEventListener('DOMContentLoaded', function () {
    const titleInput = document.querySelector('input[name="product_title"]');
    const slugInput = document.querySelector('input[name="slug"]');

    function generateSlug(text) {
        return text
            .toString()
            .toLowerCase()
            .trim()
            .replace(/&/g, '-and-')
            .replace(/[\s\W-]+/g, '-')
            .replace(/^-+|-+$/g, '');
    }

    async function checkSlugExists(slug) {
        const response = await fetch("{{route('check.slug')}}"+`?slug=${slug}`);
        const data = await response.json();
        return data.exists;
    }

    titleInput.addEventListener('input', async function () {
        const slug = generateSlug(this.value);
        slugInput.value = slug;

        const exists = await checkSlugExists(slug);
        if (exists) {
            slugInput.classList.add('btn-warning');
            slugInput.setCustomValidity('This slug already exists.');
        } else {
            slugInput.classList.remove('btn-warning');
            slugInput.setCustomValidity('');
        }
    });
});



    $(document).ready(function() {
    $('select[name="category"]').change(function() {
        let categoryId = $(this).val(); // Get selected category ID

        if (categoryId) {
            $.ajax({
                url: "{{ route('get.subcategories') }}", // Your route to get subcategories
                type: "POST",
                data: { category_id: categoryId },
                headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                     'Accept': 'application/json'
                },
                success: function(response) {
                    let subcategoryDropdown = $('select[name="subcategory"]');
                    subcategoryDropdown.empty(); // Clear previous options
                    subcategoryDropdown.append('<option value="">Select Subcategory</option>');

                    $.each(response, function(key, value) {
                        subcategoryDropdown.append(`<option value="${value.id}">${value.category_name}</option>`);
                    });
                },
                error: function(xhr) {
                    console.error("Error fetching subcategories:", xhr);
                }
            });
        } else {
            $('select[name="subcategory"]').empty().append('<option value="">Select Subcategory</option>');
        }
    });
});


    let descriptionCount = 0;
    document.getElementById('add-description').addEventListener('click', function () {
        if (descriptionCount < 3) {
            let div = document.createElement('div');
            div.innerHTML = `
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="descriptions[${descriptionCount}][title]" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="descriptions[${descriptionCount}][description]" class="form-control" required></textarea>
                </div>
            `;
            document.getElementById('descriptions').appendChild(div);
            descriptionCount++;
        }
    });


// image uploads
      let maxImages = 5;
    let selectedImages = [];
    const imageInput = document.getElementById('imageInput');
    const previewArea = document.getElementById('image-preview-area');
    const imageFields = document.getElementById('image-fields');

    imageInput.addEventListener('change', function () {
        previewArea.innerHTML = '';
        imageFields.innerHTML = '';
        selectedImages = [];

        const files = Array.from(this.files).slice(0, maxImages);

        files.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const col = document.createElement('div');
                col.classList.add('col-md-4', 'mb-3');

                col.innerHTML = `
                    <img src="${e.target.result}" class="img-fluid mb-2" style="max-height: 150px;">
                    <input type="text" class="form-control mb-2 title-input" placeholder="Enter image title" data-index="${index}">
                    <div>
                        <label>
                            <input type="radio" name="highlighted_index" value="${index}">
                            Set as highlighted image
                        </label>
                    </div>
                `;

                previewArea.appendChild(col);
            };

            reader.readAsDataURL(file);
            selectedImages.push(file);
        });
    });

    // Ensure titles are included in form on submit
    document.querySelector('form').addEventListener('submit', function (e) {
        // Clean up any existing hidden title inputs
        imageFields.innerHTML = '';

        const titleInputs = document.querySelectorAll('.title-input');

        titleInputs.forEach((input, index) => {
            const titleValue = input.value;
            const hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.name = 'titles[]';
            hidden.value = titleValue;
            imageFields.appendChild(hidden);
        });

        // Note: highlighted_index will already be submitted due to the radio inputs in the form
    });


</script>
@endsection

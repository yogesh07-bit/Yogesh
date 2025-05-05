@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="page-title">{{ $title ?? 'Edit Brand' }}</h2>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">Edit Brand</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="brand_name">Brand Name</label>
                                <input type="text" class="form-control" name="brand_name" value="{{ old('brand_name', $brand->brand_name) }}" required>
                            </div>

                           <div class="mb-3">
    <label for="logo" class="form-label">Logo</label>
    <input type="file" id="logo_input" class="form-control" name="logo" accept="image/*">
    
    <!-- Preview and crop -->
    <div class="mt-3">
        <img id="logo_preview" style="max-width: 100%; display: none;">
        <canvas id="cropped_logo_canvas" style="display: none;"></canvas>
    </div>

    @if($brand->logo)
        <a target="_blank" href="{{ asset($brand->logo) }}">
            <img src="{{ asset('public/' . $brand->logo) }}" alt="Brand Logo" class="img-fluid mt-2" width="200">
        </a>
    @endif
</div>
<div class="mt-2">
        <img id="logoPreview" src="#" alt="Logo Preview" style="max-height: 150px; display: none;" class="img-thumbnail">
    </div>

<!-- Crop Controls -->
<!-- <div class="crop-controls">
    <div>
        <label>
            <input type="checkbox" id="fixed_ratio" checked> Fixed Aspect Ratio
        </label>
    </div>
    <div>
        <label>Width: <input type="number" id="crop_width" value="200" min="1"></label>
        <label>Height: <input type="number" id="crop_height" value="200" min="1"></label>
    </div>
    <div>Current Size: <span id="current_size">-</span></div>
</div> -->


                            <div class="col-md-12 mb-3">
                                <label for="address">Address</label>
                                <textarea name="address" class="form-control" required>{{ old('address', $brand->address) }}</textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="owner">Owner</label>
                                <input type="text" class="form-control" name="owner" value="{{ old('owner', $brand->owner) }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ old('phone', $brand->phone) }}" required>
                            </div>

                            <div class="col-md-12 text-center mt-3">
                                <button type="submit" class="btn btn-primary">Update Brand</button>
                             
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
    
    // Handle image input
document.getElementById('logo_input').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            // Show the preview
            const preview = document.getElementById('logo_preview');
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});

// Image cropping logic
let cropCanvas = document.getElementById('cropped_logo_canvas');
let cropCtx = cropCanvas.getContext('2d');
let img = new Image();
let cropWidth = document.getElementById('crop_width').value;
let cropHeight = document.getElementById('crop_height').value;

// Handle crop aspect ratio and preview the cropped image
document.getElementById('fixed_ratio').addEventListener('change', function() {
    cropWidth = document.getElementById('crop_width').value;
    cropHeight = document.getElementById('crop_height').value;
    updateCropPreview();
});

// Update crop preview
function updateCropPreview() {
    const preview = document.getElementById('logo_preview');
    const width = preview.width;
    const height = preview.height;

    // Set canvas size to the crop width and height
    cropCanvas.width = cropWidth;
    cropCanvas.height = cropHeight;

    // Draw the cropped area of the image on the canvas
    cropCtx.clearRect(0, 0, cropCanvas.width, cropCanvas.height);
    cropCtx.drawImage(preview, 0, 0, width, height, 0, 0, cropWidth, cropHeight);

    // Show current size
    document.getElementById('current_size').innerText = `${cropWidth}x${cropHeight}`;
}

// Trigger cropping on image load
img.onload = function() {
    updateCropPreview();
};

// Handle crop button to save image
document.getElementById('save_cropped_image').addEventListener('click', function() {
    const dataUrl = cropCanvas.toDataURL('image/jpeg');
    
    // For the sake of this example, you can send the dataUrl to the server.
    // In a real-world scenario, you will likely send it via AJAX or form submission.
    console.log('Cropped Image Data:', dataUrl);

    // To save as a file or send it to your server:
    let formData = new FormData();
    formData.append('cropped_logo', dataUrl);

    // You can send the formData to the server via an AJAX request
    fetch('/path/to/save-cropped-image', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log('Image saved', data);
    })
    .catch(error => console.error('Error saving image:', error));
});

// Initialize preview for the input image
function initImage(file) {
    img.src = URL.createObjectURL(file);
}

</script>
@extends('layouts.app') 

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" rel="stylesheet">

<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/jodit/4.2.47/es2021/jodit.min.css"
/>

@endsection


@section('content')

<div class="container-fluid">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif


    <h2 class="page-title">{{ $banner->exists ? 'Edit Banner' : 'Add Banner' }}</h2>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    Banner Details
                </div>
                <div class="card-body">
                    <form 
                        action="{{ route('banner.store') }}" 
                        method="POST" 
                        enctype="multipart/form-data"
                    >
                        @csrf
                       @if($banner->exists)
                            <input type="hidden" name="id" value="{{ $banner->id }}">
                        @endif       

                        <div class="mb-3">
                        <label for="banner_location" class="form-label">Banner Location</label>
                        <select name="banner_location" class="form-select" required>
                            <option value="">-- Select Location --</option>
                            @foreach($banner_locations as $location)
                                <option value="{{ $location }}"
                                    {{ old('banner_location', $banner->banner_location) === $location ? 'selected' : '' }}>
                                    {{ $location }}
                                </option>
                                @endforeach
                            </select>
                        </div>


                        {{-- banner_text_html --}}
                    <div class="mb-3">
                        <label for="banner_text_html" class="form-label">Text HTML</label>
                        <textarea id="banner_text_html" name="banner_text_html" class="form-control" >{{ old('banner_text_html', $banner->banner_text_html) }}</textarea>

                    

                    </div>


                        {{-- banner_button --}}
                        <div class="mb-3">
                            <label for="banner_button" class="form-label">Button Text</label>
                            <input type="text" class="form-control" name="banner_button" value="{{ old('banner_button', $banner->banner_button) }}">
                        </div>

                     {{-- banner_image --}}
                    <div class="mb-3">
                        <label for="banner_image" class="form-label">Image</label>
                        <input type="file" id="banner_image_input" class="form-control">
                        
                        <!-- Preview and crop -->
                        <div class="mt-3">
                            <img id="image_preview" style="max-width: 100%; display: none;">
                            <canvas id="cropped_canvas" style="display: none;"></canvas>
                        </div>

                        <input type="hidden" name="banner_image_cropped" id="banner_image_cropped">

                        @if($banner->banner_image)
                            <a target="_blank" href="{{ asset($banner->banner_image) }}">
                                <img src="{{ asset($banner->banner_image) }}" alt="Banner Image" class="img-fluid mt-2" width="900">
                            </a>
                        @endif
                    </div>

                    <div class="crop-controls">
                      <div>
                        <label>
                          <input type="checkbox" id="fixed_ratio" checked> Fixed Aspect Ratio
                        </label>
                      </div>
                      <div>
                        <label>Width: <input type="number" id="crop_width" value="1950" min="1"></label>
                        <label>Height: <input type="number" id="crop_height" value="680" min="1"></label>
                      </div>
                      <div>Current Size: <span id="current_size">-</span></div>
                    </div>
                        {{-- banner_name --}}
                        <div class="mb-3">
                            <label for="banner_name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="banner_name" value="{{ old('banner_name', $banner->banner_name) }}">
                        </div>

                        {{-- banner_template --}}
                        <div class="mb-3">
                            <label for="banner_template" class="form-label">Template</label>
                            <input type="text" class="form-control" name="banner_template" value="{{ old('banner_template', $banner->banner_template) }}">
                        </div>

                        {{-- banner_order --}}
                        <div class="mb-3">
                            <label for="banner_order" class="form-label">Order</label>
                            <input type="number" class="form-control" name="banner_order" value="{{ old('banner_order', $banner->banner_order) }}">
                        </div>

                        {{-- banner_link --}}
                        <div class="mb-3">
                            <label for="banner_link" class="form-label">Link (URL)</label>
                            <input type="text" class="form-control" name="banner_link" value="{{ old('banner_link', $banner->banner_link) }}">
                        </div>

                        {{-- banner_class --}}
                        <div class="mb-3">
                            <label for="banner_class" class="form-label">CSS Class</label>
                            <input type="text" class="form-control" name="banner_class" value="{{ old('banner_class', $banner->banner_class) }}">
                        </div>

                        {{-- banner_id --}}
                        <div class="mb-3">
                            <label for="banner_id" class="form-label">HTML ID</label>
                            <input type="text" class="form-control" name="banner_id" value="{{ old('banner_id', $banner->banner_id) }}">
                        </div>

                        <button type="submit" class="btn btn-success">
                            {{ $banner->exists ? 'Update Banner' : 'Add Banner' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<script>
let cropper;
const input = document.getElementById('banner_image_input');
const image = document.getElementById('image_preview');
const croppedField = document.getElementById('banner_image_cropped');
const widthInput = document.getElementById('crop_width');
const heightInput = document.getElementById('crop_height');
const ratioCheckbox = document.getElementById('fixed_ratio');
const sizeDisplay = document.getElementById('current_size');
let isProcessing = false;

// Destroy cropper and clean up memory
function destroyCropper() {
  if (cropper) {
    cropper.destroy();
    cropper = null;
    URL.revokeObjectURL(image.src);
  }
}

// Update cropper aspect ratio based on inputs
function updateAspectRatio() {
  if (!cropper) return;
  
  if (ratioCheckbox.checked) {
    const width = parseFloat(widthInput.value) || 1950;
    const height = parseFloat(heightInput.value) || 680;
    cropper.setAspectRatio(width / height);
  } else {
    cropper.setAspectRatio(NaN); // Free ratio
  }
  updateSizeDisplay();
}

// Update size display
function updateSizeDisplay() {
  if (!cropper) return;
  
  const cropBoxData = cropper.getCropBoxData();
  sizeDisplay.textContent = `${Math.round(cropBoxData.width)} × ${Math.round(cropBoxData.height)}`;
}

// Initialize cropper
function initCropper(src) {
  destroyCropper();
  
  image.src = src;
  image.style.display = 'block';

  // Set initial aspect ratio
  const initialRatio = ratioCheckbox.checked ? 
    (parseFloat(widthInput.value) || 1950) / (parseFloat(heightInput.value) || 680) : 
    NaN;

  cropper = new Cropper(image, {
    aspectRatio: initialRatio,
    viewMode: 3,
    autoCropArea: 1,
    responsive: false,
    checkCrossOrigin: false,
    cropBoxMovable: true,
    cropBoxResizable: true,
    
    ready: function() {
      updateSizeDisplay();
    },
    
    cropend: function() {
      if (isProcessing) return;
      isProcessing = true;
      
      requestAnimationFrame(() => {
        const width = parseFloat(widthInput.value) || 1950;
        const height = parseFloat(heightInput.value) || 680;
        
        const canvas = cropper.getCroppedCanvas({
          width: ratioCheckbox.checked ? width : undefined,
          height: ratioCheckbox.checked ? height : undefined,
          fillColor: '#fff',
          imageSmoothingQuality: 'medium'
        });
        
        setTimeout(() => {
          croppedField.value = canvas.toDataURL('image/jpeg', 0.8);
          isProcessing = false;
          updateSizeDisplay();
        }, 0);
      });
    }
  });
}

// Process file input
input.addEventListener('change', (e) => {
  const file = e.target.files[0];
  if (!file) return;

  const reader = new FileReader();
  reader.onload = (event) => {
    const img = new Image();
    img.onload = () => {
      const MAX_DIMENSION = 3000;
      let width = img.width;
      let height = img.height;
      
      if (width > MAX_DIMENSION || height > MAX_DIMENSION) {
        const scale = Math.min(MAX_DIMENSION / width, MAX_DIMENSION / height);
        width *= scale;
        height *= scale;
      }
      
      const canvas = document.createElement('canvas');
      canvas.width = width;
      canvas.height = height;
      
      const ctx = canvas.getContext('2d');
      ctx.drawImage(img, 0, 0, width, height);
      
      initCropper(canvas.toDataURL('image/jpeg', 0.9));
    };
    img.src = event.target.result;
  };
  reader.readAsDataURL(file);
});

// Event listeners for controls
ratioCheckbox.addEventListener('change', updateAspectRatio);
widthInput.addEventListener('change', updateAspectRatio);
heightInput.addEventListener('change', updateAspectRatio);

// Clean up
window.addEventListener('beforeunload', destroyCropper);
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jodit/4.2.47/es2021/jodit.min.js"></script>

<script>
  const editor = Jodit.make('#banner_text_html', {
     buttons: [
            'bold', 'italic', 'underline', 'strikethrough',
            'ul', 'ol', 'outdent', 'indent',
            'font', 'fontsize', 'brush', 'paragraph',
            'image', 'table', 'link', 'align',
            'undo', 'redo', 'source'
        ],
  });
</script>



@endsection
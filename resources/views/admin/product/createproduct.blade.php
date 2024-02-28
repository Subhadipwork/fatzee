@extends('admin.layouts.layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Forms Elements</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Forms Elements</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <h4 class="card-title">Add Manu</h4>

                        <div style="text-align: right;">
                            <a href="{{ route('admin.product.index') }}" class="btn btn-primary" style="margin-bottom: 10px; margin-right: 10px;text-align: right;">Back</a>
                        </div>
                        {{-- flash massage start --}}
                        @include('admin.flash.message')

                        {{-- flash massage end --}}
                        <form action="{{ route('admin.product.store') }}" method="POST" id="form_id" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Choose Category</label>
                                        <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category" aria-label="Category select">
                                            <option value="" disabled selected>Category</option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Manu Name</label>
                                        <input type="text" name="product_name" class="form-control @error('titel') is-invalid @enderror" id="product-name" value="{{ old('product_name') }}">
                                        @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Manu Code</label>
                                        <input type="text" name="product_code" class="form-control @error('product_code') is-invalid @enderror" id="product-name" value="{{ old('product_code') }}">
                                        @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="subcategory" class="form-label">Price</label>
                                        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="mrp_price" value="{{ old('price') }}">
                                        @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>Manu Description</h3>

                                        <div class="col-lg-12 mt-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <label class="form-label" for="editor">Description</label>
                                                            <textarea name="description" id="editor2" rows="">{{ old('description') }}</textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-lg-12 mt-4">
                                    <div class="card">
                        
                                        <div class="card-body">
                                        <h4 class="card-title">Manu Image</h4>
                                            <div class="row addmore">
                                                <div class="col-lg-6">
                                                    <label class="form-label" for="image">Image</label>
                                                    <input type="file" name="image[0]" class="form-control @error('image') is-invalid @enderror"onchange="document.getElementById('preview-image-before-upload').src = window.URL.createObjectURL(this.files[0])" id="image">
                                                    @error('image')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-3">
                                                    <label class="form-label" for="image[0]">Image Preview</label>
                                                    <img id="preview-image-before-upload" src="data:image/png;base64,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" alt=""  class="img-fluid">
                                                </div>

                                                <div class="col-lg-3">

                                                    <button type="button" name="add" id="add" class="btn btn-success add_more">Add More</button>
                                                </div>
                                            </div>
                                            <div id="newRow"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-custom">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('admin_assets/libs/dropzone/min/dropzone.min.js') }}"></script>
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script> --}}
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>


<script>
    $(document).ready(function() {
        var i = 1;

        $('.add_more').click(function() {
            var addMoreDetails = `<div class="row addmore">
                <div class="col-lg-6">
                    <label class="form-label" for="image">Image</label>
                    <input type="file" name="image[${i}]" class="form-control @error('image') is-invalid @enderror" onchange="document.getElementById('preview-image-before-upload-${i}').src = window.URL.createObjectURL(this.files[0])" id="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-3">
                    <label class="form-label" for="image">Image Preview</label>
                    <img id="preview-image-before-upload-${i}" src="data:image/png;base64,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" alt="" class="img-fluid">
                </div>
                <div class="col-lg-3">
                    <button type="button" name="add" class="btn btn-danger remove">Remove</button>
                </div>
            </div>`;

            $(addMoreDetails).appendTo("#newRow");
            i++;
        });

        $(document).on('click', '.remove', function() {
            $(this).closest('.addmore').remove();
        });
    });
</script>


<script>
    ClassicEditor
        .create(document.querySelector('#editor2'))
        .catch(error => {
            console.error(error);
        });
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor3'))
        .catch(error => {
            console.error(error);
        });
</script>



<script>
    tinymce.init({
        selector: '#editor',
        height: 400, // Height of the editor in pixels
        width: '100%' // Width of the editor (can be in pixels or percentage)
    });
</script>


<script>
    $(document).ready(function() {
        // Trigger on change of either mrp_price or selling_price input fields
        $("#mrp_price, #selling_price").on('input', function() {
            var mrp = parseFloat($("#mrp_price").val());
            var sale = parseFloat($("#selling_price").val());

            if (!isNaN(mrp) && !isNaN(sale) && mrp > 0) {
                var discountPercentage = (1 - sale / mrp) * 100;
                $("#discount").val(discountPercentage.toFixed(2));
            } else {
                $("#discount").val('');
            }
        });
    });
</script>
@endpush
@push('styles')
<link href="{{ asset('admin_assets/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />

<style>
    #form_id {
        background-color: #ffffff;
        padding: 50px;
        border-radius: 15px;
        border: 1px solid #e0e0e0;
        width: 100%;
        position: relative;
        overflow: hidden;
    }

    #form_id::before {
        content: "Product Form";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #f5f5f5;
        color: #555;
        padding: 10px 0;
        text-align: center;
        border-bottom: 1px solid #e0e0e0;
        font-weight: 600;
    }

    .form-label {
        font-weight: 600;
        color: #555;
        margin-bottom: 15px;
    }

    .form-control,
    .form-select {
        border-radius: 5px;
        /* transition: border 0.2s ease, box-shadow 0.2s ease; */
        transition: border 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
        border: 1px solid #e0e0e0;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #bbb;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .form-control:hover,
    .form-select:hover {
        transform: translateY(-2px);
    }

    .btn-custom {
        background-color: #e0e0e0;
        border: none;
        border-radius: 30px;
        padding: 10px 25px;
        color: #555;
        font-weight: 600;
        transition: background-color 0.2s ease;
    }

    .btn-custom:hover {
        background-color: #d0d0d0;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-weight: 600;
        color: #333;
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 15px;
    }

    .card-title {
        text-align: center;
    }
</style>
@endpush
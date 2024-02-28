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
                {{-- flash massage start --}}
                @include('admin.flash.message')

                {{-- flash massage end --}}
                    
                    <div class="card-body">
                        <h4 class="card-title">Add Category</h4>

                        {{-- <a href="{{ route('admin.category.index') }}" class="btn btn-primary" style="margin-bottom: 10px; margin-right: 10px;">Back</a> --}}
                        <div style="text-align: right;">
                            <a href="{{ route('admin.category.index') }}" class="btn btn-primary" style="margin-bottom: 10px; margin-right: 10px;text-align: right;">Back</a>
                        </div>

                        <form action="{{ route('admin.category.store') }}" method="POST" id="categoryForm" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <label for="category-name" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="category_name" id="category-name" placeholder="Category Name" required>
                                </div>
                            </div>

                    
               
                            <div class="mb-3 row">
                                <label for="category_image" class="col-sm-2 col-form-label">Upload Category Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" name="image" id="category_image" placeholder="Subcategory Image" onchange="previewImage(event)">
                                    <img id="image_preview" src="https://iconicentertainment.in/wp-content/uploads/2013/11/dummy-image-square.jpg" alt="Preview of Image" style="max-width: 200px; max-height: 200px;" />
                                    @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" id="submit" class="btn btn-primary waves-effect waves-light">
                                        Save Category <i class="ri-arrow-right-line align-middle ms-2"></i>
                                    </button>
                                    <button type="reset" class="btn btn-secondary waves-effect">
                                        Cancel
                                    </button>
                                </div>
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
<script src="{{ asset('admin_assets/libs/dropzone/min/dropzone.min.js')}}"></script>

<script>
    $(document).ready(function(){
        $('#category_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#image_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>

@endpush

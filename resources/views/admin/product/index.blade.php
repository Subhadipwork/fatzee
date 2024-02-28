@extends('admin.layouts.layout')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Data Tables</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Data Tables</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">List Product</h4>
                        <a href="{{ route('admin.product.create') }}" class="btn btn-primary" style="margin-bottom: 10px; margin-right: 10px;">
                            <i class="mdi mdi-plus me-1"></i>
                        </a>
                        <table id="mydatatable" class="table table-striped table-bordered table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            @if(count($items) > 0)
                                @foreach($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('uploads/products/' . $item->adminproductimage->image) }}" style="width: 100px; height: 100px;"></td>
                                        <td>{{ $item->category->category_name }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                        <input type="checkbox" class="status-toggle" data-category-id="{{ $item->id }}" data-type="status" id="status-switch{{ $item->id }}" switch="none" {{ $item->status == 1 ? 'checked' : '' }}>
                                        <label for="status-switch{{ $item->id }}" data-on-label="Show" data-off-label="Hide"></label>
                                    </td>


                                    <td>
                                        <i class="fas fa-trash delete" style="color: red;" data-id="{{ $item->id }}" data-link="{{ route('admin.category.destroy', $item->id) }}"></i>
                                        <!-- <i class="fas fa-edit edit" style="color: green;" data-id="{{ $item->id }}" data-link="{{ route('admin.category.edit', $item->id) }}"></i> -->
                                        <a href="{{ route('admin.category.edit', $item->id) }}"><i class="fas fa-edit edit" style="color: green;"></i></a>
                                    </td>

                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        <!-- Pagination links -->
                        <div class="mt-3 d-flex justify-content-end">
                        <!-- {{ $items->links() }} -->
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div> <!-- container-fluid -->
</div>
@endsection


@pushOnce('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS CDN -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.6/js/dataTables.bootstrap5.min.js"></script>

<!-- Bootstrap JS -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

<!-- DataTables JS -->
<!-- <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> -->

<!-- toastr plugin -->
<script src="{{ asset('admin_assets/libs/toastr/build/toastr.min.js') }}"></script>

<!-- toastr init -->
<script src="{{ asset('admin_assets/js/pages/toastr.init.js') }}"></script>
<!-- Include SweetAlert2 library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="{{ asset('admin_assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#mydatatable').DataTable({
            // scrollY: '50vh',
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            fixedColumns: true,
            compact: true,
            fixedHeader: {
                header: true

            }
        });

   
    });
</script>

<script>
    $('.status-toggle').on('change', function() {
        var status = $(this).prop('checked') == true ? 1 : 0;
        var product_id = $(this).data('product-id');
        var type = $(this).data('type');

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{ route('admin.product.updateStatus') }}",
            data: {
                product_id: product_id,
                status: status,
                type: type
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-right',
                    iconColor: 'success',
                    customClass: {
                        popup: 'colored-toast'
                    },
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true
                });
                if (data.status == true) {
                    Toast.fire({
                        icon: 'success',
                        title: data.message
                    });

                } else {
                    Toast.fire({
                        icon: 'error',
                        title: data.message
                    })
                }
            }
        });
    })
</script>

<script>
    $(document).ready(function() {
        $(".delete").on("click", function(e) {
            e.preventDefault();

            // Function to create and configure a Toast
            function createToast(icon, title) {
                return Swal.mixin({
                    toast: true,
                    position: "top-right",
                    iconColor: icon || "success",
                    customClass: {
                        popup: "colored-toast",
                    },
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                }).fire({
                    icon: icon || "success",
                    title: title || "Default Message",
                });
            }

            var $this = $(this);
            var url = $this.data("link");
            var token = $this.data("token");

            if (!url) {
                alert("Url not found in data attribute");
                return;
            }
            if (!token) {

                if (!token) {
                    token = "{{ csrf_token() }}";
                    $this.attr("data-token", token);
                }
            }

            // Create dynamic Swal.fire options
            var swalOptions = {
                title: "Are you sure you want to delete this row?",
                text: "It will be gone forever",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            };

            Swal.fire(swalOptions).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            _token: token,
                            _method: "DELETE",
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.status == "success") {
                                createToast("success", response.message);

                                // Dynamically handle row removal
                                setTimeout(function() {
                                    try {
                                        var row = $this.closest("tr");
                                        row.fadeOut();

                                        if (row.is(":last-child")) {
                                            row.closest("table")
                                                .find("tr:last-child")
                                                .remove();
                                        }
                                    } catch (error) {
                                        location.reload();
                                    }
                                }, 1500);
                            }
                        },
                        error: function(error) {
                            console.log(error);
                            console.log(error.responseJSON);
                        },
                    });
                }
            });
        });
    });
</script>

@endPushOnce

@pushOnce('styles')
{{-- <link href="{{ asset('admin_assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css"> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/libs/toastr/build/toastr.min.css') }}">
{{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

<!-- DataTables CSS -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"> -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables CSS CDN -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/dataTables.bootstrap5.min.css">

@endPushOnce

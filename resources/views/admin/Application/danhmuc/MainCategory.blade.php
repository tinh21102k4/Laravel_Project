@extends('admin.layout.MainAdmin')
@section('content-here')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Quản Lý Danh Mục</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                            <li class="breadcrumb-item active">Quản Lý danh muc</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="listjs-table" id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href="#" class="btn btn-success add-btn" id="create-btn"
                                            data-bs-toggle="modal" data-bs-target="#addModelCate"><i
                                                class="ri-add-line align-bottom me-1"></i> Thêm danh muc</a>
                                        <button class="btn btn-soft-danger"><i class="ri-delete-bin-2-line"></i></button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <form action="" method="GET">
                                                @csrf
                                                <input type="text" class="form-control search" name="searchUser"
                                                    placeholder="Tìm Kiếm Danh muc..." id="search-input">
                                                <i class="ri-search-line search-icon"></i>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @yield('ListCategory')

                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>

        <!-- Modal -->
        <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="btn-close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you Sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <form action="" id="deleteConfirm" method ="post">
                                @csrf
                                @method('delete')
                                <button class="btn w-sm btn-danger">Yes, Delete It!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- them danh muc --}}
        <div class="modal fade" id="addModelCate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addModelCate">Thêm Danh Mục</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('admin.category.postCategory') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="firstNameinput" class="form-label">Tên Danh Mục</label>
                                        <input type="text" class="form-control" name="nameCate"
                                            placeholder="Vui lòng nhập tên danh mục">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- cap nhat danh muc --}}
        <div class="modal fade" id="editcate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editcategory">Cập nhật Danh Mục</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="editForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12">
                                    <input type="hidden" id="editCategoryId" name="categoryId">
                                    <div class="mb-3">
                                        <label for="firstNameinput" class="form-label">Tên Danh Mục</label>
                                        <input type="text" class="form-control" name="editNameCate" id="namecate"
                                            placeholder="Vui lòng nhập tên danh mục">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary" id="updateCategoryBtn">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
    <!--end modal -->
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            var deleteRecordModal = document.getElementById('deleteRecordModal');
            deleteRecordModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var form = document.getElementById('deleteConfirm');
                // xoa action của form với id danh muc
                form.setAttribute('action', '{{ route('admin.category.delCategory', ':id') }}'.replace(
                    ':id', id));
            });
        });

        $(document).ready(function() {
            $('#editcate').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Nút kích hoạt modal
                var categoryId = button.data('id'); // ID danh mục
                var link = '{{ url('admin/category/editCategory') }}' + '/' + categoryId;
                // Gửi yêu cầu AJAX để lấy dữ liệu danh mục
                $.ajax({
                    url: link, // Đường dẫn đến route lấy chi tiết danh mục
                    type: 'GET',
                    success: function(data) {
                        $('#editForm').attr('action', link);
                        $('#namecate').val(data.name);
                    },
                    error: function() {
                        alert('Có lỗi xảy ra khi tải dữ liệu!');
                    }
                });
            });

            // Xử lý khi gửi form
            $('#editForm').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'PUT',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.success) {
                            alert('Cập nhật thành công!');
                            $('#editcate').modal('hide');
                            location.reload();
                        } else {
                            alert('Có lỗi xảy ra!');
                        }
                    },
                    error: function() {
                        alert('Có lỗi xảy ra!');
                    }
                });
            });
        });
    </script>
@endsection

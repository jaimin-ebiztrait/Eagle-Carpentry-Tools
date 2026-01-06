@extends('admin.layout')

@section('title', isset($edit) ? 'Edit Product' : 'Add Product')

@section('vendor-style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.list_product') }}">Products</a></li>
            <li class="breadcrumb-item">{{ isset($edit) ? 'Edit Product' : 'Add Product' }}</li>
        </ul>
    </div>
</div>

<section>
    <div class="container-fluid">
        <header class="mb-3">
            <h2 class="h3">{{ isset($edit) ? 'Edit Product' : 'Add Product' }}</h2>
        </header>

        <div class="card">
            <div class="card-body p-4">

                {{-- Errors --}}
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Success --}}
                @if(session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @php
                $route = isset($edit) ? 'admin.update_product' : 'admin.store_product';
                @endphp

                <form action="{{ isset($edit) ? route($route, $edit->id) : route($route) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        {{-- Product Name --}}
                        <div class="form-group col-md-6">
                            <label for="name">Product Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', $edit->name ?? '') }}" required>
                        </div>

                        {{-- Slug --}}
                        <div class="form-group col-md-6">
                            <label for="slug">Slug <span class="text-danger">*</span></label>
                            <input type="text" name="slug" id="slug" class="form-control"
                                value="{{ old('slug', $edit->slug ?? '') }}" required>
                        </div>

                        {{-- Status --}}
                        <div class="form-group col-md-6">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="active"
                                    {{ (old('status', $edit->status ?? '')=='active')?'selected':'' }}>Active</option>
                                <option value="inactive"
                                    {{ (old('status', $edit->status ?? '')=='inactive')?'selected':'' }}>Inactive
                                </option>
                            </select>
                        </div>

                        {{-- Product Images --}}
                        <div class="form-group col-md-12">
                            <label>Product Images
                                <button type="button" class="btn btn-success btn-sm ml-2" id="addImageRow">
                                    <i class="fa fa-plus"></i> Add
                                </button>
                            </label>

                            <table class="table table-bordered" id="image_table">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Image Name</th>
                                        <th>Primary</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- Existing Images --}}
                                    @if(isset($edit->images) && $edit->images->count())
                                    @foreach($edit->images as $img)
                                    <tr>
                                        <td style="display: flex; align-items: center; gap: 10px;">
                                            {{-- Image preview --}}
                                            <img src="{{ asset($img->image) }}" class="img-preview"
                                                style="width:80px; height:80px; border:1px solid #ccc; padding:2px; border-radius:4px; object-fit: cover;">

                                            {{-- File input --}}
                                            <input type="file" name="replace_images[{{ $img->id }}]"
                                                class="form-control replaceInput" accept="image/*" style="flex: 1;">
                                        </td>

                                        <td>
                                            <input type="text" name="existing_image_names[{{ $img->id }}]"
                                                class="form-control" value="{{ $img->imageName }}"
                                                placeholder="Image Name">
                                        </td>
                                        <td class="text-center">
                                            <input type="radio" name="primary_image" value="existing_{{ $img->id }}"
                                                {{ $img->is_primary ? 'checked' : '' }}>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.delete_product_image', $img->id) }}"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this image?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif

                                    {{-- New rows will be added dynamically here --}}

                                </tbody>
                            </table>
                        </div>


                    </div>

                    {{-- Buttons --}}
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-arrow-circle-up"></i> {{ isset($edit) ? 'Update' : 'Add' }}
                            </button>
                            <a href="{{ route('admin.list_product') }}" class="btn btn-secondary">
                                <i class="fa fa-arrow-circle-left"></i> Cancel
                            </a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>
@endsection
@section('page-script')
<script>
$(document).ready(function() {
    let rowCount = 0;

    // Add new row
    function addRow() {
        let newRow = `
        <tr class="new-image-row">
            <td style="display: flex; align-items: center; gap: 10px;">
            <img src="" class="img-preview" 
                     style="width:80px; height:80px; border:1px solid #ccc; padding:2px; border-radius:4px; display:none;">                   <br>

            <input type="file" name="images[]" class="form-control imgInput" accept="image/*">
                
            </td>
            <td>
                <input type="text" name="image_names[]" class="form-control" placeholder="Image Name">
            </td>
            <td class="text-center">
                <input type="radio" name="primary_image" value="new_${rowCount}">
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-danger removeRow">-</button>
            </td>
        </tr>`;
        $('#image_table tbody').append(newRow);
        rowCount++;
    }

    // Click Add button in header
    $('#addImageRow').click(function() {
        addRow();
    });

    // Remove row
    $(document).on('click', '.removeRow', function() {
        $(this).closest('tr').remove();
    });

    // Image preview
    $(document).on('change', '.imgInput, .replaceInput', function() {
        let reader = new FileReader();
        reader.onload = e => {
            $(this).siblings('.img-preview').attr('src', e.target.result).show();
        }
        reader.readAsDataURL(this.files[0]);
    });
});
</script>
@endsection
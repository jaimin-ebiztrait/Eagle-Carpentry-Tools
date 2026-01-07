@extends('admin.layout')

{{-- page title --}}
@section('title','Products')

@section('vendor-style')
@endsection

@section('content')
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Products</li>
        </ul>
    </div>
</div>

<section>
    <div class="container-fluid">
        <header>
            <div class="row">
                <div class="col-md-7">
                    <h2 class="h3 display">Products</h2>
                </div>
                <!-- <div class="col-md-5">
                    <a href="{{ route('admin.add_product') }}" class="btn btn-primary pull-right rounded-pill">Add
                        Product</a>
                </div> -->
            </div>
        </header>

        <div class="card">
            <div class="card-body p-4">
                @if($errors->any())
                <div class="alert alert-danger  custom-alert-danger   alert-block" id="successMessage">
                    <button type="button" class="close custom-alert-close" data-dismiss="alert">×</button>
                    <span>{!! implode('', $errors->all('<div>:message</div>')) !!}</span>
                </div>
                @endif
                @if(session()->has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close custom-alert-close" data-dismiss="alert">×</button>
                    <span>{{ session()->get('success') }}</span>
                </div>
                @endif

                <div class="table-responsive">
                    <table id="product-table" class="table table-striped table-hover multiselect">
                        <thead>
                            <tr>
                                <th>
                                    <center>No</center>
                                </th>
                                <th>Name</th>
                                <th>Status</th>
                                <!-- <th>Images</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($products) && $products->count())
                            @foreach($products as $product)
                            <tr>
                                <td>
                                    <center>{{ $loop->iteration }}</center>
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    @if($product->status == 'active')
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                               

                                <td>
                                    <a href="{{ route('admin.edit_product', $product->id) }}"
                                        class="btn btn-sm btn-info" title="Edit Product">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <!-- <form action="{{ route('admin.delete_product', $product->id) }}" method="POST"
                                        style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete Product"
                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form> -->
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">No products found.</td>
                            </tr>
                            @endif

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('page-script')
<script>
$(document).ready(function() {
    $('#product-table').DataTable();
});
</script>
@endsection
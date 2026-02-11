@extends('admin.layout')

{{-- page title --}}
@section('title','Users')

@section('vendor-style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection


@section('content')

{{-- <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dash') }}">Dashboard</a></li>
<li class="breadcrumb-item active"><a href="{{ route('admin.list_cms_page') }}">CMS Pages</a></li>
<li class="breadcrumb-item ">{{ isset($edit) ? 'View/Edit CMS page' : 'Add CMS Page'}}</li>
</ul>
</div>
</div> --}}

<section>
    <div class="container-fluid">
        <header>
            <div class="row">
                <div class="col-md-7">
                    <h2 class="h3 display">{{ isset($edit) ? 'View/Edit CMS page' : 'Add CMS page'}}</h2>
                </div>
            </div>
        </header>
        <div class="card">
            <div class="card-body p-4">

              
                @if($errors->any())
                <div class="alert alert-danger  custom-alert-danger   alert-block  " id="successMessage">
                    <button type="button" class="close custom-alert-close" data-dismiss="alert">×</button>
                    <span>{!! implode('', $errors->all('<div>:message</div>')) !!}</span>
                </div>
                @endif
                @if(session()->has('success'))
                <div class="alert alert-success ">
                    <button type="button" class="close custom-alert-close" data-dismiss="alert">×</button>
                    <span>{{ session()->get('success') }}</span>
                </div>
                @endif
                @php if(isset($edit)){ $route = 'admin.update_cms_page'; }else{ $route = 'admin.store_cms_page'; }
                @endphp
                <form id="create_user" action="{{ route($route) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($edit))
        <input type="hidden" name="xid" value="{{ $edit->id }}">
    @endif

    <div class="row">

        {{-- Page Title --}}
        <div class="form-group col-sm-12 col-md-6">
            <label for="page_title">Page Title <span class="text-danger">*</span></label>
            <input id="page_title" name="page_title" type="text"
                   class="form-control validate"
                   value="{{ $edit->page_title ?? '' }}">
        </div>

        {{-- ================= SEO COMMON FIELDS ================= --}}

        <div class="form-group col-sm-12 col-md-6">
            <label>SEO Title</label>
            <input type="text" name="seo_title" class="form-control"
                   value="{{ $edit->seo_title ?? '' }}"
                   placeholder="SEO title for Google">
        </div>

        <div class="form-group col-sm-12 col-md-6">
            <label>Meta Description</label>
            <textarea name="meta_description" class="form-control" rows="3"
                      placeholder="Short description for search engines">{{ $edit->meta_description ?? '' }}</textarea>
        </div>

        <div class="form-group col-sm-12 col-md-6">
            <label>Meta Keyword </label>
            <textarea name="seo_description" class="form-control" rows="3"
                      placeholder="Meta keywords or description">{{ $edit->seo_description ?? '' }}</textarea>
        </div>

        {{-- ================= PAGE CONTENT CONDITIONS ================= --}}

        @if(isset($edit) && $edit->id == 1)

            <div class="form-group col-sm-12 col-md-9">
                <label for="page_content">Page Content <span class="text-danger">*</span></label>
                <textarea class="ckeditor form-control" name="page_content" id="page_content">
                    {{ $edit->content ?? '' }}
                </textarea>
            </div>

        @elseif(isset($edit) && $edit->id == 2)

            <div class="form-group col-md-12">
                <label>Section 1 – Header / Logos Content</label>
                <textarea class="ckeditor form-control" name="section_one">
                    {{ $edit->section_one ?? '' }}
                </textarea>
            </div>

            <div class="form-group col-md-12">
                <label>Section 2 – Welcome Content</label>
                <textarea class="ckeditor form-control" name="section_two">
                    {{ $edit->section_two ?? '' }}
                </textarea>
            </div>

            <div class="form-group col-md-12">
                <label>Section 3 – Our Products Content</label>
                <textarea class="ckeditor form-control" name="section_three">
                    {{ $edit->section_three ?? '' }}
                </textarea>
            </div>

            @elseif(isset($edit) && $edit->id == 3)

    {{-- Page Title --}}
    <div class="form-group col-sm-12 col-md-6">
        <label for="page_title">Page Title <span class="text-danger">*</span></label>
        <input id="page_title" name="page_title" type="text"
               class="form-control"
               value="{{ $edit->page_title ?? '' }}">
    </div>

    {{-- HTML Content --}}
    <div class="form-group col-sm-12">
        <label for="page_content">Page Content <span class="text-danger">*</span></label>
        <textarea class="ckeditor form-control" name="page_content" id="page_content">
            {{ $edit->content ?? '' }}
        </textarea>
    </div>


    @elseif(isset($edit) && $edit->id == 4)

    {{-- Brochure PDF --}}
    <div class="form-group col-md-6">
        <label>E-Brochure PDF</label>
        <input type="file" name="brochure_pdf" class="form-control">

        @if(!empty($edit->brochure_pdf))
            <small class="text-success">
                Current PDF:
                <a href="{{ asset($edit->brochure_pdf) }}" target="_blank">
                    View PDF
                </a>
            </small>
        @endif
    </div>

    {{-- Brochure Image --}}
    <div class="form-group col-md-6">
        <label>Brochure Image</label>
        <input type="file" name="brochure_image" class="form-control">

        @if(!empty($edit->brochure_image))
            <div class="mt-2">
                <img src="{{ asset($edit->brochure_image) }}" width="120">
            </div>
        @endif
    </div>
    
        @endif

    </div>

    {{-- Buttons --}}
    <div class="row mt-4">
        <div class="col-sm-12">
            <button class="btn btn-primary" type="submit">
                <i class="fa fa-arrow-circle-up"></i>
                {{ isset($edit) ? 'Update' : 'Add' }}
            </button>

            <a href="{{ route('admin.list_cms_page') }}" class="btn btn-secondary text-white">
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


{{-- page scripts --}}
@section('page-script')

@endsection
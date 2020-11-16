{{--disable--}}


@extends('admin.layouts.index_layout')

@section('content')
    <div class="row tm-mt-big">
        <div class="col-xl-6 col-lg-10 col-md-12 col-sm-12">
            <div class="bg-white tm-block">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Add Category</h2>
                    </div>
                </div>
                <div class="row mt-4 tm-edit-product-row">
                    <div class="col-xl-7 col-lg-7 col-md-12">
                        {{--           form             --}}
                        <form class="tm-edit-product-form" method="post" action="{{route('admin.category.store')}}" enctype='multipart/form-data' >
                            @csrf
                            {{--           title             --}}
                            <div class="input-group mb-3">
                                <label for="title" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 col-form-label">
                                    Title
                                </label>
                                <input id="title" name="title" type="text" class="form-control validate col-xl-9 col-lg-8 col-md-8 col-sm-7" placeholder="یک استایل جدید وارد کن" required>
                            </div>
                            {{--           description             --}}
                            <div class="input-group mb-3">
                                <label for="description" class="col-xl-4 col-lg-4 col-md-4 col-sm-5 mb-2">Description</label>
                                <textarea class="form-control" name="description" id="description" placeholder="درباره ی این استایل توضیح بده" required></textarea>
                                <br>
                            </div>

                            {{--           category_pic   out of form!!!             --}}
                            <div class="col-xl-4 col-lg-4 col-md-12 mx-auto mb-4">
                                <div class="tm-product-img-dummy mx-auto" style=" max-width: initial;">
                                    <i class="fas fa-5x fa-cloud-upload-alt" onclick="document.getElementById('fileInput').click();"></i>
                                </div>
                                <div class="custom-file mt-3 mb-3">
{{--                                    <input id="fileInput" type="file" style="display:none;" />--}}
                                    <input  name="category_pic" id="fileInput" type="file" style="display:none;" multiple>
                                    <input type="button" class="btn btn-primary d-block mx-auto" value="Upload ..." onclick="document.getElementById('fileInput').click();"
                                    />
                                </div>
                            </div>

                            {{--           submit             --}}
                            <div class="input-group mb-3">
                                <div class="ml-auto col-xl-8 col-lg-8 col-md-8 col-sm-7 pl-0">
                                    <button type="submit" class="btn btn-primary">Add
                                    </button>
                                </div>
                            </div>
                        </form>
                        {{--           form             --}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

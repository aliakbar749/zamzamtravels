@extends('admin.master')
@section('content')
<div class="row  mb-2 ">
    
        <div class="row">
            <form id="createproduct-form" action="{{route('admin.settingsStore')}}" method="POST" enctype="multipart/form-data"  autocomplete="off" class="needs-validation" novalidate="">
                @csrf
                <input type="hidden" name="id" value="{{$setting->id}}">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
                                        General Info
                                    </a>
                                </li>
                                
                            </ul>
                        </div>
                        <!-- end card header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <span class="highlight">*</span><label class="form-label" for="manufacturer-name-input">Title</label>
                                                <input type="text" name="title" value="{{optional($setting)->title}}" class="form-control" id="manufacturer-name-input" placeholder="Enter Tttle Here " required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <span class="highlight">*</span><label class="form-label" for="manufacturer-brand-input">Phone </label>
                                                <input type="text" name="phone" value="{{$setting->phone}}" class="form-control" id="manufacturer-brand-input" placeholder="Enter Phone Number " required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-name-input"> Whatsapp </label>
                                                <input type="text" name="whatsapp" value="{{optional($setting)->whatsapp}}" class="form-control" id="manufacturer-name-input" placeholder="Enter Whatsapp Number ">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-brand-input">Email </label>
                                                <input type="text" name="email" value="{{optional($setting)->email}}" class="form-control" id="manufacturer-brand-input" placeholder="Enter Email Here ">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                    {{--<div class="row">
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="stocks-input">Stocks</label>
                                                <input type="text" class="form-control" id="stocks-input" placeholder="Stocks" required="">
                                                <div class="invalid-feedback">Please Enter a product stocks.</div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-price-input">Price</label>
                                                <div class="input-group has-validation mb-3">
                                                    <span class="input-group-text" id="product-price-addon">$</span>
                                                    <input type="text" class="form-control" id="product-price-input" placeholder="Enter price" aria-label="Price" aria-describedby="product-price-addon" required="">
                                                    <div class="invalid-feedback">Please Enter a product price.</div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="product-discount-input">Discount</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="product-discount-addon">%</span>
                                                    <input type="text" class="form-control" id="product-discount-input" placeholder="Enter discount" aria-label="discount" aria-describedby="product-discount-addon">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="orders-input">Orders</label>
                                                <input type="text" class="form-control" id="orders-input" placeholder="Orders" required="">
                                                <div class="invalid-feedback">Please Enter a product orders.</div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>--}}
                                    <!-- end row -->
                                </div>
                                
                                <!-- end tab pane -->
                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                    <div class="card">
                        <div class="card-body">
                        
                            <div class="mb-3">
                                <label class="form-label" for="product-title-input">Address</label>
                                <textarea class="form-control" name="address" id="meta-description-input" placeholder="Enter meta description" rows="3">{{optional($setting)->address}}</textarea>
                                {{-- <input type="text" class="form-control" id="product-title-input" value="" placeholder="Enter product title" required=""> --}}
                                <div class="invalid-feedback">Please Enter a title.</div>
                            </div>
                            <div class="form-group">
                                <label><strong> Header Scripts :</strong></label>
                                <textarea class="tinymce-editor"  name="header_scripts">{{optional($setting)->header_scripts}}</textarea>
                                {{-- <textarea name="editor" class="editor" rows="10" cols="80"></textarea> --}}
                            </div>
                            <div class="form-group">
                                <label><strong>body start scripts :</strong></label>
                                {{-- <textarea class="summernote" name="header_scripts"></textarea> --}}
                                <textarea name="body_start_scripts" class="tinymce-editor">{{optional($setting)->body_start_scripts}}</textarea>
                            </div>
                            <div class="form-group">
                                <label><strong>body end scripts :</strong></label>
                                <textarea name="body_end_scripts" class="tinymce-editor">{{optional($setting)->body_end_scripts}}</textarea>
                            </div>
                            <div class="form-group">
                                <label><strong>Other Content :</strong></label>
                                <textarea class="tinymce-editor" name="other_content">{{optional($setting)->home_page_other_contents}}</textarea>
                            </div>
                            <div class="form-group">
                                <label><strong>About Us  :</strong></label>
                                <textarea class="tinymce-editor" name="about_us">{{optional($setting)->about_us}}</textarea>
                            </div>
                            <div class="form-group">
                                <label><strong>Terms and Conditions :</strong></label>
                                <textarea class="tinymce-editor" name="terms">{{optional($setting)->terms_and_policy}}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0"></h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <h5 class="fs-14 mb-1">Add Logo </h5>
                            
                                <div class="text-center">
                                    <div class="position-relative d-inline-block">
                                        <div class="position-absolute top-100 start-100 translate-middle">
                                            <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                                <div class="avatar-xs">
                                                    <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                        <i class="ri-image-fill"></i>
                                                    </div>
                                                </div>
                                            </label>
                                            {{-- <input class="form-control d-none" value="" id="first-product-image-input" type="file" onclick="uploadImage('first-product-image-input', 'first-product-img')" accept="image/png, image/gif, image/jpeg"> --}}
                                            <input type="file" name="logo" id="logo" onclick="uploadImage('logo', 'logo-img')">

                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light rounded">
                                                <img src="{{asset('uploaded_files/setting/' . $setting->logo)}}" id="logo-img" class="avatar-md h-auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            <div class="mb-4">
                                <h5 class="fs-14 mb-1">Add Favicon </h5>
                                
                                <div class="text-center">
                                    <div class="position-relative d-inline-block">
                                        <div class="position-absolute top-100 start-100 translate-middle">
                                            <label for="product-image-input" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Select Image">
                                                <div class="avatar-xs">
                                                    <div class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                        <i class="ri-image-fill"></i>
                                                    </div>
                                                </div>
                                            </label>
                                            {{-- <input class="form-control d-none" value="" id="first-product-image-input" type="file" onclick="uploadImage('first-product-image-input', 'first-product-img')" accept="image/png, image/gif, image/jpeg"> --}}
                                            <input type="file" name="favicon" id="favicon" onclick="uploadImage('favicon', 'favicon-img')">

                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light rounded">
                                                <img src="{{asset('uploaded_files/setting/' . $setting->favicon)}}" id="favicon-img" class="avatar-md h-auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0"></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="meta-title-input">Meta title</label>
                                        <input type="text" name="meta_title" value="{{optional($setting)->meta_title}}" class="form-control" placeholder="Enter meta title" id="meta-title-input">
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="meta-keywords-input">Meta Keywords</label>
                                        <input type="text" name="meta_keywords" value="{{optional($setting)->meta_keywords}}" class="form-control" >
                                        {{-- <select class="js-example-basic-multiple select2-hidden-accessible" name="keywords[]" multiple="" data-select2-id="select2-data-19-l3hc" tabindex="-1" aria-hidden="true">
                                            @php
                                                $keywords = App\Models\Keyword::get();
                                            @endphp
                                            @foreach ($keywords as $keyword)                                        
                                                <option value="{{$keyword->id}}" >{{$keyword->name}}</option>
                                            @endforeach
                                        </select> --}}
                                        
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="meta-title-input">Image</label>
                                        <input type="file" name="meta_image" id="metaImageup" onclick="uploadImage('metaImageup', 'meta_imageshow')" class="form-control" placeholder="Enter meta image ">
                                        {{-- <input type="file" name="meta_image" > --}}
                                    </div>
                                    <div class="avatar-lg">
                                        <div class="avatar-title bg-light rounded">
                                            <img src="{{asset('uploaded_files/setting/' . $setting->meta_image)}}" id="meta_imageshow" class="avatar-md h-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- end row -->

                            <div>
                                <label class="form-label" for="meta-description-input">Meta Description</label>
                                <textarea class="form-control" name="meta_description" id="meta-description-input" placeholder="Enter meta description" rows="3">{{optional($setting)->meta_description}}</textarea>
                            </div>

                            
                            

                        </div>
                    </div>
                    <!-- end card -->
                    <div class="text-end mb-3">
                        <button type="submit" class="btn btn-success w-sm">Update</button>
                    </div>
                </div>
                <!-- end col -->
            </form>

            {{--<div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="choices-publish-status-input" class="form-label">Status</label>

                            <select class="form-select" id="choices-publish-status-input" data-choices="" data-choices-search-false="">
                                <option value="Published" selected="">Published</option>
                                <option value="Scheduled">Scheduled</option>
                                <option value="Draft">Draft</option>
                            </select>
                        </div>

                        <div>
                            <label for="choices-publish-visibility-input" class="form-label">Visibility</label>
                            <select class="form-select" id="choices-publish-visibility-input" data-choices="" data-choices-search-false="">
                                <option value="Public" selected="">Public</option>
                                <option value="Hidden">Hidden</option>
                            </select>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Publish Schedule</h5>
                    </div>
                    <!-- end card body -->
                    <div class="card-body">
                        <div>
                            <label for="datepicker-publish-input" class="form-label">Publish Date & Time</label>
                            <input type="text" id="datepicker-publish-input" class="form-control" placeholder="Enter publish date" data-provider="flatpickr" data-date-format="d.m.y" data-enable-time="">
                        </div>
                    </div>
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Categories</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2"> <a href="#" class="float-end text-decoration-underline">Add
                                New</a>Select product category</p>
                        <select class="form-select" id="choices-category-input" name="choices-category-input" data-choices="" data-choices-search-false="">
                            <option value="Appliances">Appliances</option>
                            <option value="Automotive Accessories">Automotive Accessories</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Furniture">Furniture</option>
                            <option value="Grocery">Grocery</option>
                            <option value="Kids">Kids</option>
                            <option value="Watches">Watches</option>
                        </select>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Tags</h5>
                    </div>
                    <div class="card-body">
                        <div class="hstack gap-3 align-items-start">
                            <div class="flex-grow-1">
                                <input class="form-control" data-choices="" data-choices-multiple-remove="true" placeholder="Enter tags" type="text" value="Cotton">
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Short Description</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2">Add short description for product</p>
                        <textarea class="form-control" placeholder="Must enter minimum of a 100 characters" rows="3"></textarea>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

            </div>--}}
            <!-- end col -->
        </div>
        <!-- end row -->

    
</div>
<script>
    // image_upload.js
function uploadImage(inputId, previewId) {
    // var fileInput = document.getElementById(inputId);
    // document.getElementById(inputId).click();

    // fileInput.addEventListener('change', function (event) {
    //     var fileInput = event.target;
    //     if (fileInput.files && fileInput.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             document.getElementById(previewId).setAttribute('src', e.target.result);
    //         };

    //         reader.readAsDataURL(fileInput.files[0]);
    //     }
    // });

    const input = document.getElementById(inputId);
        const img = document.getElementById(previewId);

        input.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function () {
                    img.src = reader.result;
                });

                reader.readAsDataURL(file);
            }
        });
}
</script>
@endsection
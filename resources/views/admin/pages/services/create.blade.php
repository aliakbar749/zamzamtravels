@extends('admin.master')

@section('content')
<div class="row  mb-2 ">
    <div class="row">
        <form id="createproduct-form" method="post"  action="{{route('service.store')}}" enctype="multipart/form-data" autocomplete="off" class="needs-validation" novalidate="">
            @csrf
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
                                        <select class="form-select mb-3" aria-label="Default select example" name="service_category">
                                                <option value="0">Select Service Category</option>
                                                @php
                                                    $service_categories = App\Models\Service_Category::where('category_id',0)->get();

                                                @endphp
                                                @foreach ($service_categories as $data)
                                                    <option value="{{$data->id}}">{{$data->title}}</option> 
                                                    @php
                                                        $subcategories = App\Models\Service_Category::where('category_id', $data->id)->get();
                                                    @endphp
                                                    @foreach ($subcategories as $subcategory)
                                                        <option value="{{$subcategory->id}}">-- {{$subcategory->title}}</option> 
                                                    @endforeach
                                                @endforeach
                                                
                                            </select>
                                    </div>
                                </div>
                                <!--end row -->
                                
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-name-input">Title</label>
                                            <input type="text" name="title" class="form-control" id="title-input" placeholder="Enter Tttle Here ">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-name-input">Sub Title</label>
                                            <input type="text" name="subtitle" class="form-control" id="manufacturer-name-input" placeholder="Enter Tttle Here ">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-name-input">URL  </label>
                                            <input type="text" name="url" class="form-control" id="url-input" id="manufacturer-name-input" placeholder="Enter URL Here  ">
                                        </div>
                                        <div id="processing_id"></div>
                                        <div id="url_check_output"></div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3" style="margin-top: 2rem !important">
                                            <button type="button" id="check-url-button" onclick="check_exist_url()"  class="btn btn-sm btn-success"> Check Url</button>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- end row -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-brand-input">Serial  </label>
                                            <input type="number" name="serial" class="form-control" id="manufacturer-brand-input" placeholder="Enter Email Here ">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-brand-input">Necessary File  </label>
                                            <input type="file" name="necessary_file" class="form-control" id="manufacturer-brand-input" placeholder="Enter Sub Title ">
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                                
                                <!-- end row -->
                                <div class="row">
                                    
                                    <div class="col-lg-6">
                                        <label for="genderInput" class="form-label">Is Active </label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_active" id="inlineRadio1" value="1">
                                                <label class="form-check-label" for="inlineRadio1">Yes </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_active" id="inlineRadio2" value="0">
                                                <label class="form-check-label" for="inlineRadio2">No </label>
                                            </div>
                                            
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-lg-6">
                                        <label for="genderInput" class="form-label">Is Popular </label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_popular" id="inlineRadio3" value="1">
                                                <label class="form-check-label" for="inlineRadio1">Yes </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_popular" id="inlineRadio4" value="0">
                                                <label class="form-check-label" for="inlineRadio2">No </label>
                                            </div>
                                            
                                        </div>
                                    </div><!--end col-->
                                </div>
                                <!-- end row -->
                                <!-- end row -->
                                <div class="row mt-2">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-name-input"> Package Overview   </label>
                                            
                                            <textarea class="tinymce-editor" id="package-overview-editor" name="package_overview"></textarea>
                                        </div> 
                                    </div>
                                    
                                </div>
                                <!-- end row -->
                                <div class="row mt-2">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-name-input">Itinerary   </label>
                                            
                                            <textarea class="tinymce-editor" id="itinery-editor" name="itinerary"></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- end row -->
                                <div class="row mt-2">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-name-input">Notes and Policy   </label>
                                            {{-- <input type="text" class="form-control" id="manufacturer-name-input" placeholder="Enter URL Here  "> --}}
                                            {{-- <textarea class="form-control" id="exampleFormControlTextarea5" rows="3"></textarea> --}}
                                            <textarea class="tinymce-editor" id="notes-policy-editor" name="notes_and_policy"></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- end row -->
                                <div class="row mt-2">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="package-pricing-input"> Package Pricing </label>
                                            <textarea id="package-pricing-editor" class="tinymce-editor" name="package_pricing"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                                
                                <div class="row mt-2">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="short-description-input">Short Description</label>
                                            <textarea id="short-description-editor" class="tinymce-editor" name="short_description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                                
                                <div class="row mt-2">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label" for="long-description-input"> Long Description </label>
                                            <textarea id="long-description-editor" class="tinymce-editor" name="long_description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-name-input">You Tube Link   </label>
                                            <input type="text" name="you_tube_link" class="form-control" id="manufacturer-name-input" placeholder="Enter You Tube Link  ">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-brand-input">Start Price </label>
                                            <input type="number" name="start_price" class="form-control" id="manufacturer-brand-input" placeholder="Enter Start Price ">
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                                
                                <!-- end row -->
                            </div>
                            <!-- end tab-pane -->

                        </div>
                        <!-- end tab content -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"></h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">Image  </h5>
                        
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
                                        
                                        <input type="file" name="image" id="logo" onclick="uploadImage('logo', 'logo-img')">

                                    </div>
                                    <div class="avatar-lg">
                                        <div class="avatar-title bg-light rounded">
                                            <img src="" id="logo-img" class="avatar-md h-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="mb-4">
                            <h5 class="fs-14 mb-1">Breadcrumb Image </h5>
                            
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
                                        
                                        <input type="file" name="breadcrumb_image" id="favicon" onclick="uploadImage('favicon', 'favicon-img')">

                                    </div>
                                    <div class="avatar-lg">
                                        <div class="avatar-title bg-light rounded">
                                            <img src="" id="favicon-img" class="avatar-md h-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"> Meta Data </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="meta-title-input">Meta title</label>
                                    <input type="text" name="meta_title" class="form-control" placeholder="Enter meta title" id="meta-title-input">
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-4" data-select2-id="select2-data-64-jjpy">
                                
                                <label class="form-label" for="meta-title-input">Meta Keywords</label>
                                <input type="text" name="meta_keywords" class="form-control" placeholder="Enter meta keywords" id="meta-keywords-input">
                                    
                                
                            </div>
                            <!-- end col -->
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-4" data-select2-id="select2-data-64-jjpy">
                                <label class="form-label" for="meta-title-input">Meta Tags</label>
                                <input type="text" name="meta_tags" class="form-control" placeholder="Enter meta tags" id="meta-tag-input">
                                
                            </div>
                            <!-- end col -->
                        </div>
                        <div>
                            <label class="form-label" for="meta-description-input">Meta Description</label>
                            <textarea class="form-control" name="meta_description" id="meta-description-input" placeholder="Enter meta description" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <!-- end card -->
                <div class="text-end mb-3">
                    <button type="submit" class="btn btn-success w-sm">Submit</button>
                </div>
            </div>
            <!-- end col -->
            <input type="hidden" name="" id="urlPage" value="service">
        </form>

        <!-- end col -->
    </div>
    <!-- end row -->  
</div>
<x-check-url/>
<script>
    // image_upload.js
    function uploadImage(inputId, previewId) {
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
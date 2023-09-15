@extends('admin.master')
@section('content')
<div class="row  mb-2 ">
    
        <div class="row">
            <form id="createproduct-form"  method="POST"  action="{{route('serviceCategory.update', $serviceCategory->id)}}" enctype="multipart/form-data" autocomplete="off" class="needs-validation" novalidate="">
                @csrf
                @method('PUT')

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
                                        General Info
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#addproduct-metadata" role="tab">
                                        Meta Data
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
                                            <select class="form-select rounded-pill mb-3" aria-label="Default select example" name="service_category" >
                                                <option value="{{$serviceCategory->category_id}}" selected="">Select Service Category</option>
                                                @php
                                                    $service_categories = App\Models\Service_Category::all();
                                                @endphp
                                                @foreach ($service_categories as $data)
                                                    <option value="{{$data->id}}">{{$data->title}}</option> 
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-name-input">Title</label>
                                                <input type="text" name="title" value="{{$serviceCategory->title}}" class="form-control" id="title-input" placeholder="Enter Tttle Here ">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-brand-input">Sub Title  </label>
                                                <input type="text" name="subtitle" value="{{$serviceCategory->subtitle}}"  class="form-control" id="manufacturer-brand-input" placeholder="Enter Sub Title ">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->  
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-name-input">URL  </label>
                                                <input type="text" name="url" value="{{$serviceCategory->url}}"   class="form-control" id="url-input" id="manufacturer-name-input" placeholder="Enter URL Here  ">
                                            </div>
                                            <div id="processing_id"></div>
                                            <div id="url_check_output"></div>
                                        </div>
                                        
                                        

                                        <div class="col-lg-4">
                                            <div class="mb-3" style="margin-top: 2rem !important">
                                                <button type="button" id="check-url-button" onclick="check_exist_url()"  class="btn btn-sm btn-success"> Check Url</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-brand-input">Serial  </label>
                                                <input type="number" name="serial" value="{{$serviceCategory->serial}}"  class="form-control" id="manufacturer-brand-input" placeholder="Enter Email Here ">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                    <!-- end row -->

                                    <div class="row">
                                       
                                        <div class="col-lg-12">
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
                                    </div>
                                    <!-- end row -->
                                    <!-- end row -->
                                    <div class="row mt-2">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-name-input">Short Description   </label>
                                                {{-- <input type="text" class="form-control" id="manufacturer-name-input" placeholder="Enter URL Here  "> --}}
                                                <textarea class="form-control"  name="short_descriptions" id="exampleFormControlTextarea5" rows="3">{{$serviceCategory->short_description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-brand-input">Long Description   </label>
                                                {{-- <input type="number" class="form-control" id="manufacturer-brand-input" placeholder="Enter Email Here "> --}}
                                                <textarea class="form-control" name="long_descriptions" id="exampleFormControlTextarea5" rows="3">{{$serviceCategory->long_description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->

                                  
                                    <!-- end row -->
                                </div>
                                <!-- end tab-pane -->

                                <div class="tab-pane" id="addproduct-metadata" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="meta-title-input">Meta title</label>
                                                <input type="text"  name="meta_title" value="{{$serviceCategory->meta_title}}" class="form-control" placeholder="Enter meta title" id="meta-title-input">
                                            </div>
                                        </div>
                                        <!-- end col -->

                                        <div class="col-lg-4" data-select2-id="select2-data-64-jjpy">
                                            
                                            <label class="form-label" for="meta-title-input">Meta Keywords</label>
                                            <input type="text"  class="form-control" name="meta_keywords" value="{{optional($serviceCategory)->meta_keywords}}">
                                                {{-- <select class="js-example-basic-multiple select2-hidden-accessible" name="states[]" multiple="" data-select2-id="select2-data-19-l3hc" tabindex="-1" aria-hidden="true">
                                                    
                                                    <optgroup label="FR" data-select2-id="select2-data-45-qpg3">
                                                        <option value="Paris" data-select2-id="select2-data-46-23je">Paris</option>
                                                        <option value="Lyon" data-select2-id="select2-data-47-uuwd">Lyon</option>
                                                        <option value="Marseille" data-select2-id="select2-data-48-k1i1">Marseille</option>
                                                    </optgroup>
                                                    <optgroup label="SP" data-select2-id="select2-data-49-r5rp">
                                                        <option value="Madrid" selected="" data-select2-id="select2-data-22-x335">Madrid</option>
                                                        <option value="Barcelona" data-select2-id="select2-data-50-ci59">Barcelona</option>
                                                        <option value="Malaga" data-select2-id="select2-data-51-s1y4">Malaga</option>
                                                    </optgroup>
                                                    <optgroup label="CA" data-select2-id="select2-data-52-ogz4">
                                                        <option value="Montreal" data-select2-id="select2-data-53-ysg4">Montreal</option>
                                                        <option value="Toronto" data-select2-id="select2-data-54-wcxv">Toronto</option>
                                                        <option value="Vancouver" data-select2-id="select2-data-55-52hg">Vancouver</option>
                                                    </optgroup>
                                                </select> --}}
                                                {{-- <select class="js-example-basic-multiple select2-hidden-accessible" name="keywords[]" multiple="" data-select2-id="select2-data-19-l3hc" tabindex="-1" aria-hidden="true">
                                                    @php
                                                        $keywords = App\Models\Keyword::get();
                                                    @endphp
                                                    @foreach ($keywords as $keyword)                                        
                                                        <option value="{{$keyword->id}}" >{{$keyword->name}}</option>
                                                    @endforeach
                                                </select> --}}
                                                {{-- <span class="select2 select2-container select2-container--default select2-container--above select2-container--focus select2-container--open" dir="ltr" data-select2-id="select2-data-20-1p5y" style="width: 117px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="true" tabindex="-1" aria-disabled="false" aria-owns="select2-states-8z-results" aria-activedescendant="select2-states-8z-result-ajq8-London"><ul class="select2-selection__rendered" id="select2-states-8z-container"><li class="select2-selection__choice" title="London" data-select2-id="select2-data-82-dfsc"><button type="button" class="select2-selection__choice__remove" tabindex="-1" title="Remove item" aria-label="Remove item" aria-describedby="select2-states-8z-container-choice-r3i4-London"><span aria-hidden="true">×</span></button><span class="select2-selection__choice__display" id="select2-states-8z-container-choice-r3i4-London">London</span></li><li class="select2-selection__choice" title="Madrid" data-select2-id="select2-data-83-t76n"><button type="button" class="select2-selection__choice__remove" tabindex="-1" title="Remove item" aria-label="Remove item" aria-describedby="select2-states-8z-container-choice-2fgm-Madrid"><span aria-hidden="true">×</span></button><span class="select2-selection__choice__display" id="select2-states-8z-container-choice-2fgm-Madrid">Madrid</span></li><li class="select2-selection__choice" title="Montreal" data-select2-id="select2-data-84-05dw"><button type="button" class="select2-selection__choice__remove" tabindex="-1" title="Remove item" aria-label="Remove item" aria-describedby="select2-states-8z-container-choice-flj7-Montreal"><span aria-hidden="true">×</span></button><span class="select2-selection__choice__display" id="select2-states-8z-container-choice-flj7-Montreal">Montreal</span></li></ul><span class="select2-search select2-search--inline"><textarea class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-label="Search" aria-describedby="select2-states-8z-container" placeholder="" style="width: 0.75em;" aria-controls="select2-states-8z-results" aria-activedescendant="select2-states-8z-result-ajq8-London"></textarea></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> --}}
                                            
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                    <div class="row">
                                       
                                        <div class="col-lg-4" data-select2-id="select2-data-64-jjpy">
                                            <label class="form-label" for="meta-title-input">Meta Tags</label>
                                            <input type="text"  class="form-control" name="tags" value="{{optional($serviceCategory)->tags}}">
                                           
                                            {{-- <select class="js-example-basic-multiple select2-hidden-accessible" name="tags[]" multiple="" data-select2-id="select2-data-19-l3hc" tabindex="-1" aria-hidden="true">
                                                
                                                    @php
                                                        $tags = App\Models\Tag::get();
                                                    @endphp
                                                    @foreach ($tags as $tag)                                           
                                                        <option value="{{$tag->id}}" >{{$tag->name}}</option>
                                                    @endforeach
                                            </select> --}}
                                            {{-- <span class="select2 select2-container select2-container--default select2-container--above select2-container--focus select2-container--open" dir="ltr" data-select2-id="select2-data-20-1p5y" style="width: 117px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="true" tabindex="-1" aria-disabled="false" aria-owns="select2-states-8z-results" aria-activedescendant="select2-states-8z-result-ajq8-London"><ul class="select2-selection__rendered" id="select2-states-8z-container"><li class="select2-selection__choice" title="London" data-select2-id="select2-data-82-dfsc"><button type="button" class="select2-selection__choice__remove" tabindex="-1" title="Remove item" aria-label="Remove item" aria-describedby="select2-states-8z-container-choice-r3i4-London"><span aria-hidden="true">×</span></button><span class="select2-selection__choice__display" id="select2-states-8z-container-choice-r3i4-London">London</span></li><li class="select2-selection__choice" title="Madrid" data-select2-id="select2-data-83-t76n"><button type="button" class="select2-selection__choice__remove" tabindex="-1" title="Remove item" aria-label="Remove item" aria-describedby="select2-states-8z-container-choice-2fgm-Madrid"><span aria-hidden="true">×</span></button><span class="select2-selection__choice__display" id="select2-states-8z-container-choice-2fgm-Madrid">Madrid</span></li><li class="select2-selection__choice" title="Montreal" data-select2-id="select2-data-84-05dw"><button type="button" class="select2-selection__choice__remove" tabindex="-1" title="Remove item" aria-label="Remove item" aria-describedby="select2-states-8z-container-choice-flj7-Montreal"><span aria-hidden="true">×</span></button><span class="select2-selection__choice__display" id="select2-states-8z-container-choice-flj7-Montreal">Montreal</span></li></ul><span class="select2-search select2-search--inline"><textarea class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-label="Search" aria-describedby="select2-states-8z-container" placeholder="" style="width: 0.75em;" aria-controls="select2-states-8z-results" aria-activedescendant="select2-states-8z-result-ajq8-London"></textarea></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> --}}
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->

                                    <div>
                                        <label class="form-label" for="meta-description-input">Meta Description</label>
                                        <textarea class="form-control" name="meta_description" id="meta-description-input"  rows="3">{{$serviceCategory->meta_description}}</textarea>
                                    </div>
                                </div>
                                <!-- end tab pane -->
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
                                            {{-- <input class="form-control d-none" value="" id="first-product-image-input" type="file" onclick="uploadImage('first-product-image-input', 'first-product-img')" accept="image/png, image/gif, image/jpeg"> --}}
                                            <input type="file" id="logo" name="image" onclick="uploadImage('logo', 'logo-img')">

                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light rounded">
                                                <img src="{{asset('uploaded_files/service_categories/'. $serviceCategory->image)}}" id="logo-img" class="avatar-md h-auto">
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
                                            {{-- <input class="form-control d-none" value="" id="first-product-image-input" type="file" onclick="uploadImage('first-product-image-input', 'first-product-img')" accept="image/png, image/gif, image/jpeg"> --}}
                                            <input type="file" name="breadcrumb_image" id="favicon" onclick="uploadImage('favicon', 'favicon-img')">

                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light rounded">
                                                <img src="{{asset('uploaded_files/service_categories/'. $serviceCategory->breadcrumb_image)}}" id="favicon-img" class="avatar-md h-auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                    <div class="text-end mb-3">
                        <button type="submit" class="btn btn-success w-sm">Submit</button>
                    </div>
                </div>
                <!-- end col -->
                <input type="hidden" name="" id="urlPage" value="category">
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

<script>
    // Get references to the input fields
    const titleInput = document.getElementById("title-input");
    const urlInput = document.getElementById("url-input");

    // Add an event listener to the title input
    titleInput.addEventListener("input", function () {
        // Update the value of the URL input with the value from the title input
        urlInput.value = titleInput.value.replace(/\s+/g, '-');
    });
</script>

<script>
    $('#url').keyup(function () {
    check_exist_url();
});

function check_exist_url() {
    $('#url_check_output').html('');
    var status = $('#status').val();
    var url = $('#url-input').val();
    var urlPage = $('#urlPage').val();
    console.log(urlPage);
    if(url != '') {
        $.ajax({
            url: "{{route('admin.checkurl')}}",
            type: "get",
            data: {
                url:url,
                status:status,
                urlPage:urlPage,
            },
            beforeSend: function(xhr) {
                $('#processing_id').html('<div style="padding: 10px; color: #0CC510;">Checking url...<div>');
            },
            success: function(data) {
                // console.log(data)
                if(data['status'] == 'yes') {
                    $('#url_check_output').html('<span class="bg-danger p-1 text-light">'+data['title']+'</span>');
                }
                else if(data['status'] == 'no'){
                    $('#url_check_output').html('<span class="text-success"><i class="fas fa-check"></i></span>');
                }
                $('#processing_id').html('');
            },
        });
    }
}
</script>
@endsection
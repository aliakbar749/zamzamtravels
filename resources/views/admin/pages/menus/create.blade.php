@extends('admin.master')
@section('content')
<div class="row  mb-2 ">
    
        <div class="row">
            <form id="createproduct-form" method="POST" action="{{route('menu.store')}}" enctype="multipart/form-data" autocomplete="off" class="needs-validation" novalidate="">
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
                                    <div class="row" style="align-items:center;">
                                        <div class="col-lg-6">
                                            <select class="form-select  mb-3" name="parent_menu_id" aria-label="Default select example">
                                                <option selected="" value="0">Select Menu </option>
                                                @php
                                                    $menus = App\Models\Menu::select('id', 'title')->get();
                                                @endphp
                                                @foreach ($menus as $menu)
                                                    <option value="{{optional($menu)->id}}">{{optional($menu)->title}}</option>
                                                @endforeach
                                                
                                                <option value="2">UI/UX Design</option>
                                                <option value="3">Back End Development</option>
                                            </select>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-name-input"> Menu Title</label>
                                                <input type="text" class="form-control" name="title" id="title-input" placeholder="Enter Tttle Here ">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label class="form-label" for="manufacturer-brand-input">Serial  </label>
                                                <input type="number" class="form-control" name="serial" id="manufacturer-brand-input" placeholder="Enter Email Here ">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
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
                                        </div>
                                    </div>
                                    <!-- end row -->
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

                                  
                                    <!-- end row -->
                                </div>
                               
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
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="meta-title-input">Meta title</label>
                                        <input type="text" name="meta_title" value="" class="form-control" placeholder="Enter meta title" id="meta-title-input">
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="meta-keywords-input">Meta Keywords</label>
                                        <input type="text" name="meta_keywords" value="" class="form-control" >
                                       
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
                                            <img src="{{asset('uploaded_files/menu/' . $setting->meta_image)}}" id="meta_imageshow" class="avatar-md h-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- end row -->
                            <div class="row mt-3">
                                <div class="col-lg-8">
                                    <label class="form-label" for="meta-description-input">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" id="meta-description-input" placeholder="Enter meta description" rows="3"></textarea>
                                    
                                </div>
                                <div class="col-lg-4">
                                    <label for="genderInput" class="form-label">Is Used This Meta </label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_used_this_meta" id="inlineRadio1" value="1">
                                                <label class="form-check-label" for="inlineRadio1">Yes </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="is_used_this_meta" id="inlineRadio2" value="0">
                                                <label class="form-check-label" for="inlineRadio2">No </label>
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
                <input type="hidden" name="" id="urlPage" value="menu">
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
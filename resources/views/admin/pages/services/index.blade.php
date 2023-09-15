@extends('admin.master')
@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"> Services    </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">SL </th>
                                    <th scope="col">Service Title </th>
                                    <th scope="col">Sub title  </th>
                                    <th scope="col">Action </th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i= 1;
                                    @endphp
                                    @foreach ($services as $data) 
                                        <tr>
                                            <th scope="row">{{$i++}}</th>
                                            <td>{{$data->title}}</td>
                                            <td>
                                                {{$data->subtitle}} 
                                            </td>
                                            <td>
                                                <form method="POST" action="#">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <a href="{{ route('service.edit', $data->id) }}" onclick="editSlider({{ $data->id }})"><i class="ri-edit-fill" style="font-size: 18px;"></i></a> 
                                                    <a href="{{route('service.destroy', $data->id)}}" class="show_confirm"><i class="ri-delete-bin-fill" style="font-size: 18px;margin-left: 10px;"></i></a>
                                                
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- end card -->

    <!-- slider Grids in modals -->

    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Add Slider </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label for="firstName" class="form-label">Slider Title </label>
                                    <input type="text" class="form-control" id="title" placeholder="Enter Slider Title">
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="firstName" class="form-label">Serial  </label>
                                    <input type="number" class="form-control" id="serial" placeholder="Enter Serial">
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="lastName" class="form-label">Link </label>
                                    <input type="text" class="form-control" id="link" name="link" placeholder="Enter link ">
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="lastName" class="form-label">Video Link </label>
                                    <input type="text" class="form-control" id="video_link" name="video_link" placeholder="Enter link ">
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-12">
                                <label for="genderInput" class="form-label">Is Active </label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_active" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Yes </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_active" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">No </label>
                                    </div>
                                    
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <label for="genderInput" class="form-label"> Image   </label>
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
                                            <input type="file" id="logo" onclick="uploadImage('logo', 'logo-img')">

                                        </div>
                                        <div class="avatar-lg">
                                            <div class="avatar-title bg-light rounded">
                                                <img src="" id="logo-img" class="avatar-md h-auto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="col-xxl-6">
                                {{-- <div>
                                    <label for="emailInput" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="emailInput" placeholder="Enter your email">
                                </div> --}}
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                {{-- <div>
                                    <label for="passwordInput" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="passwordInput" value="451326546">
                                </div> --}}
                            </div>
                            <!--end col-->
                            <div class="col-lg-12" style="margin-top: 20px;">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end mb-3">
        <button type="submit" class="btn btn-success w-sm">Submit</button>
    </div>
</div>

@endsection
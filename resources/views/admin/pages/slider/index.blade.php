@extends('admin.master')
@section('content')
<button type="button" style="display:flex; margin-bottom: 5px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
    Add New Slider 
</button>
<div class="col-lg-12">
    <div class="card">
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">All Sliders </h5>
                    </div>
                    <div class="card-body">
                        @if(count($sliders)>0)
                            <div class="table-responsive">
                                <table class="table table-bordered border-primary">
                                    <thead>
                                    <tr>
                                        <th scope="col">SL.</th>
                                        <th scope="col">Title </th>
                                        <th scope="col">Image </th>
                                        <th scope="col">Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i= 1
                                        @endphp
                                        @foreach ($sliders as $data)
                                            <tr style="text-align: center;">
                                                <th scope="row">{{$i ++}}</th>
                                                <td>{{optional($data)->title}}</td>
                                                <th>
                                                    <img style="height: 100px;width: 200px;text-align: center; " src="{{asset('uploaded_files/slider/'. $data->image)}}" alt="">
                                            
                                                </th>
                                                <td>
                                                    <form method="POST" action="{{ route('admin.slider.delete', $data->id) }}">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <a href="" onclick="editSlider({{ $data->id }})" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-edit-fill" style="font-size: 18px;"></i></a> 
                                                        <a href="{{route('admin.slider.delete', $data->id)}}" class="show_confirm"><i class="ri-delete-bin-fill" style="font-size: 18px;margin-left: 10px;"></i></a>
                                                     
                                                    </form>
                                                     {{--<form method="POST" action="{{ route('admin.slider.delete', $data->id) }}">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="ri-delete-bin-fill" style="font-size: 18px;margin-left: 10px;"></i></button>
                                                    </form>--}}
                                                </td>
                                            </tr>
                                    @endforeach
                                    
                                    {{--<tr>
                                        <th scope="row">3</th>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>--}}
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <h3>No Sliders Uploaded Yet </h3>
                        @endif
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
                    <form action="{{route('admin.slider.create')}}"method="post" enctype="multipart/form-data">
                        @csrf    
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label for="firstName" class="form-label">Slider Title </label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Slider Title">
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label for="firstName" class="form-label">Serial  </label>
                                    <input type="number" class="form-control" id="serial" name="serial" placeholder="Enter Serial">
                                </div>
                            </div><!--end col-->

                            <div class="col-xxl-6">
                                <div>
                                    <label for="lastName" class="form-label">Image </label>
                                    <input type="file" class="form-control" id="slider_image" name="slider_image">
                                </div>
                            </div>
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
                                        <input class="form-check-input" type="radio" name="is_active" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">Yes </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="is_active" id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2">No </label>
                                    </div>
                                </div>
                            </div><!--end col-->
                            
                            
                            
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
                            <input type="hidden"  id="slider_id">
                            <div class="col-lg-12" style="margin-top: 20px;">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" id="submitBtn"  class="btn btn-primary">Submit</button>
                                    <button type="button" id="updateBtn" onclick="updateSlider(document.getElementById('slider_id').value)" style="display: none;" class="btn btn-primary">Update</button>
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

<script>
    function editSlider(id){
        // alert(id);
        $.ajax({
            url: '/admin/edit-slider/' + id, // Replace with your actual route
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response.title)
                // Here, you can use the fetched data to populate your modal or form fields
                // For example, if you have a modal with an input field with id "sliderTitle"

                $('#slider_id').val(response.id);
                $('#title').val(response.title);
                $('#slider_image').val(response.slider_image);
                $('#serial').val(response.serial);
                $('#link').val(response.link);
                $('#video_link').val(response.video_link);
                if (response.is_active === 1) {
                    $('#inlineRadio1').prop('checked', true);
                } else {
                    $('#inlineRadio2').prop('checked', true);
                }
  
                $('#updateBtn').show();
                $('#submitBtn').hide();
                // Open the modal if you're using a Bootstrap modal
                // $('#exampleModalgrid').modal('show');
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }

    function updateSlider(id){
        
        $.ajax({
            url: '/admin/update-slider/' + id, // Replace with your actual route
            method: 'POST',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}', 
                title: $('#title').val(),
                slider_image: $('#slider_image').val(),
                serial: $('#serial').val(),
                link: $('#link').val(),
                video_link: $('#video_link').val(),
                is_active: $('input[name="is_active"]:checked').val()
            },
            success: function(response) {
                
                // Here, you can use the fetched data to populate your modal or form fields
                // For example, if you have a modal with an input field with id "sliderTitle"
                
                
                window.location.reload();
                $('#exampleModalgrid').modal('hide');
                toastr.success(response.message);
                // Open the modal if you're using a Bootstrap modal
                // $('#exampleModalgrid').modal('show');
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }


</script>

@endsection

@extends('admin.master')
@section('content')
{{-- <button type="button" style="display:flex; margin-bottom: 5px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
    Add New Menu  
</button> --}}

<div class="col-lg-12">
    <div class="card">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0"> All Menus </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered border-primary">
                                <thead>
                                  <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">URL  </th>
                                    <th scope="col">Action </th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i= 1;
                                    @endphp
                                    @foreach ($urls as $url)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{optional($url)->url}}</td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.slider.delete', $url->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <a href="" onclick="editUrl({{ $url->id }})" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i class="ri-edit-fill" style="font-size: 18px;"></i></a> 
                                                <a href="{{route('admin.slider.delete', $url->id)}}" class="show_confirm"><i class="ri-delete-bin-fill" style="font-size: 18px;margin-left: 10px;"></i></a>
                                             
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
                    <h5 class="modal-title" id="exampleModalgridLabel"> Edit  Url  </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0);">
                        <input type="hidden" name="id" id="url_id">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label for="firstName" class="form-label"> Url </label>
                                    <input type="text" name="url" class="form-control" id="url" >
                                </div>
                            </div>
                            
                            
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
                            </div>
                            <!--end col-->
                            <div class="col-lg-12" style="margin-top: 20px;">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" onclick="updateUrl(document.getElementById('url_id').value)" class="btn btn-primary">Submit</button>
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
    function editUrl(id){
        // alert(id);  
        $.ajax({
            url: '/admin/edit-url/' + id, // Replace with your actual route
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                // console.log(response.title)
                // Here, you can use the fetched data to populate your modal or form fields
                // For example, if you have a modal with an input field with id "sliderTitle"

                $('#url_id').val(response.id);
                $('#url').val(response.url);
                
                if (response.is_active == 1) {
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

    function updateUrl(){
        // alert(id);
        $.ajax({
            url: '/admin/update-url/' + id, // Replace with your actual route
            method: 'POST',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}', 
                url: $('#url').val(),
                is_active: $('input[name="is_active"]:checked').val()
            },
            success: function(response) {
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
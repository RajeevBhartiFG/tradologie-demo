@extends('layouts.web')

@section('content')
<div class="jumbotron text-center">
    <h1 class="display-4">Welcome to User Panel</h1>

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Add New Service Data
</button>
    
    <hr class="my-4">


        <div class="row bg-primary text-white fw-bold p-2">
            <div class="col-2">Service Data</div>
            <div class="col-5">Service Name</div>
            <div class="col-5">My Price</div>
        </div>
   
    @foreach($userServiceData as $data)
        <div class="row border-bottom p-2 clickable-row" data-id="{{ $data->id }}">

            <div class="col-2">
                @if(count($data->getServiceData)>0)
                <button type="button" class="btn btn-info" onclick="showServiceData({{ $data->id }})">Show</button>
                @else
                    <p><b>N/A</b></p>
                @endif
            </div>

            <div class="col-5">{{ $data->service_name }}</div>
            <div class="col-5">{{ $data->price }}</div>
        </div>

        @if(count($data->getServiceData)>0)
        <div class="col-9" id="sdata{{$data->id}}" style="display:none">
            <div class="row bg-success text-white fw-bold p-2">
                <div class="col-3">Service Provide</div>
                <div class="col-2">Provicer Price</div>
                <div class="col-4">message</div>
                <div class="col-3">DateTime</div>
            </div>

            @foreach($data->getServiceData as $sdata)
                <div class="row border-bottom p-2 clickable-row">
                    <div class="col-3">{{$sdata->getUser->name}}</div>
                    <div class="col-2">{{$sdata->price}}</div>
                    <div class="col-4">{{$sdata->message}}</div>
                    <div class="col-3">{{$sdata->created_at}}</div>

                </div>
            @endforeach
        </div>
        @endif



    @endforeach




</div>


@include('users.add-service-data-modal');

@endsection

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
function showServiceData(id){
    $('#sdata'+id).toggle();
}

         $(document).ready(function() {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            $('#contactForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    
                    url: "{{ route('userdata.store') }}",
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response.success);
                        
                       // $('#exampleModal').modal('hide');
                        //$('#contactForm')[0].reset();
                      location.reload();
                    },
                    error: function(xhr) {
                        console.log(xhr)
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        });  

        flatpickr("#datetime", {
            enableTime: true,            // Enable time selection
            dateFormat: "Y-m-d H:i",     // Format for the datetime
            time_24hr: true              // Use 24-hour format
        });


        
    </script>
@endsection




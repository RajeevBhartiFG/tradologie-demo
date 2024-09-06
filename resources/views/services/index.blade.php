@extends('layouts.web')

@section('content')
<div class="jumbotron text-center">
    <h1 class="display-4">Welcome to Service Panel</h1>
    
    <hr class="my-4">

    
    <div class="row bg-primary text-white fw-bold p-2">
            <div class="col-2">Service Data</div>
            <div class="col-4">User Name</div>
            <div class="col-4">Service Name</div>
            <div class="col-2">User Price</div>
        </div>
   
    @foreach($userServiceData as $data)
        <div class="row border-bottom p-2 clickable-row" data-id="{{ $data->id }}">

            <div class="col-2">
                @if(count($data->getServiceData)>0)
                <button type="button" class="btn btn-info" onclick="showServiceData({{ $data->id }})">Show</button>
                @else
                    <p><b>N/A</b></p>
                @endif

                @if(\Carbon\Carbon::parse($data->service_start) <=  \Carbon\Carbon::now()  &&  \Carbon\Carbon::now() <=  \Carbon\Carbon::parse($data->service_end))
                    <button type="button" class="btn btn-info" onclick="showDataModel({{ $data->id }})">Add</button>
                @endif
            </div>

            <div class="col-4">{{ $data->getUser->name}}</div>
            <div class="col-4">{{ $data->service_name }}</div>
            <div class="col-2">{{ $data->price }}</div>
        </div>

        @if(count($data->getServiceData)>0)
        <div class="col-9" id="sdata{{$data->id}}" style="display:none">
            <div class="row bg-success text-white fw-bold p-2">
                <div class="col-7">Message</div>
                <div class="col-2">Provicer Price</div>
                <div class="col-3">Price DateTime</div>
            </div>

            @foreach($data->getServiceData as $sdata)
                <div class="row border-bottom p-2 clickable-row">
                    <div class="col-7">{{$sdata->message}}</div>
                    <div class="col-2">{{$sdata->price}}</div>
                    <div class="col-3">{{$sdata->created_at}}</div>
                </div>
            @endforeach
        </div>
        @endif

    @endforeach


@include('services.service-price-modal');
</div>
@endsection
@section('script')
//userDataId

<script>
function showServiceData(id){
    $('#sdata'+id).toggle();
}
function showDataModel(id){

    $('#userDataId').val(id);
    $('#exampleModal').modal('show');
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
                    
                    url: "{{ route('servicedata.store') }}",
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


</script>
@endsection
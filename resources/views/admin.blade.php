@extends('layouts.web')

@section('content')
<div class="jumbotron text-center">
    <h1 class="display-4">Welcome to Admin Panel</h1>
    
    <hr class="my-4">

    <div class="row bg-primary text-white fw-bold p-2">
            <div class="col-2">Service Data</div>
            <div class="col-4">User Name</div>
            <div class="col-4">Service Name</div>
            <div class="col-2">My Price</div>
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

            <div class="col-4">{{ $data->getUser->name}}</div>
            <div class="col-4">{{ $data->service_name }}</div>
            <div class="col-2">{{ $data->price }}</div>
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
@endsection
@section('script')

<script>
function showServiceData(id){
    $('#sdata'+id).toggle();
}
</script>
@endsection
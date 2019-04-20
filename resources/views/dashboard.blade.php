@extends('layouts.app')
<?php
    use App\Animal;
?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                  <h3 style="text-align:center;">Your Adoption Requests</h3>
                  <hr>
                  @if(count($requests)>0)
                  <div class="row">
                        <div class="col-sm-3">Request id</div>   
                        <div class="col-sm-3">Animal name</div>  
                        <div class="col-sm-3">Last updated on</div>
                        <div class="col-sm-3">Status</div>    
                   </div>
                   <hr>
                    @foreach($requests as $request)
                        <div class="row">
                            <?php  
                                $requestid = (int)$request->animal_id;
                                $animal = Animal::where('id', $requestid)->first();
                                if($request->status == 0){
                                    $status = "Waiting For Approval";
                                }else if($request->status == 1){
                                    $status = "Aproved!";
                                } else{
                                    $status = "Denied";
                                }
                            ?>
                            <div class="col-sm-3"><p>#{{$request->id}}</p></div>
                            <div class="col-sm-3"><p>{{$animal->name}}</p></div>
                            <div class="col-sm-3">{{$request->updated_at}}</div>
                            <div class="col-sm-3">{{$status}}</div>
                        </div>
                        <hr>
                    @endforeach
                  @else
                  <p style="text-align:center;"><a href="animals" class="btn btn-primary">View Animals </a></p>
                  @endif  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

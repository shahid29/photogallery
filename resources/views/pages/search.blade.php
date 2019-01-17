@extends('master')
@section('content')
    <div class="container-fluid text-center bg-grey">

        <div class="row text-center">
            <?php
            foreach ($result as $getResult){
            ?>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <a href="{{$getResult->id}}" data-toggle="modal" data-target="#myModal{{$getResult->id}}" ><h2><strong>{{$getResult->photo_title}}</strong></h2></a>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal{{$getResult->id}}" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">

                                    <img  style="height:500px;width: 500px" src="{{asset($getResult->photo)}}" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{$getResult->id}}" data-toggle="modal" data-target="#ourModal{{$getResult->id}}" >
                        <img style="height:310px;width: 100%" src="{{asset($getResult->photo)}}" ></a>
                    <!-- Modal -->
                    <div class="modal fade" id="ourModal{{$getResult->id}}" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">
                                    <img style="height:500px;width: 500px" src="{{asset($getResult->photo)}}" >
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php }?>

        </div>

    </div>
@endsection
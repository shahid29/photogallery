@extends('master')
@section('content')
    <div class="container-fluid text-center bg-grey">

        <div class="row text-center">
            <?php
            foreach ($Photo as $getPhoto){
            ?>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <a href="{{$getPhoto->id}}" data-toggle="modal" data-target="#myModal{{$getPhoto->id}}" ><h2><strong>{{$getPhoto->photo_title}}</strong></h2></a>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal{{$getPhoto->id}}" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    {{$getPhoto->photo_title}}
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div  class="modal-body">

                                    <img  style="height:500px;width: 500px" src="{{asset($getPhoto->photo)}}" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{$getPhoto->id}}" data-toggle="modal" data-target="#ourModal{{$getPhoto->id}}" >
                        <img style="height:310px;width: 100%" src="{{asset($getPhoto->photo)}}" ></a>
                    <!-- Modal -->
                    <div class="modal fade" id="ourModal{{$getPhoto->id}}" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">

                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    {{$getPhoto->photo_title}}

                                </div>
                                <div class="modal-body">
                                    <img style="height:500px;width: 500px" src="{{asset($getPhoto->photo)}}" >
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php }?>

        </div>
        {{ $Photo->links() }}
    </div>
@endsection
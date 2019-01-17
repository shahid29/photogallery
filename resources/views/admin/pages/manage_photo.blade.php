@extends('admin.master')
@section('content')
    <!-- start: Content -->


        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{URL::to('/dashboard')}}">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="{{URL::to('/manage_photo')}}">Manage Gallery</a></li>
        </ul>
        <h2 style="color: green;">
            <?php
            $delete_photo = Session::get('delete_photo');
            if ($delete_photo){
                echo $delete_photo;
                Session::put('delete_photo','');
            }
            ?>
        </h2>

        <h2 style="color: green;">
            <?php
            $message = Session::get('message');
            if ($message){
                echo $message;
                Session::put('message','');
            }
            ?>
        </h2>
        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable">
                        <thead>
                        <tr>
                            <th>Serila No.</th>
                            <th>Category Name</th>
                            <th>Photo Title</th>
                            <th>Image</th>
                            <th>Shor Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <?php
                            $sn =0;
                            foreach ($get_manage_photo as $getPhoto){
                            $sn++;
                            ?>



                            <td>{{$sn}}</td>
                            <td class="center">{{$getPhoto->category_name}}</td>
                            <td class="center">{{$getPhoto->photo_title}}</td>
                            <td class="center"><img style="width: 100px;height: 100px" src="{{asset($getPhoto->photo)}}" ></td>
                            <td class="center"><?php echo $sd= substr($getPhoto->short_description,0,15);?></td>

                            <td class="center">
                                <?php
                                if ($getPhoto->photo_status=='1'){?>
                                <span class="label label-success">Published</span>
                                <?php }else{?>
                                <span class="label label-danger">Unpublished</span>
                                <?php   }?>
                            </td>
                            <td class="center">
                                <?php
                                if($getPhoto->photo_status==1){?>

                                <a class="btn btn-danger" href="{{URL::to('/publishedToUnpublishedphoto/'.$getPhoto->id)}}">
                                    <i class="halflings-icon white remove"></i></a>
                                <?php }else{?>
                                <a class="btn btn-success" href="{{URL::to('/unpublishedToPublishedphoto/'.$getPhoto->id)}}">
                                    <i class="halflings-icon white ok"></i></a>
                                <?php }?>

                                <a class="btn btn-info" href="{{URL::to('/edit_photo/'.$getPhoto->id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>

                                <a class="btn btn-danger" href="{{URL::to('/delete_photo/'.$getPhoto->id)}}">
                                    <i class="halflings-icon white trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>

                </div>
            </div><!--/span-->

        </div><!--/row-->


@endsection
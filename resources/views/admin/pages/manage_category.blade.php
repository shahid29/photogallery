@extends('admin.master')
@section('content')
    <!-- start: Content -->


        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{URL::to('/dashboard')}}">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li><a href="{{URL::to('/manage_category')}}">Manage Category</a></li>
        </ul>
<h2 style="color:green">
        <?php
        $published = Session::get('published');
        $unpublished = Session::get('unpublished');
        if ($published){
            echo $published;
            Session::put('published','');
        }elseif($unpublished){
            echo $unpublished;
            Session::put('unpublished','');
        }
        ?>
</h2>
        <h2 style="color:green">
            <?php
            $delete = Session::get('delete');
                if ($delete){
                    echo $delete;
                    Session::put('delete','');
                }

            ?>
        </h2>
        <h2 style="color: green">
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
                            <th>Serial No.</th>
                            <th>Category Name</th>
                            <th>Category Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                $i = 0;
                        foreach($all_category as $getCategory){
                        $i++;?>
                        <tr>
                            <td>{{$i}}</td>
                            <td class="center">{{$getCategory->category_name}}</td>
                            <td class="center"><img style="width:100px; height: 100px" src="{{asset($getCategory->photo)}}"></td>
                            <td class="center">
                                <?php
                                if ($getCategory->category_status=='1'){?>
                                <span class="label label-success">Published</span>
                                <?php }else{?>
                                <span class="label label-danger">Unpublished</span>
                                <?php   }?>

                            </td>
                            <td class="center">
                                <?php
                                if($getCategory->category_status==1){?>

                                <a class="btn btn-danger" href="{{URL::to('/publishedToUnpublished/'.$getCategory->id)}}">
                                    <i class="halflings-icon white remove"></i></a>
                                <?php }else{?>
                                <a class="btn btn-success" href="{{URL::to('/unpublishedToPublished/'.$getCategory->id)}}">
                                    <i class="halflings-icon white ok"></i></a>
                                <?php }?>



                                <a class="btn btn-info" href="{{URL::to('/edit_category/'.$getCategory->id)}}">
                                    <i class="halflings-icon white edit"></i>
                                </a>

                                <a class="btn btn-danger" href="{{URL::to('/delete_category/'.$getCategory->id)}}">
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
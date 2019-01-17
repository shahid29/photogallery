@extends('admin.master')
@section('content')



    <!-- start: Content -->

        <ul class="breadcrumb">
            <li>
                <i class="icon-home"></i>
                <a href="{{URL::to('/dashboard')}}">Home</a>
                <i class="icon-angle-right"></i>
            </li>
            <li>
                <i class="icon-edit"></i>
                <a href="{{URL::to('/edit_photo')}}">Edit Photo</a>
            </li>
        </ul>



        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                        <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    {{--<form class="form-horizontal">--}}
                    {!! Form::open(['url' => '/save_edit_photo', 'method' => 'POST','class' => 'horizontal', 'files' => 'true']) !!}
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label"  for="typeahead">News Title </label>
                            <div class="controls">
                                <input type="text" name="photo_title" value="{{$getPhotoInfo->photo_title}}" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" required >
                                <input type="hidden" name="id" value="{{$getPhotoInfo->id}}" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" required >

                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"  for="selectError">Select Category </label>
                            <div class="controls">
                                <select name="category_name" id="selectError" data-rel="choosen" required>
                                    <option value="{{$getPhotoInfo->category_name}}">{{$getPhotoInfo->category_name}}</option>
                                    <option></option>
                                    <?php
                                    use Illuminate\Support\Facades\DB;
                                    $get_category = DB::table('tbl_category')
                                            ->where('category_status',1)
                                            ->get();
                                    ?>
                                    <?php
                                    foreach($get_category as $category){?>
                                    <option  value="{{$category->id}}">{{$category->category_name}}</option>
                                    <?php }?>


                                </select>
                            </div>
                        </div>



                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Short Description</label>
                            <div class="controls">
                                <textarea name="short_description" class="cleditor" id="textarea2" rows="3" required>{{$getPhotoInfo->short_description}}</textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" >File Upload</label>
                            <div class="controls">
                                <input type="file" name="photo" value="{{asset($getPhotoInfo->photo)}}" required>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                    {{--</form>--}}
                    {!! Form::close() !!}

                </div>
            </div><!--/.fluid-container-->

            <!-- end: Content -->
        </div><!--/#content.span10-->





@endsection
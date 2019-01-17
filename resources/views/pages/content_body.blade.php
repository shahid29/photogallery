@extends('master')
@section('content')
    <h3>Photo Exhibitions Category</h3><br>
    <div class="row">

        <?php
            foreach ($category as $category){
        ?>
        <div class="col-sm-3">
            <div class="thumbnail">
          <a href="{{URL::to('/gallery/'.$category->id)}}"> <img style="width: 100%; height:250px" src="{{asset($category->photo)}}"  class="img-responsive " style="width:100%"></a>

                <a href="{{URL::to('/gallery/'.$category->id)}}">  <h3>{{$category->category_name}}</h3></a>
        </div>
        </div>
        <?php }?>

    </div>
    <br/>
    <br/>
    @endsection
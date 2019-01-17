<!DOCTYPE html>
<html lang="en">
<head>
    <title>Portfolio Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }
        .jumbotron {
            background-color: #f4511e; /* Orange */
            color: #ffffff;}
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/home')}}">Portfolio</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="{{URL::to('/home')}}">Home</a></li>
            </ul>
            {{--<form  class="navbar-form navbar-right">--}}
           {!! Form::open(['url' => '/search', 'method' => 'GET','class' => 'navbar-form navbar-right']) !!}

                <div class="form-group">
                    <input type="text" name="search_query"  class="form-control" placeholder="Search" required>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            {{--</form>--}}
            {!! Form::close() !!}
            <ul class="nav navbar-nav navbar-right">
                <?php
                use Illuminate\Support\Facades\DB;$category = DB::table('tbl_category')
                        ->select('*')
                        ->where('category_status',1)
                        ->get();
                    foreach ($category as $Category){?>
                <li><a href="{{URL::to('/gallery/'.$Category->id)}}">{{$Category->category_name}}</a></li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron">
   @yield('jumbotron')
</div>

<div class="container-fluid bg-3 text-center">
   @yield('content')
</div><br>
<br><br>

<footer class="container-fluid text-center">
    <p>Footer Text</p>
</footer>

</body>
</html>

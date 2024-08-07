<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add a Comment</title>
    <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('admin/css/material-dashboard.css') }}">
</head>
<body>
    

<div class="card">

        <h4 style="text-align: center;margin-top:15px;font-weight:bold ; color:#9c27b0 ">Add A Comment </h4>

    <div class="card-body">

        <form action="{{ asset('/insert.comment') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                    <input type="text" class="form-control" name="id" value="{{$item}}" style="display: none">
                    <input type="text" class="form-control" name="username" value=" {{ Auth::user()->name }}" style="display: none">

                <div class="col-md-12 mb-2">
                    <label for="">Your Comment :</label>
                    <input type="text" class="form-control" name="content"  required>
                </div>

                <div class="col-md-12 mb-2">
                    <label for="">Rating :</label>
                    <input name="rate" class="form-control" rows="3"  required></input>
                </div>

                
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap-material-design.min.js') }}"></script>
<script src="{{ asset('admin/js/perfect-scrollbar.jquery.min.js') }}"></script>
</body>
</html>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        form{
            margin-top:200px;
        }
        input,textarea{
     
            margin-bottom:12px;
            border-radius:12px;
        }
        input{
            height:30px;
        }
        button{
            width:80px;
            height:40px;
            margin-bottom:12px;
            border-radius:12px;
        }
    </style>
  <center>
    <br>
   {{$item}}
    <form action="/insert.comment" method="post">
    @csrf
<input type="text" name="id" value="{{$item}}" style="display:none;">
<input type="text" name="username" placeholder="username" value=" {{ Auth::user()->name }}" style="display:none;">
<br>
<textarea name="content" id="" cols="30" rows="10" placeholder="your comment"></textarea>

<br>
<input type="text" placeholder="rate" name="rate">
<br>
<button type="submit">
    add
</button>
</form>
</center>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add a Product</title>
    <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('admin/css/material-dashboard.css') }}">
</head>
<body>
    

<div class="card">

        <h4 style="text-align: center;margin-top:15px;font-weight:bold ; color:#9c27b0 ">Add A New Product</h4>

    <div class="card-body">

        <form action="{{ asset('insert-product') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-12 mb-2">
                    <label for="">Name:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>

                <div class="col-md-12 mb-2">
                    <label for="">Quantity:</label>
                    <input type="text" class="form-control" name="quantity" required>
                </div>

                <div class="col-md-12 mb-2">
                    <label for="">Price:</label>
                    <input name="price" class="form-control" rows="3" required></input>
                </div>

                <div class="col-md-12 mb-2">
                    <label for="">Discount:</label>
                    <input name="discount_price" class="form-control" rows="3" required></input>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Discription:</label>
                    <input name="description" class="form-control" rows="3" required></input>
                </div>

                
                <div class="col-md-12">
                    <label for="imgpath">Upload Image:</label>
                    <input type="file" name="imgpath" class="form-control">
                </div>
                
                <div class="col-md-12 mb-3 mt-3">
                    <label for="">Choose the Category : </label>
                    <select name="selectedoption" id="" style="margin-bottom:5px;width:150px;">
                        @foreach ($categories as $item)
                        {{$item->name}}
                        <option value="{{$item->name}}">{{$item->name}}</option>
                        @endforeach
                    </select>
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
@if($message)
<script>
    alert('{{$message}}');
</script>
@endif
</body>
</html>

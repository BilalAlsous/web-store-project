<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Received Requests</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #img, #id {
            display: none;
        }
        .request {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        @foreach ($prods as $prod)
        <div class="request p-3 border rounded">
            <img src="{{ $prod->imgpath }}" alt="" class="img-fluid mb-3" width="200">
            <form action="/update" method="post" class="border p-3 bg-light rounded mb-3">
                @csrf
                <input type="text" id="id" name="id" value="{{ $prod->id }}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $prod->name }}">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" name="quantity" class="form-control" value="{{ $prod->quantity }}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control" value="{{ $prod->price }}">
                </div>
                <div class="form-group">
                    <label for="discount_price">Discount Price</label>
                    <input type="text" name="discount_price" class="form-control" value="{{ $prod->discount_price }}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ $prod->description }}">
                </div>
                <div class="form-group">
                    <label for="catid">Category ID</label>
                    <input type="text" name="catid" class="form-control" value="{{ $prod->catid }}">
                </div>
                <input type="text" name="imgpath" value="{{ $prod->imgpath }}" id="img">
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Update</button>
                    <form action="/delete" method="post">
                        @csrf
                        <input type="text" id="id" name="id" value="{{ $prod->id }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </form>
        </div>
        @endforeach
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

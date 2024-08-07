<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if ($message)
<script>
    alert('{{$message}}');
</script>
    @endif
    <center>
        <style>
            input{
                margin-bottom:12px;
            }
        </style>
    <form action="/order" method="post">
    @csrf
<input type="text" name="user_id" value="{{Auth::user()->id}}" style="display:none;">
<br>
<input type="text" name="status" placeholder="status" style="display:none;">
<br>

<input type="text" name="address" placeholder="address">
<br>
<input type="text" name="phone" placeholder="phone">
<br>
<input type="text" name="email" placeholder="email">
<br>
<input type="text" name="name" placeholder="name">
<br>
<input type="text" name="city" placeholder="city">
<br>
<button type="submit">confirm</button>
</form>
</center>
</body>
</html>
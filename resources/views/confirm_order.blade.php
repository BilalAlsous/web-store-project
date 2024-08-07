<!DOCTYPE html>
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
            font-size:24px;
        }
    </style>
    <center>
        <form action="/confirm.order" method='post'>
    @csrf 
    <label for="">قم بالتحويل الى الرقم التالي</label>
    <br>
    <label for="">0997176570</label>
    <br>
    <label for="">ثم ادخل رقم عملية التحويل</label>
    <br>
    <input type="text" name="order_id" value="{{$order_id}}" style='display:none;'>
<br>
    <input type="text" name="user_id" value="{{Auth::user()->id}}" style='display:none;'>
    <br>
    <input type="text" name='pay_no' >
    <br>
    <button type="submit">
        confirm
    </button>
    </form>
    </center>
</body>
</html>
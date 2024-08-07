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
        table,th,td{
            border:3px solid;
        }
        th,td{
            font-size:24px;
            width:130px;
        }
        
    </style>
    <center>
   <table>
       <tr>
           <th>city</th>
           <th>name</th>
           <th>phone</th>
           <th>address</th>
           <th>price</th>
           <th>payment_id</th>
           
       </tr>
@foreach($orders as $order)
    <tr>
<td>{{$order->city}}</td>
<td>{{$order->name}}</td>
<td>{{$order->phone}}</td>
<td>{{$order->address}}</td>
<td>{{$order->total_price}}</td>
<td>{{ $order->payment_id }}</td>
    </tr>
@endforeach
   </table> 
   </center>
</body>
</html>
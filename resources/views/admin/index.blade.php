@extends('layout.admin')

@section('content')
<style>
    .card-body{
        display: flex;
        justify-content: space-evenly;

    }
    .card-body>a{
        color: white;
        background-color: #9C27B0 ;
        padding: 10px ; 
        border-radius: 10px;
    }
</style>

    <div class="card">
        <h1 style="text-align: center ;margin:10px 0;">Admin Dashboard</h1>
        <hr>
        <div class="card-body">

            <a href="add-category" id='a'>
                <i class="material-icons">add</i>
                Add-Catagory
            </a>
            
            <a href="add-product" id='a'>
                <i class="material-icons">add</i>
                Add-Product
            </a>

            <a href="categories" id='a'>
                <i class="material-icons">search</i>
                Show-Catagories
            </a>

            <a href="orders" id='a'>
                <i class="material-icons">search</i>

                Show-Orders
            </a>
            <a href="showtemps" id='a'>
                <i class="material-icons">search</i>

                Show-Requests
            </a>
        </div>

    </div>

@endsection

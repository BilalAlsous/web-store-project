@extends('layout.master')

@section('title','Main page')

@section('content')
<h1 style="text-align: center">main page</h1>
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">	
                    <h3><span class="orange-text">Our</span> Products</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                </div>
            </div>
        </div>
        <div class="row">
                {{-- @foreach ($categories as $item ) --}}
                {{-- <h1></h1> --}}
                <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                         
                                <a href="/products/"><img style="height:200px" src="{{$item->imgpath}}" alt="afkad"></a>
                            </div>
                            {{-- <h3>
                                {{ $item -> imgpath}}
                                {{ $item -> name }}</h3> --}}
                            <h3>billal</h3>
                            <p>this is a discripton</p>
                        </div>
                </div>
                {{-- @endforeach --}}
        </div>
    </div>
</div>
@endsection
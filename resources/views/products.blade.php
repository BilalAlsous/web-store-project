@extends('layout.master')

@section('title', 'products')

@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio.</p>
                    </div>
                </div>
            </div>
<div>
    you can add your product from 
    <a href="/addp">here</a>
    <br>
    you can show your product adds from 
    <a href="/showp">here</a>

</div>
            <div class="row">
                @foreach ($products as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('single.product', ['id' => $item->id, 'name' => $item->name]) }}">
                                    <img style="height:230px" src="{{ url($item->imgpath) }}" alt=""></a>
                            </div>
                            <h3>Type:&nbsp;{{ $item->name }}</h3>
                            <p class="product-price"><span>Quantity: {{ $item->quantity }}</span>{{ $item->price }}$</p>
                            <a href="{{ route('cart.show', ['id' => $item->id, 'name' => $item->name]) }}"
                                class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                
                               
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

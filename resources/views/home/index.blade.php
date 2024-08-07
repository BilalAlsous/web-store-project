@extends('layout.master')

@section('title', 'Main page')

@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Our</span> Categories</h3>
                        <p>We have all products in our store we make offers every week and discounts when you buy <span
                                class="orange-text"> three items !!</span> </p>
                    </div>
                </div>
            </div>
            <div class="row">
                
                @foreach ($categories as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                
                                <a href="/products/{{ $item->id }}"><img style="height:200px"
                                        src="{{$item->imgpath}}" alt="NULL"></a>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <p>{{ $item->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

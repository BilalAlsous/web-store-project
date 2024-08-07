@extends('layout.master2')


@section('title', 'Single Product')
@section('h1', 'Single Product')
@section('content')
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{ url($item->imgpath) }}"alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3></h3>
                        <p class="single-product-pricing"><span>For Piece</span>{{ $item->price }} SYP</p>
                        <p>{{ $item->description }}</p>
                        <div class="single-product-form">

                            <a href="{{ route('cart.show', ['id' => $item->id, 'name' => $item->name]) }}"
                                class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a> <br>
                            <a href="{{ route('addcomment', ['id' => $item->id]) }}" class="cart-btn"> Add comment</a>
                            <br>
                            <p><strong>Categories: </strong>{{ $category->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	

	<div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p>See All Comment </p>
				</div>
			</div>
		</div>
	</div>
	
<!-- testimonail-section -->
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						@foreach ($result as $rs)
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/user.png" alt="">
							</div>
							<div class="client-meta">
								<h3>{{$rs->username}} <span>Rating</span>
									
									@for ($i = 0; $i < $rs->rate; $i++)
									<img src="assets/img/star.png" alt="" id='star' style="width: 28px;display: inline;" >
									@endfor
								</h3>
								<p class="testimonial-body">
									{{$rs->content}}
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- end testimonail-section -->
@endsection

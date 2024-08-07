@extends('layout.admin')

@section('content')
    <style>
        button {
            border: 0px;

        }

        button img {

            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <h1 style="text-align: center ; margin-bottom:20px">Category Page</h1>
        </div>
        <div class="row">
            @if ($message)
                <script>
                    alert('{{ $message }}');
                </script>
            @endif
            @foreach ($categories as $item)
                {{-- <h1></h1> --}}
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">

                            <a href="/products/"><img style="height:200px;width:200px;" src="{{ $item->imgpath }}"
                                    alt="afkad"></a>
                        </div>
                        <h3>
                            {{ $item->name }}</h3>
                        <p>{{ $item->description }} </p>
                    </div>
                    <form action="/delete-cat" method="post">
                        @csrf
                        <input type="text" value='{{ $item->name }}' name='name' style="display:none;">
                        <button type="submit">
                            <img src="assets/img/d1.png" alt="">
                        </button>
                    </form>
                    <hr>
                </div>
                
            @endforeach
        </div>
    </div>
@endsection

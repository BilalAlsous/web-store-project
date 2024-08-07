@extends('layout.master2')

@section('title', 'Cart')
@section('h1', 'Cart')
@section('content')
    <!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                                <tr class="table-head-row">
                                    <th class="product-remove"></th>
                                    <th class="product-image">Product Image</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($item as $prod)
                                    <tr class="table-body-row">
                                        <td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a>
                                        </td>
                                        <td class="product-image"><img src="{{ $prod->imgpath }}" alt="">
                                        </td>
                                        <td class="product-name">{{ $prod->name }}</td>
                                        <td class="product-price"><input type="text" id="p"
                                                value="{{ $prod->price }}"style="border:0px;"></td>
                                        <td class="product-quantity"><input type="number" id ="n1" name="number"
                                                placeholder="0"></td>
                                        <td class="product-total">{{ $prod->quantity }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                                <tr class="table-total-row">
                                    <th>Total</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="total-data">
                                    <td><strong>Subtotal: </strong></td>
                                    <td><input type="text" value="" id="st" style="border:none;"></td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Shipping: </strong></td>
                                    <td>45</td>
                                </tr>
                                <tr class="total-data">
                                    <td><strong>Total: </strong></td>
                                    <td><input type="text" value=" " id="tt" style="border:0px;"></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <button onclick="myfunc();" style="background: none;border:none;outline:none"><a href="#"
                            class="boxed-btn black">Show Me The Final Price</a></button>
                        <div class="cart-buttons">
                            <form action="/updatecart" method="post">
                                @foreach ($item as $prod)
                                    @csrf
                                    <input type="number" id="n2" name="number2" placeholder="0"
                                        style="display:none;">
                                    <input type="text " name="pid" value="{{ $prod->id }}" style="display:none;">
                                    <input type="text " value="{{ Auth::user()->id }}" style="display:none;">
                                @endforeach
                                <button type="submit"  style="background: none;border:none ;color:white; background-color:#EC7F25 ;padding:10px; border-radius:50px;">
                                   Add to Cart
                                </button>
                            </form>
                            <br>
                            <a href="ord" class="boxed-btn black">Buy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
        function myfunc() {
            var s = document.getElementById('n1');
            var v1 = s.value;
            var s2 = document.getElementById('n2');
            s2.value = v1;
            var st = document.getElementById('st');
            var p = document.getElementById('p');
            p = p.value;
            var pv = parseInt(p) * parseInt(v1);
            st.value = pv;
            var t = document.getElementById('tt');
            alert(pv);
            t.value = pv + 45;
        }
</script>
    <!-- end cart -->
@endsection

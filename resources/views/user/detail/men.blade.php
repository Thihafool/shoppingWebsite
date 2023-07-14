@extends('userLayout.addToCart')
@section('content')
    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="left-images">

                        <img src="{{ asset('storage/' . $men->image) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <input type="hidden" id="userId" value="{{ Auth::user()->id }}">
                    <input type="hidden" id="productId" value="{{ $men->id }}">
                    <div class="right-content">
                        <h4>{{ $men->name }}</h4>
                        <span class="price">{{ $men->price }}</span>
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt
                            ut labore.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod.</p>
                        </div>
                        <div class="quantity-content">
                            <div class="left-content">
                                <h6>No. of Orders</h6>
                            </div>
                            <div class="right-content">
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus"><input type="number" step="1"
                                        min="1" max="" name="quantity" id="orderCount" value="1"
                                        title="Qty" class="input-text qty text" size="4" pattern=""
                                        inputmode=""><input type="button" value="+" class="plus">
                                </div>
                            </div>
                        </div>
                        <div class="total">

                            <div class="main-border-button addToCart"><a href="">Add To Cart</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Product Area Ends ***** -->
@endsection

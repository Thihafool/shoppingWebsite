@extends('userLayout.cart')
@section('content')
    <!-- Cart Start -->
    <div class="cart-page">
        <div class="container">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Cart Details</h2>
                        <span>Thanks for shopping with us.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-page-inner">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody  class="align-middle">
                                    @foreach ($cartList as $c)
                                    <tr>
                                        <td>
                                            <div class="img">
                                                <a href="#"><img src="{{asset('storage/'.$c->product_image)}}" alt="Image" /></a>
                                                <p>{{$c->product_name}}</p>
                                            </div>
                                        </td>
                                        <input type="hidden" id="productId" value="{{ $c->product_id }} ">
                                        <input type="hidden" id="userId" value="{{ $c->user_id }} ">
                                        <input type="hidden" id="orderId" value="{{ $c->id }} ">                                        <td id="price">{{$c->product_price}} Mmk</td>
                                        <td>
                                            <div class="qty">
                                                <button class="btn-minus" >
                                                    <i class="fa fa-minus" ></i>
                                                </button>
                                                <input type="text" id="qty" value="{{$c->qty}}" />
                                                <button class="btn-plus" >
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                        <td id="total">{{$c->product_price * $c->qty}} Mmk</td>
                                        <td>
                                            <button class="clear"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-page-inner">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="coupon">
                                    <input type="text" placeholder="Coupon Code" />
                                    <button>Apply Code</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="cart-summary">
                                    <div class="cart-content">
                                        <h5 class="section-title position-relative text-uppercase mb-3"><span >Cart
                                            Summary</span></h5>
                                    <div class="bg-light p-30 mb-5">
                                        <div class="border-bottom pb-2">
                                            <div class="d-flex justify-content-between mb-3">
                                                <h6>Subtotal</h6>
                                                <h6 id="subTotalPrice">{{ $totalPrice }} Mmk</h6>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <h6 class="font-weight-medium">Delivery</h6>
                                                <h6 class="font-weight-medium">5000 Mmk</h6>
                                            </div>
                                        </div>
                                        <div class="pt-2">
                                            <div class="d-flex justify-content-between mt-2">
                                                <h5>Total</h5>
                                                <h5 id="finalPrice">{{ $totalPrice + 5000 }} Mmk</h5>
                                            </div>
                                        <div class="cart-btn">
                                            <button id="orderBtn" >Checkout</button>
                                            <button  id="clearBtn">Delete</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection


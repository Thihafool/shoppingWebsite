@extends('userLayout.productLayout')
@section('content')
    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Umbrella Collection</h2>
                        <span>Check out all of our products.</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($umbrella as $k)
                    <div class="col-lg-4">

                        <div class="item">
                            <div class="thumb">
                                <div class="hover-content">
                                    <ul>
                                        <li><a href="{{ route('detail#umbrella', $k->id) }}"><i class="fa fa-eye"></i></a>
                                        </li>
                                        <li><a href="{{ route('detail#umbrella', $k->id) }}"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <img src="{{ asset('storage/' . $k->image) }}" alt="">
                            </div>
                            <div class="down-content">
                                <h4>{{ $k->name }}</h4>
                                <span>{{ $k->price }}</span>
                                <ul class="stars">
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->
@endsection

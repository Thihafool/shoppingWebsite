@extends('admin.layout.app')
@section('title', 'Account Info')
@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="row">
            <div class="col-4 offset-6 mb-2">
                @if (session('updateSuccess'))
                    <div class="">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('updateSuccess') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

            </div>
        </div>
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Account Info</h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-3 offset-2">
                                        @if (Auth::user()->image == null)

                                            @if (Auth::user()->gender == 'male')
                                                <img src="{{ asset('image/defaultUserImg.png') }}" alt="">
                                            @else
                                                <img src="{{ asset('image/images.jpg') }}" alt="">
                                            @endif
                                        @else
                                            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="">
                                        @endif
                                    </div>
                                    <div class="col-5 offset-1  ">
                                        <h5 class="my-3"><i class="fa-solid fa-user-pen me-2"></i>{{ Auth::user()->name }}
                                        </h5>
                                        <h4 class="my-3"><i
                                                class="fa-solid fa-envelope me-2"></i>{{ Auth::user()->email }}</h4>
                                        <h5 class="my-3"><i class="fa-solid fa-phone me-2"></i>{{ Auth::user()->phone }}
                                        </h5>
                                        <h5 class="my-3"><i
                                                class="fa-solid fa-mars-and-venus me-2"></i>{{ Auth::user()->gender }}</h5>
                                        <h5 class="my-3"> <i
                                                class="fa-solid fa-address-card me-2"></i>{{ Auth::user()->address }}</h5>
                                        <h5 class="my-3"> <i
                                                class="fa-solid fa-user-clock me-2"></i>{{ Auth::user()->created_at->format('j-F-Y') }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 offset-2 mt-3">
                                        <button class="btn bg-dark ">
                                            <a href="{{ route('admin#edit') }}" class="text-decoration-none text-white">
                                                <i class="fa-solid fa-pen-to-square me-2 text-white"></i> Edit Profile

                                            </a>
                                        </button>
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
    <!-- END MAIN CONTENT-->
@endsection

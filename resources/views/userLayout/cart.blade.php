<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>E Store - eCommerce HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="eCommerce HTML Template Free Download" name="keywords" />
    <meta content="eCommerce HTML Template Free Download" name="description" /> Favicon
    <link href="img/favicon.ico" rel="icon" />


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="{{ asset('user/lib/slick/slick.css') }}" rel="stylesheet" />
    <link href="{{ asset('user/lib/slick/slick-theme.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('user/css/lightbox.css') }} " />

    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>Hexashop - Product Listing Page</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/font-awesome.css') }}" />

    <link rel="stylesheet" href="{{ asset('user/css/templatemo-hexashop.css') }}" />

    <link rel="stylesheet" href="{{ asset('user/css/owl-carousel.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ route('user#home') }}" class="logo">
                            <img src="{{ asset('user/images/logo.png') }}" />

                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ route('user#home') }}" class="active">Home</a>
                            </li>
                            <li class="scroll-to-section"><a href="{{ route('user#menCollection') }}">Men's</a></li>
                            <li class="scroll-to-section"><a href="{{ route('user#womenCollection') }}">Women's</a>
                            </li>
                            <li class="scroll-to-section"><a href="{{ route('user#kidCollection') }}">Kid's</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Accessories</a>
                                <ul>
                                    <li><a href="{{ route('user#walletCollection') }}">Wallet</a></li>
                                    <li><a href="{{ route('user#backpackCollection') }}">Backpack</a></li>
                                    <li><a href="{{ route('user#umbrellaCollection') }}">Umbrella</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li class="scroll-to-section">
                                        <form action="{{ route('logout') }}" method="POST"
                                            class="d-flex justify-content-center">
                                            @csrf
                                            <button class="btn bg-dark text-white col-10" type="submit">
                                                <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
                                            </button>
                                        </form>
                                    </li>
                                    <li><a href="{{ route('user#about') }}">About </a></li>
                                    <li><a href="{{ route('user#accountInfo') }}">Account </a></li>
                                    <li><a href="{{ route('user#changePassword') }}">Change Password </a></li>
                                    <li><a href="{{ route('user#contact') }}">Contact</a></li>

                                </ul>
                            </li>
                            <li><a href="{{ route('product#cart') }}">Cart<i class="fa-solid fa-cart-shopping"></i></a>
                            </li>

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    <section class="section" id="products">
        @yield('content')

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="first-item">
                            <div class="logo">
                                <img src="{{ asset('user/images/white-logo.png') }}"
                                    alt="hexashop ecommerce templatemo" />
                            </div>
                            <ul>
                                <li><a href="#">16501 Collins Ave, Sunny Isles Beach, FL 33160, United States</a>
                                </li>
                                <li><a href="#">hexashop@company.com</a></li>
                                <li><a href="#">010-020-0340</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <h4>Shopping &amp; Categories</h4>
                        <ul>
                            <li><a href="#">Men’s Shopping</a></li>
                            <li><a href="#">Women’s Shopping</a></li>
                            <li><a href="#">Kid's Shopping</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="#">Homepage</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h4>Help &amp; Information</h4>
                        <ul>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">FAQ's</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Tracking ID</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-12">
                        <div class="under-footer">
                            <p>Copyright © 2022 HexaShop Co., Ltd. All Rights Reserved.


                            </p>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('user/lib/slick/slick.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('user/js/main.js') }}"></script>


        <!-- jQuery -->
        <script src="{{ asset('user/js/jquery-2.1.0.min.js') }}"></script>

        <!-- Bootstrap -->
        <script src="{{ asset('user/js/popper.js') }}"></script>
        <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>

        <!-- Plugins -->
        <script src="{{ asset('user/js/owl-carousel.js') }}"></script>
        <script src="{{ asset('user/js/accordions.js') }}"></script>
        <script src="{{ asset('user/js/datepicker.js') }}"></script>
        <script src="{{ asset('user/js/scrollreveal.min.js') }}"></script>
        <script src="{{ asset('user/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('user/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('user/js/imgfix.min.js') }}"></script>
        <script src="{{ asset('user/js/slick.js') }}"></script>
        <script src="{{ asset('user/js/lightbox.js') }}"></script>
        <script src="{{ asset('user/js/isotope.js') }}"></script>

        <!-- Global Init -->
        <script src="{{ asset('user/js/custom.js') }}"></script>

        <script>
            $(function() {
                var selectedClass = "";
                $("p").click(function() {
                    selectedClass = $(this).attr("data-rel");
                    $("#portfolio").fadeTo(50, 0.1);
                    $("#portfolio div").not("." + selectedClass).fadeOut();
                    setTimeout(function() {
                        $("." + selectedClass).fadeIn();
                        $("#portfolio").fadeTo(50, 1);
                    }, 500);

                });
            });



              //add to cart increase products qty
              $(document).ready(function(){
                $('.btn-plus').click(function(){
                    $parentNode =$(this).parents('tr');
                    $price = Number($parentNode.find('#price').html().replace('Mmk',''));
                    $qty = $parentNode.find('#qty').val();

                    $total = $price * $qty;
                    $parentNode.find('#total').html($total + 'Mmk')
                    summaryCalculation()
                })
               })


               //add to cart decrease products qty
               $(document).ready(function(){
                $('.btn-minus').click(function(){
                    $parentNode = $(this).parents('tr');
                    $price = Number($parentNode.find('#price').html().replace('Mmk',''))
                    $qty = $parentNode.find('#qty').val();

                    $total = $price * $qty;
                    $parentNode.find('#total').html('$total'+ 'Mmk');
                    summaryCalculation()
                })
               })


               //calculation for total Price
               function summaryCalculation(){
                $totalPrice = 0;
                $('#dataTable tr').each(function(row,index){
                    $totalPrice += Number($(index).find('#total').text().replace('Mmk', ''));
                })
                $('#subTotalPrice').html(`${$totalPrice} Mmk`);
                $('#finalPrice').html(`${$totalPrice + 5000} Mmk`);

               }



               //proceed to Order
            $(document).ready(function(){
                $('#orderBtn').click(function(){
                    $orderList = [];
                    $random = Math.floor(Math.random() * 1000001 );
                    $('#dataTable tbody tr').each(function(index,row){
                        $orderList.push({
                            'user_id': $(row).find('#userId').val(),
                            'product_id': $(row).find('#productId').val(),
                            'qty':$(row).find('#qty').val(),
                            'total' : $(row).find('#total').text().replace('Mmk','') *1,
                            'order_code': 'G' + $random
                        });
                    })


                    $.ajax({
                        type: 'get',
                        url: "/user/ajax/order",
                        data: Object.assign({},$orderList),
                        dataType: 'json',
                        success: function(response){
                            if (response.status == 'success') {
                                window.location.href = "http://localhost:8000/user/home";
                            }
                        }

                    });

                })
            })



            //clear single cart items
            $(document).ready(function(){

                $('.clear').click(function(){

                    console.log('hello')

                    $parentNode = $(this).parents('tr');
                    $productId = $parentNode.find('#productId').val();
                    $orderId = $parentNode.find('#orderId').val();

                    $.ajax({
                        type: 'get',
                        url: '/user/ajax/clear/currentProduct',
                        data: {
                            'productId' : $productId,
                            'orderId': $orderId
                        },
                        dataType: 'json',
                    })

                    $parentNode.remove();
                    $totalPrice = 0;
                    $('#dataTable tbody tr').each(function(index, row) {
                        console.log(row)
                        $totalPrice += Number($(row).find('#total').text().replace('Mmk', ''));
                    })
                    $('#subTotalPrice').html(`${$totalPrice} Mmk`);
                    $('#finalPrice').html(`${$totalPrice + 5000} Mmk`);


                 })
            })



            //clear all cart items
            $(document).ready(function(){
                $('#clearBtn').click(function(){

                    $.ajax({
                        type: 'get',
                        url : '/user/ajax/clear/cart',
                        dataType: 'json'
                    })

                    $('#dataTable tbody tr').remove();
                    $('#subTotalPrice').html("0 Mmk")
                    $('#finalPrice').html("0 Mmk")

                })
            })



        </script>

</body>

</html>

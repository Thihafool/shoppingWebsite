@extends('admin.layout.app')
@section('title', 'Order List')
@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr class="">
                                    <th>User Id</th>
                                    <th>User Name</th>
                                    <th>Order Date</th>
                                    <th>Amount</th>
                                    <th>Order Code</th>
                                </tr>
                            </thead>
                            <tbody id="dataList">
                                @foreach ($orderList as $order)
                                    <tr class="tr-shadow ">
                                        <input type="hidden" class="orderId" value="{{ $order->id }}">
                                        <td class="col-2">{{ $order->user_id }}</td>
                                        <td class="col-2">{{ $order->user_name }}</td>
                                        <td class="col-2">{{ $order->created_at->format('j-F-Y') }}</td>
                                        <td class="col-2">{{ $order->total_price }} Kyats</td>
                                        <td class="col-2">{{$order->order_code}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-3">
                            {{$orderList->appends(request()->query())->links()}}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection

@extends('admin.layout.app')
@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="table-responsive table-responsive-data2">
                        <h3>Total -{{$subscribes->total()}} </h3>

                        <table class="table table-data2 text-center">

                            <thead>
                                <tr class="">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>UserId</th>
                                </tr>
                            </thead>
                            <tbody id="dataList">

                            <tr>
                             @foreach ($subscribes as $s)
                                <td>{{$s->name}}</td>
                                <td>{{$s->email}}</td>
                                <td>{{$s->user_id}}</td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{$subscribes->links()}}
                        </div>
                    </div>

                    <!-- END DATA TABLE -->
                </div>
            </div>

        </div>
    </div>

@endsection

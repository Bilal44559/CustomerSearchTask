@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>{{ $customer->name }} Orders</h3>
                <a href="{{ route('customers.index') }}" class="btn btn-success">Back</a>
            </div>



            <div class="card-body">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr class="text-uppercase">
                            <th>Order Number</th>
                            <th>Order Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer['orders'] as $order)
                            <tr>
                                <td>{{ $order->order_number }}</td>
                                <td>{{ $order->order_date }}</td>

                                <td><a href="{{ route('customers.order.items', $order) }}" class="btn btn-primary">View
                                        Items</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

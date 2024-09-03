@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Order #{{ $order->order_number }} Items</h3>
                <a href="{{ route('customers.index') }}" class="btn btn-success">Back</a>
            </div>



            <div class="card-body">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr class="text-uppercase">
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Item Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order['items'] as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->pivot->quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

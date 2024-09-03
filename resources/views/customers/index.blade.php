@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Customers List</h3>
                <form action="{{ route('customers.index') }}" method="GET" class="d-flex">
                    <div class="input-group">
                        <input type="text" name="search" placeholder="Search customers, orders, or items..."
                            value="{{ request('search') }}" class="form-control">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i>
                        </button>
                        <a href="{{ route('customers.index') }}" class="btn btn-success">
                            <i class="bi bi-x-circle"></i>
                        </a>
                    </div>
                </form>

            </div>



            <div class="card-body">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr class="text-uppercase">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Total Orders</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->orders_count }}</td>
                                <td><a href="{{ route('customers.orders', $customer) }}" class="btn btn-primary">View
                                        Orders</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $customers->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
@endsection

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index(Request $request)
    {
        $query = Customer::query();

        if ($search = $request->input('search')) {
            $query->where('email', 'LIKE', "%{$search}%")
                ->orWhereHas('orders', function ($q) use ($search) {
                    $q->where('order_number', 'LIKE', "%{$search}%")
                        ->orWhereHas('items', function ($q) use ($search) {
                            $q->where('name', 'LIKE', "%{$search}%");
                        });
                });
        }

        $customers = $query->withCount('orders')->paginate(10);

        $customers->appends(['search' => $search]);

        return view('customers.index', compact('customers'));
    }

    function orders(Customer $customer)
    {
        $customer = $customer->load('orders');
        return view('customers.orders', compact('customer'));
    }
    function items(Order $order)
    {
        $order = $order->load('items');
        return view('customers.order-items', compact('order'));
    }
}

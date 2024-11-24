<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Notifications\NewOrderNotification;

class OrderController extends Controller
{
    // Create a new order
    public function store(Request $request)
    {
        try {
            // Validate the input
            $validated = $request->validate([
                'location' => 'required|string|max:255',
                'size' => 'required|string|max:50',
                'weight' => 'required|numeric|min:0',
                'pickup_time' => 'required|date|after_or_equal:today',
                'delivery_time' => 'nullable|date|after:pickup_time',
            ]);
    
            // Ensure the user is authenticated
            $userId = auth()->id();
            if (!$userId) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }
    
            // Create the order
            $order = Order::create(array_merge($validated, [
                'user_id' => $userId,
            ]));
    
            // Notify all admins
            $admins = Admin::all();
            if ($admins->isEmpty()) {
                \Log::warning('No admins found to notify about new orders.');
            } else {
                foreach ($admins as $admin) {
                    $admin->notify(new NewOrderNotification($order));
                }
            }
    
            return response()->json([
                'message' => 'Order created successfully.',
                'order' => $order,
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Error creating order: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            // return line
            return response()->json([
                'message' => 'An unexpected error occurred.',
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'line' => $e->getLine(),
            ], 500);
    
            // return response()->json([
            //     'message' => 'An unexpected error occurred.',
            //     'error' => $e->getMessage(),
            // ], 500);
        }
    }
    


    // Retrieve all orders for the authenticated user
public function index(Request $request)
{
    try {
        $orders = Order::where('user_id', auth()->id())->get();

        if ($orders->isEmpty()) {
            return response()->json([
                'message' => 'No orders found for the authenticated user',
                'orders' => [],
            ], 200);
        }

        return response()->json([
            'message' => 'Orders retrieved successfully!',
            'orders' => $orders,
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'An error occurred while fetching the orders',
            'error' => $e->getMessage(),
        ], 500);
    }
}

}

<?php

namespace App\Http\Controllers\Sales;

use Webkul\Admin\Http\Controllers\Sales\OrderController as BaseOrderController;

class CustomOrderController extends BaseOrderController
{

    public function comment(int $orderId)
    {
        $order = $this->orderRepository->find($orderId);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        $comment = request()->input('comment');

        if (!$comment) {
            return response()->json(['error' => 'Comment is required'], 400);
        }

        $order->comments()->create(['comment' => $comment]);

        return response()->json([
            'success' => 'Comment added successfully',
            'comment' => $comment,
            'all_comments' => $order->comments()->get(),
            'created_at' => $order->comments()->latest()->first()->created_at->diffForHumans(),

        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\NotificationServiceInterface;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct(private NotificationServiceInterface $service)
    {
    }

    public function send(Request $request)
    {
        $notification = $this->service->processMessage($request->all());

        return response()->json([
            'data' => $notification
        ]);
    }
}

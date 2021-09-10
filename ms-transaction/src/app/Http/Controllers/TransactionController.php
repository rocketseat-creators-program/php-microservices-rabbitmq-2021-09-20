<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\TransactionServiceInterface;
use Exception;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(private TransactionServiceInterface $service)
    {
    }

    public function make(Request $request)
    {
        try {
            $transaction = $this->service->process($request->all());
            return response()->json(['message' => $transaction]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }
}

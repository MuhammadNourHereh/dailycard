<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return Transaction::all(); // Fetch all transactions (admin)
    }

    public function userTransactions($userId)
    {
        return Transaction::where('user_id', $userId)->get(); // Fetch transactions for a specific user
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'amount' => 'required|numeric',
            'reference_id' => 'required|numeric',
        ]);

        $transaction = Transaction::create($validated);
        return response()->json(['message' => 'Transaction recorded successfully', 'transaction' => $transaction]);
    }
}

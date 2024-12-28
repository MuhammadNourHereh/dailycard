<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     title="E-shop API",
 *     version="1.0.0",
 *     description="This is the API for the E-shop application."
 * )
 */
class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/users",
     *     summary="Get all users",
     *     @OA\Response(
     *         response=200,
     *         description="List of users"
     *     )
     * )
     */
    public function index()
    {
        return User::all(); // Fetch all users (for admin purposes)
    }

    public function show($id)
    {
        return User::findOrFail($id); // Fetch a specific user
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['username', 'email', 'phone', 'balance']));
        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }
}

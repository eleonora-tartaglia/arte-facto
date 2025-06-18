<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $boughtArticles = Transaction::with('article.category')
            ->where('user_id', $user->id)
            ->latest()
            ->get()
            ->pluck('article');

        return view('dashboard.user', compact('boughtArticles', 'user'));
    }
}

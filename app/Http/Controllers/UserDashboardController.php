<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $boughtArticles = Article::where('user_id', $user->id)
                                 ->where('status', 'sold')
                                 ->with('category')
                                 ->latest()
                                 ->get();

        return view('dashboard.user', compact('boughtArticles', 'user'));
    }
}

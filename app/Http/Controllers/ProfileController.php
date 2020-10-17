<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $posts = Profile::all()->sortBy('updated_at');
        //プロフィール情報を取得して profile/index.blade.php というViewテンプレートにプロフィール情報を渡して描画する

        return view('profile.index',['posts' => $posts]);
    }
}

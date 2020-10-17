<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\News;

class NewsController extends Controller
{
   public function index(Request $request)
   {
      //News::all()->sortByDesc('updated_at')は、「投稿日時順に新しい方から並べる」という並べ換えをしていることを意味
       $posts = News::all()->sortByDesc('updated_at');
       
       if (count($posts) > 0) {
          $headline = $posts->shift();
          //$headline = $posts->shift();では、最新の記事を変数$headlineに代入し、$postsは代入された最新の記事以外の記事が格納されていることになります。
       } else {
          $headline = null;
       }
       
       // news/index.blade.php ファイルを渡している
       // また View テンプレートに headline、 posts、という変数を渡している
       
       return view('news.index', ['headline' => $headline, 'posts' => $posts]);
   }
}
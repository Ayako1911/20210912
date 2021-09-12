<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $items = ToDo::all();
        return view('index',['items' => $items]);
    }
    //↓データを追加するにあたってaddアクションが必要なのかどうかが分かりません。
    //public function add()
    //{
    //    return view('/todo/create');
    //}
    
     public function create(StoreRequest $request)
     //↑StoreRequestにバリデーションを設定しているため、Requestではなく、StoreRequestにしています。
     {
         //↓新規のToDoモデルを作成する
         $item = new ToDo;
         //↓contentをToDoモデルに設定する
         $item->content = $request->content;
         //↓DBにデータを登録する
         $item->save();
         //↓リダイレクトで/に飛ばす
         return redirect('/');
}

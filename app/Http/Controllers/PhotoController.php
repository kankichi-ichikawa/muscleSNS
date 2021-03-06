<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhoto;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function __construct()
    {
        // 認証が必要
        $this->middleware('auth')->except(['indexP']);
    }
    
    // 投稿一覧
    public function index()
    {
        return \App\Post::all();
    }
    
    //写真一覧
    public function indexP()
    {
        $photos = \App\Post::with(['owner'])
            ->orderBy(\App\Post::CREATED_AT, 'desc')->paginate();

        return $photos;
    }

    /**
     * 写真投稿
     * @param StorePhoto $request
     * @return \Illuminate\Http\Response
     */
    public function create(StorePhoto $request)
    {
        // 投稿写真の拡張子を取得する
        $extension = $request->photo->extension();

        $photo = new Photo();

        // インスタンス生成時に割り振られたランダムなID値と
        // 本来の拡張子を組み合わせてファイル名とする
        $photo->filename = $photo->id . '.' . $extension;

        // S3にファイルを保存する
        // 第三引数の'public'はファイルを公開状態で保存するため
        $path = Storage::cloud()
            ->putFileAs('', $request->photo, $photo->filename, 'public');

        // // データベースエラー時にファイル削除を行うため
        // // トランザクションを利用する
        // DB::beginTransaction();

        // try {
        //     // Auth::user()->posts()->save($photo);
        //     // Auth::user()->photos()->save($photo);
            
            
            
        //     // photos()->save($photo);
            
            
        //     DB::commit();
        // } catch (\Exception $exception) {
        //     DB::rollBack();
        //     // DBとの不整合を避けるためアップロードしたファイルを削除
        //     Storage::cloud()->delete($photo->filename);
        //     throw $exception;
        // }

        // リソースの新規作成なので
        // レスポンスコードは201(CREATED)を返却する
        // return response($photo, 201);
        return Storage::cloud()->url($path);
        
    }
}
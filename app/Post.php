<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    'user_id',
    'type',
    'title',
    'img',
    'body',
    ];
    
    // protected $appends = [
    //     'url',
    // ];
    
    // /** JSONに含める属性 */
    // protected $visible = [
    //     'id', 'owner', 'url',
    // ];
    
        //urlアクセサ
    public function getUrlAttribute()
    {
        return Storage::cloud()->url($this->attributes['img']);
    }
    
     //userモデルとのリレーション
    public function owner(){
        return $this->belongsTo('App\User', 'user_id', 'id', 'users');
    }
    
    
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Link extends Model
{
    use HasFactory;
    const STATUS_INDEX="indexed";
    const STATUS_NOINDEX="noindex";
    const STATUS_NOSTATUS="noStatus";
    const STATUS=[self::STATUS_INDEX,self::STATUS_NOINDEX,self::STATUS_NOSTATUS];
    protected $fillable = [
        'user_id', 'link', 'slug'
    ];
    protected $casts=['status_changed'=>'datetime'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function createWithSlug(User $user, $link)
    {
//        dd($link);
        $links=collect(Link::query()->pluck('link'));
            foreach ($link as $key=>$value){
//                dd(!($links->contains($value)));
                if(!($links->contains($value))){
                    $count = $user->link()->count() + 1;
                    $attributes = [
                        'user_id' => $user->id,
                        'link' => $value,
                        'slug' => $user->id . '$' . $count,
                        'status_changed'=>Carbon::now(),
                    ];
                    $result= static::create($attributes);
                }
//                dd($result);
            }
           return isset($result) ?  $result : redirect()->back();
    }


    public function getstateAttribute()
    {
        return $this->active ? 'فعال' : 'غیرفعال';
    }
    public function isIndex()
    {
        return $this->status===self::STATUS_INDEX;
    }

    public function NoIndex()
    {
        return $this->status===self::STATUS_NOINDEX;
    }

    public function NoStatus()
    {
        return $this->status===self::STATUS_NOSTATUS;
    }


}

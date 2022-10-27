<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Link extends Model
{
    use HasFactory;

    const STATUS_INDEX = "indexed";
    const STATUS_NOINDEX = "noindex";
    const STATUS_NOSTATUS = "noStatus";
    const STATUS = [self::STATUS_INDEX, self::STATUS_NOINDEX, self::STATUS_NOSTATUS];
    protected $fillable = [
        'user_id', 'link', 'slug'
    ];
    protected $casts = ['status_changed' => 'datetime'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public static function createWithSlug(User $user, $link)
    {
//        dd($link);
        $links = Link::count() > 0 ? collect(Link::query()->pluck('link')) : null;
//        dd($links,);
        if (is_array($link)) {
            foreach ($link as $value) {
//                dd(!($links->contains($value)));
//            dd($link);
                if (!($links->contains($value)) || is_null($links)) {
                    $count = $user->link()->count() + 1;
                    $attributes = [
                        'user_id' => $user->id,
                        'link' => $value,
                        'slug' => $user->id . '$' . $count,
                    ];
                    $result = static::create($attributes);
                }
//                dd($result);
            }
        }else{
            $count = $user->link()->count() + 1;
            $attributes = [
                'user_id' => $user->id,
                'link' => $link,
                'slug' => $user->id . '$' . $count,
            ];
            $result = static::create($attributes);
        }
        return isset($result) ? $result : redirect()->back();
    }


    public function getstateAttribute()
    {
        return $this->active ? 'فعال' : 'غیرفعال';
    }

    public function isIndex()
    {
        return $this->status === self::STATUS_INDEX;
    }

    public function NoIndex()
    {
        return $this->status === self::STATUS_NOINDEX;
    }

    public function NoStatus()
    {
        return $this->status === self::STATUS_NOSTATUS;
    }


}

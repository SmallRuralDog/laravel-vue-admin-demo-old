<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class GoodsAttrValue extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function allValues($goods_attr_id)
    {

        return self::query()->where('goods_attr_id', $goods_attr_id)->orderBy("sort")->get();
    }
}

<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class GoodsAttr extends Model
{

    protected $guarded = [];


    public function values()
    {
        return $this->hasMany(GoodsAttrValue::class);
    }

    protected $allAttrs;

    public function allAttrs()
    {
        if (!empty($this->allAttrs)) {
            return $this->allAttrs;
        }
        return $this->allAttrs = self::query()->with(['values'])->orderBy("sort")->get()->makeHidden(["created_at", "updated_at"]);
    }
}

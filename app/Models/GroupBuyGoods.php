<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class GroupBuyGoods extends Model
{
    public function goodsSku()
    {
        return $this->belongsTo(GoodsSku::class);
    }

}

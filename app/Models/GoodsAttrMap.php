<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class GoodsAttrMap extends Model
{
    protected $table = "goods_attr_map";
    public $timestamps = false;
    protected $guarded = [];

    /**
     * 产品销售属性关联本体
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attr()
    {
        return $this->belongsTo(GoodsAttr::class, 'attr_id');
    }

    /**
     * 产品销售属性值列表
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function value_map()
    {
        return $this->hasMany(GoodsAttrValueMap::class, 'attr_map_id', 'id')
            ->orderBy('index');
    }
}

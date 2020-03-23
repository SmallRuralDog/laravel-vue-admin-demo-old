<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class GoodsAttrValueMap extends Model
{
    protected $table = "goods_attr_value_map";
    protected $guarded = [];
    public $timestamps = false;

    /**
     * 产品销售属性值关联的本体（详细信息）
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attr_value()
    {
        return $this->belongsTo(GoodsAttrValue::class, 'attr_value_id');
    }
}

<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{



    protected $guarded = [];

    protected $casts = [
        "goods_class_path" => "json",
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $with = ['images'];

    /**
     * 产品销售属性列表
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attr_map()
    {
        return $this->hasMany(GoodsAttrMap::class, 'goods_id')
            ->with([
                'attr.values',
                'value_map',
                'value_map.attr_value',
            ]);
    }

    public function attr_value_map()
    {
        return $this->hasMany(GoodsAttrValueMap::class, 'goods_id');
    }

    /**
     * 产品 SKU
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skus()
    {
        return $this->hasMany(GoodsSku::class, 'goods_id')->with(['stock', 'attrs']);
    }

    /**
     * 产品 库存列表
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function stock()
    {
        return $this->hasMany(GoodsSkuStock::class, 'goods_id');
    }

    /**
     * 产品详情内容关联
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function content()
    {
        return $this->hasOne(GoodsContent::class);
    }

    /**
     * 产品分类关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function goodsClass()
    {
        return $this->belongsTo(GoodsClass::class);
    }

    /**
     * 产品品牌管理
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * 产品图片关联
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(GoodsImage::class);
    }

    /**
     * 产品封面字段
     * @param $key
     * @return mixed
     */
    public function getCoverAttribute($key)
    {
        return collect($this->images)->first();
    }

    protected static function boot()
    {
        parent::boot();
        self::deleting(function ($model) {
            $model->content()->delete();
            $model->stock()->delete();
            $model->skus()->delete();
            $model->attr_map()->delete();
            $model->attr_value_map()->delete();
            $model->images()->delete();
        });
    }
}

<?php

namespace Smallruraldog\LaravelVueAdminDemoExtend\Components;

use App\Models\GoodsAttr;
use SmallRuralDog\Admin\Components\Component;
use SmallRuralDog\Admin\Components\Form\Upload;
use SmallRuralDog\Admin\Components\Grid\Image;


class GoodsSku extends Component
{


    protected $componentName = "GoodsSku";

    //当前所有规格
    protected $goodsAttrs = [];


    //添加规格接口
    protected $addGoodsAttrUrl;
    protected $addGoodsAttrValueUrl;

    protected $uploadComponent;
    protected $imageComponent;


    public function __construct($value = [])
    {
        $this->componentValue($this->getValue([]));

        $goodsAttrModel = new GoodsAttr();

        $this->goodsAttrs = $goodsAttrModel->allAttrs();

        $this->addGoodsAttrUrl = route("addGoodsAttr");
        $this->addGoodsAttrValueUrl = route("addGoodsAttrValue");

        $this->uploadComponent = Upload::make()->width(130)->height(130);
        $this->imageComponent = Image::make()->size(30, 30)->className("mr-10");


    }

    public static function make($value = [])
    {
        return new GoodsSku($value);
    }

    public function getValue($data)
    {
        return [
            'goods_attrs' => [],
            'goods_sku_list' => []
        ];
    }

    /**
     * @param array $goodsAttrs
     * @return $this
     */
    public function goodsAttrs(array $goodsAttrs)
    {
        $this->goodsAttrs = $goodsAttrs;
        return $this;
    }


}

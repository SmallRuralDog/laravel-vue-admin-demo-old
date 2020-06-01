<?php


namespace App\Admin\Controllers;


use App\Models\Brand;

use SmallRuralDog\Admin\Components\Form\Upload;
use SmallRuralDog\Admin\Components\Grid\Image;
use SmallRuralDog\Admin\Controllers\AdminController;
use SmallRuralDog\Admin\Controllers\AdminResource;
use SmallRuralDog\Admin\Form;
use SmallRuralDog\Admin\Grid;

class BrandController extends AdminController
{

    public function grid()
    {
        $grid = new Grid(new Brand());

        $grid->quickSearch(['name']);

        $grid->column("id", "ID")->width(50);
        $grid->column("icon", "图标")->component(Image::make()->size(50, 50))->width(70)->align("center");
        $grid->column("name", "品牌名称")->width(150);
        $grid->column("index_name", "索引")->width(50)->align("center");
        $grid->column("source", "产地国家")->width(100)->align("center");
        $grid->column("source_icon", "索引")->component(Image::make()->size(30, 30))->width(50)->align("center");

        $grid->toolbars(function (Grid\Toolbars $toolbars){
            $toolbars->addRight(Grid\Tools\ToolButton::make("查看源代码")->handler("link")->uri("https://github.com/SmallRuralDog/laravel-vue-admin-demo/blob/master/app/Admin/Controllers/BrandController.php"));
        });

        return $grid;
    }

    public function form($isEdit = false)
    {

        $form = new Form(new Brand());

        $form->item("name", "品牌名称")->required()->inputWidth(5);
        $form->item("index_name", "索引首字母")->required()->inputWidth(5);
        $form->item("icon", "品牌logo")->required()->component(Upload::make()->width(80)->height(80));
        $form->item("source", "产地国家")->required()->inputWidth(5);
        $form->item("source_icon", "产地图标")->required()->component(Upload::make()->width(80)->height(80));


        return $form;
    }
}

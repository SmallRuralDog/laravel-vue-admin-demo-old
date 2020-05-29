<?php


namespace App\Admin\Controllers;


use App\Models\Supplier;
use SmallRuralDog\Admin\Components\Input;
use SmallRuralDog\Admin\Controllers\AdminController;
use SmallRuralDog\Admin\Controllers\AdminResource;
use SmallRuralDog\Admin\Form;
use SmallRuralDog\Admin\Grid;

class SuppliersController extends AdminController implements AdminResource
{

    public function grid()
    {
        $grid = new Grid(new Supplier());


        $grid->quickSearch(['name', 'phone', 'qq', 'email', 'principal']);


        $grid->column('name');
        $grid->column('phone');
        $grid->column('qq');
        $grid->column('email');
        $grid->column('principal');
        $grid->column('address');


        $grid->toolbars(function (Grid\Toolbars $toolbars) {
            $toolbars->createButton()->content("添加品牌");
            $toolbars->addRight(Grid\Tools\ToolButton::make("查看源代码")->handler("link")->uri("https://github.com/SmallRuralDog/laravel-vue-admin-demo/blob/master/app/Admin/Controllers/SuppliersController.php"));

        });


        return $grid;
    }

    public function form($isEdit = false)
    {
        $form = new Form(new Supplier());


        $form->item('name', '供货商名称')->required()->inputWidth(8);
        $form->item('phone')->required()->inputWidth(4);
        $form->item('qq')->inputWidth(4);
        $form->item('email')->inputWidth(4);
        $form->item('principal', "负责人")->inputWidth(4);
        $form->item('address', "地址")->required();
        $form->item('remark', "备注")->inputWidth(8)->component(Input::make()->textarea());


        return $form;
    }
}

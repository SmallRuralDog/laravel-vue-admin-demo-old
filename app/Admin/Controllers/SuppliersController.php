<?php


namespace App\Admin\Controllers;


use App\Models\Supplier;
use SmallRuralDog\Admin\Components\Form\Input;
use SmallRuralDog\Admin\Controllers\AdminController;
use SmallRuralDog\Admin\Form;
use SmallRuralDog\Admin\Grid;

class SuppliersController extends AdminController
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

        $grid->dialogForm($this->form()->isDialog(), 500);


        return $grid;
    }

    public function form($isEdit = false)
    {
        $form = new Form(new Supplier());

        $form->labelPosition("top");


        $form->item('name', '供货商名称')->required();
        $form->item('phone')->required();
        $form->item('qq');
        $form->item('email');
        $form->item('principal', "负责人");
        $form->item('address', "地址")->required();
        $form->item('remark', "备注")->component(Input::make()->textarea());


        return $form;
    }
}

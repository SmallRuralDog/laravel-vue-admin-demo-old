<?php


namespace App\Admin\Controllers;


use App\Models\GoodsClass;
use SmallRuralDog\Admin\Components\Attrs\SelectOption;
use SmallRuralDog\Admin\Components\Form\Checkbox;
use SmallRuralDog\Admin\Components\Form\InputNumber;
use SmallRuralDog\Admin\Components\Form\Select;
use SmallRuralDog\Admin\Components\Form\Upload;
use SmallRuralDog\Admin\Components\Grid\Image;
use SmallRuralDog\Admin\Controllers\AdminController;
use SmallRuralDog\Admin\Form;
use SmallRuralDog\Admin\Grid;

class GoodsClassController extends AdminController
{

    public function grid()
    {
        $grid = new Grid(new GoodsClass());
        $grid->model()->with(['children']);
        $grid->model()->where('parent_id', 0);
        $grid->tree();
        $grid->column('id')->width(50);
        $grid->column('icon')->component(Image::make()->size(20, 20));
        $grid->column('name');

        $grid->toolbars(function (Grid\Toolbars $toolbars) {
            $toolbars->addLeft(Grid\Tools\ToolButton::make("查看源代码")->handler("link")->uri("https://github.com/SmallRuralDog/laravel-vue-admin-demo/blob/master/app/Admin/Controllers/GoodsClassController.php"));
        });

        return $grid;
    }

    public function form($isEdit = false)
    {
        $form = new Form(new GoodsClass());

        $form->item('parent_id', '上级菜单')->component(Select::make(0)->options(function () {
            return GoodsClass::query()->where('parent_id', 0)->orderBy('order')->get()->map(function ($item) {
                return SelectOption::make($item->id, $item->name);
            })->prepend(SelectOption::make(0, '顶级菜单'));
        }));
        $form->item('name', '名称')->required();
        $form->item('goods_class_key', '唯一标识')->required();
        $form->item('icon', '图标')->required()->component(Upload::make()->width(80)->height(80));
        $form->item('order', '排序')->required()->component(InputNumber::make(1));
        $form->item('status', '状态')->required()->component(Checkbox::make(1, "启用"));

        return $form;
    }
}

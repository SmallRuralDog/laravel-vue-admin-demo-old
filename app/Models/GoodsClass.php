<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use SmallRuralDog\Admin\Traits\ModelTree;

class GoodsClass extends Model
{
    use ModelTree;

    public function children()
    {
        return $this->hasMany(get_class($this), 'parent_id')->orderBy('order');
    }
}

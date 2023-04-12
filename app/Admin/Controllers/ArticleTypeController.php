<?php

namespace App\Admin\Controllers;

use App\Models\ArticleType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleTypeController extends AdminController
{
    /**
     * Title for current resource.
     */
    protected $title = 'Article Type';

    /**
     * For retreving fields. 
     */
    protected function grid()
    {
        $grid = new Grid(new ArticleType());
        $grid -> title(); 

        /// OTHER DIFFERENT WAYS OF ACCESSING A COLUMN NAME
        /**
        * $grid -> title('My Title'); /// Rename it to "My Title"
        * $grid ->column('title', __('My Name')); /// Rename it to "My Name"
        * $grid ->column('title', 'Heading'); /// Rename it to "My Name"
        */

        $grid ->column('id', 'ID'); 

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ArticleType::findOrFail($id));



        return $show;
    }

    /**
     * For creating fields
     */
    protected function form()
    {
        $form = new Form(new ArticleType());
        $form->select('parent_id')->options((new ArticleType())::selectOptions());  // drop down menu
        $form->text('title')->required(); 
        $form->number('order')->default(0); 



        return $form;
    }
}

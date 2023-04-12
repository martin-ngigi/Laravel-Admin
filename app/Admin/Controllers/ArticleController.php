<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\ArticleType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     */
    protected $title = 'Article';

    /**
     * For showing the records from the database.
     *
     */
    protected function grid()
    {
        $grid = new Grid(new Article());
        $grid->sub_title();
        $grid->column('description', 'My Description');



        return $grid;
    }

    /**
    * Click on one of the records and view it.
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Article::findOrFail($id));



        return $show;
    }

    /**
     * Create new record and submit
     */
    protected function form()
    {
        $form = new Form(new Article());
        $form->select('type_id')->options((new ArticleType())::selectOptions());  // drop down menu
        $form->text('title', 'Add Title')->required(); // 'title' is coming from DB, 'Add Title' is what the user sees
        $form->text('sub_title', 'Add Sub Title');
        $form->image('thumbnail'); /// upload image
        $form->textarea('description', 'Add Description')->required();
        
        // for switching/toggling between states
        $states =[
            'on'=>['value'=>1, 'text'=>'publish'],
            'off'=>['value'=>0, 'text'=>'draft'],            
        ];
        $form->switch('released', 'Publish')->states($states);



        return $form;
    }
}

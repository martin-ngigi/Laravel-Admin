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
        $grid->id();
        $grid->title();
        
        //show article_type... i.e. one to one relationship
        $grid->column('article.title', 'Category');
        //or
        //$grid->article()->title();
        
        $grid->sub_title();
        /// show only 300 characters in the description
        $grid->column('description', 'My Description')->display(function ($val){
            return substr($val, 0, 300);
        });
        $grid->column('released', 'Released')->bool();
        $grid->column('thumbnail', 'My Image')->image('','60','60');
        //$grid->column('thumbnail', 'My Image');

        /// using title
        $grid->filter(function($filter){
            $filter->disableIdFilter();// disable Id Filter
            $filter->like('title'); // Enable title filter
            $filter->like('article.title', 'Category'); // Enable Category filter
        });



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
        $form->select('type_id', 'Category ID')->options((new ArticleType())::selectOptions());  // drop down menu
        $form->text('title', 'Add Title')->required(); // 'title' is coming from DB, 'Add Title' is what the user sees
        $form->text('sub_title', 'Add Sub Title');
        $form->image('thumbnail')->move('/programming'); /// upload image and save it to /programming folder
        $form->UEditor('description', 'Add Description')->required();
        
        // for switching/toggling between states
        $states =[
            'on'=>['value'=>1, 'text'=>'publish'],
            'off'=>['value'=>0, 'text'=>'draft'],            
        ];
        $form->switch('released', 'Publish')->states($states);



        return $form;
    }
}

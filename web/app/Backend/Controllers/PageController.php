<?php

namespace App\Backend\Controllers;

use App\Models\Page;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class PageController extends Controller
{
    use ModelForm;

    protected function script()
    {
        return <<<EOT

        $(document).ready(function(){
            $("#title").on('change',function(){
                let val = $(this).val();
                $("#name").val(slugify(val));
            });
        });

        function slugify(string) {
            return string
              .toString()
              .trim()
              .toLowerCase()
              .replace(/\s+/g, "-")
              .replace(/[^\w\-]+/g, "")
              .replace(/\-\-+/g, "-")
              .replace(/^-+/, "")
              .replace(/-+$/, "");
          }

EOT;

    } 

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Static');
            $content->description('Pages');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Static');
            $content->description('Pages');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {   
        Admin::script($this->script());
        return Admin::content(function (Content $content) {

            $content->header('Static');
            $content->description('Pages');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Page::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->title();
            $grid->column('name','Slug');
            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Page::class, function (Form $form) {

            $form->display('id', 'ID');
           
            $form->text('title','Judul');

            $form->trumbowyg('profile','Content')->attribute(['id' => 'trumbowyg']);
            $form->image('background','Background');
            $form->text('name','Slug');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}

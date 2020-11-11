<?php

namespace App\Backend\Controllers;

use App\Models\Daerah;
use App\Models\Anggota;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class DaerahController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('DPD');
            $content->description('Dewan Perwakilan Daerah');

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

            $content->header('Edit');
            $content->description('Dewan Perwakilan Daerah');

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
        return Admin::content(function (Content $content) {

            $content->header('Create');
            $content->description('Dewan Perwakilan Daerah');

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
        return Admin::grid(Daerah::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->title();
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
        return Admin::form(Daerah::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name','Name');
            $form->text('title','Provinsi');

            $form->text('headline','Headline');
            $form->trumbowyg('profile','Tentang')->attribute(['id' => 'trumbowyg']);
            $form->image('background','Background');

            $form->text('url','Read More');
            
            $form->select('ketua_id','Ketua')->options(Anggota::all()->pluck('name','id'));            

            $form->text('alamat','Alamat');
            $form->text('telepon','Telepon');
            $form->text('facebook','Facebook URL');
            $form->text('twitter','Twitter URL');
            $form->text('youtube','Youtube URL');
            $form->text('instagram','Instagram URL');
            $form->text('gplus','Google Plus Url');

            
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}

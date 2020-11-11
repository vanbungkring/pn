<?php

namespace App\Backend\Controllers;

use App\Models\Anggota;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AnggotaController extends Controller
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

            $content->header('List');
            $content->description('Anggota');

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
            $content->description('Anggota');

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
            $content->description('Anggota');

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
        return Admin::grid(Anggota::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->name();
            $grid->photo()->image(100,100);
            $grid->jabatan();            
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
        return Admin::form(Anggota::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name',"Name");
            $form->image('photo')->move('/anggota');

            $form->trumbowyg('profile', 'Profile')->attribute(['id' => 'trumbowyg']);
            $form->text('jabatan',"Jabatan");            
            $form->text('daerah.name','DPD');
            
            $form->text('facebook','Facebook URL');
            $form->text('twitter','Twitter URL');
            $form->text('youtube','Youtube URL');
            $form->text('instagram','Instagram URL');
            $form->text('gplus','Google Plus Url');
            $form->text('website','Website');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}

<?php

namespace App\Backend\Controllers;

use App\Models\Agenda;
use App\Models\Daerah;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AgendaController extends Controller
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
            $content->description('Agenda');

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

            $content->header('List');
            $content->description('Agenda');

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
            $content->description('Agenda');

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
        return Admin::grid(Agenda::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->column('name','Agenda');
            $grid->column('start_date','Mulai');
            $grid->column('end_date','Berakhir');
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
        return Admin::form(Agenda::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('name','Agenda');
            $form->dateRange('start_date','end_date','Jadwal');
            $form->textarea('content','Keterangan')->attribute(['id'=>'trumbowyg']);
            $form->image('poster','Photo')->move('/agenda');
            $form->text('location','Lokasi');
            $form->select('daerah_id','DPD')->options(Daerah::all()->pluck('name', 'id'));            
            
            $form->hidden('author_id')->value(Admin::user()->id);
            
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}

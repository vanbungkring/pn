<?php

namespace App\Backend\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Daerah;
use App\Models\Tag;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Tab;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;
use Encore\Admin\Auth\Database\Administrator;

use App\Backend\Extensions\TweetAction;

class PostController extends Controller
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

            $content->header('Post');
            $content->description('News');

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
            $content->description('News');

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
            $content->description('News');

            $content->body($this->form());
            /*$tab = new Tab();
            
            $tab->add('Content', $this->form());
            $tab->add('SEO',  $this->form());
            $content->body($tab);*/
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Post::class, function (Grid $grid) {
            $grid->model()->orderBy('id', 'desc');
            $grid->id('ID')->sortable();
            $grid->title();
            $grid->column('category_id','Category')->display(function($category_id) {
                return Category::find($category_id)->name;
            });
            $grid->column('author_id','Author')->display(function($author_id) {
                return Administrator::find($author_id)->name;
            });
            $grid->created_at();
            $grid->updated_at();
            //Action
            $grid->actions(function ($actions) {
                $actions->append(new TweetAction($actions->row));
            });

            //Filter
            $grid->filter(function($filter){                
                // Remove the default id filter
                $filter->disableIdFilter();
                // Add a column filter
                $filter->like('title', 'Title');
                 $filter->like('content' ,'Content');
                $filter->where(function ($query) {
                    $query->whereHas('category', function ($query) {
                        $query->where('name', 'like', "%{$this->input}%");
                    });
                
                }, 'Category');
            });
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {  
        return Admin::form(Post::class, function (Form $form) {
            
            $form->display('id', 'ID');
            $form->text('title');//->attribute(['id' => 'trumbowyg']);
            $form->image('feature_image','Photo')->move('/news');
            $form->trumbowyg('excerpt','Summary');

            $form->trumbowyg('content','Content')->attribute(['id' => 'trumbowyg']);
            $form->select('category_id','Category')->options(Category::all()->pluck('name','id'));
            
            //DPD use mutli select
            $form->multipleSelect('dpd','DPD')->options(Daerah::all()->pluck('name', 'id'));            

            $states = [
                'on'  => ['value' => 1, 'text' => 'enable', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => 'disable', 'color' => 'danger'],
            ];
            $form->switch('homepage','Terkini')->states($states);
            $form->switch('homepage_daerah','Nasdem Daerah')->states($states);            
            $form->switch('status','Publish')->states($states);
            $form->tagged('tags');
           
            $form->hidden('author_id')->value(Admin::user()->id);
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
            
            $form->saving(function (Form $form) {
                //save the tag to tab table
                $tags =  array();
                if($form->tags){
                    foreach($form->tags as $data){
                        if(!is_null($data)) {
                            $tag = Tag::firstOrCreate(['name'=>$data]);
                            array_push($tags,$tag->id);
                        }    
                    }
                }
                $form->tags = $tags;
            });

        });
    }
}

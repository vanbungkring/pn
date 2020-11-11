<?php

namespace App\Backend\Extensions\Form;

use Encore\Admin\Form\Field;

class Trumbowyg extends Field
{
    public static $js = [
        '/vendor/laravel-admin/Trumbowyg/dist/trumbowyg.min.js',
    ];

    public static $css = [
        '/vendor/laravel-admin/Trumbowyg/dist/ui/trumbowyg.min.css'
    ];

    protected $view = 'admin.trumbowyg';

    public function render()
    {
        $class = $this->getElementClass();
        $this->script = "$('textarea.{$class[0]}').trumbowyg();";
        
        return parent::render();
    }
}

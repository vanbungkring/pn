<?php

namespace App\Backend\Extensions\Form;

use Encore\Admin\Form\Field;

class Tagged extends Field
{
  
    public static $js = [
        '/js/bootstrap-tagsinput.js',
    ];

    public static $css = [
        '/css/bootstrap-tagsinput.css'
    ];

    protected $view = 'admin.tagged';

    public function render()
    {   
        $class = $this->getElementClass();
        $this->script = "$('.tagged').tagsinput();";
        return parent::render();
    }
}

<?php

namespace App\Backend\Extensions;

use Encore\Admin\Admin;

class TweetAction
{
    protected $row;

    public function __construct($row)
    {
        $this->row = $row;
    }

    protected function script()
    {
        return <<<SCRIPT

$('.twitter').on('click', function () {

    // Your code.
    var url = $(this).data('url')
    var title = $(this).data('title')
    swal({
        title: 'Are you sure?',
        text: "Tweet this News!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, tweet!'
      },function () {
        $.post( "tweet",{title: title, url: url}, function(data) {
            $( ".result" ).html(data);
          });
      })

});

SCRIPT;
    }

    protected function render()
    {
        Admin::script($this->script());
        $url = url_title('read',$this->row);
        return "<a href='javascript:void(0)' class='fa fa-twitter twitter' data-title='{$this->row->title}' data-url='{$url}' ></a>";
    }

    public function __toString()
    {
        return $this->render();
    }
}
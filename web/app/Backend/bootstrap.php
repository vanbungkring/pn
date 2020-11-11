<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

Encore\Admin\Form::forget(['map','editor']);

/*Load your own CSS
Admin::css('/vendor/laravel-admin/Trumbowyg/dist/ui/trumbowyg.min.css');
//Load yout own JS
Admin::js('/vendor/laravel-admin/Trumbowyg/dist/trumbowyg.min.js');
Admin::js('/js/trumbowyg.js');
*/
Admin::js('/vendor/laravel-admin/bootstrap-fileinput/js/plugins/sortable.min.js');
//Admin::js('/js/form.js');

Encore\Admin\Form::extend('trumbowyg', App\Backend\Extensions\Form\Trumbowyg::class);
Encore\Admin\Form::extend('tagged', App\Backend\Extensions\Form\Tagged::class);


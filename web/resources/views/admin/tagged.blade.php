<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">
        @include('admin::form.error')
        <select class="form-control tagged" style="width: 100%;" name="{{$name}}[]" multiple="multiple" data-placeholder="{{ $placeholder }}" {!! $attributes !!} >
            @if(isset($value))
                @foreach($value as $select)
                    <option value="{{$select['name']}}" selected>{{$select['name']}}</option>
                @endforeach
            @endif
        </select>
        @include('admin::form.help-block')
    </div>
</div>

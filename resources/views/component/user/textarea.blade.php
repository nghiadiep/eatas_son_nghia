<div class="form-group mb15-ipt">
    @if(isset($label) && $label != null)
    <label class="sub-title" for="input-{{$name}}">
        <span>{{$label}}</span>
        @if(isset($required) && $required == true )
        <span class="sub-title__require">必須</span>
        @endif
    </label>
    @endif

    <textarea 
        rows="4" 
        class="form-control fs14-ipt {{isset($errors)&&$errors->has($name) ? 'error' : null}}" 
        name="{{isset($name) ? $name:null }}"
        placeholder="{{isset($placeholder) ? $placeholder:null }}"
        {{isset($required) && $required == true ? 'required':null }}
    >{{ isset($value)? $value : null }}</textarea>
</div>
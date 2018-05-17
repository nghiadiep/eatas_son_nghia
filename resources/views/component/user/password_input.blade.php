<div class="form-group">
    @if(isset($label) && $label != null)
    <label class="sub-title" for="input-{{$name}}">
        <span>{{$label}}</span>
        @if(isset($required) && $required == true )
        <span class="sub-title__require">必須</span>
        @endif
    </label>
    @endif
    <div class="input-group">
        <div class="input-group__control input-placeholder">
            <input
                type="password"
                id="input-{{$name}}"
                placeholder=" "
                name="{{$name}}" 
                {{isset($required) && $required == true ? 'required':null }} 
                class=" {{isset($errors)&&$errors->has($name) ? 'error' : null}}"
                v-model="{{ isset($model) ? $model : null }}"
                v-bind:class="{{ isset($error_model) ? '{error:'.$error_model.'}' : null }}"
            >
            <label for="input-{{$name}}">
                {{isset($placeholder) ? $placeholder: null }}
            </label>
        </div>
        <div class="input-group__addon" onclick="window.switchVisitable(this)">
            <span class="input-group__addon__btn">表示する</span>
        </div>
    </div>
    @if( isset($error_model) )
    <div v-if=" {{$error_model}}!=null && {{$error_model}}.length > 0">
        <p class="block-note__txt">
            <span v-for="message in {{$error_model}}" v-text="message"></span><br />
        </p>
    </div>
    @endif
</div>
<div class="form-group">

    @if(isset($label) && $label != null)
    <label class="sub-title">
        <span>{{$label}}</span>
        @if(isset($required) && $required == true )
        <span class="sub-title__require">必須</span>
        @endif
    </label>
    @endif

    <div class="form-controls">
        @foreach($inputs as $input)
        @php
        
        $name = $input["name"];
        $type = isset($input["type"]) ? $input["type"] : 'text';
        $value = isset($input["value"]) ? $input["value"] : null;
        $placeholder = isset($input["placeholder"]) ? $input["placeholder"] : null;

        $model = isset($input["model"]) ? $input["model"] : null;
        $error_model = isset($input["error_model"]) ? $input["error_model"] : null;

        @endphp
        <input type="text" 
            class="form-control {{isset($errors)&&$errors->has($name) ? 'error' : null}}" 
            name="{{$name}}" 
            value="{{old($name, isset($value) ? $value : null )}}" 
            placeholder="{{isset($placeholder)?$placeholder:null}}" 
            type="{{$type}}" 
            {{isset($required) && $required == true ? 'required':null }}
            v-model="{{ isset($model) ? $model : null }}"
            v-bind:class="{{ isset($error_model) ? '{error:'.$error_model.'}' : null }}"
        >
        @endforeach
    </div>

    @if( isset($error_model) )
    <div v-if=" {{$error_model}}!=null && {{$error_model}}.length > 0">
        <p class="block-note__txt">
            <span v-for="message in {{$error_model}}" v-text="message"></span><br />
        </p>
    </div>
    @endif
</div>
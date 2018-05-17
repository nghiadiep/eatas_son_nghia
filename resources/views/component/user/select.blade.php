<div class="form-group">
    @if(isset($label) && $label != null)
    <label class="sub-title" for="input-{{$name}}">
        <span>{{$label}}</span>
        @if(isset($required) && $required == true )
        <span class="sub-title__require">必須</span>
        @endif
    </label>
    @endif

    <div class="select-group">
        <label>
            <select name="{{$name}}" {{isset($required) && $required == true ? 'required':null }} v-model="{{ isset($model) ? $model : null }}">
                <option value="null">選択してください</option>

                @foreach($options as $option)
                <option 
                    value="{{$option['value']}}"
                    {{ 
                        $option['value'] === $init ? 'selected' : null
                    }}
                >
                    {{$option['label']}}
                </option>
                @endforeach

            </select>
        </label>
    </div>
</div>
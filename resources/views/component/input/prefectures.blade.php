@inject('constantService', 'App\Services\ConstantService')

<select class="uk-select" 
    name="{{isset($name) ? $name: 'prefecture_id'}}" {{isset($required) && !$required ? null : "required"}}>
    <option value>選択してください</option>
    @foreach ($constantService->getPrefectures() as $prefecture)
        @if($loop->first)
            <optgroup label="{{$prefecture->area_label}}">
        @elseif( $constantService->getPrefectures()[$loop->index-1]->area_label != $prefecture->area_label )
            </optgroup>
            <optgroup label="{{$prefecture->area_label}}">
        @endif

        @if(isset($value) && $value==$prefecture->id )
            <option value="{{$prefecture->id}}" selected>
                {{$prefecture->label}}
            </option>
        @else
            <option value="{{$prefecture->id}}">
                {{$prefecture->label}}
            </option>
        @endif

        @if($loop->last)
             </optgroup>
        @endif
    @endforeach
</select>
@inject('constantService', 'App\Services\ConstantService')

<select class="uk-select" 
    name="{{isset($name) ? $name: 'contact_type_id'}}" {{isset($required) && !$required ? null : "required"}}>
    <option value>選択してください</option>
    @foreach ($constantService->getDocTypes() as $docType)

        @if(isset($value) && $value==$docType->id )
        <option value="{{$docType->id}}" selected>
            {{$docType->label}}
        </option>
        @else
        <option value="{{$docType->id}}" >
            {{$docType->label}}
        </option>
        @endif

    @endforeach
</select>
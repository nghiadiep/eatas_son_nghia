@inject('constantService', 'App\Services\ConstantService')

<select class="uk-select" 
    name="{{isset($name) ? $name: 'contact_type_id'}}" {{isset($required) && !$required ? null : "required"}}>
    <option value>選択してください</option>
    @foreach ($constantService->getContactTypes() as $contactType)
        <option value="{{$contactType->id}}" >
            {{$contactType->label}}
        </option>
    @endforeach
</select>
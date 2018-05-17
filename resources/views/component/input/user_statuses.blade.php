@inject('constantService', 'App\Services\ConstantService')

<select class="uk-select" 
    name="{{isset($name) ? $name: 'user_status_id'}}" {{isset($required) && !$required ? null : "required"}}>
    <option value>選択してください</option>
    @foreach ($constantService->getUserStatuses() as $status)

        @if(isset($value) && $value==$status->id )
            <option value="{{$status->id}}" selected>
                {{$status->label}}
            </option>
        @else
            <option value="{{$status->id}}">
                {{$status->label}}
            </option>
        @endif
    @endforeach
</select>
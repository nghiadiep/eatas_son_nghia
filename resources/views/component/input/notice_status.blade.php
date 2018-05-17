@inject('constantService', 'App\Services\ConstantService')

<select class="uk-select" 
    name="{{isset($name) ? $name: 'notice_status_id'}}" {{isset($required) && !$required ? null : "required"}}>
    <option value>選択してください</option>
    @foreach ($constantService->getNoticeStatus() as $noticeStatus)

        @if(isset($value) && $value==$noticeStatus->id )
            <option value="{{$noticeStatus->id}}" selected>
                {{$noticeStatus->label}}
            </option>
        @else
            <option value="{{$noticeStatus->id}}">
                {{$noticeStatus->label}}
            </option>
        @endif

    @endforeach
</select>
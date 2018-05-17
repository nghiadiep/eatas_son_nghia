@inject('advertiserService', 'App\Services\AdvertiserService')

<select class="uk-select" 
    name="{{isset($name) ? $name: 'advertiser_id'}}"  {{isset($required) && !$required ? null : "required"}}>
    <option value>選択してください</option>
    @foreach ($advertiserService->getAll() as $advertiser)

        @if(isset($value) && $value==$advertiser->id )
            <option value="{{$advertiser->id}}" selected>
                {{$advertiser->company_name}}
            </option>
        @else
            <option value="{{$advertiser->id}}">
                {{$advertiser->company_name}}
            </option>
        @endif

    @endforeach
</select>
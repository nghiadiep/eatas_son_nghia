@inject('constantService', 'App\Services\ConstantService')

<select class="uk-select" 
    name="{{isset($name) ? $name: 'job_id'}}" {{isset($required) && !$required ? null : "required"}}
    v-model="{{ isset($model) ? $model : null }}"
>
    <option value>選択してください</option>
    @foreach ($constantService->getJobs() as $job)
        @if(isset($value) && $value==$job->id )
            <option value="{{$job->id}}" selected>
                {{$job->label}}
            </option>
        @else
            <option value="{{$job->id}}">
                {{$job->label}}
            </option>
        @endif
    @endforeach
</select>
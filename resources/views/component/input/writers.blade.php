@inject('writerService', 'App\Services\WriterService')

<select class="uk-select" 
    name="{{isset($name) ? $name: 'writer_id'}}" {{isset($required) && !$required ? null : "required"}}>
    <option value>
        {{ isset($null_text) ? $null_text : "選択してください" }}
    </option>
    @foreach ($writerService->getAll() as $writer)

        @if(isset($value) && $value==$writer->id )
            <option value="{{$writer->id}}" selected>
                {{$writer->pen_name}}
            </option>
        @else
            <option value="{{$writer->id}}">
                {{$writer->pen_name}}
            </option>
        @endif

    @endforeach
</select>
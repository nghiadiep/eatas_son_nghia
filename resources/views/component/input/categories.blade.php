@inject('categoryService', 'App\Services\CategoryService')

<select class="uk-select" 
    name="{{isset($name) ? $name: 'category_id'}}" {{isset($required) && !$required ? null : "required"}}>
    <option value>選択してください</option>
    @foreach ($categoryService->getAll() as $category)

        @if(isset($value) && $value==$category->id )
            <option value="{{$category->id}}" selected>
                {{$category->label}}
            </option>
        @else
            <option value="{{$category->id}}">
                {{$category->label}}
            </option>
        @endif

    @endforeach
</select>
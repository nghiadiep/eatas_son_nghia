@inject('constantService', 'App\Services\ConstantService')

<select class="uk-select" 
    name="{{isset($name) ? $name: 'product_category_id'}}" {{isset($required) && !$required ? null : "required"}}>
    <option value>選択してください</option>
    @foreach ($constantService->getProductCategories() as $category)

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
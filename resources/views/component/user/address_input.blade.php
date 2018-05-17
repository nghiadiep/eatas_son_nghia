<div class="form-group">
    <label class="sub-title">
        <span>{{$label}}</span>
        @if(isset($required) && $required == true )
        <span class="sub-title__require">必須</span>
        @endif
    </label>
    <div class="select-group">
        <label>
            @include('component.input.prefectures', [
                "required" => true,
                "name" => "prefecture_id",
                "value" => isset($value["prefecture_id"]) ? $value["prefecture_id"] : null
            ])
        </label>
    </div>
</div>
<!--/.form-group-->
@include("component.user.input", [
    "label" => null,
    "placeholder" => "市区町村",
    "name" => "address",
    "required" => true,
    "type" => "text",
    "value" => isset($value["address"]) ? $value["address"] : null
])
<!--/.form-group-->
@include("component.user.input", [
    "label" => null,
    "placeholder" => "続きの住所",
    "name" => "address_detail",
    "required" => false,
    "type" => "text",
    "value" => isset($value["address_detail"]) ? $value["address_detail"] : null
])
<!--/.form-group-->
@include("component.user.input", [
    "label" => null,
    "placeholder" => "マンション名・部屋番号",
    "name" => "address_room",
    "required" => false,
    "type" => "text",
    "value" => isset($value["address_room"]) ? $value["address_room"] : null
])
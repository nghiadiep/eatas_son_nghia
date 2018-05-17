@php
if(isset($value)){
    $date = new Carbon\Carbon($value);
}else{
    $date = Carbon\Carbon::now();
}
$initYear = $date->year;
$initMonth = $date->month;
$initDay = $date->day;
@endphp
<div class="form-group">
    @if(isset($label) && $label != null)
    <label class="sub-title" for="input-{{$name}}">
        <span>{{$label}}</span>
        @if(isset($required) && $required == true )
        <span class="sub-title__require">必須</span>
        @endif
    </label>
    @endif

    <div class="block-form__date-list clearfix">
        <div class="block-form__date-list__year">
            <div class="select-group">
                <label>
                    <select name="{{$name}}__year" onchange="changeDate('{{$name}}')">
                        <option>年</option>
                        @php
                        for( $year = 1950; $year <= ( Carbon\Carbon::now())->year; $year++ ){
                        @endphp
                        <option value="{{$year}}"
                            {{$initYear == $year ? "selected" : null }}
                        >
                            {{$year."年"}}
                        </option>
                        @php
                        }
                        @endphp
                    </select>
                </label>
            </div>
        </div>
        <!--/.block-form__date-list__year-->
        <div class="block-form__date-list__month">
            <div class="select-group">
                <label>
                    <select name="{{$name}}__month" onchange="changeDate('{{$name}}')">
                        <option>月</option>
                        @php
                        for( $month = 1; $month <= 12; $month++ ){
                        @endphp
                        <option value="{{$month}}"
                            {{$initMonth == $month ? "selected" : null }}
                        >
                            {{$month."月"}}
                        </option>
                        @php
                        }
                        @endphp
                    </select>
                </label>
            </div>
        </div>
        <!--/.block-form__date-list__month-->
        <div class="block-form__date-list__day">
            <div class="select-group">
                <label>
                    <select name="{{$name}}__day" onchange="changeDate('{{$name}}')">
                        <option>日</option>
                        @php
                        for( $day = 1; $day <= 31; $day++ ){
                        @endphp
                        <option value="{{$day}}"
                            {{$initDay == $day ? "selected" : null }}
                        >
                            {{$day."日"}}
                        </option>
                        @php
                        }
                        @endphp
                    </select>
                </label>
            </div>
        </div>
        <!--/.block-form__date-list__day-->
    </div>
    <!--/.block-form__date-list-->
    <input 
        type="hidden" 
        name="{{$name}}" 
        value="{{$date->toDateString()}}"
        v-model="{{ isset($model) ? $model : null }}"
    >
</div>
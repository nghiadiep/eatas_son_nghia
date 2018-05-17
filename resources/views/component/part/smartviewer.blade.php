<div class="uk-flex-center uk-margin" uk-grid>
    <div class="uk-width-1-3">
        <button class="uk-button uk-button-default uk-width-1-1" onclick="switchSize(320, 568)">
            4 inch
        </button>
    </div>
    <div class="uk-width-1-3">
        <button class="uk-button uk-button-default uk-width-1-1" onclick="switchSize(375, 667)">
            4.7 inch
        </button>
    </div>
    <div class="uk-width-1-3">
        <button class="uk-button uk-button-default uk-width-1-1" onclick="switchSize(412, 736)">
            5.5 inch
        </button>
    </div>
</div>

<div class="uk-flex-center uk-margin" uk-grid>
    <iframe class="iframe" style="width: 375px; height: 667px;" src="{{$url}}"></iframe>
</div>

<script type="text/javascript">
var switchSize = (width, height) => {
    $(".iframe").css("width", width + "px");
    $(".iframe").css("height", height + "px");
};
</script>
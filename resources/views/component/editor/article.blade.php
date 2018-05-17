@inject('articleStatus', 'App\Models\ArticleStatus')

@if ( !isset($form) || $form != "status_only")
<div class="uk-grid-small" uk-grid>
    <div class="uk-width-1-1">
        <label class="uk-form-label" for="title">
            タイトル
        </label>
        <div class="uk-form-controls">
            <input class="uk-input" type="text" name="title" value="{{old('title', isset($article) ? $article->title: null )}}" required>
        </div>
    </div>
    <div class="uk-width-1-2@s">
        <div class="uk-margin-small">
            <label class="uk-form-label" for="category_id">
                カテゴリ
            </label>
            <div class="uk-form-controls">
                @include('component.input.categories', [ 'value' => old('category_id', isset($article) ? $article->category_id: null ) ])
            </div>
        </div>
        <div class="uk-margin-small">
            <label class="uk-form-label" for="tags">
                タグ
            </label>
            <div class="uk-form-controls uk-position-relative">
                @include("component.input.tags", ["tags"=>isset($article) ? $article->tags : null, "name"=>"tags"])
            </div>
        </div>
    </div>
    <div class="uk-width-1-2@s">
        <label class="uk-form-label" for="summary">
            サムネイル画像
        </label>
        <div class="uk-form-controls">
            @if($role=="administrator")
                @component('component.input.image', [ 'image' => isset($article) && $article->articleImage->url ? $article->articleImage: null, 'url' => route('api.administrator.article_images.add'), 'read' => route('api.administrator.article_images') ])
                @endcomponent
            @endif
            @if($role=="writer")
                @component('component.input.image', [ 'image' => isset($article) && $article->articleImage->url ? $article->articleImage: null, 'url' => route('api.writer.article_images.add'), 'read' => route('api.writer.article_images') ])
                @endcomponent
            @endif
        </div>
    </div>
    <div class="uk-width-1-1@s">
        <label class="uk-form-label" for="summary">
            サマリー
        </label>
        <div class="uk-form-controls">

            <input id="summary_mode" type="hidden" name="summary_mode" value="{{ old('summary_mode', isset($article)? $article->summary_mode: 0) }}">

            <ul class="uk-subnav uk-subnav-pill uk-child-width-expand" uk-switcher="animation: uk-animation-fade; active: {{ old('summary_mode', isset($article)? $article->summary_mode: 0) }};">
                <li class="uk-text-center" onclick="switchSummary(0)">
                    <a href="#">テキスト</a>
                </li>
                <li class="uk-text-center" onclick="switchSummary(1)">
                    <a href="#">リスト</a>
                </li>
            </ul>
            <ul class="uk-switcher uk-margin">
                <li id="summary_0" class="summary_base">
                    <textarea class="uk-textarea uk-height-small" type="text" name="summary" onKeyUp="changeSummaryText()">{{old('summary', isset($article) ? $article->summary: null )}}</textarea>
                </li>
                <li id="summary_1" class="summary_base">
                    @foreach( [1, 2, 3] as $lineNum )
                    <div class="uk-margin-small uk-grid-small uk-flex-middle" uk-grid>
                        <div class="uk-width-auto">
                            <label class="uk-form-label">
                                {{$lineNum}}行目
                            </label>
                        </div>
                        <div class="uk-width-expand">
                            <input type="text" class="uk-input summary_line" value="" onKeyUp="changeSummaryLine()" />
                        </div>
                    </div>
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
    <div class="uk-width-1-1">
        <input id="is_reprinted" type="hidden" name="is_reprinted" value="{{isset($article)? $article->is_reprinted: 0}}">

        <ul class="uk-subnav uk-subnav-pill uk-child-width-expand" uk-switcher="animation: uk-animation-fade; active: {{isset($article)? $article->is_reprinted: 0}};">
                <li class="uk-text-center" onclick="switchReprint(0)">
                    <a href="#">オリジナル記事</a>
                </li>
                <li class="uk-text-center" onclick="switchReprint(1)">
                    <a href="#">転載記事</a>
                </li>
        </ul>
        <ul class="uk-switcher uk-margin">
            <li>
                <label class="uk-form-label" for="sentence">
                    本文
                </label>
                <div class="uk-form-controls">
                    @include('component.wysiwyg', [ 'value' => old('sentence', isset($article) ? $article->sentence: null ) , 'articleId' => isset($article) ? $article->id: null ])
                </div>
            </li>
            <li>
                <div class="uk-margin-small">
                    <label class="uk-form-label" for="reprinted_name">
                        転載元サイト名
                    </label>
                    <div class="uk-form-controls">
                        <input class="uk-input" type="text" name="reprinted_name" value="{{old('reprinted_name', isset($article) ? $article->reprinted_name: null )}}">
                    </div>
                </div>
                <div class="uk-margin-small">
                    <label class="uk-form-label" for="reprinted_url">
                        転載元リンク
                    </label>
                    <div class="uk-form-controls">
                        <input class="uk-input" type="url" name="reprinted_url" value="{{old('reprinted_url', isset($article) ? $article->reprinted_url: null )}}">
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="uk-width-1-1@s">
        <div id="ad">
            <input id="is_advertise" type="hidden" name="is_advertise" v-bind:value=is_advertise>
            <button class="uk-button" v-bind:class="{ 'uk-button-primary': is_advertise==1, 'uk-button-default': is_advertise==1 }" type="button" v-on:click="switchAdvertise">広告</button>
            <div class="uk-margin-small toggle-advertise" v-if="is_advertise==1" uk-grid>
                <div class="uk-width-1-2@s">
                    <label class="uk-form-label" for="advertiser_id">
                        広告主
                    </label>
                    <div class="uk-form-controls">
                        @include('component.input.advertisers', [ 'value' => old('advertiser_id', isset($article) ? $article->advertiser_id: null ) ])
                    </div>
                </div>
                <div class="uk-width-1-2@s">
                    <label class="uk-form-label" for="show_weight">
                        表示数
                    </label>
                    <div class="uk-form-controls">
                        <input class="uk-input" type="number" name="show_weight" value="{{old('show_weight', isset($article) ? $article->show_weight: null )}}" required>
                    </div>
                </div>
            </div>
        </div>
        <label class="uk-form-label" for="page_title">
            ページタイトル(未入力の場合はタイトルが利用されます)
        </label>
        <div class="uk-form-controls">
            <input class="uk-input" type="text" name="page_title" value="{{old('page_title', isset($article) ? $article->page_title: null )}}">
        </div>
    </div>
    <div class="uk-width-1-1@s">
        <label class="uk-form-label" for="page_description">
            ページディスクリプション(未入力の場合はサマリが利用されます)
        </label>
        <div class="uk-form-controls">
            <textarea class="uk-textarea uk-height-small" type="text" name="page_description">{{old('page_description', isset($article) ? $article->page_description: null )}}</textarea>
        </div>
    </div>
    <div class="uk-width-1-1@s">
        <label class="uk-form-label" for="credit_writer_id">
            クレジットに表示されるライター
        </label>
        <div class="uk-form-controls">
            @include('component.input.writers', [ 
                'name' => 'credit_writer_id',
                'value' => old('credit_writer_id', isset($article) ? $article->credit_writer_id: null ) ,
                'required' => false,
                "null_text" => "非表示"
            ])
        </div>
    </div>
</div>
<script type="text/javascript">
//標準記事と転載記事を切り替え
var switchReprint = (is_reprinted) => {
    $("#is_reprinted").val(is_reprinted);
};
var switchSummary = (summary_mode) => {
    $("#summary_mode").val(summary_mode);
};
var changeSummaryLine = () => {
    var mergeText = Array.prototype.slice.call($(".summary_line")).map( (element, index) => {
        return $(element).val();
    }).join("\n");
    $("textarea[name='summary']").val(mergeText);
}
var changeSummaryText = () => {
    var text = $("textarea[name='summary']").val();
    var lineInput = $(".summary_line");
    text.split("\n").forEach( function( line, index ){
        if(lineInput.length >= index){
            $(lineInput[index]).val(line);
        }
    });
}
document.addEventListener('DOMContentLoaded', function() {
    var initSummaryMode = {{ old('summary_mode', isset($article)? $article->summary_mode: 0) }};
    switchSummary(initSummaryMode);
    changeSummaryText();
    var app = new Vue({
        el: '#ad',
        data: {
            is_advertise: {{isset($article)? $article->is_advertise: 0}},
            button_class: '{{isset($article) && $article->is_advertise ==0 ? "uk-button-default": "uk-button-primary"}}'
        },
        methods: {
            switchAdvertise: function () {
                this.is_advertise = 1 ^ this.is_advertise
            }
        }
    });
});
</script>
@endif
@if ( !isset($form))
<hr/>
@endif
@if ( !isset($form) || $form != "content_only")
<div class="uk-margin">
    <div class="uk-margin-small">
        <label class="uk-form-label" for="title">
            記事ステータス
        </label>
        <div class="uk-form-controls">
            @include('component.input.article_statuses', [ 'value' => isset($article) ? $article->article_status_id: null ])
        </div>
    </div>
    <div class="uk-margin-small uk-grid-small" uk-grid>
        <div class="uk-width-medium@s">
            <label class="uk-form-label" for="publish_date">
                公開日
            </label>
            <div class="uk-form-controls">
                <input class="uk-input datetimepicker" type="text" name="publish_date" value="@if(isset($article))@datetime($article->publish_date)@endif">
            </div>
        </div>
        <div class="uk-width-medium@s">
            <label class="uk-form-label" for="close_date">
                公開終了日
            </label>
            <div class="uk-form-controls">
                <input class="uk-input datetimepicker" type="text" name="close_date" value="@if(isset($article))@datetime($article->close_date)@endif">
            </div>
        </div>
    </div>
    <div class="uk-margin-small uk-grid-small" uk-grid>
        <div class="uk-width-medium@s">
            <label class="uk-form-label" for="member_publish_date">
                公開日(会員向け)
            </label>
            <div class="uk-form-controls">
                <input class="uk-input datetimepicker" type="text" name="member_publish_date" value="@if(isset($article))@datetime($article->member_publish_date)@endif">
            </div>
        </div>
        <div class="uk-width-medium@s">
            <label class="uk-form-label" for="member_close_date">
                公開終了日(会員向け)
            </label>
            <div class="uk-form-controls">
                <input class="uk-input datetimepicker" type="text" name="member_close_date" value="@if(isset($article))@datetime($article->member_close_date)@endif">
            </div>
        </div>
    </div>
</div>
<div class="uk-margin">
    <label class="uk-form-label" for="writer_id">
        担当ライター
    </label>
    <div class="uk-form-controls">
        @include('component.input.writers', [ 'value' => isset($article) ? $article->writer_id: null, "required"=>false ])
    </div>
</div>
@endif


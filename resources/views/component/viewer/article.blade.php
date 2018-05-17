<article class="article">

    @if($article->articleImage)
    <figure class="uk-display-block uk-margin uk-height-large@s uk-height-medium image-wrapper">
        <img src="@include('component.part.image', ['image' => $article->articleImage])">
    </figure>
    @endif

    <h1 class="article-title">
        {{$article->title}}
    </h1>
    <div class="uk-margin-small">
        カテゴリ:
        <a class="uk-button uk-button-link" href="{{route('categories.view', ['category' => $article->category ])}}">
            {{$article->category->label}}
        </a>
    </div>

    <div class="uk-margin-small uk-flex-between" uk-grid>
        <div class="uk-width-auto">
            公開日:
            @auth("user")
            <time datetime="{{$article->member_publish_date}}">
                @date($article->member_publish_date)
            </time>
            @endauth
            @guest("user")
            <time datetime="{{$article->publish_date}}">
                @date($article->publish_date)
            </time>
            @endauth
        </div>
        <div class="uk-width-auto">
            @foreach($article->tags as $tag)
                @include("component.part.tag", ["tag" => $tag])
            @endforeach
        </div>
    </div>
    
    <div class="uk-margin">
        @include("component.part.sns", [
            "article" => $article,
        ])
    </div>

    <div class="uk-margin article-summary">
    @if($article->summary_mode == 0)
        @lined($article->summary)
    @else
        <ol class="uk-margin-remove">
            @foreach( explode("\n", $article->summary) as $line )
            <li>
                {{$line}}
            </li>
            @endforeach 
        </ol>
    @endif
    </div>

    @auth("user")
    <div class="uk-margin uk-grid-small" uk-grid>
        <div class="uk-width-1-2">
            @if(!is_null($article->myClip))
            <a class="uk-button uk-button-default uk-width-1-1" href="{{ route('user.clips.delete', ['clip' => $article->myClip ]) }}">
                あとで読むを解除
            </a>
            @else
            <form class="form-horizontal" method="POST" action="{{ route('user.clips.add') }}">
                {{ csrf_field() }}
                <input type="hidden" name="article_id" value="{{$article->id}}">
                <button class="uk-button uk-button-primary uk-width-1-1">
                    この記事をあとで読む
                </button>
            </form>
            @endif
        </div>
        <div class="uk-width-1-2">
            <a class="uk-button uk-button-secondary uk-width-1-1" href="#stock-modal_{{$article->id}}" uk-toggle>
                メモと一緒に保存
            </a>
        </div>
    </div>

    @endauth


    @if($article->is_reprinted == 1)
    <div class="uk-margin-large">
        @if(isset($article->myClip))
        <a class="uk-button uk-button-secondary uk-button-large uk-width-1-1" href="{{$article->reprinted_url}}" target="_blank" onclick="viewAll( null , '{{route('api.user.clips.delete', ['clip' => $article->myClip])}}')">
            {{$article->reprinted_name}}で全て読む
        </a>
        @else
        <a class="uk-button uk-button-secondary uk-button-large uk-width-1-1" href="{{$article->reprinted_url}}" target="_blank">
            {{$article->reprinted_name}}で全て読む
        </a>
        @endif
    </div>
    @else
    <div class="article-content uk-margin-large">
        <section class="uk-margin sentence">
            {!! $article->sentence !!}
        </section>
        
        @if(isset($article->creditWriter))
        <div class="uk-margin uk-text-right">
            Written by {{$article->creditWriter->pen_name}}
        </div>
        @endif

        @foreach($article->products as $product)
        <div class="uk-margin-large">
            @include("component.viewer.inquiry_product", ["product" => $product])
        </div>
        @endforeach

        <div class="uk-margin">
            @include("component.part.sns")
        </div>
    </div>
    @endif


    @auth("user")
    <div id="stock-modal_{{$article->id}}" uk-modal>
        <div class="uk-modal-dialog">
            <form class="form-horizontal" method="POST" action="{{ route('user.stocks.add') }}">
                {{ csrf_field() }}
                <input type="hidden" name="article_id" value="{{$article->id}}">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-modal-body">
                    <label class="uk-form-label" for="memo">
                        メモ
                    </label>
                    <div class="uk-form-controls">
                        <textarea class="uk-textarea uk-height-small" name="memo">{{!is_null($article->myStock)?$article->myStock->memo:null}}</textarea>
                    </div>
                </div>
                <div class="uk-modal-footer">
                    <div uk-grid class="uk-grid-small uk-flex-between">
                        @if(!is_null($article->myStock))
                        <div class="uk-width-auto">
                            <a class="uk-button uk-button-danger" href="{{route('user.stocks.delete', ['stock' => $article->myStock])}}">削除</a>
                        </div>
                        @endif
                        <div class="uk-width-expand uk-text-right">
                            <button class="uk-button uk-button-default uk-modal-close" type="button">キャンセル</button>
                            <button class="uk-button uk-button-primary" type="submit">ストックする</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endauth


</article>

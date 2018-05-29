@extends('layouts.user.default')

@section('content')

<div class="content-center">
<div class="block-art-detail" id="article-base">
    <div class="block-art-detail__category clearfix">
        <span class="block-art-detail__category__text">
          {{$article->category->label}}
        </span>
        <span class="block-art-detail__category__date">
          @userdate($article->real_publish_date)
        </span>
    </div>
    <!-- /.block-art-detail__category -->
    <h3 class="block-art-detail__des">
      {{$article->title}}
    </h3>
    <!-- /.block-art-detail__title -->
    @if($article->articleImage != null && $article->articleImage->url != null)
    <figure class="block-art-detail__img_sample">
        <img src="@imageUrl($article->articleImage->url)" alt="{{$article->title}}">
    </figure>
    @endif
    <!-- /.block-art-detail__img_sample -->
    @if($article->summary_mode === 1)
    <div class="block-art-detail__read">
        @foreach( explode("\n", $article->summary) as $key => $summary )
        <dl class="block-art-detail__read_list">
            <dt>
                <span>
                  {{$key + 1}}
                </span>
            </dt>
            <dd>
                <span>
                  {{$summary}}
                </span>
            </dd>
        </dl>
        @endforeach
    </div>
    @else
    <div class="block-art-detail__read-text">
        <p>
          @lined($article->summary)
        </p>
    </div>
    @endif
    <!-- /.block-art-detail__read -->
    <div class="block-art-detail__social">
        @include("component.part.sns", [
          "article" => $article
        ])
    </div>

    @if($article->is_reprinted == 0)
      <div class="block-art-detail__sentence">
      {!! $article->sentence !!}
      </div>

      <!-- /.block-art-detail__text -->
      @if($article->creditWriter != null)
      <div class="block-art-detail__copyright">
          <p class="author">
              <span class="Writtenby">Written by</span>
              {{$article->creditWriter->pen_name}}
          </p>
      </div><!-- /.block-art-detail__copyright -->
      @endif
      <div class="block-art-detail__social mb18-ipt">
          @include("component.part.sns", [
            "article" => $article
          ])
      </div>
      <div class="block-art-detail__tags">
          <ul>
              @foreach($article->tags as $tag)
              <li>
                  <a href="{{route('articles.search', ['tag_id' => [$tag->id] ])}}" title="{{$tag->label}}" target="_blank">
                    {{$tag->label}}
                  </a>
              </li>
              @endforeach
          </ul>
      </div>
    @else
      <div class="block-art-detail__tags">
          <ul>
              @foreach($article->tags as $tag)
              <li>
                  <a href="{{route('articles.search', ['tag_id' => [$tag->id] ])}}" title="{{$tag->label}}" target="_blank">
                    {{$tag->label}}
                  </a>
              </li>
              @endforeach
          </ul>
      </div>
      <div>
          <a href="{{$article->reprinted_url}}" target="_blank" class="btn btn--block btn--default">外部サイトで続きを読む</a>
      </div>
    @endif
    <!-- /.block-art-detail__social -->

    <!-- /.block-art-detail__tags -->
    @if( $article->products->count() > 0 )
    @foreach($article->products as $product)
      @include("component.user.product", [
        "product" => $product
      ])
    @endforeach
    @endif


    <article class="block-home-blog__box block-article-none">
      <footer class="block-home-blog__footer" id="article-footer">
          
          <button v-if="my_stock==null" class="block-home-blog__footer__btn-bookshelf" v-on:click="addStock">
              本棚へ
          </button>

          <button v-if="my_stock!=null" class="block-home-blog__footer__btn-bookshelf block-home-blog__footer__btn-bookshelf--active" v-on:click="deleteStock">
              本棚へ
          </button>

          <button v-if="my_clip==null" class="block-home-blog__footer__btn-read-later" v-on:click="addClip">
              あとで読む
          </button>
          <button v-if="my_clip!=null" class="block-home-blog__footer__btn-read-later block-home-blog__footer__btn-read-later--active" v-on:click="deleteClip">
              あとで読む
          </button>

      </footer>
    </article>
    <!-- /.block-art-detail__subsidy -->
</div><!--/.block-art-detail-->


<h2 class="block-home-list__title">関連記事</h2>

<div id="related-articles" v-inview:leave="hideFooter" style="padding-top: 96px; margin-top: -96px;" class="block-home-blog">
  <div v-inview:enter="showFooter">
    <div class="block-home-blog__inner">
      <div v-for="article in articles">
        <article-cell v-bind:article="article" :authed="authed" />
      </div>
      <div class="block-botttom" v-if="canMore && page <= 1">
          <a v-on:click="readMore" class="btn btn--block btn--default">新着記事をもっと読む</a>
      </div>
      <div class="block-botttom" v-if="canMore && page > 1">
          <a v-inview:enter="readMore"></a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {

    new Vue( {
      el: '#article-base',
      data: {
        article: {
          id: {{$article->id}},
        },
        my_clip: {!! $article->myClip ?: "null" !!},
        my_stock: {!! $article->myStock ?: "null" !!},
        authed: @auth('user') true @else false @endauth
      },
      methods: {
        hideFooter: function() {
          document.querySelector("#article-footer").setAttribute("class", "block-home-blog__footer floating");
          document.querySelector("#footer-control").style.display = "none";
        },
      }
    });

    new Vue( {
      el: '#related-articles',
      data: {
        footer: document.querySelector("#footer-control"),
        page: 0,
        canMore: true,
        articles: [],
        authed: @auth('user') true @else false @endauth
      },
      mounted: function() {
        this.hideFooter();
        this.readMore();
      },
      methods: {
        showFooter: function() {
          document.querySelector("#article-footer").setAttribute("class", "block-home-blog__footer");
          document.querySelector("#footer-control").style.display = "block";
        },
        hideFooter: function() {
          document.querySelector("#article-footer").setAttribute("class", "block-home-blog__footer floating");
          document.querySelector("#footer-control").style.display = "none";
        },
        readMore: function() {
          this.page += 1;

          var self = this;
          axios.get("{{route('api.articles.related', ['article'=> $article])}}?page=" + this.page).then( function( res ) {
              self.articles = self.articles.concat(res.data.data);
              if(self.page >= res.data.last_page){
                self.canMore=false;
              }
          }).catch( function( res ) {
              console.error( res );
          });
        }
      }
    });
});
</script>
</div>
@endsection
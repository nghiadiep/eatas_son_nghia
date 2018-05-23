<div class="mainvisual">
    <div class="mainvisual__inner">
        <div class="mainvisual__slider-main" id="slider-list">

            <a v-for="article in articles" v-bind:href="getArticleUrl(article)" target="_blank">
                <div class="mainvisual__slider-main__item">
                    <div class="mainvisual__slider-main__item__window">
                        <img v-bind:src="getArticleImageUrl(article.article_image)" v-bind:alt="article.category.label">
                    </div>
                    <div class="mainvisual__slider-main__item__des article-des">
                        <h2>
                            <span v-text="article.category.label"></span>
                        </h2>
                        <p class="article-des__title" v-text="article.title"></p>
                        <p class="article-des__summary" v-text="article.summary"></p>
                    </div>
                    <!--/.mainvisual__slider-main__item__des-->
                </div>
            </a>

        </div>
        <!--/.mainvisual__slider-main-->
    </div>
</div>

<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
    let vm = new Vue( {
        el: '#slider-list',
        data: {
            articles: [],
            category: {!! isset($category) ? $category: "null" !!}
        },
        updated: function() {
            if(this.articles.length > 0){
                $('.mainvisual .mainvisual__slider-main').slick({
                    centerMode: true,
                    centerPadding: '40px',
                    autoplay: true,
                    autoplaySpeed: 5000,
                    dots: true,
                    fade: false,
                    infinite: true,
                    arrows: true,
                    prevArrow: '<button class="slick-prev"></button>',
                    nextArrow: '<button class="slick-next"></button>',
                    responsive: [
                    {
                      breakpoint: 1040,
                      settings: {
                        centerMode: false
                      }
                    },
                    {
                      breakpoint: 981,
                      settings: {
                        centerMode: false
                      }
                    },{
                      breakpoint: 768,
                      settings: {
                        centerMode: false
                      }
                    }]
                });
            }
        },
        mounted: function() {
            this.getArticles();
        },
        methods: {
            getArticles: function() {
                var self = this;
                axios.get("{{$url}}").then( function( res ) {
                    self.articles = self.articles.concat(res.data);
                    if(self.category != null){

                        self.articles = self.articles.map( function(article) {
                            article.category = self.category;
                            return article;
                        });
                    }
                }).catch( function( res ) {
                  console.error( res );
                });
            },
        },
    });
    
});    
</script>
@inject('articleStatus', 'App\Models\ArticleStatus')
<script type="text/javascript">
Vue.mixin({
  methods: {
    csrfField: function(){
        return '{{ csrf_field() }}';
    },
    getDate: function(dateStr){
        return dateStr.split(" ")[0];
    },
    lined: function(string){
        return string.replace(/[\n]/g, "<br/>");
    },
    deleteClipUrl: function(clip){
        return "{{route('api.user.clips')}}/" + clip.id + "/delete";
    },
    addClipUrl: function(article){
        return "{{route('api.user.clips.add')}}?article_id=" + article.id;
    },
    editStockUrl: function(stock){
        return "{{route('api.user.stocks')}}/" + stock.id + "/edit";
    },
    deleteStockUrl: function(stock){
        return "{{route('api.user.stocks')}}/" + stock.id + "/delete";
    },
    addStockUrl: function(article){
        return "{{route('api.user.stocks.add')}}?article_id=" + article.id;
    },
    downloadDocUrl: function(inquiryDocument){
        var url = "{{route('user.inquiryDocuments.download', ['inquiryDocument' => null])}}";
        return url.replace(/\/\/download/g, "/" + inquiryDocument.id + "/download");
    },
    isNew: function(date){
        let threthold = new Date();
        threthold.setDate( threthold.getDate() - 7 );
        return new Date(date) >= threthold;
    },
    isMemberOnly: function(status){
        return status == {{$articleStatus::MEMBER_ONLY}};
    },


    getNoImageUrl: function(){
        return "{{ route('noImage') }}";
    },
    getArticleUrl: function(article){
        var rootUrl = "{{route('root.index')}}";
        return rootUrl + "/article/" + article["id"];
    },
    toDateString: function(dateStr){
        if(dateStr == null){
            return "-";
        }
        let date = new Date(dateStr.replace(/\s/, "T"));
        return date.getFullYear()+"."+("00"+(date.getMonth()+1)).slice(-2)+"."+("00"+date.getDate()).slice(-2);
    },
    toBirthdayString: function(dateStr){
        if(dateStr == null){
            return "-";
        }
        let date = new Date(dateStr.replace(/\s/, "T"));
        return date.getFullYear()+"年"+("00"+(date.getMonth()+1)).slice(-2)+"月"+("00"+date.getDate()).slice(-2)+"日";
    },
    getImageUrl: function(url){
        var storageBase = "{{route('storage')}}";
        if(url== null){
            return storageBase;
        }else if(url.match(/^http/g)){
            return url;
        }else{
            return storageBase + "/" + url;
        }
    },
    getArticleImageUrl: function(articleImage) {
        if(articleImage == null || articleImage.url == null){
            return this.getNoImageUrl();
        }else{
            return this.getImageUrl(articleImage.url);
        }
    },
    addClip : function() {
        if(!this.authed){
            this.toLogin();
            return null;
        }
        $("#footer-control").cftoaster({content: "あとで読むに追加しました", fontColor: "#000000", backgroundColor: "#ffffff", maxWidth: "250", bottomMargin: "30", showTime: "3000"});

        let url = this.addClipUrl(this.article);
        var self = this;
        return axios.post(url).then( function(res) {
            self.my_clip = res.data;
        });
    },
    deleteClip : function() {
        if(!this.authed){
            this.toLogin();
            return null;
        }
        if(this.my_clip == null){
            return null;
        }
        $("#footer-control").cftoaster({content: "あとで読むから削除しました", fontColor: "#000000", backgroundColor: "#ffffff", maxWidth: "250", bottomMargin: "30", showTime: "3000"});

        let url = this.deleteClipUrl(this.my_clip);
        var self = this;
        return axios.post(url).then( function(res) {
            self.my_clip = null;
        });
    },
    addStock : function() {
        if(!this.authed){
            this.toLogin();
            return null;
        }
        let url = this.addStockUrl(this.article);

        var self = this;
        axios.post(url, { article_id: this.article.id, memo: null}).then( function(res) {
            self.my_stock = res.data;
        });
        $("#footer-control").cftoaster({content: "本棚に追加しました", fontColor: "#000000", backgroundColor: "#ffffff", maxWidth: "250", bottomMargin: "30", showTime: "3000"});
    },
    deleteStock : function() {
        if(!this.authed){
            this.toLogin();
            return null;
        }
        let url = this.deleteStockUrl(this.my_stock);
        var self = this;
        axios.post(url).then( function(res) {
            self.my_stock = null;
        });
        $("#footer-control").cftoaster({content: "本棚から削除しました", fontColor: "#000000", backgroundColor: "#ffffff", maxWidth: "250", bottomMargin: "30", showTime: "3000"});
    },
    getSystemImage: function(url) {
        return "{{asset('images')}}/" + url;
    },
    toLogin: function () {
        window.onAuthedAction();
    },
  }
})
</script>
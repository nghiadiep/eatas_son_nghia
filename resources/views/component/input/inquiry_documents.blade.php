@inject('constantService', 'App\Services\ConstantService')

<div id="documentsEditor">
    <div>
        <div class="uk-margin-small">
            <h2 class="uk-inline uk-margin-remove uk-margin-right">
                資料
            </h2>
            <a class="uk-button uk-button-small uk-button-primary" v-on:click="addRow()">
                追加
            </a>
        </div>
        <div class="uk-margin-small uk-overflow-auto">
            <table class="uk-table uk-table-small uk-table-striped">
                <thead>
                    <tr>
                        <th class="uk-width-medium">資料名</th>
                        <th class="uk-width-small">種別</th>
                        <th class="uk-width-medium"></th>
                        <th class="uk-table-shrink"></th>
                    </tr>
                </thead>
                <tbody>
                    <div v-for="(inquiryDocument, index) in inquiryDocuments">
                        <inquiry-document :document="inquiryDocument" :doctypes="doctypes" :url="url" v-on:del="deleteRow(index)" :index="index"></inquiry-document>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">

document.addEventListener('DOMContentLoaded', function() {
    let documentsEditor = new Vue( {
        el: '#documentsEditor',
        data: {
            inquiryDocuments: {!! isset($inquiryDocuments) ? $inquiryDocuments: '[]' !!},
            doctypes: {!! $constantService->getDocTypes() !!},
            url: "{{$url}}",
        },
        methods: {
            addRow: function(){
                this.inquiryDocuments = this.inquiryDocuments.concat({
                    doc_type_id: null,
                    name: null,
                    url: null,
                    link: null,
                });
            },
            deleteRow: function(index){
                this.inquiryDocuments.splice(index, 1);
            },
        },
    });
});
</script>

<template>
    <tr>
        <td>
            <input type="hidden" class="uk-input" v-bind:name="'inquiryDocuments['+index+'][id]'" v-model="document.id">
            <input type="text" class="uk-input"  v-bind:name="'inquiryDocuments['+index+'][name]'" v-model="document.name">
        </td>
        <td>
            <select class="uk-select" 
                 v-bind:name="'inquiryDocuments['+index+'][doc_type_id]'" v-model="document.doc_type_id">
                <option v-bind:value="null">未選択</option>
                <option v-for="doctype in doctypes" v-bind:value="doctype.id" selected>
                    {{doctype.label}}
                </option>
            </select>
        </td>
        <td>
            <div v-if="document.doc_type_id==1">
                <input type="text" class="uk-input"  v-bind:name="'inquiryDocuments['+index+'][link]'" v-model="document.link">
            </div>
            <div v-if="document.doc_type_id==2">
                <div class="uk-margin-small" v-text="document.url">
                </div>
                <div class="uk-margin-small">
                    <div uk-form-custom>
                        <input type="file" @change="fileSelect">
                        <button class="uk-button uk-button-default" type="button" tabindex="-1">ファイルを選択</button>
                    </div>
                </div>
                <input type="hidden"  v-bind:name="'inquiryDocuments['+index+'][url]'" v-model="document.url">
            </div>
        </td>
        <td>
            <button type="button" class="uk-button uk-button-small uk-button-danger" v-on:click="deleteMe()">
                削除
            </button>
        </td>
    </tr>
</template>

<script>
export default {
    props:[
        "document",
        "doctypes",
        "url",
        "index",
    ],
    methods : {
        deleteMe: function() {
            this.$emit("del");
        },
        fileSelect: function(e) {
            e.preventDefault();
            let files = e.target.files;
            if(files.length ==0){
                return;
            }
            this.upload(files[0]);
        },
        fileDrop: (e) =>{
            e.preventDefault();
        },
        upload: function(file) {
            let formData = new FormData();
            formData.append('file', file);
            let config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            };
            axios.post(this.url, formData, config).then((response) => {
                this.document.id = response.data.inquiryDocument.id;
                this.document.url = response.data.inquiryDocument.url;
                if(this.document.name == null){
                    this.document.name = response.data.inquiryDocument.name;
                }
            }).catch((error) => {
            })
        }
    }
}
</script>
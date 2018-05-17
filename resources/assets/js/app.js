
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

const Inview = require('vueinview')
Vue.use(Inview)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('article-card', require('./components/ArticleCard.vue'));
Vue.component('article-cell', require('./components/ArticleCell.vue'));
Vue.component('article-chip', require('./components/ArticleChip.vue'));
Vue.component('sns', require('./components/SNS.vue'));
Vue.component('inquiry-document', require('./components/InquiryDocument.vue'));
Vue.component('clip-chip', require('./components/ClipChip.vue'));

Vue.component('stock-chip', require('./components/StockChip.vue'));

require('./util');
require('./wysiwyg');
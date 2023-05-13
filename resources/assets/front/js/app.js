/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 window.Vue = require('vue');
 import Vue from 'vue';
 import'./bulma';

 import'./script';

 /*---------General Components--------*/
 // import SlickAnimation from './components/GeneralComponents/slickCarouselAnimation';
 import LazyLoad from './components/GeneralComponents/LazyLoad';
 import Slick from 'vue-slick';
 import { Tabs, TabPane } from 'vue-bulma-tabs'
 import VueLazyload from 'vue-lazyload'

 Vue.component('lazy-load', LazyLoad);

 Vue.use(VueLazyload, {
	preLoad: 100,
	error: '',
	loading: '/front/img/spinner.svg',
	attempt: 1,
	adapter: {
		loading (listender, Init) {
			listender.el.style.height = "100px";
		},
		loaded ({ bindType, el, naturalHeight, naturalWidth, $parent, src, loading, error, Init }) {
            el.style.height= "auto";
        },
	}
})


 /*-----------Site Components---------*/
 import Clubs from './components/SiteComponents/Clubs';
 import Sponsers from './components/SiteComponents/Sponsers';

 export {
 	Slick,
 	Sponsers,
 	Clubs
 }
 const app = new Vue({
 	el: '#app',
 	components: {
 		Tabs,
 		TabPane,
 		Slick,
 		Sponsers,
 		Clubs
 	},

 });
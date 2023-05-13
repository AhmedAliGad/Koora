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
 import { Tabs, TabPane } from 'vue-bulma-tabs'

 export {
 	
 }
 const app = new Vue({
 	el: '#app',
 	components: {
 		Tabs,
 		TabPane
 	},
 
 });
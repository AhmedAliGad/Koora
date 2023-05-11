/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue').default;

import './bulma';

//import 'jquery.repeater/jquery.repeater.min.js';

import './script';


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
/*=============== Plugins ==================*/
import VueSweetalert2 from 'vue-sweetalert2'
import VueCtkDateTimePicker from 'vue-ctk-date-time-picker';

/*===============Main Components (Most Used) ==============*/
import Collapse from './MainComponents/Collapse/Collapse'
import CollapseItem from './MainComponents/Collapse/Item'
import Uploader from './MainComponents/Uploader'
import Modal from './MainComponents/Modal'
import MultipleUploader from './MainComponents/MultipleUploader'
import Alert from './MainComponents/Alert'
import CkEditor from './MainComponents/ckeditor/VueCkEditor'
/*==============Secondary Components (rarely Used)=============*/
import Tags from './SecondaryComponents/Tags'
import DateTimePicker from './SecondaryComponents/DateTimePicker'
import CustomSelect from './SecondaryComponents/Select/CustomSelect'
import SingleSelect from './SecondaryComponents/Select/SingleSelect'
import SelectAll from './SecondaryComponents/Select/SelectAll';


/*==============General Use=============*/
Vue.use(VueSweetalert2);
Vue.component('VueCtkDateTimePicker', VueCtkDateTimePicker);


/*==============Export=============*/
export {
    Modal,
    MultipleUploader,
    Tags,
    Collapse,
    CollapseItem,
    DateTimePicker,
    Uploader,
    CustomSelect,
    SingleSelect,
    SelectAll,
    Alert,
    CkEditor
}

const app = new Vue({
    el: '#app',
    components: {
        Modal,
        MultipleUploader,
        Tags,
        Collapse,
        CollapseItem,
        DateTimePicker,
        Uploader,
        CustomSelect,
        SingleSelect,
        SelectAll,
        Alert,
        CkEditor
    }
});

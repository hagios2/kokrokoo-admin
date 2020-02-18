/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require("./vendors/fastclick/lib/fastclick.js");
require("./vendors/nprogress/nprogress.js");
require("./vendors/Chart.js/dist/Chart.min.js");
require("./vendors/gauge.js/dist/gauge.min.js");
require("./vendors/bootstrap-progressbar/bootstrap-progressbar.min.js");
require("./vendors/iCheck/icheck.min.js");
require("./vendors/skycons/skycons.js");
require("./vendors/Flot/jquery.flot.js");
require("./vendors/Flot/jquery.flot.pie.js");
require("./vendors/Flot/jquery.flot.time.js");
require("./vendors/Flot/jquery.flot.stack.js");
require("./vendors/Flot/jquery.flot.resize.js");
require("./vendors/flot.orderbars/js/jquery.flot.orderBars.js");
require("./vendors/flot-spline/js/jquery.flot.spline.min.js");
require("./vendors/flot.curvedlines/curvedLines.js");
require("./vendors/DateJS/build/date.js");
require("./vendors/jqvmap/dist/jquery.vmap.js");
require("./vendors/jqvmap/dist/maps/jquery.vmap.world.js");
require("./vendors/jqvmap/examples/js/jquery.vmap.sampledata.js");
//require("./vendors/moment/min/moment.min.js");
//require('sweetalert');
require("./custome/custom");
//require("./custome_scripts/users");
//require("./main");



window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('view-rate-card', require('./components/rateCards/viewRateCard'));
Vue.component('rate-card', require('./components/rateCards/rateCard'));
Vue.component('testa', require('./components/test'));




const app = new Vue({
    el: '#app',

});
require('./bootstrap');
require('./script');

import Vue from "vue";
import SlitherSlider from 'slither-slider';
// Пример компонента
Vue.use(SlitherSlider);

Vue.component('slider-component', require('./components/Slider').default);

new Vue({
    el: '#app',
});

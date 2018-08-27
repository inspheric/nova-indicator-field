Nova.booting((Vue, router) => {
    Vue.component('index-indicator-field', require('./components/IndexField'));
    Vue.component('detail-indicator-field', require('./components/DetailField'));
    Vue.component('form-indicator-field', require('./components/FormField'));
})

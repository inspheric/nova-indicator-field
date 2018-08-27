Nova.booting((Vue, router) => {
    Vue.component('index-indicator', require('./components/IndexField'));
    Vue.component('detail-indicator', require('./components/DetailField'));
    Vue.component('form-indicator', require('./components/FormField'));
})

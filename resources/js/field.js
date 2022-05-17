Nova.booting((Vue, router) => {
    Vue.component('index-indicator-field', require('./components/IndexField').default);
    Vue.component('detail-indicator-field', require('./components/DetailField').default);
    Vue.component('form-indicator-field', require('./components/FormField').default);
})

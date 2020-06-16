Nova.booting((Vue, router, store) => {
    Vue.component('index-thaana-latin-field', require('./components/IndexField'))
    Vue.component('detail-thaana-latin-field', require('./components/DetailField'))
    Vue.component('form-thaana-latin-field', require('./components/FormField'))
})

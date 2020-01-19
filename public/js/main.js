/*
* |-------------------------------------|
* |                                     |
* |            Vue JS code              |
* |   powered by https://vuejs.org   |
* |                                     |
* |-------------------------------------|
* */
let app = new Vue({
    el: '#app',
    // Чтобы не было конфликта с Twig
    delimiters: ['${', '}'],
    data: {
        vue_answer: 'VueJS Worked!',
        data_last_update: 'Last update: 18.01.2020',
        seen: true
    },
    methods: {
        opacityGrappy: function () {
            this.seen = false
        }
    }
});
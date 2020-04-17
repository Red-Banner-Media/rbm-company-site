Vue.component('home', {
    template: document.querySelector('#home'),
    data: function () {
        return {
            items: ''
        }
    },
    mounted() {
        this.getItems();
    },
    methods: {
        getItems: function () {
            api.get('../asset/services.json')
                .then((res)=>{
                    this.items = res.data.cards;
                })
                .catch((err)=>{
                    console.error(err)
                });
        }
    }
});

Vue.component('home', {
    template: document.querySelector('#home'),
    data: function () {
        return {
            items: '',
            ports: ''
        }
    },
    mounted() {
        this.getItems();
        this.getPort();
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
        },
        getPort: function () {
            api.get('../asset/portfolio.json')
                .then((res)=>{
                    this.ports = res.data.cards;
                })
                .catch((err)=>{
                    console.error(err)
                });
        }
    }
});

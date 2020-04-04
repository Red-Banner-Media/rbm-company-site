Vue.component('rbmfooter', {
    template: document.querySelector('#rbmfooter'),
    data: function () {
        return{
            currentYear: ''
        }
    },
    mounted() {
        this.setCurrentYear();
    },
    methods: {
        setCurrentYear(){
            let currentDate = new Date();
            this.currentYear = currentDate.getFullYear();
        }
    }
});

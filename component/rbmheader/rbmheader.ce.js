Vue.component('rbmheader', {
    template: document.querySelector('#rbmheader'),
    data: function () {
        return {
            hideElement: false
        }
    },
    methods: {
        top(){
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        },
        handleMenu(){
            if(this.hideElement){
                this.hideElement = false;
            } else {
                this.hideElement = true;
            }
        },
    },
    created() {
        window.addEventListener('scroll', this.handleScroll);
    },
    destroyed() {
        window.removeEventListener('scroll', this.handleScroll);
    }
});


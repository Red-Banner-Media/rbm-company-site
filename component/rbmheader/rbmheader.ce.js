Vue.component('rbmheader', {
    template: document.querySelector('#rbmheader'),
    data: function () {
        return {
            headerElement: '',
            sticky: '',
            hideElement: false
        }
    },
    mounted() {
        this.captureHeader();
    },
    methods: {
        handleScroll () {
            this.sticky = this.headerElement.offsetTop;
            if(window.pageYOffset > 326) {
                this.headerElement.classList.remove('hidden');
            } else {
                this.headerElement.classList.add('hidden');
            }
        },
        captureHeader (){
            this.headerElement = document.querySelector('.rbm-header-thin');
        },
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


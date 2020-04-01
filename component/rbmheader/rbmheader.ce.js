Vue.component('rbmheader', {
    template: document.querySelector('#rbmheader'),
    data: function () {
        return {
            headerElement: '',
            sticky: '',
        }
    },
    mounted() {
        this.captureHeader();
    },
    methods: {
        handleScroll () {
            this.sticky = this.headerElement.offsetTop;
            console.log(this.sticky);
            console.log(this.headerElement);
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
        }
    },
    created() {
        window.addEventListener('scroll', this.handleScroll);
    },
    destroyed() {
        window.removeEventListener('scroll', this.handleScroll);
    }
});

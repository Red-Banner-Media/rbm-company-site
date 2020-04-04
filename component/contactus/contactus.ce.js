Vue.component('contactus', {
    template: document.querySelector('#contactus'),
    data: function () {
        return{
            emailContents: {
                clientEmail: '',
                subject: '',
                body: ''
            }
        }
    },
    methods:{
        sendEmail (){
            api.post('contactus', {
                params: {
                    email: this.emailContents
                }
            }).catch(err => {
                console.error(err);
            });
        },
    }
});

Vue.component('contactus', {
    template: document.querySelector('#contactus'),
    data: function () {
        return{
            emailContents: {
                clientEmail: '',
                subject: '',
                body: '',
                'h-captcha-response':''
            },
            error: ''
        }
    },
    methods:{
        sendEmail (){
            this.emailContents['h-captcha-response'] = hcaptcha.getResponse();
            api.post('contactus', this.emailContents)
                .then(res => {
                    this.error = res.data.error === false ? 'Please use the hcapture below' : '';
                })
                .catch(err => {
                console.error(err);
            });
        },
    }
});

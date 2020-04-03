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
        sendEmail (email){
            api.post('contactus', {
                params: {email}
            }).catch(err => {
                console.error(err);
            });
        },
        // TODO: create Form Validation and sanitation
        validateForm(email){
            this.sendEmail(email);
        }
    }
});

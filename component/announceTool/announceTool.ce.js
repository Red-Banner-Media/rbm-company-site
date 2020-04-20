Vue.component('announcetool', {
    template: document.querySelector('#announcetool'),
    data: function () {
        return {
            modalForm: {
                msgTitle: '',
                msgBody: '',
            },
            output: '',
            clipState: 'COPY TO CLIPBOARD',
            codearea: '',
            formComplete: false
        }
    },
    methods: {
        clearForm (){
            this.modalForm.msgTitle = '';
            this.modalForm.msgBody = '';
            this.formComplete = false;
        },
        copyToClipboard (){
            this.codearea = document.querySelector('#codearea');
            this.codearea.select();
            document.execCommand('copy');
            this.clipState = 'COPIED!';
        },
        submitForm (){
            this.formComplete = true;
            api.get('buildcomponent', {
                params: this.modalForm
            }).then(res => {
                    this.output = res.data;
            }).catch(err => {
                console.error(err)
            });
        }
    }
});
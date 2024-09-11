
export  default {
    data(){
        return{
            name : '',
        }
    },
    watch: {
        'errors': {
            handler: function (eachError, oldVal) {
                const _this = this;
                $(".validation_error").remove();
                $(".is-invalid").removeClass('is-invalid');
                $.each(eachError.items, function (index, eachField){
                    var target = $("[name='" + eachField.field + "']");
                    $(target).parent().append("<span class='validation_error'>"+eachField.msg+"</span>")
                    $(target).addClass('is-invalid');
                });
            },
            deep: true
        }
    },
    methods : {
        openModal : function (modalId = false, formData ={}, callback = false){
            const _this = this;
            let model_id = modalId ? modalId : 'myModal';
            $(`#${model_id}`).modal('show');
            _this.$store.commit('formData', formData);

            if (typeof callback == 'function'){
                callback(true);
            }
        },
        closeModal : function (modalId = 'myModal', formData = {}){
            const _this = this;
            $(`#${modalId}`).modal('hide');
            _this.$store.commit('formData', {});
            _this.$store.commit('updateId', '');
            _this.$store.commit('formType', 1);
        },
        urlGenerate : function (customUrl = false){
            const _this = this;
            if (customUrl){
                return `${baseUrl}/${customUrl}`;
            }
            return `${baseUrl}/${_this.$route.meta.dataUrl}`;
        },
        editInformation : function (data, id){
            const _this = this;
            _this.$store.commit('updateId', id);
            _this.$store.commit('formType', 2);
            _this.openModal(false, data);
        },
        deleteConfirmation : function (callback = false, confirmMessage = null, confimTitle = null){
            const _this = this;
            let message = confirmMessage ? confirmMessage : "You won't be able to revert this!";
            let title = confimTitle ?? "Are you sure?";
            _this.$swal.fire({
                title: title,
                text: message,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"
            }).then((result) => {
                if (typeof callback === 'function'){
                    callback(result.isConfirmed);
                }
            });
        }
    },
    computed : {
        formData(){
            return this.$store.getters.formData;
        },
        dataList(){
            return this.$store.getters.dataList;
        },
        updateId(){
            return this.$store.getters.updateId;
        },
        formType(){
            return this.$store.getters.formType;
        },
        requiredData(){
            return this.$store.getters.requiredData;
        }
    }
}










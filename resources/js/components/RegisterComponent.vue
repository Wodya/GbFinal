<template>
    <form class="bg-white register-form fw-normal" method="POST">
        <slot>
            <!-- CSRF gets injected into this slot -->
        </slot>
        <div class="mb-3">
            <label for="name" class="">Имя *</label>
            <input type="text" class="form-control" id="name" name="name" v-bind:class="{ 'border-danger': hasNameError() }" placeholder="Введите Имя" v-model="name">
            <p v-if="hasNameError()" class="color-attention">Длина должна быть не менее 5 символов</p>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Телефон *</label>
            <input type="text" class="form-control" id="phone" name="phone" v-model="phone" @keydown="phoneChange" v-bind:class="{ 'border-danger': hasPhoneError() }">
            <p v-if="hasPhoneError()" class="color-attention">Необходимо ввести номер телефона</p>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail *</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" v-bind:class="{ 'border-danger': hasEmailError() }" v-model="email">
            <p v-if="hasEmailError()" class="color-attention">Необходимо ввести email</p>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль *</label>
            <input type="password" class="form-control" id="password" name="password" v-model="password1" v-bind:class="{ 'border-danger': hasPassword1Error() }">
            <p v-if="hasPassword1Error()" class="color-attention">Пароль должен иметь длину не менее 5 символов</p>
        </div>
        <div class="mb-4">
            <label for="password2" class="form-label">Повторите пароль *</label>
            <input type="password" class="form-control" id="password2" v-model="password2" v-bind:class="{ 'border-danger': hasPassword2Error() }" >
            <p v-if="hasPassword2Error()" class="color-attention">Пароли должны совпадать</p>
        </div>
        <div class="d-grid gap-1">
            <button type="submit" class="btn btn-primary w-auto">Зарегистрироваться</button>
        </div>
    </form>
</template>

<script>
export default {
    props : ['registerPath'],
    data(){
        return {
            name : "",
            phoneMask : "+7 (___) _______",
            phone : "",
            email : "",
            password1 : "",
            password2 : "",
        }
    },
    mounted(){
        this.phone = this.phoneMask;
    },
    methods : {
        hasNameError : function() {
            return this.name.length < 5;
        },
        hasPhoneError : function() {
            return this.phone.indexOf('_') > 0;
        },
        hasEmailError : function() {
            return !/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(this.email);
        },
        hasPassword1Error : function() {
            return this.password1.length < 5;
        },
        hasPassword2Error : function() {
            return this.password1 !== this.password2;
        },
        phoneChange(event){
            event.preventDefault()
            let pos = this.phone.indexOf('_');
            if(event.key === "Backspace"){
                if(pos < -1)
                    pos = this.phoneMask.length;
                this.phone = this.phone.substr(0,pos-1) + this.phoneMask.substr(pos-1);
            }
            if(pos < 0 || !/^\d+$/.test(event.key))
                return;
            this.phone = this.phone.substr(0,pos) + event.key + this.phone.substr(pos+1);
        }
    },
}
</script>

<style scoped>

</style>

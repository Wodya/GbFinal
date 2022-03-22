<template>
    <nav class="nav m-0 border-bottom align-items-center">
        <img src="/img/menu-symbol.png" width="24px" height="24px" class="ms-4">
        <img src="/img/logo.png" class="ms-4">
        <button type="button" class="btn btn-light button-as border border-color-dark-green-as font button-font-as fw-bold ms-4">Каталог</button>
        <input type="text" class=" border border-color-gray-as input-head-as input-head-1-as ms-4" placeholder="Номер детали или VIN номер" v-model="searchStr" v-on:keyup.enter="searchClick">
        <button class="btn input-head-as border-color-gray-as input-head-2-as dropdown-toggle dropdown-toggle-split" type="button" data-bs-toggle="dropdown" aria-expanded="false">Бренд</button>
        <button class="btn input-head-as border-color-gray-as input-head-2-as dropdown-toggle dropdown-toggle-split" type="button" data-bs-toggle="dropdown" aria-expanded="false">Машина</button>
        <button type="button" class=" button-as input-head-as input-head-3-as border border-color-green-as"><img src="/img/search.png" alt="Поиск" @click="searchClick"></button>
        <button type="button" class="btn btn-light button-as border border-color-as font button-font-as fw-bold ms-4">Помощь в подборе</button>
        <img src="/img/header1.png" class="me-4">
        <div class="input-head-4-as border-start border-end nav-element"><img src="/img/basket.png" class="me-2 "><p class="p-0 m-0">23 434 (3)</p></div>
        <div class="input-head-5-as border-start border-end nav-element"><img src="/img/mail.png" class="me-4 ms-4"><img src="/img/bell.png" class="me-4"> </div>
        <div class="d-flex justify-content-start input-head-6-as border-start nav-element ps-2">
            <img src="/img/status.png" class="ms-4 me-2">
            <p class="ps-0 m-0">{{ user }} </p>
            <span class="foreground-color-as ms-3">134 500 ₽</span>
        </div>
        <div class="d-flex flex-row-reverse flex-fill me-5">
            <img src="/img/drop_arrow.png">
        </div>
    </nav>
</template>

<script>
export default {
    name: "HeaderComponent",
    props : {
        user : String,
        searchUrl : String
    },
    data(){
        return {
            searchStr : String,
        }
    },
    mounted(){
        this.searchStr = "";
   },
    methods : {
        searchClick() {
            if(this.searchStr === "")
                return;
            let url = this.searchUrl;
            url = url.replace("find", this.searchStr);
            console.log(url);
            window.location.href = url;
            // this.$router.push(url);
        }
    }
}
</script>

<style scoped>

</style>

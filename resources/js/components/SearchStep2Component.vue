<template>
    <div>
        <p class="fs-1">Предложения <span class="foreground-color-as text-decoration-underline ms-2">{{product.brand.name}} &nbsp; {{product.code}}</span></p>
        <a class="d-flex align-items-center mt-30 mb-30" :href=back><img src="/img/back.png"> <div class="ms-3 fs-5 color-gray">Вернуться на страницу поиска</div></a>

        <div class="container-lg bg-main" >
            <div v-if="offers.length > 0" class="row back-color-neutral h-48 fs-18 fw-bold rounded-3 border border-1">
                <div class="col-4 d-flex justify-content-center align-items-center">
                    Наименование
                </div>
                <div class="col-4 d-flex justify-content-center align-items-center">
                    Информация о предложении
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    Наличие
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    Срок
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    Цена
                </div>
                <div class="col d-flex justify-content-center align-items-center">

                </div>
            </div>
            <div :key="componentKey" >
                <a v-for="item in offers" class="row bg-white h-48 fs-16 fw-normal rounded-3 border border-1" href="#">
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        {{item.name}}
                    </div>
                    <div class="col-4 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-around align-items-center">
                            <vue-circle class="ms-4 supplier-success"
                                        :progress="item.successPercent"
                                        :size="30"
                                        :reverse="false"
                                        line-cap="round"
                                        :fill="fill"
                                        empty-fill="rgba(0, 0, 0, .1)"
                                        :animation-start-value="0.0"
                                        :animation="animation"
                                        :start-angle="Math.PI/2"
                                        insert-mode="append"
                                        :thickness="2"
                                        :show-percent="true"
                                        @vue-circle-progress="progress"
                                        @vue-circle-end="progress_end">
                            </vue-circle>
                            <img :class="{invisible : item.isLiquidity !== 1}" src="/img/flag.png" class="ms-4" alt="Л">
                            <img :class="{invisible : item.isDealer !== 1}" src="/img/star.png" class="ms-4" alt="Д">
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center align-items-center">
                        {{item.quantity}}
                    </div>
                    <div class="col d-flex justify-content-start align-items-center">
                        {{item.period}} дней
                    </div>
                    <div class="col d-flex justify-content-start align-items-center">
                        {{item.price}} ₽
                    </div>
                    <div class="step2-quantity-div d-flex align-items-center">
                        <div class="col d-flex justify-content-center align-items-center">
                            <img v-show="item.basket_quantity === 0" src="/img/basket_step2.png" alt="К" v-on:click="changeQuantity(item.offerId, 1)">
                            <div v-show="item.basket_quantity !== 0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <img src="/img/basket_step2_minus.jpg" class="me-3" alt="-" v-on:click="changeQuantity(item.offerId, -1)">
                                    <p class="m-0 step2-quantity">{{item.basket_quantity}}</p>
                                    <img :class="{invisible : item.basket_quantity >= item.quantity}" src="/img/basket_step2_plus.jpg" class="ms-3" alt="+" v-on:click="changeQuantity(item.offerId, 1)">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <p v-if="offers.length === 0" class="fs-2 mb-30 mt-30">Поиск не дал результатов</p>
        </div>
    </div>
</template>

<script>
import VueCircle from 'vue2-circle-progress'

export default {
    components: {
        VueCircle
    },
    name: "SearchStep2Component",
    props : {
        user : Object,
        offers : Array,
        product: Object,
        back : String,
        changeQuantityUrl : String
    },
    data(){
        return {
            fill : { gradient: ["lightblue", "green", "blue"] },
            animation : { duration: 0, easing: "circleProgressEasing" },
            componentKey: 0,
        }
    },
    mounted(){
        console.log("changeQuantityUrl");
        console.log(this.changeQuantityUrl ?? "Нет changeQuantityUrl");
    },
    methods : {
        progress(event,progress,stepValue){
            // console.log(stepValue);
        },
        progress_end(event){
            // console.log("Circle progress end");
        },
        changeQuantity: function(offerId, quantity) {
            console.log(this.offers);
            console.log(`changeQuantity: offerId=${offerId}, quantity=${quantity}`);
            let rq = new XMLHttpRequest();

            rq.onreadystatechange = function(vm) {
                if (this.readyState === XMLHttpRequest.DONE) {
                    if (this.status === 200) {
                        let row = vm.offers.find(el => el.offerId === offerId);
                        row.basket_quantity += quantity;
                        vm.componentKey += 1;
                        console.log(row.basket_quantity);
                    } else {
                        console.log("Error changeQuantity");
                    }
                }
            }.bind(rq, this);
            let url = this.changeQuantityUrl;
            url = url.replace("offerId", offerId);
            url = url.replace("quantity", quantity);
            console.log(url);
            rq.open("GET", url);
            rq.send();
        },
    },
}
</script>

<style scoped>

</style>

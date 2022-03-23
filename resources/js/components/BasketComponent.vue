<template>
    <div>
        <div class="d-flex justify-content-sm-between">
            <div>
                <p class="mb-1 fs-5 fw-normal">Получение товара: <span class="fw-bold">{{user.distribution_point.name}}</span></p>
                <p class="fs-5 fw-normal">Транспортная компания: <span class="fw-bold">{{user.transport_company.name}}</span></p>
            </div>
            <div>
                <p class="mb-1 fs-5 fw-normal">Грузополучатель: <span class="fw-bold">{{user.consignee}}</span></p>
                <p class="fs-5 fw-normal">Покупатель: <span class="fw-bold">{{user.payer}}</span></p>
            </div>
        </div>
        <div class="container-lg bg-main" >
            <div v-if="offers.length > 0" class="row back-color-neutral h-48 fs-18 fw-bold rounded-3 border border-1">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    Наименование
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center">
                    Инф-я о предложении
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
                <div class="col-2 d-flex justify-content-center align-items-center">

                </div>
            </div>
            <div :key="componentKey" >
                <div v-for="item in offers" class="row bg-white h-48 fs-16 fw-normal rounded-3 border border-1" href="#">
                    <div class="col-3 d-flex justify-content-center align-items-center">
                        {{item.name}}
                    </div>
                    <div class="col-2 d-flex justify-content-center align-items-center">
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
                                        @vue-circle-end="progress_end"
                                        title="Процент успешных поставок">
                            </vue-circle>
                            <img :class="{invisible : item.isLiquidity !== 1}" src="/img/flag.png" class="ms-4" alt="Л" title="Ликвидный товар">
                            <img :class="{invisible : item.isDealer !== 1}" src="/img/star.png" class="ms-4" alt="Д" title="Дилер">
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center align-items-center">
                        {{item.quantity}}
                    </div>
                    <div class="col d-flex justify-content-center align-items-center">
                        {{item.period}} дней
                    </div>
                    <div class="col d-flex justify-content-center align-items-center">
                        {{item.price}} ₽
                    </div>
                    <div class="col-2 d-flex align-items-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <img v-show="item.basket_quantity === 0" src="/img/basket_step2.png" alt="К" v-on:click="changeQuantity(item.offerId, 1)">
                            <div v-show="item.basket_quantity !== 0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <img src="/img/basket_step2_minus.jpg" class="me-3 fadein" alt="-" v-on:click="changeQuantity(item.offerId, -1)">
                                    <p class="m-0 step2-quantity">{{item.basket_quantity}}</p>
                                    <img :class="{invisible : item.basket_quantity >= item.quantity}" src="/img/basket_step2_plus.jpg" class="ms-3 fadein" alt="+" v-on:click="changeQuantity(item.offerId, 1)">
                                    <img src="/img/basket_delete.jpg" class="ms-3 fadein" alt="D" v-on:click="deletePosition(item.offerId)">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p v-if="offers.length === 0" class="fs-2 mb-30 mt-30">Корзина пуста</p>
        </div>
        <div v-if="offers.length > 0" class="d-flex justify-content-start align-items-center mt-30">
            <button  type="button" class="btn btn-primary " @click="makeOrder">Оформить заказ</button>
            <p class="ms-5 mb-0">Номер заказа</p>
            <input type="text" class="input-small ms-3" id="orderNumber" name="orderNumber" v-model="orderNumberStr">
        </div>
    </div>
</template>

<script>
import VueCircle from 'vue2-circle-progress'

export default {
    components: {
        VueCircle
    },
    name: "BasketComponent",
    props : {
        user : Object,
        offers : Array,
        product: Object,
        back : String,
        changeQuantityUrl : String,
        deletePositionUrl : String,
        makeOrderUrl : String,
    },
    data(){
        return {
            fill : { gradient: ["lightblue", "green", "blue"] },
            animation : { duration: 0, easing: "circleProgressEasing" },
            componentKey: 0,
            orderNumberStr : "Заказ"
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
        deletePosition: function(offerId) {
            let rq = new XMLHttpRequest();

            rq.onreadystatechange = function(vm) {
                if (this.readyState === XMLHttpRequest.DONE) {
                    if (this.status === 200) {
                        let row = vm.offers.findIndex(el => el.offerId === offerId);
                        vm.offers.splice(row, 1);
                        vm.componentKey += 1;
                    } else {
                        console.log("Error deletePosition");
                    }
                }
            }.bind(rq, this);
            let url = this.deletePositionUrl;
            url = url.replace("offerId", offerId);
            console.log(url);
            rq.open("GET", url);
            rq.send();
        },
        makeOrder : function (){
            console.log("makeOrder");
            let rq = new XMLHttpRequest();

            rq.onreadystatechange = function(vm) {
                if (this.readyState === XMLHttpRequest.DONE) {
                    if (this.status === 200) {
                        console.log("Order made");
                        window.location.reload();
                        vm.componentKey += 1;
                    } else {
                        console.log("Error makeOrder");
                    }
                }
            }.bind(rq, this);
            let url = this.makeOrderUrl;
            url = url.replace("orderNumber", this.orderNumberStr);
            console.log(url);
            rq.open("GET", url);
            rq.send();

        }
    },
}
</script>

<style scoped>

</style>

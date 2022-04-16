<template>
    <div>
        <div v-if="modeId===2" class="d-flex align-items-center mt-1 mb-2">
            <input type="text" id="dateFrom" class="date datepicker_input" v-model="dateFrom">
            <input type="text" id="dateTo" class="date datepicker_input ms-3" v-model="dateTo">
            <button type="button" class="btn btn-outline-primary btn-sm ms-30 height-30" @click="refresh">Обновить</button>
        </div>

        <div class="container-lg bg-main" >
            <div v-if="orderList.length > 0" class="row back-color-neutral h-48 fs-18 fw-bold rounded-3 border border-1">
                <div class="col-3 d-flex justify-content-center align-items-center">
                    Наименование
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center">
                    Инф-я о предложении
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center">
                    Состояние
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    Общее кол-во
                </div>
                <div class="col d-flex justify-content-center align-items-center">
                    Срок
                </div>
                <div class="col-2 d-flex justify-content-center align-items-center">
                    Цена
                </div>
            </div>
            <div :key="componentKey" >
                <div v-for="order in orderList">
                    <div class="row active-as h-48 fs-16 fw-normal rounded-3 border border-1">
                        <div class="col d-flex justify-content-start align-items-center">
                            {{order.orderNumber}} от {{order.createDate}}
                        </div>
                        <div class="col-8 d-flex justify-content-start align-items-center text-danger">
                            {{order.stateName}}
                        </div>
                    </div>
                    <div v-for="spc in order.orderSpcs" class="row bg-white mh-48 fs-16 fw-normal rounded-3 border border-1">
                        <div class="col-3 d-flex justify-content-center align-items-center">
                            {{spc.name}}
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center">
                            <div class="d-flex  justify-content-around align-items-center">
                                <img :class="{invisible : spc.isLiquidity !== 1}" src="/img/flag.png" class="ms-4" alt="Л" title="Ликвидный товар">
                                <img :class="{invisible : spc.isDealer !== 1}" src="/img/star.png" class="ms-4" alt="Д" title="Дилер">
                            </div>
                        </div>
                        <div class="col-2 fs-12">
                            <div v-for="os in spc.orderStates">
                               {{os.quantity}} - {{os.stateName}}
                            </div>
                        </div>
                        <div class="col d-flex justify-content-center align-items-center">
                            {{spc.quantity}}
                        </div>
                        <div class="col d-flex justify-content-center align-items-center">
                            {{spc.period}} дней
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center">
                            {{spc.price}} ₽
                        </div>
                    </div>
                </div>
            </div>
            <p v-if="orderList.length === 0" class="fs-2 mb-30 mt-30">У вас нет заказов</p>
        </div>
    </div>
</template>

<script>
import VueCircle from 'vue2-circle-progress'

export default {
    name: "OrdersComponent",
    props : {
        user : Object,
        modeId : Number,
        orderList : Array,
        changeQuantityUrl : String,
        dateFrom : String,
        dateTo : String,
        refreshUrl : String,
    },
    data(){
        return {
            componentKey: 0,
            orderNumberStr : "Заказ",

        }
    },
    mounted(){
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

        },
        refresh: function() {
            let url = this.refreshUrl;
            url = url.replace("dateFrom", document.querySelector("#dateFrom").value);
            url = url.replace("dateTo", document.querySelector("#dateTo").value);
            console.log(url);
            window.location = url;
        },
    },
}
</script>

<style scoped>

</style>

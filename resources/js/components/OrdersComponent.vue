<template>
    <div>
        <div v-if="modeId===2 || modeId===4" class="d-flex align-items-center mt-1 mb-2">
            <input type="text" id="dateFrom" class="date datepicker_input" v-model="dateFrom">
            <input type="text" id="dateTo" class="date datepicker_input ms-3" v-model="dateTo">
            <button type="button" class="btn btn-outline-as btn-sm ms-30 height-30" @click="refresh">Обновить</button>
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
                <div v-if="modeId===3 || modeId===4" class="col d-flex justify-content-center align-items-center">
                </div>
            </div>
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
                        <div v-for="os in sortedStates(spc.orderStates)">
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
                    <div v-if="modeId===3 || modeId===4" class="col d-flex justify-content-center align-items-center">
                        <img class="fadein" src="/img/edit.png" alt="Ред" v-on:click="showChangeModal(spc.id)">
                    </div>
                </div>
            </div>
            <p v-if="orderList.length === 0" class="fs-2 mb-30 mt-30">У вас нет заказов</p>
            <div class="modal fade" id="changeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Изменение статуса</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="flex mb-2">
                                <p class="mb-1">Начальный статус</p>
                                <select class="form-select" aria-label="Default select example" v-model="oldStateId">
                                    <option value="0">Выберите статус</option>
                                    <option v-for="state in orderStates" :value="state.id">{{state.name}}</option>
                                </select>
                            </div>
                            <div class="flex mb-2">
                                <p class="mb-1">Конечный статус</p>
                                <select class="form-select" aria-label="Default select example" v-model="newStateId">
                                    <option value="0">Выберите статус</option>
                                    <option v-for="state in orderStates" :value="state.id">{{state.name}}</option>
                                </select>
                            </div>
                            <div class="flex">
                                <p class="mb-1">Количество</p>
                                <input type="number" class="count width-60" name="qty" v-model="quantity" min="1">
                            </div>
                            <p v-if="errorStr !== ''" class="color-attention">{{errorStr}}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                            <button type="button" :class="['btn', {'btn-primary' : oldStateId > 0 && newStateId > 0,
                                'btn-secondary disabled' : oldStateId === 0 || newStateId === 0}]" class="btn" v-on:click="changeState">Изменить</button>
                        </div>
                    </div>
                </div>
            </div>
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
        changeStateUrl : String,
        dateFrom : String,
        dateTo : String,
        refreshUrlMyOrders : String,
        refreshUrlOrders : String,
        orderStates : Array,
    },
    data(){
        return {
            orderNumberStr : "Заказ",
            changeModal : null,
            orderSpcId : Number,
            oldStateId : Number,
            newStateId : Number,
            quantity : Number,
            errorStr : String,
        }
    },
    mounted(){
        this.changeModal = new bootstrap.Modal(document.getElementById('changeModal'), { });
        this.clearChangeModal();
    },
    methods : {
        progress(event,progress,stepValue){
            // console.log(stepValue);
        },
        progress_end(event){
            // console.log("Circle progress end");
        },
        sortedStates : function (states){
            return states.sort((a,b) => a.stateId - b.stateId);
        }
        ,
        refresh: function() {
            let url = this.modeId===2 ? this.refreshUrlMyOrders : this.refreshUrlOrders;
            url = url.replace("dateFrom", document.querySelector("#dateFrom").value);
            url = url.replace("dateTo", document.querySelector("#dateTo").value);
            console.log(url);
            window.location = url;
        },
        clearChangeModal : function (){
            this.oldStateId = 0;
            this.newStateId = 0;
            this.quantity = 1;
            this.errorStr = "";
            this.changeModal.hide();
        },
        showChangeModal : function ($orderSpcId){
            this.orderSpcId = $orderSpcId;
            this.changeModal.show();
        },
        changeState: function() {
            console.log(this.offers);
            console.log(`changeState: orderSpcId=${this.orderSpcId}, oldStateId=${this.oldStateId}, newStateId=${this.newStateId}, quantity=${this.quantity}`);

            let rq = new XMLHttpRequest();

            rq.onreadystatechange = function(vm) {
                if (this.readyState === XMLHttpRequest.DONE) {
                    if (this.status === 200) {
                        console.log(this.responseText);
                        if(this.responseText === ""){
                            vm.clearChangeModal();
                            window.location.reload();
                        } else
                            vm.errorStr = this.responseText;
                    } else {
                        console.log("Error changeState");
                    }
                }
            }.bind(rq, this);
            let url = this.changeStateUrl;
            url = url.replace("orderSpcId", this.orderSpcId.toString());
            url = url.replace("oldStateId", this.oldStateId.toString());
            url = url.replace("newStateId", this.newStateId.toString());
            url = url.replace("quantity", this.quantity.toString());
            console.log(url);
            rq.open("GET", url);
            rq.send();
        },
    },
}
</script>

<style scoped>

</style>

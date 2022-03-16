<template>
    <div>
        <p class="fs-1">Предложения <span class="foreground-color-as text-decoration-underline ms-2">{{product.code}}</span></p>
        <a class="d-flex align-items-center mt-30" :href=back><img src="/img/back.png"> <div class="ms-3 fs-5 color-gray">Вернуться на страницу поиска</div></a>

        <div class="d-flex justify-content-sm-between mt-30">
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
                <div class="col-4 d-flex justify-content-center align-items-center">
                    Наименование
                </div>
                <div class="col-4 d-flex justify-content-center align-items-center">
                    Информация о предложении
                </div>
                <div class="col d-flex justify-content-start align-items-center">
                    Наличие
                </div>
                <div class="col d-flex justify-content-start align-items-center">
                    Срок
                </div>
                <div class="col d-flex justify-content-start align-items-center">
                    Цена
                </div>
                <div class="col d-flex justify-content-start align-items-center">

                </div>
            </div>

            <a v-for="item in offers" class="row bg-white h-48 fs-16 fw-normal rounded-3 border border-1" href="#">
                <div class="col-4 d-flex justify-content-center align-items-center">
                    {{item.name}}
                </div>
                <div class="col-4 d-flex justify-content-center align-items-center">

                    <div class="d-flex justify-content-around">
                        <img v-if="item.isLiquidity === 1" src="/img/flag.png" class="ms-4" alt="Л">
                        <img v-if="item.isDealer === 1" src="/img/star.png" class="ms-4" alt="Д">
                    </div>
                </div>
                <div class="col d-flex justify-content-lg-start align-items-center">
                    {{item.quantity}}
                </div>
                <div class="col d-flex justify-content-lg-start align-items-center">
                    {{item.period}} дней
                </div>
                <div class="col d-flex justify-content-lg-start align-items-center">
                    {{item.price}} ₽
                </div>
                <div class="col d-flex justify-content-lg-start align-items-center">
                </div>
            </a>
            <p v-if="offers.length === 0" class="fs-2 mb-30 mt-30">Поиск не дал результатов</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "SearchStep2Component",
    props : ['user','offers', 'product', 'back'],
    data(){
        return {
            name : "",
        }
    },
    mounted(){
        console.log(this.back);
    },
    methods : {
        hasNameError : function() {
        },
    },

}
</script>

<style scoped>

</style>

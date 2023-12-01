<template>



     <div class="row gray_bg mrtb40">
        <div class="container">



                 <div class="row gray_bg">
                    <img src="/assets/img/unionpaycardfees1.jpg" alt="" class="img-responsive center-block" />
                </div>


            <h2>Карта Unionpay</h2>

            <div class="speacer20"></div>

            <h4>Лимиты и комиссии по карте</h4>


            <ul class="package-features-list package-features-list2" style="height: 270px;list-style-type: none;">
                <li><i class="fa fa-check" aria-hidden="true"></i> Максимальный размер билета - $2,000</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Максимальный ежемесячный объем - $20,000</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Максимальное количество часов - 2 раза в час</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Максимальное количество дней - 20 раз в день</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Сумма пополнения карты - $2,000</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Максимальный баланс карты - $50,000</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Операция с карты на карту - $2,000</li>

                <li><i class="fa fa-check" aria-hidden="true"></i> Банкомат - Снятие $4.15</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Банкомат - запрос баланса $4.15</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> POS - $1.25</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Reload Card - 3,50$ США или 1,5%, в зависимости от того, что больше</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Перевод с карты на карту - $7.00</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Ежемесячная плата - $3.00</li>
            </ul>

            <div class="slideshow-container">
                <a href="/ru/cpanel/unionpay-cards" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>закажите карту сейчас</a>
            </div>


        </div>
    </div>

</template>

<script>
import { useHead } from '@vueuse/head'
import {computed, reactive, ref} from "vue";
import axios from 'axios';
import {useRouter} from "vue-router";
const errors = ref()
const router = useRouter();

export default ({
    data(){
        return{
            site_title: `Unionpay Card`,
            site_description: ``,
            site_keywords: '',

        }
    },
    mounted() {
        useHead({
            // Can be static or computed
            title: computed(() => this.site_title),
            meta: [
                {
                    name: `description`,
                    content: computed(() => this.site_description),
                },
                {
                    name: `keywords`,
                    content: computed(() => this.site_keywords),
                },
            ],

        })
    }
});
</script>

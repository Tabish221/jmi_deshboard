<template>



     <div class="row gray_bg mrtb40">
        <div class="container">



                 <div class="row gray_bg">
                    <img src="/assets/img/unionpaycardfees1.jpg" alt="" class="img-responsive center-block" />
                </div>


            <h2>بطاقة يونيون باى</h2>

            <div class="speacer20"></div>

            <h4>حدود ورسوم البطاقة</h4>


            <ul class="package-features-list package-features-list2" style="height: 270px;list-style-type: none;">
                <li><i class="fa fa-check" aria-hidden="true"></i> الحد الأقصى لحجم التذكرة - $2,000</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> الحجم الشهري الأقصى - $20,000</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> الحد الأقصى لعدد الساعات - مرتين في الساعة</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> الحد الأقصى لعدد اليوم - 20 مرة في اليوم</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> مبلغ تحميل البطاقة - $2,000</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> الحد الأقصى لمبلغ رصيد البطاقة - $50,000</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> معاملة من بطاقة الى بطاقة - $2,000</li>

                <li><i class="fa fa-check" aria-hidden="true"></i> السحب من أجهزة الصراف الألى $4.15</li>
                <li><i class="fa fa-check" aria-hidden="true"></i>  الأستعلام عن الرصيد من خلال أجهزة الصراف الألى $4.15</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> نقاط البيع - $1.25</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> إعادة تحميل البطاقة - 3.50$ أو 1.5٪ ، أيهما أعلى</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> تحويل من بطاقة الى بطاقة - $7.00</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> الرسوم الشهرية - $3.00</li>
            </ul>

            <div class="slideshow-container">
                <a href="/ar/cpanel/unionpay-cards" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>أطلب بطاقتك الأن</a>
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
            site_title: `بطاقات يونيون باى`,
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

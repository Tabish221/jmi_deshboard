<template>




             <div class="row gray_bg ">
            <img src="/assets/img/android_header.jpg" alt="Android" width="100%" class="img-responsive picHeight" />
        </div>

    <div class="row gray_bg mrtb40">
        <div class="container" dir="rtl">

            <h2>الآندرويد </h2>

            <div class="speacer20"></div>

            <h4>منصات التداول </h4>
            <p>تقدم جى ام اى بروكرز مجموعة متنوعة من منصات التداول، كل منها يوفر مزايا خاصة. قم بتصفح اختياراتنا من برمجيات التداول (بما في ذلك تطبيقات الموبايل)، وستجد المنصة الأنسب لك. </p>

            <div class="col-md-6 col-sm-6 col-xs-12 pdd0 text-center txt-apps">
                <h2>تطبيقات التداول للآند رويد </h2>
                <div class="speacer20"></div>

                <div class="speacer20"></div>

                <div class="speacer20"></div>
                <div class="speacer20"></div>
                <div class="speacer20"></div>
                <div class="speacer20"></div>
                <div class="speacer20"></div>

                <a  type="button" class="header-btn" href="/ar/signup">افتح حساب</a>
                <img src="/assets/img/androidBadge.png">
            </div>

            <div class="speacer20"></div>
            <div class="col-md-6 col-sm-6 col-xs-12 pdd0">
                <img src="/assets/img/tablet.png" alt="" class="img-responsive center-block" />
            </div>



            <h4>ميتاتريدر 4 لــ iPhone و iPad </h4>
            <p>
                منصة التداول: ميتاتريدر 4 <br>
                متطلبات النظام: Touchscreen smartphone or tablet, Android 2.1 and later, 3G / Wi-Fi
            </p>
            <br>
            <div class="speacer20"></div>
            <a  type="button" class="header-btn" href="https://download.mql5.com/cdn/mobile/mt4/android?server=JMIBrokers-Demo,JMIBrokers-JMI">تحميل</a>
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
            site_title: `اندرويد`,
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

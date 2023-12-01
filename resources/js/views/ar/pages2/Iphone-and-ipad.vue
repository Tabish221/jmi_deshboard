<template>




						 <div class="row gray_bg ">
						<img src="/assets/img/iphone_header.jpg" alt="Iphone and Ipad" width="100%" class="img-responsive picHeight" />
				</div>


    <div class="row gray_bg mrtb40" dir="rtl">
        <div class="container">

            <h2 class="text-center"><span class="fa fa-arrow-circle-left jmiyellow" aria-hidden="true"></span> الآي فون والآي باد </h2>

            <div class="speacer20"></div>

            <h4>منصات التداول </h4>
            <p>تقدم جى ام اى بروكرز مجموعة متنوعة من منصات التداول، كل منها يوفر مزايا خاصة. قم بتصفح اختياراتنا من برمجيات التداول (بما في ذلك تطبيقات الموبايل)، وستجد المنصة الأنسب لك. </p>

            <div class="col-md-4 col-sm-4 col-xs-12 col-md-push-8 col-sm-push-8 pdd0 text-center">
                <div class="speacer20"></div>
                <div class="border-5px">

                    <h1 class="padding-0">تطبيقات التداول
                    </h1>
                    <h2>
                        الآي فون والآي باد</h2>
                </div>

                <br>
                <a type="button" class="header-btn" href="/ar/signup">افتح حساب </a>
                <img src="/assets/img/app-store.jpg">
            </div>

            <div class="col-md-8 col-sm-8 col-xs-12 pdd0 col-md-pull-4 col-sm-pull-4">
                <img src="/assets/img/iphn_ar.jpg" alt="" class="img-responsive center-block" />
            </div>

            <h4>ميتاتريدر 4 لـ iPhone و iPad </h4>
            <p>
                منصة التداول: ميتاتريدر 4 <br>
                متطلبات النظام: iPhone 3GS, 4, 4S, iPod touch, iPad1, iOS 4.0 and later, 3G / Wi-Fi
            </p>
            <br>

         <a type="button" class="header-btn" href="https://download.mql5.com/cdn/mobile/mt4/ios?server=JMIBrokers-Demo,JMIBrokers-JMI">تحميل</a>

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
            site_title: `الآي فون والآي باد `,
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

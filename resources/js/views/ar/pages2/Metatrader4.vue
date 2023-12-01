<template>
<link rel="canonical" href="https://www.jmibrokers.com/ar/metatrader4 " />


    <div class="row gray_bg  pos-rel" dir="rtl">
        <div class="container">
            <h2 class="text-center"><span class="fa fa-arrow-circle-left jmiyellow" aria-hidden="true"></span> ميتاتريدر 4 </h2>
            <div class="speacer20"></div>
            <div class="speacer20"></div>


        </div>

    </div>

    <div class="row gray_bg mrtb40" dir="rtl">

        <div class="container">

            <div clas="row">

                <div class="col-sm-4 col-xs-12 col-sm-push-8">
                    <p>
                        ميتاتريدر 4 هي منصة التداول الأكثر شعبية على مستوى العالم، ومع MT4 سيكون لديك مجموعة واسعة من أدوات التخطيط تحت تصرفكم، فضلا عن القدرة على تخصيص المنصة لتلبية الاحتياجات، ومن خلال لغة البرمجة، يمكنك إضافة وظائف إضافية إلى المنصة، بما في ذلك استراتيجيات التداول والمؤشرات، و نحن في جى ام اى بروكرز نعمل مع مطوري هذا البرنامج لسنوات، كما نتيح لعملائنا إماكانية الوصول إلى مستوى عال من التداول لا يمكن الحصول عليه في أي مكان آخر.
                    </p>
                </div>
                <div class="col-sm-8 col-xs-12 col-sm-pull-4">
                    <img src="/assets/img/mt4_ar.jpg" alt="metatrader 4" class="img-responsive" />

                </div>
            </div>



            <h3>التداول مع ميتاتريدر 4 </h3>
            <ul class="list_style">
                <li>أكثر من 50 من الأدوات التحليلية المخصصة لذلك، مع القدرة على تطبيق أداة واحدة أكثر من الأدوات الأخرى . </li>
                <li>إمكانية التداول في MT4 ، مع تطبيقات الهاتف الذكي، tablet, pocket. </li>
                <li>التواصل مع سوق البنوك من خلال تكنولوجيا ECN Bridge . </li>
                <li>الأخبار المالية من داو جونز . (Dow Jones) والتحليل الفني من مركز التداول </li>
            </ul>

            <div class="speacer20"></div>
            <a href="/ar/signup" class="header-btn">تحميل المنصة</a>

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
            site_title: `ميتاتريدر 4`,
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

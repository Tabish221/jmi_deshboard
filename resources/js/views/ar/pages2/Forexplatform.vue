<template>
<link rel="canonical" href="https://www.jmibrokers.com/ar/forexplatform " />
         <div class="row gray_bg">
            <img src="/assets/img/forex_platform.jpg" alt="" class="img-responsive center-block picHeight" />
        </div>



    <div class="row gray_bg" dir="rtl">
        <div class="container mrtb40">
            <h2> منصة تداول ميتاتريدر 4 </h2>


            <div class="item">
                <ul class="faq">
                    <li class="q">
                        <span class="fa fa-arrow-circle-left"></span>
                        <h3>بعض الملامح الرئيسية لنظام ميتاتريدر 4 (MT4): </h3>
                    </li>

                    <li class="a" ><div>

                        <ul>
                            <li>التنفيذ الفوري وطلب إعطاء سعر إرشادي (RFQ).
                            </li>
                            <li>إجراء الوقف .
                            </li>
                            <li>حزمة تحليل فني كاملة: 30 + من المؤشرات وأدوات التخطيط، والقدرة على إيجاد المؤشرات المختلفة، وفترات زمنية مختلفة (من الدقائق إلى الأشهر)؛.
                            </li>
                            <li>أخبار مباشرة من داو جونز.
                            </li>
                            <li>واجهة برامج متعددة اللغات.
                            </li>
                            <li>إدارة قواعد البيانات في الوقت المناسب والبيانات الواردة / الصادرة بسهولة.
                            </li>
                            <li>إشارات للنظام وإجراءات التداول.
                            </li>
                            <li>بريد الكتروني داخلي.
                            </li>
                            <li>بيانات تجارية شاملة.
                            </li>
                            <li>التداول عن طريق الموبايل: نظام ميتاتريدر 4 للهواتف النقالة .
                            </li>
                            <li>أدلة إرشادية للميتاتريدر 4 و MetaQuotes Language 4.
                            </li>
                        </ul>
                        <a href="/ar/signup" class="slide-demo-button" >تحميل المنصة</a> <br />
                            <br />
                            <img src="/assets/cimages/ala.jpg" alt="" /><br />
                            <br />'



                    </div></li>
                </ul>
            </div>



            <div class="openlivedemoaccountbtn" >
                <a href="/ar/signup" class="slide-demo-button" ><span><strong>فتح حساب</strong> تجريبى</span></a>

                <a href="/ar/signup" class="slide-live-button"><span><strong>فتح حساب</strong>  حقيقى</span></a>



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
            site_title: `Metatrader 4 FX Platform`,
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

<template>

<link rel="canonical" href="https://www.jmibrokers.com/ar/introducingbrokers " />
<div class="row gray_bg">
            <img src="/assets/img/Introducing_Broker2.jpg" alt="" class="img-responsive  picHeight" />
        </div>

        <div class="row gray_bg mrtb40">
            <div class="container">
                <h2>الوسيط المعرف</h2>

                <p> توفر جى ام اى بروكرز برنامج الوسيط المعرف (IB) الأكثر شعبية لعملاء الأفراد والشركات في جميع أنحاء العالم، وهو برنامج يتيح للوسطاء المعرفين تحصيل عمولة عن طريق جلب أعمال جديدة لـ JMI، ويستند تعويض الوسطاء على مدى نشاط تداول العملاء في JMI، ويلتزم الوسطاء المعرفين بالعمل وفقا للأنظمة في المناطق التي يقطنونها بالإضافة إلى تلك المطبقة في دولة الإمارات العربية المتحدة كما تعتمد على التوليد المستمر للتجارة المربحة من خلال خطة عمل مستدامة.</p>

                <h2>وبصفتك IB لـ جى ام اى بروكرز فيمكنك الاستفادة من: </h2>

                <div class="speacer10"></div>
                <ul class="li1">
                    <li>فريق عمل متخصص متعدد اللغات، لتقديم الخبرة والدعم اللازمان.</li>
                    <li>تهيئة ظروف تنافسية للقيام بالتداول من خلال الحسابات.</li>
                    <li>خدمات مصممة خصيصا لتلبية الاحتياجات التجارية الخاصة بك.</li>
                    <li>السلاسة في التعامل.</li>
                    <li>إمكانية الوصول إلى الحساب الخاص بك بشكل مباشر 24/7.</li>
                    <li>رابط شخصي لتسهيل التعرف على العملاء الذين تقدمهم ل JMI.</li>
                    <li>التقرير الأسبوعي الشامل لمساعدتك في تعقب العملاء الذين قمت بتقديمهم إلى JMI.</li>
                    <li>خدمات الدعم والمتابعة.</li>
                    <li>إمكانية الحصول على دخل إضافي دون أية تكاليف.</li>
                </ul>


                <h2>الاعتماد على منصة التداول </h2>
                <p>مهما كانت متطلبات عملك، فسوف توفر لك جى ام اى بروكرز بالتأكيد الحل المناسب، ولمعرفة المزيد عن برنامج IB، يرجى الاتصال بنا على 063 1399 4 971+ وبدلا من ذلك، إذا كان لديك أي أسئلة و / أو ترغب في ان نقوم نحن </p>
                <p>بالاتصال بك لمعرفة المزيد عن برنامج IB يرجى <a href="/ar/callbackrequest"> طلب أتصال </a> </p>



                <a href="/ar/become-partner"  class="become-partner slide-live-button">كن شريكا</a>


                <div class="speacer20"></div>

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
            site_title: `الوسيط المعرف`,
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

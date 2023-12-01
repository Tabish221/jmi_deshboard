<template>


    <div class="row  mrtb40">
        <div class="container">
            <h1> التراخيص واللوائح</h1>
            <p>
                من الضروري عند اختيار أي وسيط التأكد من أن يكون مرخص من قبل جهة حكومية معتمدة، وتقوم كل جهات التراخيص بمراقبة أعمال الشركات المالية، والتأكد من التزامها التام بجميع الأنظمة.                     <br /><br />
                JMI Brokers مرخصة، معتمدة، وموافق عليها من:                 </p>
            <div class="speacer20"></div>

            <div class="speacer20"></div>


            <h4 style="text-align: right !important;margin-bottom: 10px; display:none; ">

                1- JMI Brokers LTD شركة سويسريه مسجلة بمدينة زج - سويسرا </h4>
            <span style="display:none;">
<img src="/assets/img/drawn-switz-icon-dark.png" style=" vertical-align: bottom; width: 25px; ">
                  JMI Brokers LTD شركة سويسريه مسجلة بمدينة زج - سويسرا  تحت رقم التسجيل  <a href="/assets/Downloads/CHE">#CHE-334-229-499 </a> </span>



            <h4>1 - JMI Brokers LTD منظمة مرخصة بقرار من وزير المالية وتفويض  لمواصلة التعامل في الأوراق المالية</h4>
            <span>
                   فانواتو هي دولة تقع في أستراليا اللجنة (VFSC)
هي المسؤولة عن التنظيم والإشراف على شركات الاستثمار وشركات مقدمي الخدمات

      <span><a href="/assets/Downloads/Vanuatu-license.pdf">رخصة مالية رقم 15010</a></span>
                </span>
            <p>
                يتحكم منظم VFSC تمامًا في أنشطة المشاركين في السوق ويضمن الامتثال للمعايير الدولية ، ولا سيما توفير خدمات الوساطة من قبل الشركات المرخصة. يضمن المنظم شفافية العمل ويؤكد أن الشركات التي تتمتع بدرجة موثوقية عالية فقط يمكنها الحصول على الحق في الحصول على ترخيص للأنشطة المالية في نطاق اختصاص المسجل.
            </p>
            <p>تتبع VFSC بدقة اللوائح القانونية الدولية وتلتزم بجميع قوانين مكافحة غسيل الأموال.</p>
            <a href="/assets/Downloads/AML-Policy.pdf" title="Anti Money Laundering">مكافحة غسل الاموال</a><br />
            <img src="/assets/img/vanuatu-license.png" altr="Vanuatu License" style="width:100%;"/>


        </div>
    </div>


    <div class="container">


        <div class="speacer20"></div>

        <h2>إدارة المخاطر الآلي</h2>
        <p>
            إن نظام إدارة المخاطر الآلي الخاص بشركة جى ام اى بروكرز مصمم للحد من المخاطرة في حساب التداول الخاص بك عند استنفاذه إلى الصفر أو تحوله بشكل سلبي.
        </p>
    </div>









    <div class="row  mrtb40">
        <div class="container">

            <h1>الدعم والخدمات  </h1>
            <h2>التداول عبر الهاتف 24\5 </h2>
            <h2>سحب سريع خلال يوم </h2>

        </div>
    </div>



    <div class="row  mrtb40">
        <div class="container">

            <h1>تنفي    العقود </h1>
            <h2>تنفيذ بدون تدخل غرفة التداول</h2>
            <h2>ثانيتين فقط لتفيذ الامر  </h2>
            <h2>سبريد ثابت </h2>

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
            site_title: `لماذا JMI Brokers`,
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

    },
    methods:{
    }
});
</script>

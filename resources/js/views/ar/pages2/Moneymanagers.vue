<template>




<div class="row gray_bg">
            <img src="/assets/img/moneymanagers.jpg" alt="" class="img-responsive  picHeight" />
        </div>

    <div class="row gray_bg mrtb40" dir="rtl">
        <div class="container">
            <h2>مدراء الأموال</h2>
            <p>يتعين على المدراء الباحثين عن الأسعار التنافسية والتنفيذ الجيد النظر إلى أبعد من ذلك، فمع مدراء الأموال لدى جى ام اى بروكرز يمكنك التداول في حسابات متعددة من منصة تداول واحدة، حيث تركز جى ام اى بروكرز التعامل مع كل من توزيع ما بعد التداول بالنسبة لك حتى تتمكن من التركيز فقط على التداول واكتساب العملاء. </p>



            <h2>طرق متعددة للتوزيع:</h2>
            <br />
            <ul>
                <li>1.	توزيع (Percent)</li>
                <li>2.	توزيع (اللوت)</li>
            </ul>

            <h2>التقارير:</h2>
            <br />
            <ul>
                <li>1.	يمكن للعملاء الوصول إلى التقارير الخاصة بهم 24/7</li>
                <li>2.	تلقي التقارير اليومية التي تظهر توزيع التداول</li>
            </ul>


            <h2>مكتب الدعم:</h2>
            <br />
            <p>يقوم فريق مكتب الدعم بأكمله بإعداد حسابات نهاية الشهر لك ولعملائك، وهذا يتيح لك قضاء وقت أقل بالمتاعب الإدارية واستثمار الوقت في تداول جديد لعملائك. بإمكانك استدعاء أحد ممثلي المبيعات لدينا لمناقشة كيف يمكن </p>
            <p>ل جى ام اى بروكرز مساعدتك في إدارة أعمالك.</p>
            <p>447 4449 4 971+</p>
            <br>
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
            site_title: `مديرى الأموال`,
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

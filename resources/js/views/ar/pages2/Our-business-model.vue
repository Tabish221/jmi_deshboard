<template>
    <div class="row gray_bg mrtb40" dir="rtl">
        <div class="container">
            <h2>أسلوب عملنا</h2>
            <p>
                يتم تمرير جميع أوامر العميل تلقائيا إلى شبكة الإتصالات الإلكترونية (ECN) عبر تكنولوجيا (MetaTrader 4 Bridge) والتي تقوم بدورها بإجراء الإتصال بين خوادم جى ام اى بروكرز وشبكة الإتصالات الإلكترونية (ECN)، حيث يتم إجراء الصفقات في السوق.
            </p>
            <div class="speacer20"></div>
            <h2>التفاصيل:</h2>
            <p>
                مستوى سيولة عالي<br>
                التنفيذ الفوري<br>
                بدون إعادة تسعير<br>
                عمولة مدفوعة
            </p>
            <div class="speacer20"></div>
        </div>

    </div>


    <div class="row gray_bg mrtb40" dir="rtl">


        <img src="/assets/img/dataflow.jpg" alt="" class="img-responsive center-block w100" />
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
            site_title: `أسلوب العمل`,
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

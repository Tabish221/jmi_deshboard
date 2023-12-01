<template>

  <div class="row gray_bg">
        <img src="/assets/img/lgculture.png" alt="" class="img-responsive center-block picHeight" />
    </div>

    <div class="row gray_bg mrtb40" dir="rtl">
        <div class="container">
            <h2>ثقافتنا</h2>

            <h3>التكامل: </h3>
            <p>إن نجاحنا يتواءم مع نجاح عملائنا ، وبالتالي علينا أن نعمل دائما بتميز ونزاهة.  </p>

            <h3>التنوع العالمي: </h3>
            <p> فلكل موظف أفكاره الفريدة من نوعها ومواهب قوية تعكس طبيعة متنوعة من أعمالنا التجارية في جميع أنحاء العالم.  </p>

            <h3>بيئة العمل الديناميكية: </h3>
            <p> نحن نخطط للمستقبل، نتقبل التغيير وننفذ بدقة.   </p>

            <h3>الريادة في مجال خدمة العملاء: </h3>
            <p> فنحن لدينا نموذج أعمال فريد من نوعه موجه لخدمة العملاء.   </p>

            <h3>الابتكار: </h3>
            <p> فشركتنا تشجع الابتكار في مجال التحسين والتطوير، بالإضافة إلى تسويق المنتجات.   </p>

            <h3>فريق عمل متعاون: </h3>
            <p> إن أساليب التواصل والتي تكون في الوقت المناسب تؤدي إلى الجو المثالي للتعاون والوحدة.   </p>

            <h3>الرعاية الصحية: </h3>
            <p> نحن نتفهم أهمية توازن العمل مع العائلة، كما نشجع على أنماط الحياة الصحية.   </p>

            <h3>التعلم والتحسين المستمر: </h3>
            <p> فنحن نسعى إلى تعزيز ثقافة دعم نمو الفرد وتنمية الذات.    </p>

            <h3>جعل العمل أكثر متعة</h3>
            <p> فنحن لدينا المتعة في جميع الأنشطة التي نقوم بها وعلى اختلاف أنواعها.  </p>

            <div class="speacer20"></div>
            <img src="/assets/img/lg-culture-bottom.jpg" alt="" class="img-responsive center-block" />
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
            site_title: `ثقافتنا`,
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

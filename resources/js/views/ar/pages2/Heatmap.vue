<template>
<link rel="canonical" href="https://www.jmibrokers.com/ar/heatmap " />
          <div class="row gray_bg">

<link  href="/assets/css/heatmap.css" rel="stylesheet"/>

        <div class="container">
            <div class="row gray_bg mrtb40" style="font-family:auto;direction:rtl;">
              <br /><br />
              <h1>{{this.site_title}}</h1>

            <div v-html="`${this.heatmap}`"></div>

                <p class="text-right">خريطة الحرارة للعملات هي مجموعة من الجداول التي تعرض مواضع القوة النسبية للأزواج العملات الرئيسية في مقارنة مع بعضها البعض ، وتهدف إلى إعطاء لمحة عامة عن سوق تداول العملات الأجنبية خلال أطر زمنية مختلفة. سواء كنت تاجر مستغل، يوم، متأرجح، أو الموقف، فهي أداة قوية إذا كنت تبحث عن استراتيجيات تجارية جديدة ومبتكرة لتضيفها الى القدرات الخاصه بك. انتقل إلى أسفل الصفحة لعرض دليل يحتوي على تفسيرات لرموز الألوان.</p>
            </div>
        </div>
        </div>

</template>

<script>
import { useHead } from '@vueuse/head'
import {computed, reactive, ref} from "vue";
import axios from 'axios';
import {useRouter} from "vue-router";
import ('jquery')
import jquery from 'jquery'
window.jQuery = jquery
import $ from 'jquery'


const errors = ref()
const router = useRouter();


export default ({
    data(){
        return{
            site_title: ``,
            site_description: ``,
            site_keywords: '',
            heatmap: '',

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
        setTimeout(function () {
            $('div.newSocialButtons').remove();$('div.float_lang_base_2').remove();$('div.OUTBRAIN').remove();
            this.getData()
        }, 5000);


    },
    methods:{
        async getData() {
            const router = useRouter();

            try {
                const result = await axios.get('/api/heatmap')

                if (result.status === 200) {

                    this.site_title=result.data.title.ar;
                    this.site_keywords=result.data.keywords.ar;
                    this.site_description=result.data.description.ar;
                    this.heatmap=result.data.heatmap_ar;


                }else{
                    console.log('Error')
                }

            } catch (e) {
                console.log('Error')
            }
        },
    }
});
</script>

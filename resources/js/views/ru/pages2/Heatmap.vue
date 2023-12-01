<template>
<link rel="canonical" href="https://www.jmibrokers.com/ru/heatmap " />
          <div class="row gray_bg">

<link  href="/assets/css/heatmap.css" rel="stylesheet"/>

        <div class="container">
            <div class="row gray_bg mrtb40">
              <br /><br />
              <h1>{{this.site_title}}</h1>

            <div v-html="`${this.heatmap}`"></div>

                <p class="text-right">Тепловая карта валют - это набор таблиц, в которых отображается относительная сила основных валютных пар по сравнению друг с другом, предназначенных для обзора рынка форекс в различные периоды времени. Независимо от того, являетесь ли вы скальпером, дневным трейдером, трейдером на колебаниях или позиционным трейдером, это мощный инструмент, если вы ищете новые и инновационные торговые стратегии, которые можно было бы добавить в свой репертуар. Прокрутите вниз эту тепловую карту форекс, чтобы увидеть ключ, содержащий пояснения к цветовым кодам.</p>
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

                    this.site_title=result.data.title.ru;
                    this.site_keywords=result.data.keywords.ru;
                    this.site_description=result.data.description.ru;
                    this.heatmap=result.data.heatmap_en;


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

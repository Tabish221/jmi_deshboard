<template>
<link rel="canonical" href="https://www.jmibrokers.com/en/heatmap " />
          <div class="row gray_bg">

<link  href="/assets/css/heatmap.css" rel="stylesheet"/>

        <div class="container">
            <div class="row gray_bg mrtb40">
              <br /><br />
              <h1>{{this.site_title}}</h1>

            <div v-html="`${this.heatmap}`"></div>

<p class="text-right">The Currencies Heat Map is a set of tables which display the relative strengths of major currency pairs in comparison with each other, designed to give an overview of the forex market across various time frames. Whether you're a scalper, day, swing, or position trader, it is a powerful tool if you're looking for new and innovative trading strategies to add to your repertoire. Scroll down to the bottom of this forex heat map to view the key containing explanations for the color codes.</p>
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

                    this.site_title=result.data.title.en;
                    this.site_keywords=result.data.keywords.en;
                    this.site_description=result.data.description.en;
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

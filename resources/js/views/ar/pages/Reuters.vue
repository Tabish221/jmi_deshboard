<template>

    <marquee behavior="alternate" direction="right"
             onmouseover="this.stop();"
             onmouseout="this.start();">
        <table  class="prices" cellspacing="1" cellpadding="2" border="0" style="background: #0059b2;font-size:12px;padding: 0px; font-family:Tahoma, Arial, Helvetica, sans-serif;margin:0 auto;width:max-content;direction: rtl;">
            <tr style="font-weight:bold;" align="center">

                <td id="sign" v-for="reuters_new in this.reuters_news"  style="color:#fff;text-align:left;display:inline-block;clear:both">{{ reuters_new.news }} <span style="color: #ffc926; font-size: 12px;"> {{ reuters_new.time }}</span></td>
                <td></td>

            </tr></table>

    </marquee>




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
            site_title: ``,
            site_description: ``,
            site_keywords: '',
            reuters_news: [],

        }
    },
    mounted() {
        this.getData()
    },
    methods: {
        async getData(){
            try {
                const result = await axios.get('/api/shownews')
                if (result.status === 200 && result.data) {
                    this.reuters_news=result.data.data.ar.reuters_news
                    this.site_title=result.data.data.ar.title
                    this.site_description=result.data.data.ar.description
                    this.site_keywords=result.data.data.ar.keywords
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
            } catch (e) {
                if(e && e.response.data && e.response.data.errors) {
                    errors.value = Object.values(e.response.data.errors)
                } else {
                    errors.value = e.response.data.message || ""
                }
            }
        },


    },created () {

        // setInterval(() => {
        //     this.plusSlides(1),
        //         this.plusSlidess(1)
        // }, 8000)
    },
    setup() {


    },
})

</script>
<style>
body {
    margin:0px;
    background: #0059b2;
}
</style>

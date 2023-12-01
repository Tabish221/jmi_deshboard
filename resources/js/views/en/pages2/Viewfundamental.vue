<template>




        <div class="container">
            <div class="row mrtb40">
            <p style='font-size:22px;color:#0059b2;text-align:left;font-weight:bold;' >{{ this.fundamentalanalysis.title }}</p>
                                <div id='post' class='col-sm-12'>
                                    <div class='col-sm-12'>

                                        <div id='details' style='font-size:16px;margin-bottom:20px;color:#fff;height:auto;text-align:left;' class='col-sm-12'>
                                            <div v-html="`${this.fundamentalanalysis.details}`"></div>
                                        </div>
                                        <div id='time' style='color:#fff;text-align:right;padding-right:20px;' class='col-sm-12'>
                                            <h7>{{this.fundamentalanalysis.created_at}}</h7>
                                        </div>
                                    </div>

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
import $ from 'jquery'
import jquery from 'jquery'
window.jQuery = jquery

export default ({
    data(){
        return{
            site_title: ``,
            site_description: ``,
            site_keywords: '',
            fundamentalanalysis:'',
            fundamentalId:this.$route.params.fundamentalId || ''

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
        this.getData()
    },
    methods:{
        async getData() {
            const router = useRouter();

            try {
                const result = await axios.get("/api/dailyfundamental/fundamental/"+this.fundamentalId)

                if (result.status === 200) {

                    this.fundamentalanalysis=result.data.fundamentalanalysis;
                    this.site_title=result.data.title.en;

                }else if(result.status === 201){
                    this.site_title=result.data.error.en;
                }

            } catch (e) {
                // await router.push('/en/login')
            }
        },
    }
});
</script>
<style>

div#post p{color:#000;font-weight: bold;} div#post a{color: #0059b2;font-weight:bold;} div#post h7{color:#0059b2;} div#post{background:#eeeeee;color:black;padding:20px;margin:5px auto;word-wrap: break-word;}

</style>

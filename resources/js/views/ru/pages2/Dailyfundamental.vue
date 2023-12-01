<template>
<link rel="canonical" href="https://www.jmibrokers.com/ru/dailyfundamental " />

	<div class="row">
			<div class="container">
<h1>Fundamental Analysis</h1>
                <template v-for="post in fundamentalanalysis">

                    <div id='post' class='col-sm-12'>

                        <div class='left col-sm-3'>
                            <img  :src="post.image" alt='' style="width:100%;height:100%;" />
                        </div>

                        <div class='right col-sm-9'>
                            <div id='title' style='text-align:left;margin-bottom:20px;height:80px;' class='col-sm-12'>
                                <a style='font-size:20px;' :href="`/ru/dailyfundamental/fundamental/${post.id}`">{{ post.title }}</a>
                            </div>

                            <div id='details' style='font-size:16px;margin-bottom:20px;color:#fff;height:135px;overflow:hidden;' class='col-sm-12' >
                                <div v-html="`${post.details.replace('style=display: block; margin-left: auto; margin-right: auto;','style=display: none; margin-left: auto; margin-right: auto;') }`"></div>
                            </div>

                            <div id='time' style='color:#fff;text-align:center;padding-right:20px;' class='col-sm-12'>
                                <a :href="`/ru/dailyfundamental/fundamental/${post.id}`">...Read More...</a>
                                <h7 style='float:right;'>{{ post.created_at }}</h7>
                            </div>

                        </div>
                    </div>

                </template>
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
            site_title: `Daily Fundamental Analysis`,
            site_description: ``,
            site_keywords: '',
            fundamentalanalysis:''

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
                const result = await axios.get('/api/dailyfundamental')

                if (result.status === 200) {

                    this.fundamentalanalysis=result.data.fundamentalanalysis;
                    this.site_title=result.data.title.ru;
                    this.site_keywords=result.data.keywords.ru;
                    this.site_description=result.data.description.ru;


                }else{

                  //  await router.push('/ru/login')
                }

            } catch (e) {
               // await router.push('/ru/login')
            }
        },
    }
});
</script>
<style>

div#post p{color:#000;font-weight: bold;} div#post a{color: #0059b2;font-weight:bold;} div#post h7{color:#0059b2;} div#post{background:#eeeeee;color:black;padding:20px;margin:5px;word-wrap: break-word;height:300px;}
div.left{float:left;text-align:left;height:100%;}
div.right{float:right;height:100%;}
</style>

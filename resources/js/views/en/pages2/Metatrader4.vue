<template>
<link rel="canonical" href="https://www.jmibrokers.com/en/metatrader4 " />

	<div class="row gray_bg  pos-rel">
        <div class="container">
            <h2 class="text-center"><span class="fa fa-arrow-circle-right jmiyellow" aria-hidden="true"></span> MetaTrader 4</h2>
            <div class="speacer20"></div>
            <div class="speacer20"></div>


        </div>

    </div>

    <div class="row gray_bg mrtb40">
        <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-12">
            <p>
                MetaTrader 4 is the world’s most popular trading platform. With MT4, you will have a wide selection of charting tools at your disposal as well as the ability to completely customize the platform
                  to meet your personal specifications. And with a built-in programming language, you can even add additional functionality to the platform, including trading strategies, scripts and indicators.
                  At JMI Brokers  we have been working with the developers of this software for years, giving our clients exclusive access to a level of trading terms that can’t be found elsewhere.
            </p>
            </div>
            <div class="col-sm-8 col-xs-12">
                <img src="/assets/img/mt4.jpg" alt="metatrader 4" class="img-responsive " />
            </div>
        </div>

            <h3>Trading with MetaTrader 4</h3>
            <ul class="list_style">
                <li>More than 50 customizable analytical tools, with the ability to apply one tool on top of another</li>
                <li>Trade your MT4 accounts on the go, with apps for your smartphone, tablet or Pocket PC</li>
                <li>Connect to the interbank market with ECN Bridge technology</li>
                <li>Financial news from Dow Jones and technical analysis from Trading Central</li>
            </ul>

            <div class="speacer20"></div>
             <a href="/en/signup" class="header-btn">Download Platform</a>

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
            site_title: `MetaTrader 4`,
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

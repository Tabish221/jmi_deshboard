<template>




						 <div class="row gray_bg ">
						<img src="/assets/img/iphone_header.jpg" alt="Iphone and Ipad" width="100%" class="img-responsive picHeight" />
				</div>


    <div class="row gray_bg mrtb40">
        <div class="container">

            <h2 class="text-center"><span class="fa fa-arrow-circle-right jmiyellow" aria-hidden="true"></span> Iphone & Ipad</h2>

            <div class="speacer20"></div>

            <h4>Trading Platforms</h4>
            <p>JMI offers a variety of trading platforms, each of which offers its own distinct advantages. Browse our selection of trading software (including our mobile apps) and find the platform that's best suited to you</p>

            <div class="col-md-4 col-sm-4 col-xs-12 pdd0 text-center">
                <div class="speacer20"></div>
                <div class="border-5px">
                <h1 class="padding-0">Trading Apps for</h1>

                    <h2>iPhone and iPad.</h2>
                </div>

                <br>

                <br>
                <a type="button" class="header-btn" href="/en/signup">Open Account</a>
                <img src="/assets/img/app-store.jpg">
            </div>

            <div class="col-md-8 col-sm-8 col-xs-12 pdd0">
                <img src="/assets/img/iphn.jpg" alt="" class="img-responsive " />
            </div>

            <h4>MetaTrader 4 for iPhone and iPad</h4>
            <p>
                Trading Platform : MetaTrader 4<br>
                System Requirements : iPhone 3GS, 4, 4S, iPod touch, iPad1, iOS 4.0 and later, 3G / Wi-Fi
            </p>
            <br>

         <a type="button" class="header-btn" href="https://download.mql5.com/cdn/mobile/mt4/ios?server=JMIBrokers-Demo,JMIBrokers-JMI">Download</a>

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
            site_title: `Iphone & Ipad`,
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

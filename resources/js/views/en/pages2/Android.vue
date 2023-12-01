<template>




             <div class="row gray_bg ">
            <img src="/assets/img/android_header.jpg" alt="Android" width="100%" class="img-responsive picHeight" />
        </div>

     <div class="row gray_bg mrtb40">
        <div class="container">

            <h2>Android</h2>

            <div class="speacer20"></div>

            <h4>Trading Platforms</h4>
            <p>JMI offers a variety of trading platforms, each of which offers its own distinct advantages. Browse our selection of trading software (including our mobile apps) and find the platform that's best suited to you</p>

            <div class="col-md-6 col-sm-6 col-xs-12 pdd0 text-center txt-apps">
                <h2>Trading Apps for Android.</h2>
                <div class="speacer20"></div>

                <div class="speacer20"></div>

                <div class="speacer20"></div>
                <div class="speacer20"></div>
                <div class="speacer20"></div>
                <div class="speacer20"></div>
                <div class="speacer20"></div>

               <a  type="button" class="header-btn" href="/en/signup">Open Account</a>
                <img src="/assets/img/app-store.jpg">
            </div>

            <div class="speacer20"></div>
            <div class="col-md-6 col-sm-6 col-xs-12 pdd0">
                <img src="/assets/img/tablet.png" alt="" class="img-responsive center-block" />
            </div>



            <h4>MetaTrader 4 for iPhone and iPad</h4>
            <p>
                Trading Platform : MetaTrader 4<br>
                System Requirements :Touchscreen smartphone or tablet, Android 2.1 and later, 3G / Wi-Fi
            </p>
            <br>
            <div class="speacer20"></div>
          <a  type="button" class="header-btn" href="https://download.mql5.com/cdn/mobile/mt4/android?server=JMIBrokers-Demo,JMIBrokers-JMI">Download</a>
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
            site_title: `Android`,
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

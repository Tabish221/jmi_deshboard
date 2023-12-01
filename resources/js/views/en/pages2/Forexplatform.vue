<template>
<link rel="canonical" href="https://www.jmibrokers.com/en/forexplatform " />
         <div class="row gray_bg">
            <img src="/assets/img/forex_platform.jpg" alt="" class="img-responsive center-block picHeight" />
        </div>


        <div class="row gray_bg">
            <div class="container mrtb40">
                <h2> Metatrader 4 FX Platform</h2>


      <div class="item">
          <ul class="faq">
            <li class="q">
              <span class="fa fa-arrow-circle-right"></span>
              <h3>Key  Features of MetaTrader 4 (MT4):  </h3>
            </li>

            <li class="a" ><div>

      <ul class="li1" type="disc">
        <li>Instant execution and request-for-quote execution (RFQ) </li>
        <li>Trailing stops </li>
        <li>Complete technical analysis package: 30+ in-built indicators and charting tools, the ability to create various custom       indicators, different time periods (from minutes to months); </li>
        <li>On-line news from Dow Jones.</li>
        <li>Multi-language program interface; </li>
        <li>History database management and real time data import/export facility; </li>
        <li>Signals of system and trading actions; </li>
        <li>Internal e-mail; </li>
        <li>Comprehensive trading statements. </li>
        <li>Mobile Trading: MetaTrader 4 Mobile for PDA's and suitable mobile phones </li>
        <li>In-built help guides for MetaTrader 4 and MetaQuotes Language 4. </li>
      </ul>
                <p align="center">&nbsp;&nbsp;<a href="/en/signup" class="slide-demo-button" >Download Meta Trader 4 FX Demo</a></p>

        <br />
        <img src="/assets/cimages/ala.jpg" alt="" /><br />




            </div></li>
          </ul>
      </div>



                          <div class="openlivedemoaccountbtn" dir="rtl">
  <a href="/en/signup" class="slide-demo-button" ><span><strong>Open a Demo</strong> Account</span></a>

    <a href="/en/signup" class="slide-live-button"><span><strong>Open a Live</strong>  Account</span></a>
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

export default ({
    data(){
        return{
            site_title: `Metatrader 4 FX Platform`,
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

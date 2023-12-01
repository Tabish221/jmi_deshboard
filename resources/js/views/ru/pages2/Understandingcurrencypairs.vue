<template>


        <div class="row gray_bg mrtb40">
            <div class="container">
        <br />
<table width="680" border="0" align="center">
  <tr>
    <td>


     <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span class="style64"><strong>&nbsp;&nbsp;&nbsp;&nbsp;The Majors</strong></span></td>
        </tr>
      </table>
      <br />


      <p>Most currency transactions involve  the &quot;Majors&quot; consisting of the British Pound (GBP), Euro (EUR),  Japanese Yen (JPY), Swiss Franc (CHF) and the US Dollar (USD). Many traders are  beginning to add the Canadian Dollar (CAD) and the Australian Dollar (AUD) to  this category as well.<u> </u></p>
    <p align="center"><img src="/assets/cimages/nkhiy.jpg" /></p>


    <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span class="style64"><strong>&nbsp;&nbsp;&nbsp;Currencies in Pairs?</strong></span></td>
        </tr>
      </table>
      <br />


    <p>Often  new traders struggle to grasp the concept of trading currencies in pairs, why  not just buy the Euro they might ask? Why does it have to be paired with the US  Dollar? Simple, the currency on the right side of the pair is there to  establish a comparative value, without it how could the base currency (currency  on the left side of the pair) have any certain value? In other words, if  currencies were not paired what would a single currency gain or lose value  against? By pairing two currencies against each other a fluctuating value can  be established for the one versus the other. So, how is the Euro doing against  the Dollar, or how many Dollars does it take to </p>
    <p>&nbsp;</p>
    <p align="center"><img src="/assets/cimages/gg.jpg" /></p>
    <p class="style65">Cross  Currency Pairs</p>
    <p>Currency pairs that do not include  the US dollar are referred to as Cross Currency Pairs. Cross Currency trading  can open a completely new aspect of the Forex market to speculators. Some cross  currencies move very slowly and trend very well, ideal for beginning traders.  Other cross currency pairs move very quickly and are extremely volatile; with  daily average movements exceeding 100 pips. <br />
    Speculators might utilize cross  pairs as a means of portfolio diversification. An example would be an investor  whose portfolio is primarily comprised of US based stocks and bonds who wants  to diversify into foreign markets. Holding carry trades in cross currencies  might be a good option for this type of investor. Many of these cross currencies  also offer greater return potential with enhanced interest (also referred to as  swap, rollover interest or carry forward interest) that can be paid on open  positions. Swap is a credit or debit as a result of daily interest rates. When  traders hold positions over night, they are either credited or debited interest  based on the rates at the time. Often, cross currencies yield higher interest  rates than do major currencies and are traded for the purpose of collecting  said interest. </p></td>
  </tr>
</table>


</div></div>

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
            site_title: `Currency Pairs`,
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
<style type="text/css">

.style64 {
    color: #FFFFFF;

}
.style65 {
    color: #a6c54c;
    font-weight: bold;
}

</style>

<template>




                  <div class="row gray_bg mrtb40">
            <div class="container">



      <table width="680" border="0" align="center">
  <tr>
    <td><table width="680" border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>


     <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;&nbsp;Diversification</strong></span></td>
        </tr>
      </table>
      <br />



      <h2 >Currency Diversification</h2>
      <p>We all hear diversification is the best policy for an overall investment  portfolio. This is also true amongst our currency focused investments as well.  We must master the use of multiple trading strategies and multiple currency  pairs to equalize our overall return. There are many traders that utilize  trading strategies that when trading conditions are met are 80% accurate.  However a full-time trader must utilize more than this single strategy as many  times there are long periods of time when the trading conditions are not met,  such intervals can last anywhere from a few days to several months. What good  is a single strategy that can yield profits only half the year? Diversification  is the answer. The key to making a living from your trading profits is to master  several strategies that together yield consistent profits month after month. <br />
        Diversifying your investment is not the most popular of investment topics.  In fact many people believe diversifying dilutes trading profits. But most  investment professionals agree that while it does not guarantee against a loss,  diversification is the most important component to helping you reach your  long-term financial goals while minimizing your risk. But, remember that no  matter how much diversification you do, it can never reduce risk down to zero. </p>
      <h2 >A Well Defined Portfolio</h2>
      <p>What do you need to have a well diversified portfolio? There are 3 main  aspects to ensure the best diversification: <br />
        (1) Your portfolio should be spread among many different trading strategies <br />
        (2) Your trades should vary in risk and time held. Picking different trade  opportunities with different potential rates of return will ensure that large  gains offset losses of other trades. Keep in mind that this doesn't mean  blindly place trades all across the spectrum! <br />
        (3) Your currency pairs should vary by region and crosses, minimizing  unsystematic risk to small groups of countries <br />
        Another question people always ask is how many currency pairs they should  trade to reduce the risk of their portfolio. The portfolio theory for stocks  tells us that after 10-12 diversified stocks you are very close to optimal  diversification. However in the currency market this doesn't mean buying 12  currency pairs will give you optimal diversification, instead you need to trade  currencies of different regions and importance levels (i.e. majors, crosses and  more exotic currencies). </p>
      <p>&nbsp;</p>
    <p>&nbsp;</p></td>
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
            site_title: `Diversification`,
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

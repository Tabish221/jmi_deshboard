<template>



                 <div class="row gray_bg mrtb40">
            <div class="container">

        <br />
<table width="680" border="0" align="center">
  <tr>
    <td>

     <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span class="style66"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Understanding Contract Sizes</strong></span></td>
        </tr>
      </table>
      <br />

      <p>Understanding contract sizes (lots)  is a necessary precursor to understanding the need for high leverage in the  Forex market. Each standard lot traded in the Forex market is a $100,000  contract. In other words, when trading one lot in a standard account, a trader  is essentially placing a $100,000 trade in the market. Without leverage, most  investors would not be able to afford such a transaction. Leverage of 100 - 1  would allow a trader to place the same one lot ($100,000) trade with the post  of $1,000 in margin. $100,000 divided by 100 equals $1,000, thus 100 - 1  leverage means that $1,000 of margin is able to control a $100,000 position. <br />
Many retail Forex traders today  begin their trading in a Mini account. Because standard contracts in the Forex  market are rather large, even with 100 - 1 leverage, $1,000 of margin per  contract traded is still a bit expensive for some investors. For this reason  most retail brokers offer the option of a mini account. <br />
Mini accounts are essentially 10%  the value of standard accounts, meaning that mini contracts are $10,000. A  trade of one mini lot would be a $10,000 trade, whereas a standard lot is of  course a $100,000 trade. It is not unusual for brokers to offer higher leverage  in mini accounts, 200 - 1 is very common. Trading with 200 - 1 leverage would  mean that $50 of margin would control a $10,000 contract</p>

      <p class="style67">Calculating  Margin</p>
    <p class="style69"><span class="style68">Margin is calculated 2 ways: Used Margin and Free Margin. Used margin is the amount of  money used to hold open positions. Free margin is the amount of funds available  to place additional positions</span></p>
    <p align="center" class="style69"><img src="/assets/cimages/mjjuiu.jpg" /></p>
    <p>As seen in <em>figure 1</em>, $250 is  used to hold their current positions, totaling 5 mini lots. $4,736.00 is available  for the trader to open additional positions. </p>
    <p>&nbsp;</p>
    <p class="style70">Calculating  a Margin Call</p>
    <p>Because institutions are loaning 99%  of the value of a contract to a trader, fail-safes have been put in place to  help prevent a trader from going into the negative and owing the institution  additional funds. This is commonly referred to as a Margin Call, where  typically a client is called upon to send additional funds or the position(s)  will be closed at market price. At 50% margin level the trader will be subject  to a margin call, the automatic close of open positions so as to bring the  margin level back to a suitable percentage. </p>
    The margin level is calculated by dividing the  current equity in an account by the current amount of margin in use (used  margin)
<p align="center" class="style69"><img src="/assets/cimages/ghgfg.jpg" /></p>
<p>After dividing the equity by the  margin move the decimal two places to the right. A trader whose equity is at  $1,000 and who is using a $500 of margin would divide 1,000 by 500 which of  course equals 2. Then move the decimal two places to the right; this trader's  current margin level or percentage is thus 200%. At 100% margin level a trader  is essentially using their entire available margin. When this level drops to  50% trades will automatically be closed to help ensure that a trader is not  subject to losing more money than is held in their account. </p><p class="style69">&nbsp; </p></td>
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
            site_title: `Contract Sizes`,
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

.style66 {
    color: #FFFFFF;

}
.style67 {
    color: #a6c54c;
    font-weight: bold;
    font-size: 20px;
}
.style68 {color: #000000}
.style69 {color: #a6c54c}
.style70 {
    color: #a6c54c;
    font-weight: bold;
    font-size: 20px;
}
</style>

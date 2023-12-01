<template>


                  <div class="row gray_bg mrtb40">
            <div class="container">


        <br />
<table width="680" border="0" align="center">
  <tr>
    <td>

     <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;&nbsp;Why Study by Currency or Region?</strong></span></td>
        </tr>
       </table>
      <br />


      <p align="left">In continuing your journey through  the world of fundamental analysis, consider the approach taken when outlining  the entire fundamental analysis section of this university; a strong emphasis  on the US economy followed by a very close look at the following currencies -  and the countries that impact their place in the market: <br />
GBP - Great Britain Pound<br />
JPY - Japanese Yen<br />
EUR - European Dollar<br />
CHF - Swiss Franc<br />
NZD - New Zealand Dollar<br />
AUD - Australian Dollar<br />
CAD - Canadian Dollar <br />
The key to understanding global  economics can perhaps be found within the core economic indicators that drive  market sentiment. Often, these indicators are not exclusive to the US economy.  Many economic indicators are used by multiple countries, while others are  specific only to certain economies. Most currency traders are aware of  indicators key to the US, but even more traders probably haven't the slightest  clue or education concerning economic indicators specific to other economies.  Such a view of fundamental analysis is tunnel vision at best. </p>

      <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;A Global Economic Game Plan</strong></span></td>
        </tr>
       </table>
      <br />



      <p>The truth of the matter is that  without a game plan attempting to master global economics would exhaust the  most brilliant of minds. So, instead, look at it in the following manner: Every  currency that you trade is paired with another currency for the purpose of  establishing a comparative value. Consider it a battle of economies if you  like, but however you choose to look at it, the point is that if trading the  GBP/USD you had better know about not only the economic indicators that move  the Dollar, but also of the key indicators that move the Pound. The dollar  might be gathering strength across the board, but perhaps the Brits just  released a Trade Balance report showing an increase in exports. As most  economists know, increased exports tend to precede an increased demand for a  nation's currency. <br />
        The following is an excerpt from  'FA1036 - Economics of the GBP': <br />
  <em>An increased number of exports  translate to an increase in the demand for said nation's currency, as other  countries will be forced to exchange currency in order to purchase the exports.  GDP (Gross Domestic Product) is also largely impacted by the trade balance, as  an increase in the demand for exports will increase the work load of domestic  factories, thus increasing employment levels.</em> <br />
      </p>
      <div align="left">
        <p>The point is to have an eye on both of the  economies, or currencies, that you are dealing in. A trader looking at only the  economic indicators pertinent to the USD might have assumed that the Dollar  would strengthen versus the Pound, as in our example it had been strengthening  versus other currencies. But, given the announcement of increased exports in  Britain, the dollar may in fact weaken versus the Pound simply as a result of  the Pound's reaction to the GBP Trade Balance report. Had a trader been focused  solely on the US economy, and solely on US economic indicators, this key fact  would have been overlooked      </p>
        <p>&nbsp;  </p>
      </div>

       <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;Continuing Your Fundamental Analysis Education</strong></span></td>
        </tr>
       </table>
      <br />

         <p>        As the Fundamental Analysis section  of the university continues you will notice heavy emphasis is placed on the US  economy. This is not an issue of pride, but rather is the case because of the  position of the US economy globally; few can argue its place as an economic  world super-power. Also, note that the Dollar is either the Base or the Cross  currency in 7 major pairs: <br />
        USD/CHF ~ USD/JPY ~ EUR/USD ~  GBP/USD ~ USD/CAD ~ AUD/USD ~ NZD/USD<br />
        However, one should of course never  focus on just the US economy. After a very close look at the USD the rest of  fundamental analysis section of the university dissects (one course at a time)  the economies that drive the currencies already listed above (GBP, JPY, EUR,  CHF, NZD, AUD, CAD). Each currency has a very unique place in the global  market, and moreover, each currency is impacted by various economic indicators.  In the case of the EUR, many countries can potentially impact the standing of  the EUR, meaning that traders should be aware of the economic indicators  released by each of these nations. <br />
        Taken from 'FA1038 - Economics of  the EUR' consider the below: <br />
  <em>Listed in alphabetical order the  Euro is the official currency of the following countries: Austria, Belgium,  Finland, France, Germany, Greece, Ireland, Italy, Luxembourg, the Netherlands,  Portugal, Slovenia and Spain - these countries comprise what is known as the  Eurozone. The economic standing of any of the aforementioned countries can  potentially impact the stability and price direction of the Euro.</em> </p>
      <p>&nbsp;</p>
      <p >Don't  Forget:</p>
      <p>Traders need to be aware of major economic indicators around the entire globe... no other approach to fundamental  analysis is completely sound. That said; push forward with your study of  fundamental analysis; begin with the US economy, and then take a look at  economics of each currency or region as they are outlined in this university! </p>
      <div align="left"></div>
      <p >&nbsp;</p></td>
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
            site_title: `Economic Indicators`,
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

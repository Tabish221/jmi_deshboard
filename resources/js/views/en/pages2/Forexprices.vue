<template>


        <div class="row gray_bg mrtb40">
            <div class="container">
       <br />
<table width="680" border="0" align="center">
  <tr>
    <td>

    <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span class="style53"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Forex Prices</strong></span></td>
        </tr>
      </table>
      <br />
      <p class="style51">&quot;Bid&quot;  vs. &quot;Ask&quot; </p>
    <p>Forex prices, or quotes, include a  &quot;Bid&quot; and &quot;Ask&quot; similar to other financial products. Bid is  the price at which a trader is able to sell a currency pair. The Bid price or  sell price of a currency pair is always the lower price in a quote. Ask,  sometimes referred to as &quot;Offer&quot;, is then the price at which traders  are able to buy a currency pair. In other words, Forex traders always buy at  the high and sell at the low of a price quote. The difference between the Bid  and Ask is called the &quot;Spread&quot; or &quot;Pip Spread&quot;, which is  the Trader's cost per trade or per transaction. There are typically not  additional broker commissions involved in trading the Forex market, as there  might be when trading other investment markets.</p>
    <p>&nbsp;</p>
    <p class="style52">Reading Price Quotes </p>
    <p>Reading a forex quote may seem a bit  confusing at first. However, it's really quite simple if you are able to  remember two things: <br />
      1. The first currency listed is the <em>base</em> currency <br />
    2. The value of the <em>base</em> currency is always 1 (one).</p>
    <p align="center"><img src="/assets/cimages/untitlednmnhj.jpg" /></p>
    <p>A quote of USD/JPY at 116.04 is to  say that 1 US Dollar (USD) = 116.04 Japanese Yen (JPY). When the US dollar is  the base unit and a currency pair's price increases, comparatively the dollar  has appreciated and the other currency in the pair (usually known as the cross  currency) has weakened. Using the above USD/JPY example as a reference, if the  USD/JPY increases from 116.04 to 117.51 (147 pips), the dollar is stronger  because it will now buy more yen than before. </p>
    <p>There are four currency pairs  involving the US dollar in which the US dollar is not the base currency. These  exceptions are the Australian dollar (AUD), the British Pound (GBP), the Euro  (EUR), and the New Zealand dollar (NZD). A quote on the GBP/USD of 1.7600 would  mean that one British Pound is equal to 1.7600 US dollars. If the price of a  currency pair increases the value of the base currency in comparison to the  cross currency thus increases. Conversely, if the price of a currency pair  decreases, such is to say that the value of the base currency in comparison to  cross currency has weakened. </p>
    <p>&nbsp;</p>



     <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span class="style53"><strong>&nbsp;&nbsp;&nbsp;&nbsp;What Influences Price?</strong></span></td>
        </tr>
      </table>
    <br />

    <p>Forex markets and prices are mainly  influenced by international trade and investment flows. The Forex market is  also influenced, but to a lesser extent, by the same factors that influence the  equity and bond markets: economic and political conditions, especially interest  rates, inflation, and political stability, or as if often the case, political  instability. Though economic factors do have long term affects, it is often the  immediate reaction that causes daily price volatility, which makes Forex  trading very attractive to intra-day traders. Currency trading can offer  investors another layer of diversification. Trading currencies can be viewed as  a means to protect against adverse movements in the equity and bond markets,  movements that of course also impact mutual funds. You should bear in mind that  trading in the off-exchange foreign currency market is one of the riskiest  forms of trading and you should only invest a small portion of your risk  capital in this market.</p></td>
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
            site_title: `Forex Prices`,
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
.style50 {color: #FFFFFF}
.style51 {
    color: #a6c54c;
    font-weight: bold;
}
.style52 {
    color: #a6c54c;
    font-weight: bold;
}
.style53 {
    color: #FFFFFF;
    font-size: 13px;

}

</style>

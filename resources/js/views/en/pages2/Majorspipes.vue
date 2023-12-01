<template>

        <div class="row gray_bg mrtb40">
            <div class="container">

      <br />
<table width="680" border="0" align="center">
  <tr>
    <td>


     <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;&nbsp;Majors, Crosses &amp; Pips</strong></span></td>
        </tr>
      </table>
      <br />



    <p >ISO  (International Organization for Standardization)</p>
    <p>Established in 1947, ISO established  a standard for country and currency pair abbreviations. Since foreign  currencies are quoted in terms of value of one currency against another, a  currency pair consists of an acronym for both currencies, separated by a slash  "/". <br />
For example: <br />
<strong><em>GBP</em></strong> = Great British Pound <br />
<strong><em>EUR</em></strong> = Euro <br />
<strong><em>CHF</em></strong> = Confoederatio Helvetica Franc (Swiss Franc) <br />
<strong><em>USD</em></strong> = United States Dollar <br />
<strong><em>CAD</em></strong> = Canadian Dollar <br />
<strong><em>JPY</em></strong> = Japanese Yen <br />
<strong><em>AUD</em></strong> = Australian Dollar <br />
<strong><em>NZD</em></strong> = New Zealand Dollar <br />
Currencies are always traded in  pairs, for example EUR/USD, USD/JPY. Every position requires the buying of one  currency and selling of another. When someone says they are "buying the  EUR/USD", they are buying Euros and selling Dollars. <br />
There are many other currency pairs  available to trade, such as the Danish Krone, Mexican Peso, and Russian Ruble.  However, these pairs are generally traded less, and for these pairs, it is  harder to find buyers and sellers. Such currency pairs are called "exotics".  Because they have less volume and involve a higher risk for the broker, they  typically have a wider PIP spread. </p>
    <p><strong>&nbsp;</strong></p>
    <p><span ><strong>&nbsp;</strong><strong>Pips</strong></span></p>
    <p>Market increments are measured in  PIPs, or Percentage in Point. A pip is the last digit in the value of a  currency pair; 1.3294, 115.13 etc. All currency pairs, except for the Japanese  Yen, have 4 decimal places. The Yen crosses only have 2 decimal places. </p>
    <p align="center"><img src="/assets/cimages/hnbjyh.jpg" /></p>
    <p>For example, let's assume a trader  buys 1 standard lot of GBP/USD. The current market rate is 1.9615. Essentially  this trader is buying EU 100,000 in exchange for $196,150. Again, for examples  sake, assume the market rate rose 15 PIPs to 1.9630 and the trader liquidates  the position. The same Bu 100,000 is now worth $196,300, the trader realizing a  $150 profit. </p>
    <p>&nbsp;</p>
    <p >Majors</p>
    <p>Some currency pairs are traded more  heavily than others. The currency pairs that have the most volume consist of  the "majors". While it can be debated which currency pairs are considered a  major, it can be widely agreed upon that the following 6 pairs are: <br />
        <strong>EUR/USD</strong> <br />
        <strong>GBP/USD</strong> <br />
        <strong>USD/JPY</strong> <br />
        <strong>USD/CHF</strong> <br />
        <strong>USD/CAD</strong> <br />
        <strong>AUD/USD</strong> <br />
        <strong><em>Nicknames</em></strong> are sometimes used for currency pairs. Here is a list of  currency pairs and commonly used nicknames for each: <br />
        <strong><em>GBP</em></strong> - Pound, Cable, or Sterling<br />
        <strong><em>EUR</em></strong> - Euro<br />
        <strong><em>CHF</em></strong> - Swissy, or Franc<br />
        <strong><em>USD</em></strong> - Greenback<br />
        <strong><em>CAD</em></strong> - Loonie<br />
        <strong><em>AUD</em></strong> - Aussie<br />
        <strong><em>NZD</em></strong> - Kiwi<br />
        <strong><em>JPY</em></strong>&nbsp; - Yen</p></td>
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
            site_title: `Majors, Crosses &amp; Pips`,
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
.style71 {font-size: 14px}
.style72 {color: #FFFFFF}
.style73 {
    color: #a6c54c;
    font-weight: bold;
    font-size: 20px;
}
.style74 {
    color: #a6c54c;
    font-size: 20px;
}
.style75 {
    color: #a6c54c;
    font-weight: bold;
}
.style76 {
    color: #a6c54c;
    font-weight: bold;
    font-size: 20px;
}
</style>

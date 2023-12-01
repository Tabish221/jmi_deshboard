<template>


                  <div class="row gray_bg mrtb40">
            <div class="container">

        <br />
<table width="680" border="0" align="center">
  <tr>
    <td>

     <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;What is the Central Bank?</strong></span></td>
        </tr>
       </table>
      <br />

      <p align="left">The central bank (also sometimes  referred to as the reserve bank or monetary authority) is the entity  responsible for the monetary policy of a country or of a group of member  states. Its primary responsibility is to maintain the stability of the national  currency and money supply, but more active duties include controlling  subsidized-loan interest rates, and acting as a &quot;bailout&quot; lender of  last resort to the banking sector during times of financial crisis. Most  wealthy countries today have an &quot;independent&quot; central bank-that is,  one which operates under rules designed to prevent political interference. </p>
      <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;Central Bank Responsibilities</strong></span></td>
        </tr>
       </table>
      <br />


      <ul>
          <li><span dir="ltr"> </span>Implementation of monetary policy</li>
          <li><span dir="ltr"> </span>Controls the nation's money supply</li>
          <li><span dir="ltr"> </span>Acts as the government's banker as well as the bankers' bank  (&quot;lender of last resort&quot;)</li>
          <li><span dir="ltr"> </span>Manages the country's forex and gold reserves, as well as the  government's stock register</li>
          <li><span dir="ltr"> </span>Sets the official interest rate, used to manage both inflation  and the country's exchange rate</li>
        </ul>


       <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;Central Banks of &quot;The Majors&quot;</strong></span></td>
        </tr>
       </table>
      <br />

       <p>Below is a list of central banks for  several of the world's major currencies:</p>
      <table border="0" cellpadding="0">
        <tr>
          <td><p>Bank of Canada<br />
            Bank of England<br />
            United States Federal Reserve<br />
            Swiss National Bank<br />
            Bank of Japan<br />
            Reserve Bank of Australia<br />
            Reserve Bank of New Zealand<br />
            European Central Bank</p></td>
          <td><p><a href="http://www.bankofcanada.ca/" target="_blank">http://www.bankofcanada.ca</a> <br />
                  <a href="http://www.bankofengland.co.uk/" target="_blank">http://www.bankofengland.co.uk</a> <br />
                  <a href="http://www.federalreserve.gov/" target="_blank">http://www.federalreserve.gov</a> <br />
                  <a href="http://www.snb.ch/" target="_blank">http://www.snb.ch</a> <br />
                  <a href="http://www.boj.or.jp/" target="_blank">http://www.boj.or.jp</a> <br />
                  <a href="http://www.rba.gov.au/" target="_blank">http://www.rba.gov.au</a> <br />
                  <a href="http://www.rbnz.govt.nz/" target="_blank">http://www.rbnz.govt.nz</a> <br />
              <a href="http://www.ecb.int/" target="_blank">http://www.ecb.int</a> </p></td>
        </tr>
      </table>      <p>&nbsp;</p></td>
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
            site_title: `Central Banks`,
            site_description: ``,
            site_keywords: '',

        }
    },
    mounted() {
        useHead({
            // Can be static or computed
            title: computed(() => 'Central Banks'),
            meta: [
                {
                    name: `description`,
                    content: computed(() => ''),
                },
                {
                    name: `keywords`,
                    content: computed(() => ''),
                },
            ],

        })
    }
});
</script>

<template>



                  <div class="row gray_bg mrtb40">
            <div class="container">

        <br />
<table width="680" border="0" align="center">
  <tr>
    <td>

     <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;&nbsp;Index of Leading Economic Indicators</strong></span></td>
        </tr>
       </table>


      <p>Compiled by the Conference Board and  published in its monthly Business Cycle Indicators report. Released to public  at 10:00 am ET four to five weeks after the end of the record month.  www.conference-board.org has historical data and explanations of the  methodology behind the indices. <br />
Because the indices' components are  all released earlier than the indices themselves, the markets generally don't  react strongly to the indicator report. </p>

       <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;Coincident Index</strong></span></td>
        </tr>
       </table>

       <p >4 Components </p>
      <p>(1) Nonfarm Payrolls: obtained from  a survey of about 160,000 businesses, conducted by the Bureau of Labor  Statistics.<br />
        (2) Personal Income Less Transfer  Payments: Derived from the Personal Income and Outlays report, produced by the  Bureau of Economic Analysis (BEA). The largest source is wages and salaries,  transfer payments - government disbursements and food stamps.<br />
        (3) Total Industrial Production  Index: published by the Federal Reserve and constructed of 295 components that  are weighted according to the value they add during the production process.<br />
    (4) Manufacturing &amp; Retail Trade  Sales: Collected as part of the National Income and Product Accounts  calculations. Found in the Manufacturing and Trade Inventories and Sales (MTIS)  report published by the Department of Commerce. </p>

       <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;Leading Economic Index</strong></span></td>
        </tr>
       </table>

      <p >10 Components </p>
      <p>(1) Average weekly hours worked in  manufacturing<br />
        (2) Average weekly initial claims for unemployment insurance<br />
        (3) Manufacturers' new orders for consumer goods and materials<br />
        (4) Slower deliveries diffusion index of vendor performance<br />
        (5) Manufacturers' new orders for nondefense capital goods<br />
        (6) Monthly building permits for new private housing<br />
        (7) Stock prices, 500 common stocks<br />
        (8) The M2 money supply (in 1996 dollars)<br />
        (9) The interest rate spread between the 10-year Treasury bond and the federal  funds rate<br />
        (10) The Index of Consumer Expectations<br />
    The individual indicators composing  the Leading Economic Index differ considerably in their abilities to predict  economic turning points. Some are very far seeing, others relatively near  sighted. The composite index combines in such a way that the whole is designed  to outperform any of its parts. </p>

       <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;&nbsp;Laggin Economic Index</strong></span></td>
        </tr>
       </table>

      <p >7 components </p>
      <p>(1) Average duration of unemployment<br />
        (2) Ratio of manufacturing and trade inventories to sales<br />
        (3) Manufacturing labor cost per unit of output<br />
        (4) Average prime rate<br />
        (5) Commercial and industrial loans outstanding<br />
        (6) Ratio of consumer installment credit to personal income<br />
        (7) Change in the consumer price index for services<br />
        </p>
      <p><br />
        The Lagging Economic Index follows  downturns in the business cycles by about three months and expansions by about  fifteen. This index was designed to confirm turning points in economic activity  that were identified by the leading and coincident indices have actually  occurred, thus preventing the transmission of false signals. </p>
      <p >&nbsp;</p>
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
            site_title: `Index of Leading Economic Indicators`,
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

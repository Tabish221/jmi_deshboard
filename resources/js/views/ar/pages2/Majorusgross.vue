<template>



                         <div class="row gray_bg mrtb40">
            <div class="container">

     <br />
<table width="680" border="0" align="center">
  <tr>
    <td>

     <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;&nbsp;Combination of Economics &amp; Accounting</strong></span></td>
        </tr>
       </table>

      <p>GDP is the broadest, most  comprehensive barometer of a country's overall economic condition. Sum of all  the market values of all final goods and services produced in a country  (domestically) during a specific period using that country's resources, regardless  of the ownership of the resources. <br />
        <br />
GDP is calculated and reported on a  quarterly basis as part of the National Income and Product Accounts (NIPAs).  NIPAs were developed and are maintained today by the Commerce Department's  Bureau of Economic Analysis (BEA). NIPAs are the most comprehensive set of data  available regarding US national output, production, and the distribution of  income. Each GDP report contains data on the following: <br />
- personal income &amp; consumption  expenditures<br />
- corporate profits<br />
- national income<br />
- inflation <br />
To calculate GDP, the BEA uses the  aggregate expenditure equation:<br />
GDP=C+I+G+(X-M) <br />
C - is personal consumption  expenditures<br />
I - is gross private domestic investment<br />
G - is government consumption expenditures &amp; gross investment<br />
X-M - is the net export value of goods and services (exports - imports</p>
    <p>&nbsp;</p>


      <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;&nbsp;C (Personal Consumption Expenditures)</strong></span></td>
        </tr>
       </table>



       <p>The total market value of household  purchases during the accounting term, including items such as beer, telephone  service, golf clubs, CDs, gasoline, musical instruments and taxicab rides. <br />
These fall into 3 categories;  durable goods, nondurable goods, and services. <br />
- Durable goods have shelf lives of  three or more years<br />
- Non durable goods are food, clothing, energy products, and items like  tobacco, cosmetics, prescription drugs, and magazines.</p>
    <p>&nbsp;</p>

      <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;&nbsp;I  (Gross Private Domestic Investment)</strong></span></td>
        </tr>
       </table>



      <p>Spending by businesses, expenditures  on residential housing and apartments, and inventories. Inventories are valued  by the BEA at the prevailing market price. </p>
    <p>&nbsp;</p>

     <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;&nbsp;G  (Government Consumption Expenditures &amp; Gross Investment)</strong></span></td>
        </tr>
       </table>


       <p>All money laid out by federal, state  and local governments for goods and services. </p>
    <p>&nbsp;</p>

     <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;&nbsp;X-M  (Net Exports of Goods &amp; Services)</strong></span></td>
        </tr>
       </table>

        <p>The difference between the dollar  value of the goods and services sent abroad and those it takes in across its  borders. <br />
      <br />
The GDP report is a mother lode of  information about a nations economy. The GDP is released on a quarterly basis.  One commonly used strategy is calculating the output gap of the GDP. The output  gap is the difference between the economy's actual and potential levels of  production. This difference yields insight into important economic conditions,  such as employment and inflation. <br />
The economy's potential output is  the amount of goods and services it would produce if it utilized all its  resources. Economists estimate the rate at which the economy can expand without  sparking a rise in inflation. It is not an easy calculation, and it yields as  many different answers as the economists who calculate it. Luckily, a widely  accepted estimate of potential output is reported relatively frequently by the  Congressional Budget Office (www.cbo.gov). This website has information about  methodology, underlying assumptions in computing the trend level as well as a  detailed historical data. </p></td>
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
            site_title: `Combination of Economics &amp; Accounting`,
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

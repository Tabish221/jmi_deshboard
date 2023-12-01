<template>



                       <div class="row gray_bg mrtb40">
            <div class="container">

    <br />
<table width="680" border="0" align="center">
  <tr>
    <td>

       <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;&nbsp;One of the most key economic indicators:</strong></span></td>
        </tr>
       </table>
      <br />


      <p align="left">The most important economic  indicator in terms of market and price impact is the monthly Employment  Situation published by the Bureau of Labor Statistics (BLS). No other report  has the potential to move the forex market like employment and no other  indicator is more revealing of general economic conditions than the labor  market data. Employment data is important because it reveals how firms,  corporations, and others responsible for hiring decisions view the current and  upcoming economic environment. <br />
The monthly employment report is  based on two separate surveys: the Current Population Survey (CPS), aka the  household survey, and the Current Employment Statistics survey (CES), aka the  establishment, or payrolls, survey. Supplemental to each release, the  commissioner of the Bureau of Labor Statistics provides a statement to the  Joint Economic Committee of the U.S. Congress. The statement, generally three  pages long, highlights significant strengths and weaknesses in the monthly  employment statistics. <br />
Top billing on the employment report  is generally shared by two figures; the unemployment rate and the monthly  change in nonfarm payrolls. Average hourly earnings, hours worked, overtime  hours worked and the monthly change in manufacturing jobs also command a great  deal of traders attention. </p>

       <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;&nbsp;The surveys include:</strong></span></td>
        </tr>
       </table>
      <br />


      <p>In the employment surveys, the BLS  includes only persons older than sixteen. Excluded from surveys are people in  mental or penal institutions and members of the armed forces. People qualify as  employed in two ways. First are those who, during a given period, have worked  as paid employees in someone else's company or in their own businesses or on  their own farms or have done fifteen hours or more of unpaid labor in a  family-operated enterprise. Second are those with jobs or in businesses from  which they have take temporary leave, paid or unpaid, because of illness, bad  weather, vacation, child-care problems, labor disputes, maternity or paternity  leave or other family or personal obligations. <br />
        Unemployed people are those not  working during the period in question, whether because they voluntarily  terminated their employment, in which case they are classified as job leavers,  or because they were involuntarily laid off, making them job losers. <br />
        </p>
      <p><br />
        Strong relationships exist between  the employment data and virtually every other indicator. The growth rate of non  farm payrolls is generally strongly correlated with the growth rate of GDP,  industrial production and capacity utilization, consumer confidence, spending,  and income. </p>
      <p align="left">&nbsp;</p>
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
            site_title: `Employment  Situation`,
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

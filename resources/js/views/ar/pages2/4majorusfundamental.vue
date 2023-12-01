<template>

    <div class="row gray_bg mrtb40">
        <div class="container">

            <br />
            <table width="680" border="0" align="center">
                <tr>
                    <td>

                        <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
                            <tr>
                                <td><span ><strong>&nbsp;&nbsp;&nbsp;What  type of Economic Data is Important?</strong></span></td>
                            </tr>
                        </table>

                        <p>Most major economies around the  globe collect and measure very similar forms of economic data. Sifting through  this data can be a bit daunting if you are not well prepared with an  understanding of what to look for. Furthermore, traders need to understand which  economic indicators carry the most weight, in terms of potential to impact the  market. Many economic indicators are considered of lesser importance to the  immediate price volatility of a currency. However, these same indicators pooled  together can collectively make their mark. <br />
                            <br />
                            In other words, one large indicator  can in and of itself impact a currency's value. On the flip side, one lower-end  economic indicator is unlikely to impact the market alone. Unfortunately, many  traders understand this concept without understanding the following: though one  lower-end or less significant economic indicator is unlikely to in and of  itself move the market, a group of smaller indicators can certainly impact a  currency... given that their collective sentiment negatively or positively  reflects a nation's economy. <br />
                            <br />
                            A serious fundamental trader will  first and foremost monitor the numbers and data of every major economic  indicator. As a secondary objective, the same fundamental analyst would note  the correlation of smaller or lower-end economic indicators, i.e. in a given  week is their collective data all negative or positive? </p>
                        <p >12  Major US Indicators</p>
                        <p>As a general guide, consider the  following 12 US economic indicators of key importance to the value of the US  dollar and the overall economic sentiment in the United States. Each indicator  is further broken down and described as you continue your reading of further  courses within this section of the university. Remember, various countries  around the globe will use some of these same economic indicators, perhaps  titled slightly differently, and of course will also have their own key  indicators, or means of measuring economic data. <br />
                            1. GDP (Gross Domestic Product)<br />
                            2. Indices of Leading, Lagging, and  Coincident Indicators<br />
                            3. The Employment Situation<br />
                            4. Industrial Production and  Capacity Utilization<br />
                            5. Institute for Supply Management  Indices <br />
                            6. Manufacturers' Shipments,  Inventories, and Orders<br />
                            7. Manufacturing and Trade  Inventories and Sales<br />
                            8. New Residential Construction<br />
                            9. Conference Board Consumers  Confidence and University of Michigan Consumer Sentiment<br />
                            10. Advance Monthly Sales for Retail  Trade and Food Services<br />
                            11. Personal Income and Outlays<br />
                            12. Consumer and Producer Price  Indices</p></td>
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
            site_title: `4 Major US Fundamental Indicators`,
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

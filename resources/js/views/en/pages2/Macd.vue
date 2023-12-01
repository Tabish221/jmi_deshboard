<template>


        <div class="row gray_bg mrtb40">
            <div class="container">

    <br />
<table width="680" border="0" align="center">
  <tr>


   <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
        <tr>
          <td><span ><strong>&nbsp;&nbsp;&nbsp;MACD</strong></span></td>
        </tr>
      </table>
      <br />




      <p >MACD (Moving Average Convergence / Divergence)</p>
    <p>After delving into the world of moving averages there is no better place to  go next than into the world of MACD. Why? Simple, the MACD is comprised of two  moving averages. Some traders argue that there is no better technical indicator  than that of the MACD, more often than not, this author tends to agree. The  theory behind MACD is really the same theory behind trading any other form of a  moving average cross. Generally a technical analyst can learn more from the  interaction of two moving averages than he or she can learn from a single  moving average in and of itself. </p>
    <p>The MACD uses two exponential moving averages, more specifically a 12 day  EMA and a 26 day EMA. The 12 day EMA is of course going to react to the market  more quickly than will the 26 day EMA. When prices in the market begin to rise  or trend upwards the 12 EMA will of course increase faster than will the 26  day. Visually this results in a MACD that is slanted upwards. Conversely when  prices fall or trend downwards the opposite will occur and the 12 day EMA will  decrease faster than will the 26 day, creating an obvious visual slant  downwards. The MACD does oscillate at what would be considered a zero line. In  other words, the MACD is either above or below the level that can be considered  the third part of the equation. Some analysts refer to this line as the signal  line, or the trigger line. Essentially this line is usually a 9 day exponential  moving average of the actual MACD itself. </p>
    <p>Whether you are a mathematician or not is hardly the point. One need not  really understand the complexities of the calculations within a MACD, but  rather it is only crucial to understand the basics of the math and what the  MACD is trying to tell us as technical traders. For that reason, we will not  further dissect the math. Instead, let us get to the point; how does a MACD  forecast successful trades? </p>
    <p>As is the case with trading moving average crosses, buy and sell signals  derived from a MACD will come from the crossing of two lines. However, these  two lines are not your two EMA lines, rather one is the combined level of the  two EMA lines and the second is the signal, or trigger line (the 9 day  exponential moving average of the actual MACD itself). The MACD crossing signal  line from above would indicate a sell order and conversely the MACD crossing  the signal line from below would indicate a buy order</p>
    <p align="center"><img src="/assets/cimages/khhg.jpg" /></p>
    <h2 >MACD as a Histogram</h2>
    <p>The lines plotted on the bottom of the MACD are trying to tell a story as  well, and traders had better listen up! Moving Average Convergence Divergence  was not randomly chosen as this indicator's name. Through the histogram we can  visually gauge convergence (moving average lines of MACD moving towards one  another) and divergence (moving average lines of MACD moving away from one  another).</p>
    <div align="center"><img src="/assets/cimages/fggfrfg.jpg" />
    </div>
    <p>Notice - as the moving average lines cross the histogram will show no lines  whatsoever, indicating to traders that lines (prices) should now start in a new  direction. Very rarely does the  histogram reach the point of a cross (two lines crossing and no line plotted on  the histogram) and then plot lines in the same direction as the previous  section of the histogram. In other words, if there is a legitimate cross, the  histogram should begin indicating a new price direction. </p>
    <div align="center"><img src="/assets/cimages/hkhjg.jpg" />
    </div>
    <p>Consider the following strategy: watch the histogram for points where no  lines or very small lines are drawn (indicating a cross), then look for strong  lines up or down from that point. If after a cross, the histogram begins to  plot lines at a sharp angle up or down, such should be considered an indication  of a strong directional change in the market. </p>
    <div align="center"><img src="/assets/cimages/kgnh.jpg" />
    </div>
    <p>If the MACD crosses, but the  histogram plots a series of lines at a weak angle, perhaps the market it  momentarily retracing, but overall trends may not be changing. </p>
    <div align="center"><img src="/assets/cimages/kggy.jpg" />
    </div>
    <p>Now take a look at the complete picture, <em>figure 6</em> shows an example of  two trades that should have been avoided on the MACD and one opportunity that  shouldn't have been overlooked. The first directional change is weak, lines  essentially move sideways. The second directional change is strong, prices dive  immediately and just three lines into the histogram a trader wise enough to  short the market still has 70 pips left in this downward move. The third  directional change is again weak, and is nothing more than a retracement... and  indication to the trader that shorted the second move that he or she might want  to secure profits... but not enter a new trade. </p>
    <div align="center"><img src="/assets/cimages/bnhj.jpg" />
    </div>
    <p align="left">&nbsp;</p>
  </tr>
</table>
<p>&nbsp;</p>
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
            site_title: `MACD`,
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
.style103 {
    color: #FFFFFF;

}
.style104 {
    color: #a6c54c;
    font-weight: bold;
}
.style105 {color: #C10C1B}
</style>

<template>





       <br />
    <div class="table-responsive">
<table width="680" border="0" align="center">
  <tr>
    <td> div="table-responsive">
    <table class="table" width="680"  height="37" border="0" background="/assets/cimages/bg_1.jpg">
      <tr>
        <td><span class="style59"><strong>&nbsp;&nbsp;&nbsp;&nbsp;What is Margin?</strong></span></td>
      </tr>
    </table>
      <p>In the Forex market the term margin  is most often referring to the amount of money required to open a leveraged  position, or a contract in the market. It may also be used to describe the type  of account, i.e. margin account; meaning that an account is being traded on borrowed  funds. It is generally safe to assume that all off-exchange retail foreign  currency (or Forex) traders are trading within margined accounts. <br />
Without leverage, or the ability to  trade on borrowed funds, a trader placing a standard lot trade in the market  would need to post the full contract value of $100,000 in order to have his or  her trade executed. Trading with a margined account allows traders to utilize  leverage, meaning that the same $100,000 contract can be placed for an amount  of margin determined by the set level of leverage. An account at 100:1 leverage  would require $1,000 of margin to place a $100,000 trade. <br />
The table shown in figure 1  illustrates the amount of margin required to open standard, mini and micro  contracts, also referred to as lots. As can be seen, at 1:1 leverage (no  leverage at all) the full value of a contract is required. The table  illustrates the required amount of equity on margin per lot traded.</p>
    <p align="center"><img src="/assets/cimages/vguty.jpg" /></p>
    <p>Default leverage levels for new  accounts are set at 200:1 for Mini accounts and 100:1 for Standard accounts. *  These levels have been set by JMI, and will likely vary from broker to broker  within the retail Forex industry. <br />
* 200:1 is the entry leverage value.  Since most brokerages will have margin calls set at different level, exact  leverage may vary. <br />
Simply stated, trading Forex on  margin increases your buying power. As an example: a trader with $10,000 in a  margin account that allows 100:1 leverage, would be able to purchase a maximum  of $1,000,000 in currency contracts (10 standard lots). At 100:1 leverage 1% of  the contract value is required as collateral. <br />
By trading on margin, traders can  potentially increase their total return on investment with less cash outlay.  Trading on margin should be used wisely as it magnifies both your potential  profits AND potential losses. A good rule of thumb to follow is the higher the  margin, the greater the risk. </p>
    <p>&nbsp;</p>
    <p class="style64">Margin  Trading Example</p>
    <p>A trader with a $10,000 account  balance decides that the US Dollar (USD) is undervalued against the Euro (EUR).  The current bid/ask price for EUR/USD is 1.2348/1.2350 - meaning a trader can  buy 1 EUR for $1.2350 USD or sell 1 EUR for $1.2348 USD. The trader decides to  sell EUR (buy dollars) by selling 1 standard lot. With leverage at 100:1 or 1%,  initial margin deposit for this trade is $1,000, leaving the account balance at  $9,000. As anticipated, the EUR/USD drops 48 pips to 1.2298/1.2300. To exit the  position the trader would close 1 lot at 1.2300 In this scenario the trader has  realized a profit of 48 pips or $480 US Dollars. <br />
    Trading with a heavily margined  account is a double-edged sword. Trading utilizing high leveraged accounts can  potentially increase profits, but it increases your risk of potential losses.  Most brokers have standard leverage levels - 100:1, 200:1 or even 400:1.  Remember, the higher the leverage, the higher the risk. Traders in the Forex  market are subject to the margin rules set by their chosen brokers. In order to  protect themselves and their traders, brokers in the Forex market set margin  requirements and levels at which -s are subject to margin calls. A margin  call would occur when a - is utilizing too much of their available margin  (cash deposit towards an open position). Spread across too many loosing trades,  an over margined account can give a broker the right to close a trader's open  positions. </p>
    <p>&nbsp;</p>
    <p class="style61">Managing  a Margin Account</p>
    <p>It is important that traders new to  the Forex market take the time to understand the risk associated with trading  in a margined account. <br />
      Every trader should be clear on the  parameters of their own account, i.e. at what level does their broker consider  them subject to a margin call. Be sure to read the margin agreement in the  account application when opening a live account. <br />
      The positions in a trading account  could be partially or totally liquidated should the available margin  (&quot;Free Margin&quot;) in the account fall to the predetermined threshold of  50% margin level. * This is a level set by JMI, other brokers may have margin  call levels set differently. <br />
    Traders should monitor margin  balance on a regular basis and utilize stop-loss orders to limit downside risk.  However, due to the extreme volatility that can be found in the Forex market,  stop-loss orders are not always an effective measure in limited downside risk.  There is still the possibility of losing all, or more, of your original  investment. </p>
    <p>&nbsp;</p>
    <p class="style62">Calculating  Your Margin Capability</p>
    <p>The maximum available margin is 1%  (100:1 leverage) for standard accounts and 0.5% (200:1) for mini accounts.  Traders always have the option of setting a lower level of leverage. Doing such  may help some traders manage their risk, but bear in mind that a lower level of  leverage will of course mean that larger margin deposits will need to be made  in order to control the same size contracts. <br />
        <strong><em>Margin = (Contract size / Leverage)</em></strong> <br />
      The requirements for leverage may  vary with account size or market conditions, and may be changed from time to  time at the sole discretion of JMI. Please refer to your trading agreement for  details. <br />
    If maximum leverage is employed,  traders must maintain the minimum margin requirement on their open positions at  all times. It is the customer's responsibility to monitor his/her margin  account balance. JMI Brokers has the right to liquidate any or all open positions whenever  a trader's minimum margin requirement is not maintained. This is an important  risk management feature designed to strictly limit trading losses in your  account. </p>
    <p>&nbsp;</p>
    <p class="style63">Margin  Example</p>
    <p>To calculate the margin required to  execute 4 mini lots of USD/JPY (40,000 USD) at 200:1 leverage in a $500 mini  account, simply divide the deal size by the leverage amount e.g. (40,000 / 200  = 200). $200 margin will be required to place this trade, leaving an additional  $300 marginable balance in the trading account. <br />
      The trading platform automatically  calculates margin requirements and checks available funds before allowing a  trader to successfully enter a new position. If there are not adequate funds  available to enter a new position, traders will receive a &quot;Not Enough  Money&quot; message when attempting to place the trade. <br />
    *For a further explanation on  calculating margin percentages and the potential for a margin call, please see  the following course. </p>    <p class="style60">&nbsp;</p></td>
  </tr>
</table>
</div>



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
            site_title: `What is Margin?`,
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
.style59 {
    color: #FFFFFF;

}
.style60 {
    color: #a6c54c;
    font-weight: bold;
}
.style61 {
    color: #a6c54c;
    font-weight: bold;
    font-size: 20px;
}
.style62 {
    color: #a6c54c;
    font-weight: bold;
    font-size: 20px;
}
.style63 {
    color: #a6c54c;
    font-weight: bold;
    font-size: 20px;
}
.style64 {
    color: #a6c54c;
    font-weight: bold;
    font-size: 20px;
}
</style>

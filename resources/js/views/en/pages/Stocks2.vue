<template>


    <div class="row gray_bg">
        <img src="/assets/img/sockscover.jpg" alt="" class="img-responsive center-block picHeight" />
    </div>



    <div class="stocksContent">
        <h2 class="bold-blue">Stock CFDs</h2>
        <div>
            <p class="ParaCollapse"> JMI Brokers is proud to offer a wide range of the most traded US & EU Stock CFDs, with a leverage of up to 1:5 and zero commissions*.
                Stock trading involves the buying and selling of shares in a particular asset or company. A stock trader will purchase shares, own them, then sell them, depending on the market value of the stock.
                Stock CFDs, on the other hand, allow you to trade the price movements of a particular asset or company, without the purchase of the physical shares themselves. With stock CFDs on MetaTrader4, traders can open a long (buy) position if the belief is that the value of the stock will go up, or a short (sell) position, if the belief is that the value of a stock will go down.</p>
            <h3 class="bold-blue">List of Available Stocks</h3>
            <ul class="nav nav-tabs" style="margin-bottom: 30px;">
                <li class="active"><a data-toggle="tab" href="#menu1" >US Shares</a></li>
                <li><a data-toggle="tab" href="#menu2" >UK Shares</a></li>
                <li style="display:none;"><a data-toggle="tab" href="#menu3" >EU Shares</a></li>
            </ul>

            <div class="tab-content">
                <div id="menu1" class="tab-pane fade in active">
                    <iframe src="/en/datatable4"></iframe>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <iframe src="/en/datatable5"></iframe>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <iframe src="/en/datatable6" ></iframe>
                </div>
            </div>
            <h3 class="bold-blue headStocks">How to Calculate your Profit or Loss</h3>
            <p class="pStocks">The formula for working out your profit or loss for any CFD share is as follows:</p>
            <p class="pStocks">Long: (Buying) profit or loss = (exit price – entry price) * lots traded</p>
            <p class="pStocks">Short: (Selling) profit or loss = (entry price – exit price) * lots traded</p>
            <h3 class="blue headStocks">Example A:</h3>
            <p class="pStocks">You decide to buy 100 AAPL CFDs at $45 ,</p>
            <p class="pStocks">The share price rises to $50 based on the company’s quarterly earnings.</p>
            <p class="pStocks">You sell 100 AAPL CFDs at $50</p>
            <p class="pStocks">Using the formula above for a long trade:</p>
            <p class="pStocks">Profit or loss = (exit price – entry price) * lots traded</p>
            <p class="pStocks">The result would be +$500</p>
            <h3 class="blue headStocks">Example B:</h3>
            <p class="pStocks">You decide to sell 5 Amazon CFDs at $1,900 as you are expecting the price to fall.</p>
            <p class="pStocks">However, the price goes up based on increasing company sales.</p>
            <p class="pStocks">Therefore, you decide to close your position at the price of $1,919.</p>
            <p class="pStocks">Using the formula above for a short trade:</p>
            <p class="pStocks">Profit or loss = (entry price – exit price ) * lots traded</p>
            <p class="pStocks">The result would be -$95.</p>
            <h3 class="bold-blue headStocks">Corporate Actions Formula</h3>
            <p class="pStocks">The basic formula used is d = p x n</p>
            <p class="pStocks">d = dividend</p>
            <p class="pStocks">p = position</p>
            <p class="pStocks">n = dividend declared/number of index points (dividend amount)</p>
            <p class="pStocks">Here’s the calculation we use for the dividend for equities:</p>
            <p class="pStocks">A client opens a long (buy) position on 10,000 CFD shares of Apple (AAPL.OQ), with a net dividend declared at 2p.</p>
            <p class="pStocks">The calculation is:</p>
            <p class="pStocks">d = 10,000 x 0.02 = $200 (credited).</p>
            <p class="pStocks">Another example we can look at is that a client opens a short (sell) position on 5,000 CFD shares of Deutsche Bank (DBKGn.DE), with a net dividend declared at 5p.</p>
            <p class="pStocks">The calculation is: d = 5,000 x 0.05 = €250 (debited).</p>
            <h3 class="bold-blue headStocks">Commission on Stock CFDs*:</h3>
            <p class="pStocks">*JMI Brokers is running ‘0 Commissions Promotion’ across all stock CFDs. This promotion is valid on Starter Accounts for a limited time only.</p>
            <p class="pStocks">The commission applicable on shares is 0.0016 based on the notional value of the number of shares traded as following.</p>
            <h4 class="blue-center exStocks">(Lots * shares price * commission percentage)</h4>
            <h4 class="blue exStocks">Example:</h4>
            <p class="pStocks">For example, let’s say a client opens a long (buy) position with 10 CFD shares of Apple (AAPL.OQ).</p>
            <p class="pStocks">The market price at the time is 160 USD, and the commission is 0.0016 Therefore, the commission calculation is:</p>
            <p class="pStocks">10 shares * $160 * 0.0016 =$2.5</p>
            <p class="pStocks">For more information on trading Stock CFDs, feel free to contact your account managers. </p>
            <p class="pStocks">For any other inquiries, please email support@JMI Brokers.com.</p>
            <p class="pStocks">To start trading Stock CFDs:</p>
            <a href="/en/signup" class="slide-live-button uk-border-rounded" style="ackground-color: #ffc926; color: #0059b2; padding: 15px 20px; font-family: sans-serif; font-size: 16px; font-weight: bold; text-transform: uppercase; margin: 5px;"><i class="fas fa-scroll uk-margin-small-right"></i>Open Live Account</a>
        </div>
        <a class="read" href="/en/commodities">Read more ...</a>
    </div>

</template>

<script>
import { useHead } from '@vueuse/head'
import {computed, reactive, ref} from "vue";
import axios from 'axios';
import {useRouter} from "vue-router";
import ('jquery')
import jquery from 'jquery'
window.jQuery = jquery
import $ from 'jquery'
import('/wave/js/vendors/bootstrap.min.js')

const errors = ref()
const router = useRouter();

export default ({
    data(){
        return{
            site_title: `Stock CFDs`,
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
<style>
.read
{
    color: #0059b2;

    font-weight: bold;
    font-size: 21px;
    text-decoration: underline;
}
.stocksContent
{
    margin:0px 30px 0px 60px !important
}
.nav-tabs>li.active
{
    background-color: white !important;
}
.nav>li>a
{
    color-:#0059b2;
    font-size-:18px !important;
    font-family: Roboto-Light;
}
h3,h4
{
    font-family: Roboto-Light;
}
.bold-blue
{
    color: #0059b2;
    font-weight: bold;
    font-family: Roboto-Bold;
}
.blue
{
    color: #0059b2;
}
.blue-center
{
    color:#888888;
    text-align:center;
}
.btnStocks
{
    background-color: #ffc926;
    border: none;
    padding: 7px 15px;
    color: white;
    border-radius: 5px;
    font-family: 'Roboto-Light';
    font-size: 17px;
}
iframe
{
    border: none;
}
p
{
    color:#888888;
    font-family: Roboto-Light;
}
#menu1 iframe
{
    width: 100%;
    height: 1420px;
}
#menu2 iframe
{
    width: 100%;
    height: 540px;
}
#menu3 iframe
{
    width: 100%;
    height: 495px;
}
@media only screen and (max-width: 897px)
{
    #menu1 iframe
    {
        height: 1250px;
    }
    #menu2 iframe
    {
        height: 470px;
    }
    #menu3 iframe
    {
        height: 466px;
    }
}
@media only screen and (max-width: 768px)
{

}
@media only screen and (max-width: 550px)
{
    .stocksContent
    {
        margin:0px 10px 0px 40px !important
    }
    #pagList
    {
        margin-bottom:0px;
    }
    #menu1 iframe
    {
        height: 1200px;
    }
    #menu2 iframe
    {
        height: 450px;
    }
    #menu3 iframe
    {
        height: 450px;
    }
    .nav>li>a
    {
        padding:8px;
        font-size:12px !important;
    }
    p
    {
        font-size:12px;
    }
    h2
    {
        font-size: 25px;
    }
    h3
    {
        font-size: 18px;
    }
    h4
    {
        font-size: 16px;
    }
    .btnStocks
    {
        padding: 7px 4px;
        font-size: 13px;
    }
    .blue-center
    {
        font-size: 14px;
    }
}



</style>

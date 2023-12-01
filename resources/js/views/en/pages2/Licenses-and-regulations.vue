<template>

<link rel="canonical" href="https://www.jmibrokers.com/en/licenses-and-regulations " />

 <div class="row gray_bg">
        <img src="/assets/img/License.jpg" alt="" class="img-responsive center-block picHeight" />
    </div>

    <div class="row gray_bg mrtb40">
        <div class="container">
            <h1> Licenses and Regulations</h1>
            <p>
                It is essential when selecting a broker to make sure that they are licensed & regulated by a credible governmental body. Each licensing authority monitors the working practices of financial companies, ensuring that all regulations are strictly adhered to.
                <br />

            </p>
            <div class="speacer20"></div>




            <h4> <img loading="lazy" src="/wave/img/vanatua-flag.png" style="width:25px;height:25px;" /> Vanuatu Financial Services Commission (VFSC)</h4>
            <p>
                JMI Brokers LTD is a licensed Financial Services Provider from Vanuatu Financial Services Commission and authorized to carry business on Dealing in Securities under <br /><a class="links" href="https://www.vfsc.vu/70-prevention-of-fraud-investments-act/" target="_blank"> registration number 15010</a>
            </p>
            <p>
                Founded 2009. A Commonwealth licensed company with 3 licenses from the Financial Securities Authority VFSC Licence No. 15010 for trading in currencies, metals, shares of United States companies listed on the New York and Nasdaq exchanges, shares of British companies listed on the London Stock Exchange, goods, energy, and crypto cryptocurrencies and other CFDs . The company and all its shares are wholly owned by the Swiss European company JMI Brokers Holding AG , registered in Swiss commercial register CHE-334.229.499. Zug - Switzerland 🇨🇭. Most importantly, it is JMI Brokers with a full advance and guaranteed client deposits up to $500,000 through an insurance policy advertised on the company's official website.

            </p>

            <img loading="lazy" src="/assets/img/vanuatu-license.png" altr="Vanuatu License" style="width:100%;display:none;"/>

            <h4 style="color: #0059b2; font-weight: bold;">(VFSC) License Benefits</h4>
            <ul style="padding-left:10px;">
                <li>Financial protection of customer deposits up to $500,000</li>
                <li>The bond of 5 million VATU must be deposited with and kept by the VFSC.  </li>
                <li style="display:none;">The bond has been increased in 2017 from 200.000 VATU to 5 million VATU. </li>

                <li style="display:none;"> A bank reference letter and a recent bank statement as proof of source of funds to
                    pay the Capital for each of the ultimate beneficial owner(s). </li>

                <li style="display:none;">The VFSC isrequesting a letterfrom the Bank of the applicant confirming the licensee’s
                    status and liquidity as a confirmation of source of funds. The capital in this context <br />

                    means paying the bond deposit but also the funds required to set the Financial
                    business in motion. In case a client cannot provide a bank statement/letter, then it’s
                    a cause to refuse the application. </li>

                <li style="display:none;"> A statement outlining the financial standing affairs, current assets, and contingent
                    liabilities of the company</li>

                <li> A license must have adequate insurance cover, including professional indemnity
                    insurance indemnity for partners and employees, former partners and employees, and
                    consultants, to serve as a protection for the investor’s funds in the event of financial
                    loss. The minimum insurance cover for each licensee has been revised in January 2019
                    and must be: </li>

                <li>
                    <ol id="sortedList" type="i">
                        <li>5.000.000 VT (+/- 50.000 USD) for each claim,</li>
                        <li>with an aggregate cover of not lessthan 50.000.000 VT (+/- 500.000 USD) and,</li>
                        <li>a maximum deductible amount of 10.000.000 VT (+/- 100.000 USD)</li>
                    </ol>
                </li>


            </ul>
            <br />
            <a  class="links" href="/assets/Downloads/JMI BROKERS LIMITED PI COVER.pdf" title="Anti Money Laundering">Deposit Insurance Contract</a><br />
            <br />
            <a class="links" href="/assets/Downloads/JMI Brokers Ltd AML New.pdf#toolbar=0" target="_blank" title="Anti Money Laundering">AML & CTF Procedure Manual</a><br />

            <p>VFSC strictly follows the international legal regulation and adhere to all anti-money laundering laws.</p>

            <h4 style="display:none;">2- <img loading="lazy" src="/assets/img/drawn-switz-icon-dark.png" style="width:25px;height:25px;" /> Swiss Legal</h4>
            <p style="display:none;">
                JMI Brokers AG, (100% Subsidiary of JMI Brokers LTD )  is a Swiss legal Corporation with its registered office in Zug with registration <a href="/assets/downloads/CHE.pdf" ># CHE 334-229-499 </a>
            </p>

        </div>
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
            site_title: `Licenses and Regulations`,
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
<style>
.links
{
    text-decoration: underline;
    font-size: 18px;
    color: #337ab7 !important;

}
#sortedList li
{
    list-style-type:inherit;
    padding-left:20px;
    margin-top:5px;
}
</style>

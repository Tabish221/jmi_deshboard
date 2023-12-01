<template>


	    <div class="row  mrtb40">
            <div class="container">
						<h1>Why JMI Brokers</h1>
            <h2>Safety of clients funds</h2>
                <h2> Licenses and Regulations</h2>
                <p>
                    It is essential when selecting a broker to make sure that they are licensed & regulated by a credible governmental body. Each licensing authority monitors the working practices of financial companies, ensuring that all regulations are strictly adhered to.
                    <br />

                </p>
                <div class="speacer20"></div>

                <h4 style="display:none;">1- <img src="/assets/img/drawn-switz-icon-dark.png" style="width:25px;height:25px;" /> Swiss Legal</h4>
                <p style="display:none;">
JMI BROKERS AG, is a Swiss legal Corporation with its registered office in Zug with registration <a href="/assets/downloads/CHE.pdf" ># CHE 334-229-499 </a>
                </p>



                <h4>1- Republic of Vanuatu License</h4>
                <p>
                   JMI Brokers LTD is a licensed Financial Services Provider from Vanuatu Financial Services Commission and authorized to carry business on Dealing in Securities under <a href="/assets/Downloads/Vanuatu-license.pdf"> registration number 15010</a>
                </p>
								<p>
								The VFSC regulator completely controls the activities of market participants and ensures compliance with international standards, in particular, the provision of brokerage services by licensed companies. The regulator guarantees transparency of work and confirms that only companies with a high reliability degree can obtain the right to obtain a license for financial activities in the registrar’s jurisdiction.

								</p>
								<p>VFSC strictly follows the international legal regulation and adhere to all anti-money laundering laws.</p>
								<a href="/assets/Downloads/AML-Policy.pdf" title="Anti Money Laundering">Anti Money Laundering</a><br />
								<img src="/assets/img/vanuatu-license.png" altr="Vanuatu License" style="width:100%;"/>

            </div>
        </div>


            <div class="container">


                <div class="speacer20"></div>
                <h2>Automated risk management</h2>
                <p>
                 JMI Brokers LTD’s automated risk management system is designed to reduce the risk of your trading account being depleted to zero or turning negative.
                </p>
            </div>











	    <div class="row  mrtb40">
            <div class="container">

            	<h1>Our support and services </h1>
            	<h2>Phone trading 24/7 </h2>
            	<h2>Fast withdrawal 1 business day  </h2>

	        </div>
	    </div>



	    <div class="row  mrtb40">
            <div class="container">

            	<h1>Our Execution </h1>
            	<h2>No dealing desk </h2>
            	<h2>Only 2nd automated </h2>
            	<h2>Fixed spread trading </h2>

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
            site_title: `Why JMI Brokers`,
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

    },
    methods:{
    }
});
</script>

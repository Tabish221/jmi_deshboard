<template>

<link rel="canonical" href="https://www.jmibrokers.com/en/introducingbrokers " />
<div class="row gray_bg">
            <img src="/assets/img/Introducing_Broker2.jpg" alt="" class="img-responsive  picHeight" />
        </div>

        <div class="row gray_bg mrtb40">
            <div class="container">
                <h2>Introducing Broker</h2>

<p>JMI Brokers LTD  provides a popular Introducing Broker (IB) Programme to individuals and corporate clients across the globe. The Programme enables IBs to collect commission by bringing new business to JMI. The compensation IBs can accumulate is based on the trading activity of the clients introduced to JMI. Our IBs work in accordance with their region’s regulations in addition to those applying in the UAE and are committed to continuously generating profitable business through a sustainable business plan.</p>


                <h2>As an IB for JMI Brokers you can benefit from:</h2>

	                 <div class="speacer10"></div>
					<ul class="li1">
					<li>A dedicated, friendly and experienced multilingual support team;</li>
					<li>Competitive rebate conditions paid in real-time* to your Agent account as your clients trade;</li>
					<li>A tailored service to accommodate your commercial requirements;</li>
					<li>Stress-free and smooth client on boarding;</li>
					<li>24/7 access to your Agent account and online statements;</li>
					<li>A personalised link to facilitate the identification of clients you introduce to JMI.</li>
					<li>Comprehensive weekly report to assist you in keeping track of the introduced clients;</li>
					<li>Back office administrative support;</li>
					<li>Adding to your revenue line without adding to your cost base. </li>
					</ul>


                <h2>Depending on trading platform.</h2>
						<p>Whatever your business requirements, JMI Brokers will surely find the right solution for you. To find out more about our IB Programme, please call us at +97144096705</p>
						<p>Alternatively, if you have any questions and/or wish to be contacted by us to learn more about our IB Programme, please <a href="/en/callbackrequest"> request a call back </a> </p>

                <div class="speacer20"></div>
                 <div class="speacer20"></div>



                <a href="/en/become-partner"  class="become-partner slide-live-button">Become Our Partner</a>


                <div class="speacer20"></div>

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
            site_title: `Introducing Broker`,
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

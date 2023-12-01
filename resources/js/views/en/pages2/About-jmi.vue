<template>
<link rel="canonical" href="https://www.jmibrokers.com/en/about-jmi " />
          <div class="row gray_bg">
          <div class="row gray_bg">
            <img src="/assets/img/clip_image002.jpg" alt="" class="img-responsive center-block picHeight" />
        </div>


        <div class="container">
            <div class="row gray_bg mrtb40">
                <h1 >    About JMI Brokers Group</h1>
                <p>
                    It is essential when selecting a broker to make sure that they are licensed & regulated by a credible governmental body. Each licensing authority monitors the working practices of financial companies, ensuring that all regulations are strictly adhered to. <br />
Today, JMI Brokers gives its clients the opportunity to trade a wide range of instruments including Forex Currency pairs, Futures (OTC), Precious Metals, Indices, and Energies that are quoted on major world exchanges.
<br /><br />
Within years, it has become a prominent Financial Services Company, with a vast clientele based in Europe, Middle East, Gulf, North Africa and the Far East.
JMI Group is a leading, independent FOREX, derivatives, equity and commodity trading house. <br />
The Company offers Retail, Institutional, IB and White Label clients an integrated approach to trading diverse financial products. This is done via state of the art, automated trading platforms and risk management systems. Over the past three years we have implemented a wide range of enhancements across all areas of our business.<br />
Growth has been achieved through a combination of strong leadership, product diversification, excellent technology and a corporate culture that attracts and retains high caliber employees and encourages initiative and innovation.<br />
We now have some of the widest ranging and most technologically advanced resources in our industry - and through our growing international network of offices we are able to meet our customers trading needs virtually anywhere in the world, 24 hours a day.<br />
Unlike other retail FX brokers, JMI Brokers has distinguished itself as an industry leader with its unique "no dealing desk" agency model, proprietary tools and services, and focus on customer care. This has led to longer term and more profitable relationships and has also manifested itself in the numerous awards and industry accolades that JMI Brokers has compiled.<br />
However, it is due to the efforts and dedication of our people that we have won an excellent reputation in this highly competitive industry. <br />
This website will give you a brief insight into the world of JMI. We do hope you find it informative but the best way to truly experience the JMI Brokers difference is to get in touch with us!
                </p>
            </div>
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
            site_title: `About JMI Brokers Group`,
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

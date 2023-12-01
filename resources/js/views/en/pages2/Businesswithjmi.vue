<template>


<div class="row gray_bg">
            <img src="/assets/img/businesswithjmi.jpg" alt="" class="img-responsive center-block picHeight" />
        </div>

        <div class="row gray_bg mrtb40">
            <div class="container">
                <h2>Partnerships</h2>
      <p>
          <span >AS JMI Brokers We offer a  full range of <br />
        Introducing Broker  Partnership Services<br />
        Tailored to each  client's individual needs</span><br />
        <br />
        Each partner has different  requirements, therefore we are flexible both in the solutions we provide and in  the commercial terms we agree.<br />
        <br />
      For IB partnership details or If you  would like further information about our partnership services please contact us <a href="mailto:partners@jmibrokers.com">partners@jmibrokers.com</a> or call us <img border="0" width="1" height="1" src="Partners_clip_image005.html" />+97144096705 We would be delighted to help.
      </p>
      <div align="center">
        <hr size="2" width="100%" align="center" />
      </div>
              <div class="speacer20"></div>

                <h2>JMI Group Clients</h2>
        <br />
        Internationally we offer a full  service approach to trading financial products for clients such <br />
      as small banks and hedge funds, brokers, private offices, high net worth  individuals and private retail clients. Our aim is to deliver the best  platforms, transparent, competitive pricing and higher levels of service than  the traditional service providers.


                <h2>Introducing Brokers</h2>
      Our Introducing Broker (IB) programme  allows organizations around the world to be remunerated for introducing new  clients to us. We offer a total solution, from provision of the trading  platforms to execution and settlement of transactions. An account manager is  appointed to each IB to help them develop their business and to ensure we  provide the highest levels of service.

                 <div class="speacer10"></div>

                 <h2>Institutional Clients</h2>
      Our bespoke institutional services  meet the needs of small and medium sized financial institutions and banks  looking to widen their product offering, with full professional support.

                 <div class="speacer20"></div>

                <h2>Global Partnerships</h2>
        <br />
        Even with increasing use of the  internet, the world is a very large place! We actively seek mutually beneficial  partnerships with organizations across the globe. We are there to provide the  trading platforms, market access, product expertise and supporting  infrastructure. Our partners have the<br />
        in-depth local market knowledge necessary to provide the highest levels of  service that their<br />
    customers demand.

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
            site_title: `Business With JMI Brokers`,
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

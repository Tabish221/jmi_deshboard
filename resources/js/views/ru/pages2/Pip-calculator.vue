<template>

    <div class="row gray_bg">


        <div class="container">
            <div class="row gray_bg mrtb40">
                <h1>{{this.site_title}}</h1>


            <div class="table-responsive">
                <table class="pipCalcResults table table-responsive" id="results">
                    <iframe src="/ru/pip-calculator2/" scrolling="no" style="width: 100%;height:100%;min-height: 1200px;"></iframe>
                </table>




            </div>
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


    directives: {
        'raw-html': (el, binding) => {
    el.innerHTML = binding.value;
    }
    },
    data(){
        return{
            site_title: ``,
            site_description: ``,
            site_keywords: '',
            calculator1: '\\n<thead>\\n<tr>\\n<th>Currency<\\/th>\\n<th>Price<\\/th>\\n<th>\\nStandard Lot <div class=\\"arial_11 noBold\\">(Units 100,000)<\\/div>\\n<\\/th>\\n<th>\\nMini Lot <div class=\\"arial_11 noBold\\">(Units 10,000)<\\/div>\\n<\\/th>\\n<th>\\nMicro Lot <div class=\\"arial_11 noBold\\">(Units 1,000)<\\/div>\\n<\\/th>\\n<th>Pip Value<\\/th>\\n<\\/tr>\\n<\\/thead>\\n<tbody>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/aud-cad\\">AUD\\/CAD<\\/a>\\n<\\/td>\\n<td id=\\"price_47\\">\\n0.8782 <\\/td>\\n<td id=\\"standard_47\\">\\n7.61 <\\/td>\\n<td id=\\"mini_47\\">\\n0.76 <\\/td>\\n<td id=\\"micro_47\\">\\n0.08 <\\/td>\\n<td class=\\"bold\\" id=\\"value_47\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/aud-chf\\">AUD\\/CHF<\\/a>\\n<\\/td>\\n<td id=\\"price_48\\">\\n0.5980 <\\/td>\\n<td id=\\"standard_48\\">\\n11.17 <\\/td>\\n<td id=\\"mini_48\\">\\n1.12 <\\/td>\\n<td id=\\"micro_48\\">\\n0.11 <\\/td>\\n<td class=\\"bold\\" id=\\"value_48\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/aud-jpy\\">AUD\\/JPY<\\/a>\\n <\\/td>\\n<td id=\\"price_49\\">\\n95.88 <\\/td>\\n<td id=\\"standard_49\\">\\n696.90 <\\/td>\\n<td id=\\"mini_49\\">\\n69.69 <\\/td>\\n<td id=\\"micro_49\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_49\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/aud-nzd\\">AUD\\/NZD<\\/a>\\n<\\/td>\\n<td id=\\"price_50\\">\\n1.0827 <\\/td>\\n<td id=\\"standard_50\\">\\n6.17 <\\/td>\\n<td id=\\"mini_50\\">\\n0.62 <\\/td>\\n<td id=\\"micro_50\\">\\n0.06 <\\/td>\\n<td class=\\"bold\\" id=\\"value_50\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/aud-usd\\">AUD\\/USD<\\/a>\\n<\\/td>\\n<td id=\\"price_5\\">\\n0.6682 <\\/td>\\n<td id=\\"standard_5\\">\\n10.00 <\\/td>\\n<td id=\\"mini_5\\">\\n1.00 <\\/td>\\n<td id=\\"micro_5\\">\\n0.10 <\\/td>\\n<td class=\\"bold\\" id=\\"value_5\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/cad-jpy\\">CAD\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_51\\">\\n109.17 <\\/td>\\n<td id=\\"standard_51\\">\\n696.90 <\\/td>\\n<td id=\\"mini_51\\">\\n69.69 <\\/td>\\n<td id=\\"micro_51\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_51\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/chf-jpy\\">CHF\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_13\\">\\n160.32 <\\/td>\\n<td id=\\"standard_13\\">\\n696.90 <\\/td>\\n<td id=\\"mini_13\\">\\n69.69 <\\/td>\\n<td id=\\"micro_13\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_13\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-aud\\">EUR\\/AUD<\\/a>\\n<\\/td>\\n<td id=\\"price_15\\">\\n1.6334 <\\/td>\\n<td id=\\"standard_15\\">\\n6.68 <\\/td>\\n<td id=\\"mini_15\\">\\n0.67 <\\/td>\\n<td id=\\"micro_15\\">\\n0.07 <\\/td>\\n<td class=\\"bold\\" id=\\"value_15\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-cad\\">EUR\\/CAD<\\/a>\\n<\\/td>\\n<td id=\\"price_16\\">\\n1.4343 <\\/td>\\n<td id=\\"standard_16\\">\\n7.61 <\\/td>\\n<td id=\\"mini_16\\">\\n0.76 <\\/td>\\n<td id=\\"micro_16\\">\\n0.08 <\\/td>\\n<td class=\\"bold\\" id=\\"value_16\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-chf\\">EUR\\/CHF<\\/a>\\n<\\/td>\\n<td id=\\"price_10\\">\\n0.9768 <\\/td>\\n<td id=\\"standard_10\\">\\n11.17 <\\/td>\\n<td id=\\"mini_10\\">\\n1.12 <\\/td>\\n<td id=\\"micro_10\\">\\n0.11 <\\/td>\\n<td class=\\"bold\\" id=\\"value_10\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-gbp\\">EUR\\/GBP<\\/a>\\n<\\/td>\\n<td id=\\"price_6\\">\\n0.8578 <\\/td>\\n<td id=\\"standard_6\\">\\n12.72 <\\/td>\\n<td id=\\"mini_6\\">\\n1.27 <\\/td>\\n<td id=\\"micro_6\\">\\n0.13 <\\/td>\\n<td class=\\"bold\\" id=\\"value_6\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-jpy\\">EUR\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_9\\">\\n156.59 <\\/td>\\n<td id=\\"standard_9\\">\\n696.90 <\\/td>\\n<td id=\\"mini_9\\">\\n69.69 <\\/td>\\n<td id=\\"micro_9\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_9\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-nzd\\">EUR\\/NZD<\\/a>\\n<\\/td>\\n<td id=\\"price_52\\">\\n1.7683 <\\/td>\\n<td id=\\"standard_52\\">\\n6.17 <\\/td>\\n<td id=\\"mini_52\\">\\n0.62 <\\/td>\\n<td id=\\"micro_52\\">\\n0.06 <\\/td>\\n<td class=\\"bold\\" id=\\"value_52\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-usd\\">EUR\\/USD<\\/a>\\n<\\/td>\\n<td id=\\"price_1\\">\\n1.0913 <\\/td>\\n<td id=\\"standard_1\\">\\n10.00 <\\/td>\\n<td id=\\"mini_1\\">\\n1.00 <\\/td>\\n<td id=\\"micro_1\\">\\n0.10 <\\/td>\\n<td class=\\"bold\\" id=\\"value_1\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-aud\\">GBP\\/AUD<\\/a>\\n<\\/td>\\n<td id=\\"price_53\\">\\n1.9042 <\\/td>\\n<td id=\\"standard_53\\">\\n6.68 <\\/td>\\n<td id=\\"mini_53\\">\\n0.67 <\\/td>\\n<td id=\\"micro_53\\">\\n0.07 <\\/td>\\n<td class=\\"bold\\" id=\\"value_53\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-cad\\">GBP\\/CAD<\\/a>\\n<\\/td>\\n<td id=\\"price_54\\">\\n1.6721 <\\/td>\\n<td id=\\"standard_54\\">\\n7.61 <\\/td>\\n<td id=\\"mini_54\\">\\n0.76 <\\/td>\\n<td id=\\"micro_54\\">\\n0.08 <\\/td>\\n<td class=\\"bold\\" id=\\"value_54\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-chf\\">GBP\\/CHF<\\/a>\\n<\\/td>\\n<td id=\\"price_12\\">\\n1.1388 <\\/td>\\n<td id=\\"standard_12\\">\\n11.17 <\\/td>\\n<td id=\\"mini_12\\">\\n1.12 <\\/td>\\n<td id=\\"micro_12\\">\\n0.11 <\\/td>\\n<td class=\\"bold\\" id=\\"value_12\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-jpy\\">GBP\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_11\\">\\n182.55 <\\/td>\\n<td id=\\"standard_11\\">\\n 696.90 <\\/td>\\n<td id=\\"mini_11\\">\\n69.69 <\\/td>\\n<td id=\\"micro_11\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_11\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-nzd\\">GBP\\/NZD<\\/a>\\n<\\/td>\\n<td id=\\"price_55\\">\\n2.0616 <\\/td>\\n<td id=\\"standard_55\\">\\n6.17 <\\/td>\\n<td id=\\"mini_55\\">\\n0.62 <\\/td>\\n<td id=\\"micro_55\\">\\n0.06 <\\/td>\\n<td class=\\"bold\\" id=\\"value_55\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-usd\\">GBP\\/USD<\\/a>\\n<\\/td>\\n<td id=\\"price_2\\">\\n1.2723 <\\/td>\\n<td id=\\"standard_2\\">\\n10.00 <\\/td>\\n<td id=\\"mini_2\\">\\n1.00 <\\/td>\\n<td id=\\"micro_2\\">\\n0.10 <\\/td>\\n<td class=\\"bold\\" id=\\"value_2\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/nzd-jpy\\">NZD\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_58\\">\\n88.55 <\\/td>\\n<td id=\\"standard_58\\">\\n696.90 <\\/td>\\n<td id=\\"mini_58\\">\\n69.69 <\\/td>\\n<td id=\\"micro_58\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_58\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/nzd-usd\\">NZD\\/USD<\\/a>\\n<\\/td>\\n<td id=\\"price_8\\">\\n0.6171 <\\/td>\\n<td id=\\"standard_8\\">\\n10.00 <\\/td>\\n<td id=\\"mini_8\\">\\n1.00 <\\/td>\\n<td id=\\"micro_8\\">\\n0.10 <\\/td>\\n<td class=\\"bold\\" id=\\"value_8\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-brl\\">USD\\/BRL<\\/a>\\n<\\/td>\\n<td id=\\"price_2103\\">\\n4.7624 <\\/td>\\n<td id=\\"standard_2103\\">\\n2.10 <\\/td>\\n <td id=\\"mini_2103\\">\\n0.21 <\\/td>\\n<td id=\\"micro_2103\\">\\n0.02 <\\/td>\\n<td class=\\"bold\\" id=\\"value_2103\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-cad\\">USD\\/CAD<\\/a>\\n<\\/td>\\n<td id=\\"price_7\\">\\n1.3143 <\\/td>\\n<td id=\\"standard_7\\">\\n7.61 <\\/td>\\n<td id=\\"mini_7\\">\\n0.76 <\\/td>\\n<td id=\\"micro_7\\">\\n0.08 <\\/td>\\n<td class=\\"bold\\" id=\\"value_7\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-chf\\">USD\\/CHF<\\/a>\\n<\\/td>\\n<td id=\\"price_4\\">\\n0.8950 <\\/td>\\n<td id=\\"standard_4\\">\\n11.17 <\\/td>\\n<td id=\\"mini_4\\">\\n1.12 <\\/td>\\n<td id=\\"micro_4\\">\\n0.11 <\\/td>\\n<td class=\\"bold\\" id=\\"value_4\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-cny\\">USD\\/CNY<\\/a>\\n<\\/td>\\n<td id=\\"price_2111\\">\\n7.2376 <\\/td>\\n<td id=\\"standard_2111\\">\\n1.38 <\\/td>\\n<td id=\\"mini_2111\\">\\n0.14 <\\/td>\\n<td id=\\"micro_2111\\">\\n0.01 <\\/td>\\n<td class=\\"bold\\" id=\\"value_2111\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-inr\\">USD\\/INR<\\/a>\\n<\\/td>\\n<td id=\\"price_160\\">\\n81.999 <\\/td>\\n<td id=\\"standard_160\\">\\n0.12 <\\/td>\\n<td id=\\"mini_160\\">\\n0.01 <\\/td>\\n<td id=\\"micro_160\\">\\n0.00 <\\/td>\\n<td class=\\"bold\\" id=\\"value_160\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-jpy\\">USD\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_3\\">\\n143.49 <\\/td>\\n<td id=\\"standard_3\\">\\n696.90 <\\/td>\\n<td id=\\"mini_3\\">\\n69.69 <\\/td>\\n<td id=\\"micro_3\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_3\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-rub\\">USD\\/RUB<\\/a>\\n<\\/td>\\n<td id=\\"price_2186\\">\\n85.0875 <\\/td>\\n<td id=\\"standard_2186\\">\\n0.12 <\\/td>\\n<td id=\\"mini_2186\\">\\n0.01 <\\/td>\\n<td id=\\"micro_2186\\">\\n0.00 <\\/td>\\n<td class=\\"bold\\" id=\\"value_2186\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-try\\">USD\\/TRY<\\/a>\\n<\\/td>\\n<td id=\\"price_18\\">\\n26.0098 <\\/td>\\n<td id=\\"standard_18\\">\\n0.38 <\\/td>\\n<td id=\\"mini_18\\">\\n0.04 <\\/td>\\n<td id=\\"micro_18\\">\\n0.00 <\\/td>\\n<td class=\\"bold\\" id=\\"value_18\\">\\n\\n<\\/td>\\n<\\/tr>\\n<\\/tbody>\\n"\n',
            calculator2:'',
            calculator:''
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

        this.getData()
    },
    methods:{

        async getData() {
            const router = useRouter();

            try {
                const result = await axios.get('/api/pip-calculator')

                if (result.status === 200) {

                    this.site_title=result.data.title.ru;
                    this.site_keywords=result.data.keywords.ru;
                    this.site_description=result.data.description.ru;
                    this.calculator=result.data.calculator_en;


                }else{
                    console.log('Error')
                }

            } catch (e) {
                console.log('Error')
            }
        },
    },
});
</script>

<style>
table thead tr th{text-align: center;}
</style>

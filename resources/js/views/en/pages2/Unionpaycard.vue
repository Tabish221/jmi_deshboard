<template>



     <div class="row gray_bg mrtb40">
        <div class="container">



                 <div class="row gray_bg">
                    <img src="/assets/img/unionpaycardfees1.jpg" alt="" class="img-responsive center-block" />
                </div>


            <h2>Unionpay Card</h2>

            <div class="speacer20"></div>

            <h4>Card limits and fees</h4>


            <ul class="package-features-list package-features-list2" style="height: 270px;list-style-type: none;">
                <li><i class="fa fa-check" aria-hidden="true"></i> Max Ticket Size - $2,000</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Max Monthly Volume - $20,000</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Max hour count - 2 times per hour</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Max day count - 20 times per day</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Card loading amount - $2,000</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Max card balance amount - $50,000</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Card to card transaction - $2,000</li>

                <li><i class="fa fa-check" aria-hidden="true"></i> ATM - Withdrawal $4.15</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> ATM - Balance Enquiry $4.15</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> POS - $1.25</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Reload Card - $3.50 or 1.5%, whichever is higher</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Card to card transfer - $7.00</li>
                <li><i class="fa fa-check" aria-hidden="true"></i> Monthly Fee - $3.00</li>
            </ul>

            <div class="slideshow-container">
                    <a href="/en/cpanel/unionpay-cards" class="slide-live-button uk-border-rounded "><i class="fas fa-scroll uk-margin-small-right"></i>Order your card now</a>
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
            site_title: `Unionpay Card`,
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

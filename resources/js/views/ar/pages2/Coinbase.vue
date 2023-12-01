<template>



        <div class="container">
            <div class="row gray_bg mrtb40">



            </div>
        </div>

<div class="row-fluid" id="fxneteller">
    <div class="">
        <div class="container">
            <div class=""  style="text-align:center;margin:0 auto;width:300px;color:#333;font-size:18px;">

                <div class="neteller">
                    <div class="title"><h2>Deposit Via CoinBase </h2></div><br />
                        <div class="form">
                            <div class="alert alert-danger col-sm-12" id="Error" style="display: none;">
                            </div>
                            <div class="alert alert-success col-sm-12" id="Success" style="display: none;">
                            </div>
                        <form  method="post" @submit.prevent="coinbase">

                                       <label style="display:inline;">Full Name</label> <input class="form-control" type="text" name="fullname" v-model="form.fullname" placeholder="Enter Your Full Name" pattern="[a-zZ-A ]{1,60}" title="Only characters and spaces allowed" required /><br />

                                        <label id="jmiaccountnumber" style="color:#218e2f;"> JMI Brokers Account Number</label><input  id="jmiaccountnumber" type="number"  v-model="form.jmiaccountnumber" name="jmiaccountnumber" class="form-control" placeholder="JMI Account Number"  /><br />

                                    <label>Amount In Dollar</label><input class="form-control" type="number" placeholder="Amount In Dollar" name="ammount" v-model="form.ammount"  pattern="[0-9]{1,8}" title="Just Numbers Allowed" required /><br />
                                    <input class="form-control btn-success" type="submit" value="Send Money" style="font-size:18px;" /><br />

                        </form><br />
                                <p style="color:#218e2f;font-size:18px;"> Don' have CoinBase Register <a href="https://www.coinbase.com/signup" style="text-decoration:underline;"> Here</a></p>
                        </div>
                    </div>
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
import $ from "jquery";
const errors = ref()
const router = useRouter();

export default ({
    data(){
        return{
            site_title: `Deposit Via CoinBase`,
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
    },
    setup() {
        const errors = ref()
        const router = useRouter();
        const form = reactive({
            username: '',
            password: '',
            "_token": "{{ csrf_token() }}"
        })
        const coinbase = async () => {

            try {
                const result = await axios.post('/api/coinbase', form)

                if (result.status === 200 && result.data.url) {
                    window.location.href = result.data.url;
                }else if(result.status === 201){
                    $("#Error").text(result.data.error);
                    $("#Error").show();
                    $("#Success").hide();
                }
            } catch (e) {
                if (e.response && e.response.status === 401) {
                    errors.value = e.response.data.errors.ar || ""
                } else {
                    if(e && e.response.data && e.response.data.errors) {
                        errors.value = Object.values(e.response.data.errors)
                    } else {
                        errors.value = e.response.data.errors || ""
                    }                }

            }
        }

        return {
            form,
            errors,
            coinbase,
        }

    },
});
</script>

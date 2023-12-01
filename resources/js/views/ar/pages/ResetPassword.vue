<template>


    <div class="container">
        <div class="col-sm-4">


            <h2>تغيير كلمة السر</h2>

            <div class="alert alert-danger col-sm-12" id="Error" style="display: none;">
                <span></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="alert alert-success col-sm-12" id="Success" style="display: none;">
                <span></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>

            <div class="alert alert-danger" v-if="typeof errors === 'string'">

                {{errors}}
            </div>
            <div class="alert alert-danger" v-for="(value, index) in errors" :key="index" v-if="typeof errors === 'object'">

                {{errors[0]}}
            </div>
            <form id="resetpassword" autocomplete="off" method="post" @submit.prevent="handleForgotPassword" class="form-horizontal">
                <input type="hidden"  name="base_url" id="base_url" value="/" />
                <input name="newpassword" type="password" v-model="form.newpassword" id="newpassword" placeholder="كلمة السر الجديدة" class="form-control" /><br />
                <input name="confirmnewpassword" type="password" v-model="form.confirmnewpassword" id="confirmnewpassword" placeholder="تأكيد كلمة السر" class="form-control" /><br />
                <br />
                <input type="submit" name="changesubmit" value="تغيير كلمة السر"  id="changesubmit" class="btn btn-success submit" />
            </form>

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
            site_title: `تغيير كلمة السر`,
            site_description: `JMI Brokers | Forgot Password`,
            site_keywords: 'JMI Brokers | Forgot Password',
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
    methods: {


    },created () {

    },
    setup() {
        const errors = ref()
        const router = useRouter();
        const form = reactive({
            newpassword: '',
            confirmnewpassword: '',
            "_token": "{{ csrf_token() }}"
        })
        const handleForgotPassword = async () => {

            try {
                const result = await axios.post('/api/reset-password', form)
                console.log(result.status)

                if (result.status === 200 && result.data) {
                    $("#Success span:first-child").text(result.data.message.ar);
                    $("#Success").show();
                    $("#Error").hide();

                }else if(result.status === 201){
                    $("#Error span:first-child").text(result.data.errors.ar);
                    $("#Error").show();
                    $("#Success").hide();
                }
            } catch (e) {
                // if (e.response && e.response.status === 401) {
                //     errors.value = e.response.data.errors.ar || ""
                // } else {
                //     if(e && e.response.data && e.response.data.errors) {
                //         errors.value = Object.values(e.response.data.errors)
                //     } else {
                //         errors.value = e.response.data.errors || ""
                //     }                }

            }
        }

        return {
            form,
            errors,
            handleForgotPassword,
        }

    },
})

</script>


<style>

</style>

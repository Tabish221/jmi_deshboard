<template>

    <div class="loginpage"   style="background-image:url('/assets/m/img/pic.png')">
        <div class="container">



            <div class="alert alert-danger" v-if="typeof errors === 'string'">

                {{errors}}
            </div>
            <div class="alert alert-danger" v-for="(value, index) in errors" :key="index" v-if="typeof errors === 'object'">

                {{errors[0]}}
            </div>
            <div class="bigDiv col-lg-3 col-sm-5 col-xs-6 col-xxs-12"  >



                <div class="login pdtb40">
                    <div id="newLogin">
                        <img src ="/assets/m/img/icon.png">
                        <h2>Login</h2>
                    </div>
                    <div class="alert alert-danger col-sm-12" id="Error" style="display: none;">
                        <span> </span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <div class="alert alert-success col-sm-12" id="Success" style="display: none;">
                        <span> </span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                    <form id="" autocomplete="off" method="post" @submit.prevent="handleLogin"   class="form-horizontal" >
                        <p class="error text-center"></p>
                        <div class="input-container">
                            <input name="username" type="text" v-model="form.username" placeholder="Username or Email" class="txt-box" required/>
                        </div>
                        <div class="input-container">
                            <input id="myPass" name="password" type="Password" v-model="form.password" placeholder="Password :" class="txt-box" required />
                            <button id="btnEye" @click="toggleEye()" type="button"><i id="open" class="fas fa-eye"></i> <i id="close" class="fas fa-eye-slash"></i></button>
                        </div>
                        <input type="submit" name="loginsubmit" value="Login"  id="loginsubmit" class="form-btn" />

                    </form>

                    <p class="text-center">Forget<a href="/en/forgot-password"> Password </a>?</p>
                    <p class="text-center">Don't have an account?<a href="/en/signup"> Sign Up</a></p>
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
            site_title: `JMI Brokers | Client Login`,
            site_description: `JMI Brokers | Client Login`,
            site_keywords: 'JMI Brokers | Client Login',
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

         toggleEye() {
    var x = document.getElementById("myPass");
    var open = document.getElementById("open");
    var close = document.getElementById("close");
    if (x.type === "password") {
        x.type = "text";
        open.style.display="block";
        close.style.display="none";
    } else {
        x.type = "password";
        open.style.display="none";
        close.style.display="block";
    }
}

    },created () {

    },
    setup() {
        const errors = ref()
        const router = useRouter();
        const form = reactive({
            username: '',
            password: '',
            "_token": "{{ csrf_token() }}"
        })
        const handleLogin = async () => {

            try {
                const result = await axios.post('/en/slogin', form)

                if (result.status === 200 && result.data) {
                    await router.push('/en/spanel/home')
                }else if(result.status === 201){
                    $("#Error > span").text(result.data.errors.ar);
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
            handleLogin,
        }

    },
})

</script>


<style>
#newLogin
{
    display: flex;
    align-items: center;
}
#newLogin h2
{
    color:#0059b2;
    font-family: 'Roboto-Bold';
    margin: 0px 10px;
}

.txt-box
{
    margin:0px;
    border-radius: inherit;
    padding: 6px 0px 6px 7px !important;
}
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
input:-webkit-autofill:active
{
    -webkit-box-shadow: 0 0 0 30px white inset !important;
}
#loginsubmit
{
    background-color: #fdbe01 !important;
    color: white !important;
    border-radius: 10px;
    border: 1px solid #bfbfbf !important;
    padding: 3px 35px !important;
    width: auto !important;
    display: flex;
}
.text-center
{
    color:#838383 !important;
    font-weight:bold;
    font-size: 13px;
}
.text-center a
{
    color:#0059b2 !important;

}
.bigDiv
{
    max-width: 270px !important;
}
@media only screen and (max-width: 500px)
{
    .bigDiv
    {
        width:100% !important;
    }
}
#open
{
    display:none ;
}
#open , #close
{
    font-size: 15px;
    padding-right: 5px;

}
#btnEye
{
    border: none;
    background-color: white;
    padding: 0px;
    border-radius: inherit;
}
.input-container
{
    display: flex;
    background-color: white;
    border: 1px solid #bfbfbf;
    margin-bottom:10px;
    max-width: 270px !important;
    border-radius: 10px;
}

#myPass
{
    width: calc(100% - 19px);
}
</style>

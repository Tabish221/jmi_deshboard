<template>
</template>
<script>
    import axios from "axios";
    import ('jquery')
    import jquery from 'jquery'
    window.jQuery = jquery
    import $ from 'jquery'
    import VLazyImage from "v-lazy-image";
    import {useHead} from "@vueuse/head";
    import {computed} from "vue";

    import "../../../../../public/assets-up/css/layout.css";
    import "../../../../../public/assets-up/css/style.css";

    export default {
        name: 'AppHeader',
        data(){
            return{
                LoggedUser: String,
                reuters_news: [],
            }
        },
        components:{
            VLazyImage
        },
        mounted() {
            this.getLoggedUser()
            this.getData()
        },
        methods:{
            async getData(){
                try {
                    const result = await axios.get('/api/shownews')
                    if (result.status === 200 && result.data) {
                        this.reuters_news=result.data.data.en.reuters_news
                    }
                } catch (e) {
                    if(e && e.response.data && e.response.data.errors) {
                        errors.value = Object.values(e.response.data.errors)
                    } else {
                        errors.value = e.response.data.message || ""
                    }
                }
            },
            head: document.getElementById("head"),

            coll: document.getElementsByClassName("collapsible"),

            getLoggedUser(){
                this.LoggedUser=localStorage.getItem('JMI_User')
            },
            setlang(val){
                if(val=='en'){
                    let url=document.location.href
                    url=url.replace('/ar','/en');
                    url=url.replace('/ru','/en');
                    if(url==document.location.href){
                        url='/en'
                    }
                    document.location = url;
                }else if(val=='ar'){
                    let url=document.location.href
                    url=url.replace('/en','/ar');
                    url=url.replace('/ru','/ar');
                    if(url==document.location.href){
                        url='/ar'
                    }
                    document.location = url;
                }else if(val=='ru'){
                    let url=document.location.href
                    url=url.replace('/en','/ru');
                    url=url.replace('/ar','/ru');
                    if(url==document.location.href){
                        url='/ru'
                    }
                    document.location = url;
                }
            },
            w3_open() {
                document.getElementById("mySidebar").style.width = "100%";
                document.getElementById("mySidebar").style.display = "block";
                document.getElementsByTagName("html")[0].style.overflow="hidden";
            },

            w3_close() {
                document.getElementById("mySidebar").style.display = "none";
                document.getElementsByTagName("html")[0].style.overflow="visible";
            },
            // collapse


            openForm() {
                document.getElementById("myForm").style.display = "block";
                document.getElementById("open-button").style.display = "none";
            },

            closeForm() {
                document.getElementById("myForm").style.display = "none";
                document.getElementById("open-button").style.display = "block";

            },
            clear_search()
            {
                $('ul#myUL li').hide();
                $('ul#myUL2 li').hide();
                $('#header-search input').val('');

            },
        }
    }
</script>

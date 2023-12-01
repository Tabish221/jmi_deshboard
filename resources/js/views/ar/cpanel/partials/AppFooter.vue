<template>


    <footer>

        <div class="container">

            <small>

                <h3>Risk Warning</h3>
                <p >
                    Trading foreign exchange and/or contracts for differences on margin carries a high level of risk, and may not be suitable for all investors. The possibility exists that you could sustain a loss in excess of your deposited funds and therefore, you should not speculate with capital that you cannot afford to lose. Before deciding to trade the products offered by JMI Brokers you should carefully consider your objectives, financial situation, needs and level of experience. You should be aware of all the risks associated with trading on margin. JMI Brokers provides general advice that does not take into account your objectives, financial situation or needs. The content of this Website must not be construed as personal advice. JMI Brokers recommends you seek advice from a separate financial advisor.
                </p>

                <p >
                    All opinions, news, analysis, prices or other information contained on this website are provided as general market commentary and does not constitute investment advice, nor a solicitation or recommendation for you to buy or sell any over-the-counter product or other financial instrument.
                </p>
                <p class="text-center">2021 © JMIBrokers. All rights reserved</p>
            </small>

        </div><!--End container-->

    </footer><!--End footer-->

</template>

<script>
    import $ from 'jquery'
    import jquery from 'jquery'
    window.jQuery = jquery
    require('bootstrap')
    import {reactive, ref} from "vue";
    import {useRouter} from "vue-router";
    import axios from "axios";
    const errors = ref()
    const router = useRouter();
    export default {
    name: 'AppFooter',
    mounted: function() {


        $("li.dropdown").hover(

            function(e){$(this).addClass('open');
                if($(this).hasClass('notification-menu')){
                    $.get("/api/cpanel/read_notifications");
                }
            }, // over
            function(e){$(this).removeClass('open'); }  // out
        );
        this.collapseSideMenu();

},
        beforeCreate() {
            const jquery_script0 = document.createElement("script");
            jquery_script0.setAttribute("src","/assets/cpanel/plugins/jQuery/jQuery-2.1.4.min.js");
            jquery_script0.async = true;
            document.head.appendChild(jquery_script0);

            const bootstrap_script1 = document.createElement("script");
            bootstrap_script1.setAttribute("src","/assets/new_cpanel/js/bootstrap.js");
            bootstrap_script1.async = true;
            document.head.appendChild(bootstrap_script1);

            const bootstrap_script2 = document.createElement("script");
            bootstrap_script2.setAttribute("src","/assets/new_cpanel/js/deployment.js");
            bootstrap_script2.async = true;
            document.head.appendChild(bootstrap_script2);

            const bootstrap_script3 = document.createElement("script");
            bootstrap_script3.setAttribute("src","/assets/new_cpanel/js/rocket-loader.min.js");
            bootstrap_script3.async = true;
            document.head.appendChild(bootstrap_script3);

        },


        data(){
            return{

            }
        },

    methods:{
        openForm() {
        document.getElementById("myForm").style.display = "block";
        document.getElementById("open-button").style.display = "none";
        },
        closeForm() {
        document.getElementById("myForm").style.display = "none";
        document.getElementById("open-button").style.display = "block";
        },
        setlang(val){
        if(val=='en'){
            var url=document.location.href
            url=url.replace('/ar','/en');
            url=url.replace('/ru','/en');
            document.location = url;
        }else if(val=='ar'){
            var url=document.location.href
            url=url.replace('/en','/ar');
            url=url.replace('/ru','/ar');
            document.location = url;
        }else if(val=='ru'){
            var url=document.location.href
            url=url.replace('/en','/ru');
            url=url.replace('/ar','/ru');
            document.location = url;
        }
    },
        seenotifications(){
            $.get("/api/cpanel/read_notifications");
        },
        //$(window).resize(collapseSideMenu);

        collapseSideMenu() {
        // if tablet display
        if($('.sideMenu .list-group-item').css('padding-top') == '10px' || $('.sideMenu').css('width') == '940px') {
            $('#sideMenuHamburger').show();
            $('#sideMenu').collapse('hide');
            $('#sideMenu').removeClass('hiddenHamburger');
            // if big display
        } else {
            // in not collapsed by default
            if (!$('#sideMenu').hasClass('collapsedDefault')) {
                $('#sideMenuHamburger').hide();
                $('#sideMenu').collapse('show');
                $('#sideMenu').addClass('hiddenHamburger');
            }
        }
    },

}

    }
</script>

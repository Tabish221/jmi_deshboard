<template>
<link rel="canonical" href="https://www.jmibrokers.com/ru/contact-us" />


<div class="row gray_bg mrtb40">
<div class="row gray_bg">
  <img src="/assets/img/contactus.jpg" alt="" class="img-responsive center-block picHeight" />
</div>

        <div class="container">
 <h1>Contact JMI Brokers</h1>
<!-- hrrr -->

<div class="row col-sm-12" style="margin-top:20px;">

    <h2 class="text-center">JMI Brokers LTD Региональный офис </h2><br />
  <div class="col-sm-6 col-xs-12" >
        <div id="googleMap2" style="width:100%;height:300px;float:left;"></div><br />

  </div>

<div class="col-sm-6 col-xs-12" style="float:right;text-align:left;">
    <div style="float:left;margin:0 15px;">
        <h2 class="text-center">JMI Brokers LTD Региональный офис </h2><br />

        <h5>подробности адреса</h5>
        <p>
            1276, дом Говант, Кумульское шоссе,
            Порт Вила
            Республика Вануату
        </p>
    </div>

    <div style="float:left;margin:0 15px;text-align:left;">
        <h5>Контактная информация</h5>

        <h5>Phone no:<span class="span-no">  +678 24404</span></h5>
        <h5>Fax:<span class="span-no pl40">  +678 23693</span></h5>
        <h5>Эл. почта: <a href="mailto:support@jmibrokers.com">support@jmibrokers.com.</a></h5>
        <h5>Govant Building, P.O. Box 1276, Port Vila</h5>

    </div>

</div>


</div>



<!-- hrrr -->

<div class="row col-sm-12" style="margin-top:20px;">

 <h2 class="text-center">JMI Brokers LTD  Regional Office </h2><br />

 <div class="col-sm-6 col-xs-12" >
       <div id="googleMap1" style="width:100%;height:300px;float:left;"></div><br />

 </div>
 <div class="col-sm-6 col-xs-12" >

        <div style="text-align:left;">

                <h5>Address Details</h5>
                    <p>
                        Sheikh Zayed Road - Downtown
                        <br />
                        Dubai
                        <br />
                        United Arab Emirates.
                    </p>
                    <h5>Contact Info</h5>
                    <h5>Phone no:<span class="span-no">  +971 44096705</span></h5>
                    <h5>Fax:<span class="span-no pl40">  +971 44096740</span></h5>

        </div>
 </div>


</div>
<!-- hrrr -->



<!-- hrrr -->
<div class="row col-sm-12" style="margin-top:20px;">

    <br /><br />


    <h2 class="text-center"> JMI Brokers LTD Офис в Египте</h2><br />
  <div class="col-sm-6 col-xs-12">
        <div id="googleMap3" style="width:100%;height:300px;float:left;"></div><br />


  </div>

<div class="col-sm-6 col-xs-12">

  <div style="float:left;margin:0 15px;text-align:left;">
      <h5>подробности адреса</h5>
      <p>
          105 Дегла
           <br />
          аканат Алмаади
           <br />
          Каир, Египт
      </p>

          <h5>Contact Info</h5>

          <div class="speacer20"></div>
          <h5>Phone no:<span class="span-no"> +20225166835</span></h5>

          <h5>E-mail: &nbsp;&nbsp;&nbsp;&nbsp; <a href="mailto:egypt.office@jmibrokers.com">egypt.office@jmibrokers.com</a></h5>

  </div>

</div>




</div>
        </div>
    </div>
    <component :is="'script'">
        // JS Here
    </component>
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
            site_title: `Contact JMI Brokers`,
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

        this.loadGoogleMapsScript().then(() => {
            this.initMap();
        });

    },
        methods: {
            loadGoogleMapsScript() {
                return new Promise((resolve) => {
                    if (typeof google === "undefined") {
                        // Google Maps API script is not loaded, dynamically load it
                        const script = document.createElement("script");
                        script.src = `https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyA5wOKyAvPSzKAVnTslIcfCwikWkJMMFnA`;
                        script.onload = resolve;
                        document.head.appendChild(script);
                    } else {
                        // Google Maps API script is already loaded
                        resolve();
                    }
                });
            },
            initMap() {
                // Create a new map instance
                const map1 = new google.maps.Map(document.getElementById("googleMap1"), {
                    center: { lat:25.2023787,lng:55.2763412 }, // Set the initial map center
                    zoom: 12 // Set the initial zoom level
                });

                // Create a marker for the pinned location
                new google.maps.Marker({
                    position: { lat:25.2023787,lng:55.2763412 }, // Set the marker position
                    map: map1, // Set the map instance
                    title: "Pinned Location" // Set the marker title
                });

                const map2 = new google.maps.Map(document.getElementById("googleMap2"), {
                    center: { lat:-17.736665745665483, lng:168.3128008181217}, // Set the initial map center
                    zoom: 12 // Set the initial zoom level
                });

                // Create a marker for the pinned location
                new google.maps.Marker({
                    position: { lat:-17.736665745665483, lng:168.3128008181217}, // Set the marker position
                    map: map2, // Set the map instance
                    title: "Pinned Location" // Set the marker title
                });

                const map3 = new google.maps.Map(document.getElementById("googleMap3"), {
                    center: { lat:29.963474,lng:31.274750 }, // Set the initial map center
                    zoom: 12 // Set the initial zoom level
                });

                // Create a marker for the pinned location
                new google.maps.Marker({
                    position: { lat:29.963474,lng:31.274750 }, // Set the marker position
                    map: map3, // Set the map instance
                    title: "Pinned Location" // Set the marker title
                });
            }
        }

});
</script>

"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_en_pages2_contact-us_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/en/pages2/contact-us.vue?vue&type=script&lang=js":
/*!*********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/en/pages2/contact-us.vue?vue&type=script&lang=js ***!
  \*********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _vueuse_head__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @vueuse/head */ "./node_modules/@unhead/vue/dist/shared/vue.f36acd1f.mjs");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var vue_router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue-router */ "./node_modules/vue-router/dist/vue-router.mjs");




var errors = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)();
var router = (0,vue_router__WEBPACK_IMPORTED_MODULE_2__.useRouter)();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      site_title: "Contact JMI Brokers",
      site_description: "",
      site_keywords: ''
    };
  },
  mounted: function mounted() {
    var _this = this;
    (0,_vueuse_head__WEBPACK_IMPORTED_MODULE_3__.u)({
      // Can be static or computed
      title: (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
        return _this.site_title;
      }),
      meta: [{
        name: "description",
        content: (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
          return _this.site_description;
        })
      }, {
        name: "keywords",
        content: (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
          return _this.site_keywords;
        })
      }]
    });
    this.loadGoogleMapsScript().then(function () {
      _this.initMap();
    });
  },
  methods: {
    loadGoogleMapsScript: function loadGoogleMapsScript() {
      return new Promise(function (resolve) {
        if (typeof google === "undefined") {
          // Google Maps API script is not loaded, dynamically load it
          var script = document.createElement("script");
          script.src = "https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyA5wOKyAvPSzKAVnTslIcfCwikWkJMMFnA";
          script.onload = resolve;
          document.head.appendChild(script);
        } else {
          // Google Maps API script is already loaded
          resolve();
        }
      });
    },
    initMap: function initMap() {
      // Create a new map instance
      var map1 = new google.maps.Map(document.getElementById("googleMap1"), {
        center: {
          lat: 25.2023787,
          lng: 55.2763412
        },
        // Set the initial map center
        zoom: 12 // Set the initial zoom level
      });

      // Create a marker for the pinned location
      new google.maps.Marker({
        position: {
          lat: 25.2023787,
          lng: 55.2763412
        },
        // Set the marker position
        map: map1,
        // Set the map instance
        title: "Pinned Location" // Set the marker title
      });
      var map2 = new google.maps.Map(document.getElementById("googleMap2"), {
        center: {
          lat: -17.736665745665483,
          lng: 168.3128008181217
        },
        // Set the initial map center
        zoom: 12 // Set the initial zoom level
      });

      // Create a marker for the pinned location
      new google.maps.Marker({
        position: {
          lat: -17.736665745665483,
          lng: 168.3128008181217
        },
        // Set the marker position
        map: map2,
        // Set the map instance
        title: "Pinned Location" // Set the marker title
      });
      var map3 = new google.maps.Map(document.getElementById("googleMap3"), {
        center: {
          lat: 29.963474,
          lng: 31.274750
        },
        // Set the initial map center
        zoom: 12 // Set the initial zoom level
      });

      // Create a marker for the pinned location
      new google.maps.Marker({
        position: {
          lat: 29.963474,
          lng: 31.274750
        },
        // Set the marker position
        map: map3,
        // Set the map instance
        title: "Pinned Location" // Set the marker title
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/en/pages2/contact-us.vue?vue&type=template&id=e55a0c76":
/*!*************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/en/pages2/contact-us.vue?vue&type=template&id=e55a0c76 ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<link rel=\"canonical\" href=\"https://www.jmibrokers.com/en/contact-us\"><div class=\"row gray_bg mrtb40\"><div class=\"row gray_bg\"><img src=\"/assets/img/contactus.jpg\" alt=\"\" class=\"img-responsive center-block picHeight\"></div><div class=\"container\"><h1>Contact JMI Brokers</h1><!-- hrrr --><div class=\"row col-sm-12\" style=\"margin-top:20px;\"><h2 class=\"text-center\">JMI Brokers LTD Registered Office </h2><br><div class=\"col-sm-6 col-xs-12\"><div id=\"googleMap2\" style=\"width:100%;height:300px;float:left;\"></div><br></div><div class=\"col-sm-6 col-xs-12\" style=\"float:right;text-align:left;\"><div style=\"float:left;margin:0 15px;\"><h4>The registered office of the Company at :</h4><h5>Address Details</h5><p> 1276, Govant Building, Kumul Highway, <br> Port Vila <br> Republic of Vanuatu </p></div><div style=\"float:left;margin:0 15px;text-align:left;\"><h5>Contact Info</h5><h5>Phone no:<span class=\"span-no\"> +678 24404</span></h5><h5>Fax:<span class=\"span-no pl40\"> +678 23693</span></h5><h5>E-mail:      <a href=\"mailto:support@jmibrokers.com\">support@jmibrokers.com.</a></h5><h5>Govant Building, P.O. Box 1276, Port Vila</h5></div></div></div><!-- hrrr --><div class=\"row col-sm-12\" style=\"margin-top:20px;\"><h2 class=\"text-center\">JMI Brokers LTD Regional Office </h2><br><div class=\"col-sm-6 col-xs-12\"><div id=\"googleMap1\" style=\"width:100%;height:300px;float:left;\"></div><br></div><div class=\"col-sm-6 col-xs-12\"><div style=\"text-align:left;\"><h5>Address Details</h5><p> Sheikh Zayed Road - Downtown <br> Dubai <br> United Arab Emirates. </p><h5>Contact Info</h5><h5>Phone no:<span class=\"span-no\"> +971 44096705</span></h5><h5>Fax:<span class=\"span-no pl40\"> +971 44096740</span></h5></div></div></div><!-- hrrr --><!-- hrrr --><div class=\"row col-sm-12\" style=\"margin-top:20px;\"><br><br><h2 class=\"text-center\"> JMI Brokers LTD Egypt Office </h2><br><div class=\"col-sm-6 col-xs-12\"><div id=\"googleMap3\" style=\"width:100%;height:300px;float:left;\"></div><br></div><div class=\"col-sm-6 col-xs-12\"><div style=\"float:left;margin:0 15px;text-align:left;\"><h5>Address Details</h5><p> St, 105 <br> Almaadi <br> Cairo - Egypt </p><h5>Contact Info</h5><div class=\"speacer20\"></div><h5>Phone no:<span class=\"span-no\"> +20225166835</span></h5><h5>E-mail:      <a href=\"mailto:egypt.office@jmibrokers.com\">egypt.office@jmibrokers.com</a></h5></div></div></div></div></div>", 2);
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, [_hoisted_1, ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)((0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveDynamicComponent)('script'), null, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" // JS Here ")];
    }),
    _: 1 /* STABLE */
  }))], 64 /* STABLE_FRAGMENT */);
}

/***/ }),

/***/ "./resources/js/views/en/pages2/contact-us.vue":
/*!*****************************************************!*\
  !*** ./resources/js/views/en/pages2/contact-us.vue ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _contact_us_vue_vue_type_template_id_e55a0c76__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./contact-us.vue?vue&type=template&id=e55a0c76 */ "./resources/js/views/en/pages2/contact-us.vue?vue&type=template&id=e55a0c76");
/* harmony import */ var _contact_us_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./contact-us.vue?vue&type=script&lang=js */ "./resources/js/views/en/pages2/contact-us.vue?vue&type=script&lang=js");
/* harmony import */ var _node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_contact_us_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_contact_us_vue_vue_type_template_id_e55a0c76__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/views/en/pages2/contact-us.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/views/en/pages2/contact-us.vue?vue&type=script&lang=js":
/*!*****************************************************************************!*\
  !*** ./resources/js/views/en/pages2/contact-us.vue?vue&type=script&lang=js ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_contact_us_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_contact_us_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./contact-us.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/en/pages2/contact-us.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/views/en/pages2/contact-us.vue?vue&type=template&id=e55a0c76":
/*!***********************************************************************************!*\
  !*** ./resources/js/views/en/pages2/contact-us.vue?vue&type=template&id=e55a0c76 ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_contact_us_vue_vue_type_template_id_e55a0c76__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_contact_us_vue_vue_type_template_id_e55a0c76__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./contact-us.vue?vue&type=template&id=e55a0c76 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/en/pages2/contact-us.vue?vue&type=template&id=e55a0c76");


/***/ })

}]);
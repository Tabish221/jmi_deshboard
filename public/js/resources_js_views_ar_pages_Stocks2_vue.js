"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_ar_pages_Stocks2_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/pages/Stocks2.vue?vue&type=script&lang=js":
/*!*****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/pages/Stocks2.vue?vue&type=script&lang=js ***!
  \*****************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _vueuse_head__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @vueuse/head */ "./node_modules/@unhead/vue/dist/shared/vue.f36acd1f.mjs");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var vue_router__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vue-router */ "./node_modules/vue-router/dist/vue-router.mjs");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_2__);




Promise.resolve(/*! import() */).then(__webpack_require__.t.bind(__webpack_require__, /*! jquery */ "./node_modules/jquery/dist/jquery.js", 23));

window.jQuery = (jquery__WEBPACK_IMPORTED_MODULE_2___default());

__webpack_require__.e(/*! import() */ "public_wave_js_vendors_bootstrap_min_js").then(__webpack_require__.t.bind(__webpack_require__, /*! ../../../../wave/js/vendors/bootstrap.min.js */ "./public/wave/js/vendors/bootstrap.min.js", 23));
var errors = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)();
var router = (0,vue_router__WEBPACK_IMPORTED_MODULE_3__.useRouter)();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      site_title: "Stock CFDs",
      site_description: "",
      site_keywords: ''
    };
  },
  mounted: function mounted() {
    var _this = this;
    (0,_vueuse_head__WEBPACK_IMPORTED_MODULE_4__.u)({
      // Can be static or computed
      title: (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
        return _this.site_title;
      }),
      meta: [{
        name: "description",
        content: (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
          return '';
        })
      }, {
        name: "keywords",
        content: (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
          return '';
        })
      }]
    });
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/pages/Stocks2.vue?vue&type=template&id=33e8c1eb":
/*!*********************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/pages/Stocks2.vue?vue&type=template&id=33e8c1eb ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"row gray_bg\"><img src=\"/assets/img/sockscover.jpg\" alt=\"\" class=\"img-responsive center-block picHeight\"></div><div class=\"stocksContent\"><h2 class=\"bold-blue\">Stock CFDs</h2><div><p class=\"ParaCollapse\"> JMI Brokers is proud to offer a wide range of the most traded US &amp; EU Stock CFDs, with a leverage of up to 1:5 and zero commissions*. Stock trading involves the buying and selling of shares in a particular asset or company. A stock trader will purchase shares, own them, then sell them, depending on the market value of the stock. Stock CFDs, on the other hand, allow you to trade the price movements of a particular asset or company, without the purchase of the physical shares themselves. With stock CFDs on MetaTrader4, traders can open a long (buy) position if the belief is that the value of the stock will go up, or a short (sell) position, if the belief is that the value of a stock will go down.</p><h3 class=\"bold-blue\">List of Available Stocks</h3><ul class=\"nav nav-tabs\" style=\"margin-bottom:30px;\"><li class=\"active\"><a data-toggle=\"tab\" href=\"#menu1\">US Shares</a></li><li><a data-toggle=\"tab\" href=\"#menu2\">UK Shares</a></li><li style=\"display:none;\"><a data-toggle=\"tab\" href=\"#menu3\">EU Shares</a></li></ul><div class=\"tab-content\"><div id=\"menu1\" class=\"tab-pane fade in active\"><iframe src=\"/en/datatable4\"></iframe></div><div id=\"menu2\" class=\"tab-pane fade\"><iframe src=\"/en/datatable5\"></iframe></div><div id=\"menu3\" class=\"tab-pane fade\"><iframe src=\"/en/datatable6\"></iframe></div></div><h3 class=\"bold-blue headStocks\">How to Calculate your Profit or Loss</h3><p class=\"pStocks\">The formula for working out your profit or loss for any CFD share is as follows:</p><p class=\"pStocks\">Long: (Buying) profit or loss = (exit price – entry price) * lots traded</p><p class=\"pStocks\">Short: (Selling) profit or loss = (entry price – exit price) * lots traded</p><h3 class=\"blue headStocks\">Example A:</h3><p class=\"pStocks\">You decide to buy 100 AAPL CFDs at $45 ,</p><p class=\"pStocks\">The share price rises to $50 based on the company’s quarterly earnings.</p><p class=\"pStocks\">You sell 100 AAPL CFDs at $50</p><p class=\"pStocks\">Using the formula above for a long trade:</p><p class=\"pStocks\">Profit or loss = (exit price – entry price) * lots traded</p><p class=\"pStocks\">The result would be +$500</p><h3 class=\"blue headStocks\">Example B:</h3><p class=\"pStocks\">You decide to sell 5 Amazon CFDs at $1,900 as you are expecting the price to fall.</p><p class=\"pStocks\">However, the price goes up based on increasing company sales.</p><p class=\"pStocks\">Therefore, you decide to close your position at the price of $1,919.</p><p class=\"pStocks\">Using the formula above for a short trade:</p><p class=\"pStocks\">Profit or loss = (entry price – exit price ) * lots traded</p><p class=\"pStocks\">The result would be -$95.</p><h3 class=\"bold-blue headStocks\">Corporate Actions Formula</h3><p class=\"pStocks\">The basic formula used is d = p x n</p><p class=\"pStocks\">d = dividend</p><p class=\"pStocks\">p = position</p><p class=\"pStocks\">n = dividend declared/number of index points (dividend amount)</p><p class=\"pStocks\">Here’s the calculation we use for the dividend for equities:</p><p class=\"pStocks\">A client opens a long (buy) position on 10,000 CFD shares of Apple (AAPL.OQ), with a net dividend declared at 2p.</p><p class=\"pStocks\">The calculation is:</p><p class=\"pStocks\">d = 10,000 x 0.02 = $200 (credited).</p><p class=\"pStocks\">Another example we can look at is that a client opens a short (sell) position on 5,000 CFD shares of Deutsche Bank (DBKGn.DE), with a net dividend declared at 5p.</p><p class=\"pStocks\">The calculation is: d = 5,000 x 0.05 = €250 (debited).</p><h3 class=\"bold-blue headStocks\">Commission on Stock CFDs*:</h3><p class=\"pStocks\">*JMI Brokers is running ‘0 Commissions Promotion’ across all stock CFDs. This promotion is valid on Starter Accounts for a limited time only.</p><p class=\"pStocks\">The commission applicable on shares is 0.0016 based on the notional value of the number of shares traded as following.</p><h4 class=\"blue-center exStocks\">(Lots * shares price * commission percentage)</h4><h4 class=\"blue exStocks\">Example:</h4><p class=\"pStocks\">For example, let’s say a client opens a long (buy) position with 10 CFD shares of Apple (AAPL.OQ).</p><p class=\"pStocks\">The market price at the time is 160 USD, and the commission is 0.0016 Therefore, the commission calculation is:</p><p class=\"pStocks\">10 shares * $160 * 0.0016 =$2.5</p><p class=\"pStocks\">For more information on trading Stock CFDs, feel free to contact your account managers. </p><p class=\"pStocks\">For any other inquiries, please email support@JMI Brokers.com.</p><p class=\"pStocks\">To start trading Stock CFDs:</p><a href=\"/en/signup\" class=\"slide-live-button uk-border-rounded\" style=\"ackground-color:#ffc926;color:#0059b2;padding:15px 20px;font-family:sans-serif;font-size:16px;font-weight:bold;text-transform:uppercase;margin:5px;\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>Open Live Account</a></div><a class=\"read\" href=\"/ar/commodities\">Read more ...</a></div>", 2);
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return _hoisted_1;
}

/***/ }),

/***/ "./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/pages/Stocks2.vue?vue&type=style&index=0&id=33e8c1eb&lang=css":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/pages/Stocks2.vue?vue&type=style&index=0&id=33e8c1eb&lang=css ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_laravel_mix_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../../node_modules/laravel-mix/node_modules/css-loader/dist/runtime/api.js */ "./node_modules/laravel-mix/node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_laravel_mix_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_laravel_mix_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_laravel_mix_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.read\r\n{\r\n    color: #0059b2;\r\n\r\n    font-weight: bold;\r\n    font-size: 21px;\r\n    text-decoration: underline;\n}\n.stocksContent\r\n{\r\n    margin:0px 30px 0px 60px !important\n}\n.nav-tabs>li.active\r\n{\r\n    background-color: white !important;\n}\n.nav>li>a\r\n{\r\n    color-:#0059b2;\r\n    font-size-:18px !important;\r\n    font-family: Roboto-Light;\n}\nh3,h4\r\n{\r\n    font-family: Roboto-Light;\n}\n.bold-blue\r\n{\r\n    color: #0059b2;\r\n    font-weight: bold;\r\n    font-family: Roboto-Bold;\n}\n.blue\r\n{\r\n    color: #0059b2;\n}\n.blue-center\r\n{\r\n    color:#888888;\r\n    text-align:center;\n}\n.btnStocks\r\n{\r\n    background-color: #ffc926;\r\n    border: none;\r\n    padding: 7px 15px;\r\n    color: white;\r\n    border-radius: 5px;\r\n    font-family: 'Roboto-Light';\r\n    font-size: 17px;\n}\niframe\r\n{\r\n    border: none;\n}\np\r\n{\r\n    color:#888888;\r\n    font-family: Roboto-Light;\n}\n#menu1 iframe\r\n{\r\n    width: 100%;\r\n    height: 1420px;\n}\n#menu2 iframe\r\n{\r\n    width: 100%;\r\n    height: 540px;\n}\n#menu3 iframe\r\n{\r\n    width: 100%;\r\n    height: 495px;\n}\n@media only screen and (max-width: 897px)\r\n{\n#menu1 iframe\r\n    {\r\n        height: 1250px;\n}\n#menu2 iframe\r\n    {\r\n        height: 470px;\n}\n#menu3 iframe\r\n    {\r\n        height: 466px;\n}\n}\n@media only screen and (max-width: 768px)\r\n{\n}\n@media only screen and (max-width: 550px)\r\n{\n.stocksContent\r\n    {\r\n        margin:0px 10px 0px 40px !important\n}\n#pagList\r\n    {\r\n        margin-bottom:0px;\n}\n#menu1 iframe\r\n    {\r\n        height: 1200px;\n}\n#menu2 iframe\r\n    {\r\n        height: 450px;\n}\n#menu3 iframe\r\n    {\r\n        height: 450px;\n}\n.nav>li>a\r\n    {\r\n        padding:8px;\r\n        font-size:12px !important;\n}\np\r\n    {\r\n        font-size:12px;\n}\nh2\r\n    {\r\n        font-size: 25px;\n}\nh3\r\n    {\r\n        font-size: 18px;\n}\nh4\r\n    {\r\n        font-size: 16px;\n}\n.btnStocks\r\n    {\r\n        padding: 7px 4px;\r\n        font-size: 13px;\n}\n.blue-center\r\n    {\r\n        font-size: 14px;\n}\n}\r\n\r\n\r\n\r\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/pages/Stocks2.vue?vue&type=style&index=0&id=33e8c1eb&lang=css":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/pages/Stocks2.vue?vue&type=style&index=0&id=33e8c1eb&lang=css ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Stocks2_vue_vue_type_style_index_0_id_33e8c1eb_lang_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../../node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!../../../../../node_modules/vue-loader/dist/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Stocks2.vue?vue&type=style&index=0&id=33e8c1eb&lang=css */ "./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/pages/Stocks2.vue?vue&type=style&index=0&id=33e8c1eb&lang=css");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Stocks2_vue_vue_type_style_index_0_id_33e8c1eb_lang_css__WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Stocks2_vue_vue_type_style_index_0_id_33e8c1eb_lang_css__WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/views/ar/pages/Stocks2.vue":
/*!*************************************************!*\
  !*** ./resources/js/views/ar/pages/Stocks2.vue ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Stocks2_vue_vue_type_template_id_33e8c1eb__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Stocks2.vue?vue&type=template&id=33e8c1eb */ "./resources/js/views/ar/pages/Stocks2.vue?vue&type=template&id=33e8c1eb");
/* harmony import */ var _Stocks2_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Stocks2.vue?vue&type=script&lang=js */ "./resources/js/views/ar/pages/Stocks2.vue?vue&type=script&lang=js");
/* harmony import */ var _Stocks2_vue_vue_type_style_index_0_id_33e8c1eb_lang_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Stocks2.vue?vue&type=style&index=0&id=33e8c1eb&lang=css */ "./resources/js/views/ar/pages/Stocks2.vue?vue&type=style&index=0&id=33e8c1eb&lang=css");
/* harmony import */ var _node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;


const __exports__ = /*#__PURE__*/(0,_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_3__["default"])(_Stocks2_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Stocks2_vue_vue_type_template_id_33e8c1eb__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/views/ar/pages/Stocks2.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/views/ar/pages/Stocks2.vue?vue&type=script&lang=js":
/*!*************************************************************************!*\
  !*** ./resources/js/views/ar/pages/Stocks2.vue?vue&type=script&lang=js ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Stocks2_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Stocks2_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Stocks2.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/pages/Stocks2.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/views/ar/pages/Stocks2.vue?vue&type=template&id=33e8c1eb":
/*!*******************************************************************************!*\
  !*** ./resources/js/views/ar/pages/Stocks2.vue?vue&type=template&id=33e8c1eb ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Stocks2_vue_vue_type_template_id_33e8c1eb__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Stocks2_vue_vue_type_template_id_33e8c1eb__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Stocks2.vue?vue&type=template&id=33e8c1eb */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/pages/Stocks2.vue?vue&type=template&id=33e8c1eb");


/***/ }),

/***/ "./resources/js/views/ar/pages/Stocks2.vue?vue&type=style&index=0&id=33e8c1eb&lang=css":
/*!*********************************************************************************************!*\
  !*** ./resources/js/views/ar/pages/Stocks2.vue?vue&type=style&index=0&id=33e8c1eb&lang=css ***!
  \*********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Stocks2_vue_vue_type_style_index_0_id_33e8c1eb_lang_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader/dist/cjs.js!../../../../../node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!../../../../../node_modules/vue-loader/dist/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Stocks2.vue?vue&type=style&index=0&id=33e8c1eb&lang=css */ "./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/pages/Stocks2.vue?vue&type=style&index=0&id=33e8c1eb&lang=css");


/***/ })

}]);
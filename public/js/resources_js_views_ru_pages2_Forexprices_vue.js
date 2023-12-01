"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_ru_pages2_Forexprices_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Forexprices.vue?vue&type=script&lang=js":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Forexprices.vue?vue&type=script&lang=js ***!
  \**********************************************************************************************************************************************************************************************************/
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
      site_title: "Forex Prices",
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
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Forexprices.vue?vue&type=template&id=0720fbbc":
/*!**************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Forexprices.vue?vue&type=template&id=0720fbbc ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "row gray_bg mrtb40"
};
var _hoisted_2 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"container\"><br><table width=\"680\" border=\"0\" align=\"center\"><tr><td><table width=\"680\" height=\"37\" border=\"0\" background=\"/assets/cimages/bg_1.jpg\"><tr><td><span class=\"style53\"><strong>Цены Форекс</strong></span></td></tr></table><br><p class=\"style51\">&quot;Bid&quot; против &quot;Ask&quot; </p><p>Цены форекс или котировки включают в себя «Bid» и «Ask», аналогичные другим финансовым продуктам. Ставка - это цена, по которой трейдер может продать валютную пару. Цена Bid или цена продажи валютной пары всегда является более низкой ценой в котировке. Аск, иногда называемый «Предложением», - это цена, по которой трейдеры могут купить валютную пару. Другими словами, трейдеры Forex всегда покупают на максимуме и продают на минимуме котировки. Разница между Bid и Ask называется «Spread» или «Pip Spread»., это стоимость Трейдера за сделку или за транзакцию Как правило, при торговле на рынке Форекс не взимаются дополнительные комиссионные брокера, как это может быть при торговле на других инвестиционных рынках.</p><p> </p><p class=\"style52\">Reading Price Quotes </p><p>Поначалу чтение цитаты Форекс может показаться немного запутанным. Тем не менее, это действительно довольно просто, если вы можете запомнить две вещи: <br> 1. The first currency listed is the <em>base</em> currency <br> 2. The value of the <em>base</em> currency is always 1 (one).</p><p align=\"center\"><img src=\"/assets/cimages/untitlednmnhj.jpg/\"></p><p>Котировка USD / JPY на 116,04 означает, что 1 доллар США (USD) = 116,04 японских иен (JPY). Когда доллар США является базовой единицей и цена валютной пары увеличивается, сравнительно доллар укрепился, а другая валюта в паре (обычно называемая кросс-валютой) ослабла. Используя приведенный выше пример USD / JPY в качестве ориентира, если USD / JPY увеличивается с 116,04 до 117,51 (147 пунктов), доллар сильнее, потому что теперь он будет покупать больше иены, чем раньше. </p>     <p> Существует четыре валютные пары, включающие доллар США, в которых доллар США не является базовой валютой. Этими исключениями являются австралийский доллар (AUD), британский фунт (GBP), евро (EUR) и новозеландский доллар (NZD). Котировка GBP / USD на 1.7600 будет означать, что один британский фунт равен 1.7600 долларов США. Если цена валютной пары увеличивается, стоимость базовой валюты по сравнению с кросс-валютой, таким образом, увеличивается. И наоборот, если цена валютной пары снижается, это означает, что стоимость базовой валюты по сравнению с кросс-валютой ослабла. </p><p> </p><table width=\"680\" height=\"37\" border=\"0\"><tr><td><span class=\"style53\"><strong>    Что влияет на цену?</strong></span></td></tr></table><br><p>Рынки Форекс и цены в основном зависят от международной торговли и инвестиционных потоков. На рынок Форекс также влияют, но в меньшей степени, те же факторы, которые влияют на рынки акций и облигаций: экономические и политические условия, особенно процентные ставки, инфляция и политическая стабильность или, как это часто бывает, политическая нестабильность. Хотя экономические факторы оказывают долгосрочное влияние, зачастую немедленная реакция вызывает ежедневную волатильность цен, что делает торговлю на Форекс очень привлекательной для внутридневных трейдеров. Торговля валютой может предложить инвесторам еще один уровень диверсификации. Торговля валютами может рассматриваться как средство защиты от неблагоприятных изменений на рынках акций и облигаций, которые, конечно, также влияют на взаимные фонды. Вам следует помнить, что торговля на внебиржевом валютном рынке является одной из самых рискованных форм торговли, и вы должны инвестировать только небольшую часть своего рискового капитала на этом рынке.</p></td></tr></table></div>", 1);
var _hoisted_3 = [_hoisted_2];
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [].concat(_hoisted_3));
}

/***/ }),

/***/ "./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Forexprices.vue?vue&type=style&index=0&id=0720fbbc&lang=css":
/*!************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Forexprices.vue?vue&type=style&index=0&id=0720fbbc&lang=css ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
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
___CSS_LOADER_EXPORT___.push([module.id, "\n.style50 {color: #FFFFFF}\n.style51 {\r\n    color: #a6c54c;\r\n    font-weight: bold;\n}\n.style52 {\r\n    color: #a6c54c;\r\n    font-weight: bold;\n}\n.style53 {\r\n    color: #FFFFFF;\r\n    font-size: 13px;\n}\r\n\r\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Forexprices.vue?vue&type=style&index=0&id=0720fbbc&lang=css":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Forexprices.vue?vue&type=style&index=0&id=0720fbbc&lang=css ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Forexprices_vue_vue_type_style_index_0_id_0720fbbc_lang_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../../node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!../../../../../node_modules/vue-loader/dist/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Forexprices.vue?vue&type=style&index=0&id=0720fbbc&lang=css */ "./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Forexprices.vue?vue&type=style&index=0&id=0720fbbc&lang=css");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Forexprices_vue_vue_type_style_index_0_id_0720fbbc_lang_css__WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Forexprices_vue_vue_type_style_index_0_id_0720fbbc_lang_css__WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/views/ru/pages2/Forexprices.vue":
/*!******************************************************!*\
  !*** ./resources/js/views/ru/pages2/Forexprices.vue ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Forexprices_vue_vue_type_template_id_0720fbbc__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Forexprices.vue?vue&type=template&id=0720fbbc */ "./resources/js/views/ru/pages2/Forexprices.vue?vue&type=template&id=0720fbbc");
/* harmony import */ var _Forexprices_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Forexprices.vue?vue&type=script&lang=js */ "./resources/js/views/ru/pages2/Forexprices.vue?vue&type=script&lang=js");
/* harmony import */ var _Forexprices_vue_vue_type_style_index_0_id_0720fbbc_lang_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Forexprices.vue?vue&type=style&index=0&id=0720fbbc&lang=css */ "./resources/js/views/ru/pages2/Forexprices.vue?vue&type=style&index=0&id=0720fbbc&lang=css");
/* harmony import */ var _node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;


const __exports__ = /*#__PURE__*/(0,_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_3__["default"])(_Forexprices_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Forexprices_vue_vue_type_template_id_0720fbbc__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/views/ru/pages2/Forexprices.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/views/ru/pages2/Forexprices.vue?vue&type=script&lang=js":
/*!******************************************************************************!*\
  !*** ./resources/js/views/ru/pages2/Forexprices.vue?vue&type=script&lang=js ***!
  \******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Forexprices_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Forexprices_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Forexprices.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Forexprices.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/views/ru/pages2/Forexprices.vue?vue&type=template&id=0720fbbc":
/*!************************************************************************************!*\
  !*** ./resources/js/views/ru/pages2/Forexprices.vue?vue&type=template&id=0720fbbc ***!
  \************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Forexprices_vue_vue_type_template_id_0720fbbc__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Forexprices_vue_vue_type_template_id_0720fbbc__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Forexprices.vue?vue&type=template&id=0720fbbc */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Forexprices.vue?vue&type=template&id=0720fbbc");


/***/ }),

/***/ "./resources/js/views/ru/pages2/Forexprices.vue?vue&type=style&index=0&id=0720fbbc&lang=css":
/*!**************************************************************************************************!*\
  !*** ./resources/js/views/ru/pages2/Forexprices.vue?vue&type=style&index=0&id=0720fbbc&lang=css ***!
  \**************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Forexprices_vue_vue_type_style_index_0_id_0720fbbc_lang_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader/dist/cjs.js!../../../../../node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!../../../../../node_modules/vue-loader/dist/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Forexprices.vue?vue&type=style&index=0&id=0720fbbc&lang=css */ "./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Forexprices.vue?vue&type=style&index=0&id=0720fbbc&lang=css");


/***/ })

}]);
"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_ru_pages2_Pip-calculator_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=script&lang=js":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=script&lang=js ***!
  \*************************************************************************************************************************************************************************************************************/
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
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw new Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator["return"] && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw new Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, "catch": function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }




var errors = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)();
var router = (0,vue_router__WEBPACK_IMPORTED_MODULE_2__.useRouter)();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  directives: {
    'raw-html': function rawHtml(el, binding) {
      el.innerHTML = binding.value;
    }
  },
  data: function data() {
    return {
      site_title: "",
      site_description: "",
      site_keywords: '',
      calculator1: '\\n<thead>\\n<tr>\\n<th>Currency<\\/th>\\n<th>Price<\\/th>\\n<th>\\nStandard Lot <div class=\\"arial_11 noBold\\">(Units 100,000)<\\/div>\\n<\\/th>\\n<th>\\nMini Lot <div class=\\"arial_11 noBold\\">(Units 10,000)<\\/div>\\n<\\/th>\\n<th>\\nMicro Lot <div class=\\"arial_11 noBold\\">(Units 1,000)<\\/div>\\n<\\/th>\\n<th>Pip Value<\\/th>\\n<\\/tr>\\n<\\/thead>\\n<tbody>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/aud-cad\\">AUD\\/CAD<\\/a>\\n<\\/td>\\n<td id=\\"price_47\\">\\n0.8782 <\\/td>\\n<td id=\\"standard_47\\">\\n7.61 <\\/td>\\n<td id=\\"mini_47\\">\\n0.76 <\\/td>\\n<td id=\\"micro_47\\">\\n0.08 <\\/td>\\n<td class=\\"bold\\" id=\\"value_47\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/aud-chf\\">AUD\\/CHF<\\/a>\\n<\\/td>\\n<td id=\\"price_48\\">\\n0.5980 <\\/td>\\n<td id=\\"standard_48\\">\\n11.17 <\\/td>\\n<td id=\\"mini_48\\">\\n1.12 <\\/td>\\n<td id=\\"micro_48\\">\\n0.11 <\\/td>\\n<td class=\\"bold\\" id=\\"value_48\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/aud-jpy\\">AUD\\/JPY<\\/a>\\n <\\/td>\\n<td id=\\"price_49\\">\\n95.88 <\\/td>\\n<td id=\\"standard_49\\">\\n696.90 <\\/td>\\n<td id=\\"mini_49\\">\\n69.69 <\\/td>\\n<td id=\\"micro_49\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_49\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/aud-nzd\\">AUD\\/NZD<\\/a>\\n<\\/td>\\n<td id=\\"price_50\\">\\n1.0827 <\\/td>\\n<td id=\\"standard_50\\">\\n6.17 <\\/td>\\n<td id=\\"mini_50\\">\\n0.62 <\\/td>\\n<td id=\\"micro_50\\">\\n0.06 <\\/td>\\n<td class=\\"bold\\" id=\\"value_50\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/aud-usd\\">AUD\\/USD<\\/a>\\n<\\/td>\\n<td id=\\"price_5\\">\\n0.6682 <\\/td>\\n<td id=\\"standard_5\\">\\n10.00 <\\/td>\\n<td id=\\"mini_5\\">\\n1.00 <\\/td>\\n<td id=\\"micro_5\\">\\n0.10 <\\/td>\\n<td class=\\"bold\\" id=\\"value_5\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/cad-jpy\\">CAD\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_51\\">\\n109.17 <\\/td>\\n<td id=\\"standard_51\\">\\n696.90 <\\/td>\\n<td id=\\"mini_51\\">\\n69.69 <\\/td>\\n<td id=\\"micro_51\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_51\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/chf-jpy\\">CHF\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_13\\">\\n160.32 <\\/td>\\n<td id=\\"standard_13\\">\\n696.90 <\\/td>\\n<td id=\\"mini_13\\">\\n69.69 <\\/td>\\n<td id=\\"micro_13\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_13\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-aud\\">EUR\\/AUD<\\/a>\\n<\\/td>\\n<td id=\\"price_15\\">\\n1.6334 <\\/td>\\n<td id=\\"standard_15\\">\\n6.68 <\\/td>\\n<td id=\\"mini_15\\">\\n0.67 <\\/td>\\n<td id=\\"micro_15\\">\\n0.07 <\\/td>\\n<td class=\\"bold\\" id=\\"value_15\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-cad\\">EUR\\/CAD<\\/a>\\n<\\/td>\\n<td id=\\"price_16\\">\\n1.4343 <\\/td>\\n<td id=\\"standard_16\\">\\n7.61 <\\/td>\\n<td id=\\"mini_16\\">\\n0.76 <\\/td>\\n<td id=\\"micro_16\\">\\n0.08 <\\/td>\\n<td class=\\"bold\\" id=\\"value_16\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-chf\\">EUR\\/CHF<\\/a>\\n<\\/td>\\n<td id=\\"price_10\\">\\n0.9768 <\\/td>\\n<td id=\\"standard_10\\">\\n11.17 <\\/td>\\n<td id=\\"mini_10\\">\\n1.12 <\\/td>\\n<td id=\\"micro_10\\">\\n0.11 <\\/td>\\n<td class=\\"bold\\" id=\\"value_10\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-gbp\\">EUR\\/GBP<\\/a>\\n<\\/td>\\n<td id=\\"price_6\\">\\n0.8578 <\\/td>\\n<td id=\\"standard_6\\">\\n12.72 <\\/td>\\n<td id=\\"mini_6\\">\\n1.27 <\\/td>\\n<td id=\\"micro_6\\">\\n0.13 <\\/td>\\n<td class=\\"bold\\" id=\\"value_6\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-jpy\\">EUR\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_9\\">\\n156.59 <\\/td>\\n<td id=\\"standard_9\\">\\n696.90 <\\/td>\\n<td id=\\"mini_9\\">\\n69.69 <\\/td>\\n<td id=\\"micro_9\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_9\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-nzd\\">EUR\\/NZD<\\/a>\\n<\\/td>\\n<td id=\\"price_52\\">\\n1.7683 <\\/td>\\n<td id=\\"standard_52\\">\\n6.17 <\\/td>\\n<td id=\\"mini_52\\">\\n0.62 <\\/td>\\n<td id=\\"micro_52\\">\\n0.06 <\\/td>\\n<td class=\\"bold\\" id=\\"value_52\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/eur-usd\\">EUR\\/USD<\\/a>\\n<\\/td>\\n<td id=\\"price_1\\">\\n1.0913 <\\/td>\\n<td id=\\"standard_1\\">\\n10.00 <\\/td>\\n<td id=\\"mini_1\\">\\n1.00 <\\/td>\\n<td id=\\"micro_1\\">\\n0.10 <\\/td>\\n<td class=\\"bold\\" id=\\"value_1\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-aud\\">GBP\\/AUD<\\/a>\\n<\\/td>\\n<td id=\\"price_53\\">\\n1.9042 <\\/td>\\n<td id=\\"standard_53\\">\\n6.68 <\\/td>\\n<td id=\\"mini_53\\">\\n0.67 <\\/td>\\n<td id=\\"micro_53\\">\\n0.07 <\\/td>\\n<td class=\\"bold\\" id=\\"value_53\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-cad\\">GBP\\/CAD<\\/a>\\n<\\/td>\\n<td id=\\"price_54\\">\\n1.6721 <\\/td>\\n<td id=\\"standard_54\\">\\n7.61 <\\/td>\\n<td id=\\"mini_54\\">\\n0.76 <\\/td>\\n<td id=\\"micro_54\\">\\n0.08 <\\/td>\\n<td class=\\"bold\\" id=\\"value_54\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-chf\\">GBP\\/CHF<\\/a>\\n<\\/td>\\n<td id=\\"price_12\\">\\n1.1388 <\\/td>\\n<td id=\\"standard_12\\">\\n11.17 <\\/td>\\n<td id=\\"mini_12\\">\\n1.12 <\\/td>\\n<td id=\\"micro_12\\">\\n0.11 <\\/td>\\n<td class=\\"bold\\" id=\\"value_12\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-jpy\\">GBP\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_11\\">\\n182.55 <\\/td>\\n<td id=\\"standard_11\\">\\n 696.90 <\\/td>\\n<td id=\\"mini_11\\">\\n69.69 <\\/td>\\n<td id=\\"micro_11\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_11\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-nzd\\">GBP\\/NZD<\\/a>\\n<\\/td>\\n<td id=\\"price_55\\">\\n2.0616 <\\/td>\\n<td id=\\"standard_55\\">\\n6.17 <\\/td>\\n<td id=\\"mini_55\\">\\n0.62 <\\/td>\\n<td id=\\"micro_55\\">\\n0.06 <\\/td>\\n<td class=\\"bold\\" id=\\"value_55\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/gbp-usd\\">GBP\\/USD<\\/a>\\n<\\/td>\\n<td id=\\"price_2\\">\\n1.2723 <\\/td>\\n<td id=\\"standard_2\\">\\n10.00 <\\/td>\\n<td id=\\"mini_2\\">\\n1.00 <\\/td>\\n<td id=\\"micro_2\\">\\n0.10 <\\/td>\\n<td class=\\"bold\\" id=\\"value_2\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/nzd-jpy\\">NZD\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_58\\">\\n88.55 <\\/td>\\n<td id=\\"standard_58\\">\\n696.90 <\\/td>\\n<td id=\\"mini_58\\">\\n69.69 <\\/td>\\n<td id=\\"micro_58\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_58\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/nzd-usd\\">NZD\\/USD<\\/a>\\n<\\/td>\\n<td id=\\"price_8\\">\\n0.6171 <\\/td>\\n<td id=\\"standard_8\\">\\n10.00 <\\/td>\\n<td id=\\"mini_8\\">\\n1.00 <\\/td>\\n<td id=\\"micro_8\\">\\n0.10 <\\/td>\\n<td class=\\"bold\\" id=\\"value_8\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-brl\\">USD\\/BRL<\\/a>\\n<\\/td>\\n<td id=\\"price_2103\\">\\n4.7624 <\\/td>\\n<td id=\\"standard_2103\\">\\n2.10 <\\/td>\\n <td id=\\"mini_2103\\">\\n0.21 <\\/td>\\n<td id=\\"micro_2103\\">\\n0.02 <\\/td>\\n<td class=\\"bold\\" id=\\"value_2103\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-cad\\">USD\\/CAD<\\/a>\\n<\\/td>\\n<td id=\\"price_7\\">\\n1.3143 <\\/td>\\n<td id=\\"standard_7\\">\\n7.61 <\\/td>\\n<td id=\\"mini_7\\">\\n0.76 <\\/td>\\n<td id=\\"micro_7\\">\\n0.08 <\\/td>\\n<td class=\\"bold\\" id=\\"value_7\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-chf\\">USD\\/CHF<\\/a>\\n<\\/td>\\n<td id=\\"price_4\\">\\n0.8950 <\\/td>\\n<td id=\\"standard_4\\">\\n11.17 <\\/td>\\n<td id=\\"mini_4\\">\\n1.12 <\\/td>\\n<td id=\\"micro_4\\">\\n0.11 <\\/td>\\n<td class=\\"bold\\" id=\\"value_4\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-cny\\">USD\\/CNY<\\/a>\\n<\\/td>\\n<td id=\\"price_2111\\">\\n7.2376 <\\/td>\\n<td id=\\"standard_2111\\">\\n1.38 <\\/td>\\n<td id=\\"mini_2111\\">\\n0.14 <\\/td>\\n<td id=\\"micro_2111\\">\\n0.01 <\\/td>\\n<td class=\\"bold\\" id=\\"value_2111\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-inr\\">USD\\/INR<\\/a>\\n<\\/td>\\n<td id=\\"price_160\\">\\n81.999 <\\/td>\\n<td id=\\"standard_160\\">\\n0.12 <\\/td>\\n<td id=\\"mini_160\\">\\n0.01 <\\/td>\\n<td id=\\"micro_160\\">\\n0.00 <\\/td>\\n<td class=\\"bold\\" id=\\"value_160\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-jpy\\">USD\\/JPY<\\/a>\\n<\\/td>\\n<td id=\\"price_3\\">\\n143.49 <\\/td>\\n<td id=\\"standard_3\\">\\n696.90 <\\/td>\\n<td id=\\"mini_3\\">\\n69.69 <\\/td>\\n<td id=\\"micro_3\\">\\n6.97 <\\/td>\\n<td class=\\"bold\\" id=\\"value_3\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-rub\\">USD\\/RUB<\\/a>\\n<\\/td>\\n<td id=\\"price_2186\\">\\n85.0875 <\\/td>\\n<td id=\\"standard_2186\\">\\n0.12 <\\/td>\\n<td id=\\"mini_2186\\">\\n0.01 <\\/td>\\n<td id=\\"micro_2186\\">\\n0.00 <\\/td>\\n<td class=\\"bold\\" id=\\"value_2186\\">\\n\\n<\\/td>\\n<\\/tr>\\n<tr class=\\"subtotal\\">\\n<td class=\\"bold\\">\\n<a href=\\"\\/\\/www.investing.com\\/currencies\\/usd-try\\">USD\\/TRY<\\/a>\\n<\\/td>\\n<td id=\\"price_18\\">\\n26.0098 <\\/td>\\n<td id=\\"standard_18\\">\\n0.38 <\\/td>\\n<td id=\\"mini_18\\">\\n0.04 <\\/td>\\n<td id=\\"micro_18\\">\\n0.00 <\\/td>\\n<td class=\\"bold\\" id=\\"value_18\\">\\n\\n<\\/td>\\n<\\/tr>\\n<\\/tbody>\\n"\n',
      calculator2: '',
      calculator: ''
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
    this.getData();
  },
  methods: {
    getData: function getData() {
      var _this2 = this;
      return _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
        var router, result;
        return _regeneratorRuntime().wrap(function _callee$(_context) {
          while (1) switch (_context.prev = _context.next) {
            case 0:
              router = (0,vue_router__WEBPACK_IMPORTED_MODULE_2__.useRouter)();
              _context.prev = 1;
              _context.next = 4;
              return axios__WEBPACK_IMPORTED_MODULE_1___default().get('/api/pip-calculator');
            case 4:
              result = _context.sent;
              if (result.status === 200) {
                _this2.site_title = result.data.title.ru;
                _this2.site_keywords = result.data.keywords.ru;
                _this2.site_description = result.data.description.ru;
                _this2.calculator = result.data.calculator_en;
              } else {
                console.log('Error');
              }
              _context.next = 11;
              break;
            case 8:
              _context.prev = 8;
              _context.t0 = _context["catch"](1);
              console.log('Error');
            case 11:
            case "end":
              return _context.stop();
          }
        }, _callee, null, [[1, 8]]);
      }))();
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=template&id=830605e8":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=template&id=830605e8 ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "row gray_bg"
};
var _hoisted_2 = {
  "class": "container"
};
var _hoisted_3 = {
  "class": "row gray_bg mrtb40"
};
var _hoisted_4 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "table-responsive"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("table", {
  "class": "pipCalcResults table table-responsive",
  id: "results"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("iframe", {
  src: "/ru/pip-calculator2/",
  scrolling: "no",
  style: {
    "width": "100%",
    "height": "100%",
    "min-height": "1200px"
  }
})])], -1 /* HOISTED */);
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(this.site_title), 1 /* TEXT */), _hoisted_4])])]);
}

/***/ }),

/***/ "./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=style&index=0&id=830605e8&lang=css":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=style&index=0&id=830605e8&lang=css ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
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
___CSS_LOADER_EXPORT___.push([module.id, "\ntable thead tr th{text-align: center;}\r\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=style&index=0&id=830605e8&lang=css":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=style&index=0&id=830605e8&lang=css ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Pip_calculator_vue_vue_type_style_index_0_id_830605e8_lang_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../../node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!../../../../../node_modules/vue-loader/dist/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Pip-calculator.vue?vue&type=style&index=0&id=830605e8&lang=css */ "./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=style&index=0&id=830605e8&lang=css");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Pip_calculator_vue_vue_type_style_index_0_id_830605e8_lang_css__WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Pip_calculator_vue_vue_type_style_index_0_id_830605e8_lang_css__WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/views/ru/pages2/Pip-calculator.vue":
/*!*********************************************************!*\
  !*** ./resources/js/views/ru/pages2/Pip-calculator.vue ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Pip_calculator_vue_vue_type_template_id_830605e8__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Pip-calculator.vue?vue&type=template&id=830605e8 */ "./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=template&id=830605e8");
/* harmony import */ var _Pip_calculator_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Pip-calculator.vue?vue&type=script&lang=js */ "./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=script&lang=js");
/* harmony import */ var _Pip_calculator_vue_vue_type_style_index_0_id_830605e8_lang_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Pip-calculator.vue?vue&type=style&index=0&id=830605e8&lang=css */ "./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=style&index=0&id=830605e8&lang=css");
/* harmony import */ var _node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;


const __exports__ = /*#__PURE__*/(0,_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_3__["default"])(_Pip_calculator_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Pip_calculator_vue_vue_type_template_id_830605e8__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/views/ru/pages2/Pip-calculator.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=script&lang=js":
/*!*********************************************************************************!*\
  !*** ./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=script&lang=js ***!
  \*********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Pip_calculator_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Pip_calculator_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Pip-calculator.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=template&id=830605e8":
/*!***************************************************************************************!*\
  !*** ./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=template&id=830605e8 ***!
  \***************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Pip_calculator_vue_vue_type_template_id_830605e8__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Pip_calculator_vue_vue_type_template_id_830605e8__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Pip-calculator.vue?vue&type=template&id=830605e8 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=template&id=830605e8");


/***/ }),

/***/ "./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=style&index=0&id=830605e8&lang=css":
/*!*****************************************************************************************************!*\
  !*** ./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=style&index=0&id=830605e8&lang=css ***!
  \*****************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_laravel_mix_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Pip_calculator_vue_vue_type_style_index_0_id_830605e8_lang_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/style-loader/dist/cjs.js!../../../../../node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!../../../../../node_modules/vue-loader/dist/stylePostLoader.js!../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Pip-calculator.vue?vue&type=style&index=0&id=830605e8&lang=css */ "./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/Pip-calculator.vue?vue&type=style&index=0&id=830605e8&lang=css");


/***/ })

}]);
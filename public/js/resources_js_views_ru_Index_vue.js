"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_ru_Index_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/Index.vue?vue&type=script&lang=js":
/*!*********************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/Index.vue?vue&type=script&lang=js ***!
  \*********************************************************************************************************************************************************************************************/
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
/* harmony import */ var v_lazy_image__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! v-lazy-image */ "./node_modules/v-lazy-image/dist/v-lazy-image.mjs");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw new Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator["return"] && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw new Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, "catch": function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }





var errors = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)();
var router = (0,vue_router__WEBPACK_IMPORTED_MODULE_3__.useRouter)();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      site_title: "",
      site_description: "",
      site_keywords: '',
      fundamentalanalysises: [],
      url: '',
      action: 'click',
      speed: 500,
      img: '',
      head: '',
      slideIndex: '1',
      slideIndexx: '1',
      i: '',
      slides: '',
      slidess: '',
      dots: '',
      dotss: ''
    };
  },
  mounted: function mounted() {
    this.getData();
    this.fundamentalanalysises;
    this.plusSlides(1);
  },
  components: {
    VLazyImage: v_lazy_image__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  methods: {
    getData: function getData() {
      var _this = this;
      return _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
        var result;
        return _regeneratorRuntime().wrap(function _callee$(_context) {
          while (1) switch (_context.prev = _context.next) {
            case 0:
              _context.prev = 0;
              _context.next = 3;
              return axios__WEBPACK_IMPORTED_MODULE_1___default().get('/api/index');
            case 3:
              result = _context.sent;
              if (result.status === 200 && result.data) {
                _this.fundamentalanalysises = result.data.data.en.fundamentalanalysis;
                _this.site_title = result.data.data.en.title;
                _this.site_description = result.data.data.en.description;
                _this.site_keywords = result.data.data.en.keywords;
                (0,_vueuse_head__WEBPACK_IMPORTED_MODULE_4__.u)({
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
              _context.next = 10;
              break;
            case 7:
              _context.prev = 7;
              _context.t0 = _context["catch"](0);
              if (_context.t0 && _context.t0.response.data && _context.t0.response.data.errors) {
                errors.value = Object.values(_context.t0.response.data.errors);
              } else {
                errors.value = _context.t0.response.data.message || "";
              }
            case 10:
            case "end":
              return _context.stop();
          }
        }, _callee, null, [[0, 7]]);
      }))();
    },
    plusSlides: function plusSlides(n) {
      this.slideIndex = this.slideIndex + n;
      this.showSlides(this.slideIndex += n);
    },
    currentSlide: function currentSlide(n) {
      this.showSlides(this.slideIndex = n);
    },
    plusSlidess: function plusSlidess(n) {
      this.slideIndexx = this.slideIndexx + n;
      this.showSlidess(this.slideIndexx += n);
    },
    currentSlidee: function currentSlidee(n) {
      this.showSlidess(this.slideIndexx = n);
    },
    showSlides: function showSlides(n) {
      this.slides = document.getElementsByClassName("mySlides");
      this.dots = document.getElementsByClassName("dot");
      if (n > this.slides.length) {
        this.slideIndex = 1;
      }
      if (n < 1) {
        this.slideIndex = this.slides.length;
      }
      for (this.i = 0; this.i < this.slides.length; this.i++) {
        this.slides[this.i].style.display = "none";
      }
      for (this.i = 0; this.i < this.dots.length; this.i++) {
        this.dots[this.i].className = this.dots[this.i].className.replace(" active", "");
      }
      this.slideIndex = this.slideIndex - 1;
      this.slides[this.slideIndex].style.display = "block";
      this.dots[this.slideIndex].className += " active";
    },
    showSlidess: function showSlidess(n) {
      this.slidess = document.getElementsByClassName("Slides");
      this.dotss = document.getElementsByClassName("dott");
      if (n > this.slidess.length - 1) {
        this.slideIndexx = 1;
      }
      if (n < 1) {
        this.slideIndexx = this.slidess.length;
      }
      for (this.i = 0; this.i < this.slidess.length; this.i++) {
        this.slidess[this.i].style.display = "none";
      }
      for (this.i = 0; this.i < this.dotss.length; this.i++) {
        this.dotss[this.i].className = this.dotss[this.i].className.replace(" active", "");
      }
      this.slideIndexx = this.slideIndexx - 1;
      this.slidess[this.slideIndexx].style.display = "block";
      this.dotss[this.slideIndexx].className += " active";
    }
  },
  created: function created() {
    var _this2 = this;
    setInterval(function () {
      _this2.plusSlides(1);
    }, 8000);
  },
  setup: function setup() {}
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/Index.vue?vue&type=template&id=488b4a36":
/*!*************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/Index.vue?vue&type=template&id=488b4a36 ***!
  \*************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "slideshow-container"
};
var _hoisted_2 = {
  "class": "mySlides fade_slide",
  style: {
    "display": "none"
  }
};
var _hoisted_3 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "slide-text"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#ffc926",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'",
    "display": "none"
  }
}, "Scalping "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#0059b2",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'",
    "margin-top": "-18px",
    "display": "none"
  }
}, "For a living")], -1 /* HOISTED */);
var _hoisted_4 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"buttons-overlay\"><a href=\"/ru/signup\" class=\"slide-live-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>ОТКРЫТЬ РЕАЛЬНЫЙ СЧЕТ</a><a href=\"/ru/signup\" class=\"slide-demo-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>ОТКРЫТЬ ДЕМО-СЧЕТ</a></div>", 1);
var _hoisted_5 = {
  "class": "mySlides fade_slide",
  style: {
    "display": "none"
  }
};
var _hoisted_6 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "slide-text"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#ffc926",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'",
    "display": "none"
  }
}, "Scalping "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#0059b2",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'",
    "margin-top": "-18px",
    "display": "none"
  }
}, "For a living")], -1 /* HOISTED */);
var _hoisted_7 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"buttons-overlay\"><a href=\"/ru/signup\" class=\"slide-live-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>ОТКРЫТЬ РЕАЛЬНЫЙ СЧЕТ</a><a href=\"/ru/signup\" class=\"slide-demo-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>ОТКРЫТЬ ДЕМО-СЧЕТ</a></div>", 1);
var _hoisted_8 = {
  "class": "mySlides fade_slide"
};
var _hoisted_9 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "slide-text",
  style: {
    "display": "none"
  }
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#ffc926",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'"
  }
}, "Scalping "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#0059b2",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'",
    "margin-top": "-18px"
  }
}, "For a living")], -1 /* HOISTED */);
var _hoisted_10 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"buttons-overlay\"><a href=\"/ru/signup\" class=\"slide-live-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>ОТКРЫТЬ РЕАЛЬНЫЙ СЧЕТ</a><a href=\"/ru/signup\" class=\"slide-demo-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>ОТКРЫТЬ ДЕМО-СЧЕТ</a></div>", 1);
var _hoisted_11 = {
  "class": "mySlides fade_slide"
};
var _hoisted_12 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "slide-text",
  style: {
    "display": "none"
  }
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#ffc926",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'"
  }
}, "Scalping "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#0059b2",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'",
    "margin-top": "-18px"
  }
}, "For a living")], -1 /* HOISTED */);
var _hoisted_13 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"buttons-overlay\"><a href=\"/ru/signup\" class=\"slide-live-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>ОТКРЫТЬ РЕАЛЬНЫЙ СЧЕТ</a><a href=\"/ru/signup\" class=\"slide-demo-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>ОТКРЫТЬ ДЕМО-СЧЕТ</a></div>", 1);
var _hoisted_14 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"buttons-overlay2\"><a href=\"/ru/signup\" class=\"slide-live-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>ОТКРЫТЬ РЕАЛЬНЫЙ СЧЕТ</a><a href=\"/ru/signup\" class=\"slide-demo-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>ОТКРЫТЬ ДЕМО-СЧЕТ</a></div>", 1);
var _hoisted_15 = {
  id: "dot_navigation"
};
var _hoisted_16 = {
  "class": "row",
  id: "main-features"
};
var _hoisted_17 = {
  "class": "col-md-9 col-sm-12",
  id: "main-features-left"
};
var _hoisted_18 = {
  "class": "col-md-3 col-xs-6"
};
var _hoisted_19 = {
  "class": ""
};
var _hoisted_20 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": ""
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, "Депозит и вывод без комиссии")], -1 /* HOISTED */);
var _hoisted_21 = {
  "class": "col-md-3 col-xs-6"
};
var _hoisted_22 = {
  "class": ""
};
var _hoisted_23 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": ""
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, "Низкий минимум депозит 100$")], -1 /* HOISTED */);
var _hoisted_24 = {
  "class": "col-md-3 col-xs-6"
};
var _hoisted_25 = {
  "class": ""
};
var _hoisted_26 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": ""
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, "Быстрое исполнение 0 комиссии")], -1 /* HOISTED */);
var _hoisted_27 = {
  "class": "col-md-3 col-xs-6"
};
var _hoisted_28 = {
  "class": ""
};
var _hoisted_29 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": ""
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, "Свободно инструменты анализа")], -1 /* HOISTED */);
var _hoisted_30 = {
  "class": "col-md-3 col-sm-12",
  id: "main-features-right"
};
var _hoisted_31 = {
  "class": ""
};
var _hoisted_32 = {
  href: "/ru/signup"
};
var _hoisted_33 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  id: "start-trading"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("b", null, "НАЧАТЬ СВОЮ ТОРГОВЛЮ "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "теперь, чтобы стать экспертом в торговле."), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("b", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
  href: "/ru/signup"
}, "ПРИСОЕДИНЯЙСЯ СЕЙЧАС!")])], -1 /* HOISTED */);
var _hoisted_34 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"uk-container in-wave-4uk-container in-wave-4\"><div class=\"uk-grid uk-flex uk-flex-center\"><div class=\"col-sm-12\" id=\"main-section-2\"><div class=\"col-sm-12\"><div class=\"\" id=\"left-section\"><p class=\"uk-margin-remove-bottom\">ПОЛНЫЙ ИНВЕСТИЦИОННЫЙ ВЫБОР</p></div></div><div class=\"col-sm-12\" id=\"right-section\"><div class=\"\"><p class=\"uk-text-lead uk-text-muted uk-margin-small-top uk-margin-bottom\">Получите сверхконкурентные спреды и комиссии по всем классам активов.</p><p class=\"uk-text-lead uk-text-muted uk-margin-small-top uk-margin-bottom\">Получите еще более высокие ставки по мере увеличения вашего объема.</p></div></div></div><div class=\"col-sm-12\" id=\"main-section-3\"><div class=\"col-md-4 col-sm-4 col-xs-6 main-column\"><div class=\"col-sm-12\" id=\"content\"><p class=\"main_title\"><span class=\"Bold_blue\">FX Распространение до</span></p><h1 class=\"uk-margin-top\"> $ 0 за сделку</h1><p class=\"Bold_blue hint\">0.1 типун </p><p> Торгуйте 182 валютными спотовыми парами и 140 форвардными контрактами на основные, второстепенные, экзотические и металлы..</p></div><a href=\"/ru/forexbroker\">Читать далее &gt;&gt;</a></div><div class=\"col-md-4 col-sm-4 col-xs-6 main-column\"><div class=\"col-sm-12\" id=\"content\"><p class=\"main_title\"><span class=\"Bold_blue\">Акции</span></p><h1 class=\"uk-margin-top\">0.2$ за акцию</h1><p>Инвестируйте в мировые акции.</p><p>на US500 Открывайте длинную или короткую позицию по 9000+ инструментам с узкими спредами и низкими комиссиями.</p></div><a href=\"/ru/futuretrading\">Читать далее &gt;&gt;</a></div><div class=\"col-md-4 col-sm-4 col-xs-6 main-column\"><div class=\"col-sm-12\" id=\"content\"><p class=\"main_title\"><span class=\"Bold_blue\">Сырьевые товары</span></p><h1 class=\"uk-margin-top\">$ 0 за сделку</h1><p>Разнообразьте свой портфель широким ассортиментом товаров.</p><p>Торгуйте широким спектром товаров, таких как CFD, фьючерсы, опционы, спотовые пары и т. Д.</p></div><a href=\"/ru/future\">Читать далее &gt;&gt;</a></div><div class=\"col-md-4 col-sm-4 col-xs-6 main-column\"><div class=\"col-sm-12\" id=\"content\"><p class=\"main_title\"><span class=\"Bold_blue\">торговля драгоценными металлами</span></p><h1 class=\"uk-margin-top\">$ 0 за сделку</h1><p>Торгуйте золотом, серебром, медью, платиной и палладием против основных валют.</p><p> по акциям США, доступ к более чем 19 000 акций на основных и развивающихся рынках на 36 биржах по всему миру.</p></div><a href=\"/ru/preciousmetals\">Читать далее &gt;&gt;</a></div><div class=\"col-md-4 col-sm-4 col-xs-6 main-column\"><div class=\"col-sm-12\" id=\"content\"><p class=\"main_title\"><span class=\"Bold_blue\">торговля энергией будущего</span></p><h1 class=\"uk-margin-top\"> $ 0 за сделку</h1><p> Энергии будущего, торгуемые в JMI Brokers, включают: легкую малосернистую нефть, природный газ.</p></div><a href=\"/ru/futureenergies\">Читать далее &gt;&gt;</a></div><div class=\"col-md-4 col-sm-4 col-xs-6 main-column\"><div class=\"col-sm-12\" id=\"content\"><p class=\"main_title\"><span class=\"Bold_blue\">Торговля индексами</span></p><h1 class=\"uk-margin-top\"> $ 0 за сделку</h1><p> JMI Brokers предлагает торговлю самыми продаваемыми фондовыми индексами в мире: индекс Доу-Джонса, E-mini S&amp;P 500 и E-mini NASDAQ 100.</p></div><a href=\"/ru/futuretrading\">Читать далее &gt;&gt;</a></div></div></div></div>", 1);
var _hoisted_35 = {
  "class": "alternative",
  id: "main-section-6"
};
var _hoisted_36 = {
  "class": "uk-container in-wave-4",
  id: "main-section-66"
};
var _hoisted_37 = {
  "class": "uk-grid uk-flex"
};
var _hoisted_38 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "uk-width-4-5@m"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  id: "section-6-title"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  "class": "uk-margin-medium-bottom"
}, "АЛЬТЕРНАТИВНЫЕ ИНВЕСТИЦИИ")])], -1 /* HOISTED */);
var _hoisted_39 = {
  "class": "col-sm-12",
  id: "main-pricing-list"
};
var _hoisted_40 = {
  "class": "in-wave-pricing-list"
};
var _hoisted_41 = {
  style: {
    "display": "none"
  },
  "class": "col-md-6 col-sm-6 col-xs-12 margin-top-10"
};
var _hoisted_42 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"package\"><h4>Управление благосостоянием</h4><ul class=\"package-features-list package-features-list1\"><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Откройте свой кошелек сейчас</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Только физическая торговля</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Кредитное плечо 1: 1 или 1: 2</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Вашим портфелем управляют эксперты</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Минимальный депозит $ 10,000</li></ul><a href=\"#\" class=\"uk-button uk-button-default uk-border-rounded uk-align-center\">Начните свое портфолио прямо сейчас</a></div>", 1);
var _hoisted_43 = {
  "class": "col-md-6 col-sm-6 col-xs-12 margin-top-10"
};
var _hoisted_44 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"package\"><h4>Получите свою кредитную карту</h4><ul class=\"package-features-list package-features-list1\"><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Мгновенное снятие наличных в любом банкомате мира</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Закажи карту сейчас</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Наслаждайтесь покупками со всего мира с помощью платежной карты Union</li></ul><a href=\"/ru/unionpaycard\" class=\"uk-button uk-button-default uk-border-rounded uk-align-center\">ЗАКАЖИТЕ КАРТУ СЕЙЧАС</a></div>", 1);
var _hoisted_45 = {
  "class": "col-md-6 col-sm-6 col-xs-12 margin-top-10"
};
var _hoisted_46 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"package\"><h4>Социальная торговля</h4><ul class=\"package-features-list package-features-list1\"><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Счет Free Copy с предпочтительным соотношением портфеля</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Мгновенный перевод между всеми вашими счетами.</li></ul><a href=\"/ru/cpanel/home\" class=\"uk-button uk-button-default uk-border-rounded uk-align-center\">Начните свое портфолио прямо сейчас</a></div>", 1);
var _hoisted_47 = {
  id: "main-section-5",
  "class": "uk-section uk-section-muted uk-padding-large in-wave-3 uk-background-contain uk-background-center"
};
var _hoisted_48 = {
  "class": "col-sm-12"
};
var _hoisted_49 = {
  "class": "col-sm-12"
};
var _hoisted_50 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"col-md-6 col-sm-12\"><h1 class=\"\">Market analysis and trade inspiration</h1><p>JMI Brokers continue to challenge ourselves to provide traders with what they need to succeed to be Expert Trader in forex in addition to have experience in this trade</p><div class=\"col-sm-12 uk-text-center padding-left-0\"><div class=\"col-sm-6 padding-left-0\"><h5 class=\"uk-margin-small-top\">Стратегии &amp; Обсуждения</h5></div><div class=\"col-sm-6 padding-left-0\"><h5 class=\"uk-margin-small-top\">Прогнозы &amp; Образование</h5></div></div><div class=\"col-sm-12 margin-top-10\"><div class=\"col-sm-4\"><i class=\"fa fa-trophy\"></i><p class=\"\">Отмеченная наградами поддержка</p></div><div class=\"col-sm-4\"><i class=\"fa fa-university\"></i><p class=\"\">РЕГУЛИРУЕТСЯ Республикой Вануату</p></div><div class=\"col-sm-4\"><i class=\"fa fa-history\"></i><p class=\"\">12 лет опыта</p></div></div></div>", 1);
var _hoisted_51 = {
  "class": "col-md-6 col-sm-12"
};
var _hoisted_52 = {
  "class": "uk-inline uk-dark in-wave-video uk-margin-small-bottom"
};
var _hoisted_53 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"uk-position-center\"><a href=\"#modal-media-youtube\" data-uk-toggle><div class=\"in-play-button\"></div><i class=\"fa fa-play\"></i></a></div><div id=\"modal-media-youtube\" class=\"uk-flex-top\" data-uk-modal><div class=\"uk-modal-dialog uk-width-auto uk-margin-auto-vertical in-iframe\"><button class=\"uk-modal-close-outside\" type=\"button\" data-uk-close></button></div></div>", 2);
var _hoisted_55 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"sec2\" id=\"main-section-6\"><div class=\"uk-container in-wave-4\"><div class=\"uk-grid uk-flex\"><div class=\"uk-width-4-5@m\"><div id=\"section-6-title\"><h1 class=\"uk-margin-medium-bottom\">Полный пакет для каждого трейдера</h1></div></div><div class=\"col-sm-12\" id=\"main-pricing-list\"><div class=\"in-wave-pricing-list\"><div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-12 margin-top-10\"><div class=\"package\"><p class=\"minimum\">Минимальное финансирование<span class=\"price\">100 USD </span></p><h2 class=\"title\">Счет с фиксированным спредом</h2><p class=\"desc\">Воспользуйтесь лучшими в отрасли ценами на вход</p><hr><ul class=\"package-features-list package-features-list2\"><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>1 фиксированный спред</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>1:500 Кредитное плечо</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>100$ Минимальное финансирование</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>USD - основная валюта</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Исламский счет доступен</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Минимальный лот 0,01</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Советник</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Заголовок доступен</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>4 цифры</li><li class=\"false\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i>Скальпинг недоступен</li></ul><a href=\"/ru/signup\" class=\"uk-button uk-button-default uk-border-rounded uk-align-center\">Открыть счет</a></div></div><div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-12 margin-top-10\"><div class=\"package\"><p class=\"minimum\">Минимальное финансирование<span class=\"price\">500 USD </span></p><h2 class=\"title\">счет с переменным спредом</h2><p class=\"desc\">Получайте еще более узкие спреды и комиссии</p><hr><ul class=\"package-features-list package-features-list2\"><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>0.1 от спреда</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>1:200 Кредитное плечо</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>500$ Минимальное финансирование</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>USD - основная валюта</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Исламский счет доступен</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Минимальный лот 0,01</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Советник</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Заголовок доступен</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>5 цифры</li><li class=\"false\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i>Скальпинг недоступен</li></ul><a href=\"/ru/signup\" class=\"uk-button uk-button-default uk-border-rounded uk-align-center\">Открыть счет</a></div></div><div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-12 margin-top-10\"><div class=\"package\"><p class=\"minimum\">Минимальное финансирование<span class=\"price\"> 1000 USD</span></p><h2 class=\"title\">счет для скальпинга</h2><p class=\"desc\">Получайте еще более узкие спреды и комиссии</p><hr><ul class=\"package-features-list package-features-list2\"><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>1.7 от спреда</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>1:100 Кредитное плечо</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>1000$ Минимальное финансирование</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>USD - основная валюта</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Исламский счет доступен</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Минимальный лот 0,01</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Советник</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Заголовок доступен</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>5 цифры</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Скальпинг доступен</li></ul><a href=\"/ru/signup\" class=\"uk-button uk-button-default uk-border-rounded uk-align-center\">Открыть счет</a></div></div><div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-12 margin-top-10\"><div class=\"package\"><p class=\"minimum\">Минимальное финансирование<span class=\"price\"> 100 USD</span></p><h2 class=\"title\"> бонусный счет</h2><p class=\"desc\">Получайте еще более узкие спреды и комиссии</p><hr><ul class=\"package-features-list package-features-list2\"><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>2 фиксированный спред</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>1:500 Кредитное плечо</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>100$ Минимальное финансирование</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>USD - основная валюта</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Исламский счет доступен</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Минимальный лот 0,01</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Советник</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>Заголовок доступен</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>4 цифры</li><li class=\"false\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i>Скальпинг недоступен</li></ul><a href=\"/ru/signup\" class=\"uk-button uk-button-default uk-border-rounded uk-align-center\">Открыть счет</a></div></div></div></div></div></div></div><div class=\"row\" id=\"main-section-88\"><div class=\"\" id=\"main-section-8\"><div class=\"col-md-3 col-xs-6\"><i class=\"fa fa-history\"></i><h4 class=\"uk-margin-small-top uk-margin-remove-bottom\">История</h4><p class=\"uk-text-small uk-margin-remove-top\">Основанная в 2008 году, мы являемся одним из брокеров в регионе с наибольшим стажем работы</p></div><div class=\"col-md-3 col-xs-6\"><i class=\"fa fa-shield\"></i><h4 class=\"uk-margin-small-top uk-margin-remove-bottom\">Безопасность</h4><p class=\"uk-text-small uk-margin-remove-top\">Полностью регулируемый и лицензированный брокер</p></div><div class=\"col-md-3 col-xs-6\"><i class=\"fa fa-user\"></i><h4 class=\"uk-margin-small-top uk-margin-remove-bottom\">Личный аккаунт менеджер</h4><p class=\"uk-text-small uk-margin-remove-top\">Мы предоставляем персональные менеджеры по работе с клиентами для всех</p></div><div class=\"col-md-3 col-xs-6\"><i class=\"fa fa-video-camera\"></i><h4 class=\"uk-margin-small-top uk-margin-remove-bottom\">Неограниченный доступ к видеоуроку</h4><p class=\"uk-text-small uk-margin-remove-top\">Предоставляем неограниченный доступ к обучающим видео бесплатно</p></div></div></div>", 2);
var _hoisted_57 = {
  "class": "col-sm-12",
  id: "main-section-7"
};
var _hoisted_58 = {
  "class": "col-md-6",
  style: {
    "position": "absolute",
    "bottom": "20px",
    "padding-left": "0px"
  }
};
var _hoisted_59 = {
  "class": "col-md-6 col-sm-12",
  id: "mobile-app"
};
var _hoisted_60 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  id: "animate1",
  "class": ""
}, "Платформы Metatrader 4", -1 /* HOISTED */);
var _hoisted_61 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", {
  id: "animate1",
  "class": ""
}, "Начинать Торговля", -1 /* HOISTED */);
var _hoisted_62 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", {
  id: "animate2",
  "class": ""
}, "в мобильном приложении JMI Brokers", -1 /* HOISTED */);
var _hoisted_63 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h6", {
  id: "animate3",
  "class": ""
}, "Доступен на нескольких платформах", -1 /* HOISTED */);
var _hoisted_64 = {
  id: "animate4",
  href: "/ru/signup"
};
var _hoisted_65 = {
  id: "animate5",
  href: "/ru/signup"
};
var _hoisted_66 = {
  id: "animate6",
  href: "/ru/signup"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _this = this;
  var _component_v_lazy_image = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("v-lazy-image");
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("main", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [_hoisted_3, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("                <link rel=\"preload\" fetchpriority=\"high\" as=\"image\" href=\"/img/1.webp\" type=\"image/webp\">"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/img/1.webp",
    style: {
      "width": "100%"
    },
    alt: "SlideShow",
    width: "100%",
    height: "auto"
  }), _hoisted_4]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [_hoisted_6, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/img/2.webp",
    style: {
      "width": "100%"
    },
    alt: "SlideShow"
  }), _hoisted_7]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_8, [_hoisted_9, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/img/3.webp",
    style: {
      "width": "100%"
    },
    alt: "SlideShow"
  }), _hoisted_10]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_11, [_hoisted_12, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/img/4.webp",
    style: {
      "width": "100%"
    },
    alt: "SlideShow"
  }), _hoisted_13]), _hoisted_14, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_15, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
    "class": "dot",
    number: "1",
    onClick: _cache[0] || (_cache[0] = function ($event) {
      return _this.currentSlide(1);
    })
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
    "class": "dot",
    number: "2",
    onClick: _cache[1] || (_cache[1] = function ($event) {
      return _this.currentSlide(2);
    })
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
    "class": "dot",
    number: "3",
    onClick: _cache[2] || (_cache[2] = function ($event) {
      return _this.currentSlide(3);
    })
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
    "class": "dot",
    number: "4",
    onClick: _cache[3] || (_cache[3] = function ($event) {
      return _this.currentSlide(4);
    })
  })])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_16, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_17, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_18, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_19, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/nofees-icon1.png",
    alt: "wave-icon",
    "data-uk-img": "",
    width: "57px",
    height: "50px"
  })]), _hoisted_20]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_21, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_22, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/deposit-icon.png",
    alt: "wave-icon",
    "data-uk-img": "",
    width: "48px",
    height: "50px"
  })]), _hoisted_23]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_24, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_25, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/fast-icon.png",
    alt: "wave-icon",
    "data-uk-img": "",
    width: "48px",
    height: "50px"
  })]), _hoisted_26]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_27, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_28, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/analysis-icon.png",
    alt: "wave-icon",
    "data-uk-img": "",
    width: "48px",
    height: "50px"
  })]), _hoisted_29])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_30, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_31, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", _hoisted_32, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/ico11.png",
    id: "ico11",
    alt: "wave-icon",
    "data-uk-img": ""
  })])]), _hoisted_33])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" section content begin "), _hoisted_34, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" section content end "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" section content begin "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_35, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_36, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_37, [_hoisted_38, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_39, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_40, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_41, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/testdiv-1.jpg",
    alt: "Prices"
  }), _hoisted_42]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_43, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/testdiv-22.jpg",
    alt: "Prices"
  }), _hoisted_44]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_45, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/social-trade-offer1.jpg",
    alt: "Social Trading"
  }), _hoisted_46])])])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" section content begin "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_47, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_48, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_49, [_hoisted_50, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_51, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_52, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    "class": "uk-border-rounded uk-width-1-1",
    src: "/wave/img/in-lazy.gif",
    "data-src": "/wave/img/in-wave-image-1.jpg",
    alt: "wave-video",
    width: "533",
    height: "355",
    "data-uk-img": ""
  }), _hoisted_53])])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" section content end "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" section content begin "), _hoisted_55, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_57, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_58, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/trading-platforms-bg5.jpg",
    id: "responsive1-img-trading1",
    alt: "Trading Platforms"
  })]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_59, [_hoisted_60, _hoisted_61, _hoisted_62, _hoisted_63, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", _hoisted_64, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/ru/ios-store.png",
    alt: "IOS",
    width: "140px",
    height: "44px"
  })]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", _hoisted_65, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/ru/play-store.png",
    alt: "Play Store",
    width: "140px",
    height: "44px"
  })]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", _hoisted_66, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/ru/win-store.png",
    alt: "Windows",
    width: "140px",
    height: "44px"
  })])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/trading-platforms-bg5.jpg",
    id: "responsive1-img-trading2",
    alt: "Trading Platforms"
  })])]);
}

/***/ }),

/***/ "./resources/js/views/ru/Index.vue":
/*!*****************************************!*\
  !*** ./resources/js/views/ru/Index.vue ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Index_vue_vue_type_template_id_488b4a36__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Index.vue?vue&type=template&id=488b4a36 */ "./resources/js/views/ru/Index.vue?vue&type=template&id=488b4a36");
/* harmony import */ var _Index_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Index.vue?vue&type=script&lang=js */ "./resources/js/views/ru/Index.vue?vue&type=script&lang=js");
/* harmony import */ var _node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Index_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Index_vue_vue_type_template_id_488b4a36__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/views/ru/Index.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/views/ru/Index.vue?vue&type=script&lang=js":
/*!*****************************************************************!*\
  !*** ./resources/js/views/ru/Index.vue?vue&type=script&lang=js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Index_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Index_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Index.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/Index.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/views/ru/Index.vue?vue&type=template&id=488b4a36":
/*!***********************************************************************!*\
  !*** ./resources/js/views/ru/Index.vue?vue&type=template&id=488b4a36 ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Index_vue_vue_type_template_id_488b4a36__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Index_vue_vue_type_template_id_488b4a36__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Index.vue?vue&type=template&id=488b4a36 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/Index.vue?vue&type=template&id=488b4a36");


/***/ })

}]);
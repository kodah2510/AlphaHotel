/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/payment.js":
/*!*********************************!*\
  !*** ./resources/js/payment.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: D:\\my_projects\\Laravel\\AlphaHotel\\resources\\js\\payment.js: Unexpected token, expected \",\" (2:36)\n\n\u001b[0m \u001b[90m 1 | \u001b[39m$(\u001b[36mfunction\u001b[39m() {\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 2 | \u001b[39m    \u001b[36mvar\u001b[39m stripe \u001b[33m=\u001b[39m \u001b[33mStripe\u001b[39m(\u001b[32m'{{ config('\u001b[39mservices\u001b[33m.\u001b[39mstripe\u001b[33m.\u001b[39mkey\u001b[32m') }}'\u001b[39m)\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m   | \u001b[39m                                    \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 3 | \u001b[39m    \u001b[36mvar\u001b[39m elements \u001b[33m=\u001b[39m stripe\u001b[33m.\u001b[39melements()\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 4 | \u001b[39m    \u001b[36mvar\u001b[39m cardElement \u001b[33m=\u001b[39m elements\u001b[33m.\u001b[39mcreate(\u001b[32m'card'\u001b[39m)\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 5 | \u001b[39m    cardElement\u001b[33m.\u001b[39mmount(\u001b[32m'#card-element'\u001b[39m)\u001b[33m;\u001b[39m\u001b[0m\n    at Parser.raise (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:6325:17)\n    at Parser.unexpected (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:7642:16)\n    at Parser.expect (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:7628:28)\n    at Parser.parseCallExpressionArguments (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8606:14)\n    at Parser.parseSubscript (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8514:29)\n    at Parser.parseSubscripts (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8433:19)\n    at Parser.parseExprSubscripts (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8422:17)\n    at Parser.parseMaybeUnary (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8392:21)\n    at Parser.parseExprOps (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8267:23)\n    at Parser.parseMaybeConditional (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8240:23)\n    at Parser.parseMaybeAssign (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8187:21)\n    at Parser.parseVar (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:10480:26)\n    at Parser.parseVarStatement (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:10299:10)\n    at Parser.parseStatementContent (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:9896:21)\n    at Parser.parseStatement (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:9829:17)\n    at Parser.parseBlockOrModuleBlockBody (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:10405:25)\n    at Parser.parseBlockBody (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:10392:10)\n    at Parser.parseBlock (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:10376:10)\n    at Parser.parseFunctionBody (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:9424:24)\n    at Parser.parseFunctionBodyAndFinish (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:9394:10)\n    at withTopicForbiddingContext (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:10535:12)\n    at Parser.withTopicForbiddingContext (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:9702:14)\n    at Parser.parseFunction (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:10534:10)\n    at Parser.parseFunctionExpression (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8877:17)\n    at Parser.parseExprAtom (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8790:21)\n    at Parser.parseExprSubscripts (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8412:23)\n    at Parser.parseMaybeUnary (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8392:21)\n    at Parser.parseExprOps (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8267:23)\n    at Parser.parseMaybeConditional (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8240:23)\n    at Parser.parseMaybeAssign (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8187:21)\n    at Parser.parseExprListItem (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:9491:18)\n    at Parser.parseCallExpressionArguments (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8621:22)\n    at Parser.parseSubscript (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8514:29)\n    at Parser.parseSubscripts (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8433:19)\n    at Parser.parseExprSubscripts (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8422:17)\n    at Parser.parseMaybeUnary (D:\\my_projects\\Laravel\\AlphaHotel\\node_modules\\@babel\\parser\\lib\\index.js:8392:21)");

/***/ }),

/***/ 2:
/*!***************************************!*\
  !*** multi ./resources/js/payment.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\my_projects\Laravel\AlphaHotel\resources\js\payment.js */"./resources/js/payment.js");


/***/ })

/******/ });
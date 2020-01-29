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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/modal.js":
/*!*******************************!*\
  !*** ./resources/js/modal.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#find-room-modal').on('show.bs.modal', function (e) {
    var button = $(e.relatedTarget);
    var roomType = button.data('room-type');
    var roomPrice = button.data('room-price');
    var imgSrc = button.data('img-src');
    var modal = $(this);
    modal.find('#modal-room-img').attr('src', imgSrc);
    modal.find('#room-type-input').val(roomType);
    modal.find('#room-type-input').prop('disabled', true);
    modal.find('#room-price-input').val(roomPrice);
    modal.find('#room-price-input').prop('disabled', true);
  });
  $('#from-date').on('change', function (e) {
    console.log($(this).val());
    $('#to-date').attr('min', $(this).val());
  });
  $('#find-room-button').on('click', function (e) {
    e.preventDefault(); // find a room match the date
    //

    var roomType = $('input[name=room_type]').val();
    var fromDate = $('#from-date').val();
    var toDate = $('#to-date').val();

    if (fromDate == "" || toDate == "") {
      alert('Please select check-in date and check-out date');
      return;
    }

    console.log(roomType + ' ' + fromDate + ' ' + toDate);
    $.ajax({
      type: 'POST',
      url: '/find_room',
      data: {
        'room_type': roomType,
        'from_date': fromDate,
        'to_date': toDate
      },
      dataType: 'JSON',
      success: function success(data) {
        console.log(data);
        displayPaymentForm(data);
      },
      error: function error(e) {
        console.log(e);
      }
    });
  });
  var stripe = Stripe($('meta[name="stripe-pk"]').attr('content'));
  var elements = stripe.elements();
  var style = {
    base: {
      fontSize: '15px',
      fontFamily: 'Helvetica, Arial, sans-serif',
      fontSmoothing: 'antialiased',
      color: '#495057',
      'invalid': {
        iconColor: '#FFC7EE',
        color: '#FFC7EE'
      }
    }
  };
  var cardElement = elements.create('card', {
    style: style
  });
  cardElement.mount('#card-element');
  cardElement.addEventListener('change', function (event) {
    var displayError = document.getElementById('card-errors');

    if (event.error) {
      displayError.textContent = event.error.message;
    } else {
      displayError.textContent = '';
    }
  }); //submit the payment to stripe from the client

  var cardHolderName = $('#cardholder-name');
  var cardButton = $('#card-button');
  cardButton.on('click', function (e) {
    e.preventDefault();
    var roomId = $('input[name="room_id"]').val();
    var roomPrice = $('input[name="room_price"]').val();
    var name = $('input[name="pi_customer_name"]').val();
    var email = $('input[name="pi_customer_email"]').val();
    var phone = $('input[name="pi_customer_phone"]').val();
    var fromDate = $('input[name="from_date"]').val();
    var toDate = $('input[name="to_date"]').val();
    var reservationData = {
      "name": name,
      "email": email,
      "phone": phone,
      "room_id": parseInt(roomId),
      "from_date": fromDate,
      "to_date": toDate
    };
    console.log(reservationData);
    stripe.createPaymentMethod('card', cardElement, {
      billing_details: {
        name: cardHolderName.val()
      }
    }).then(function (result) {
      if (result.error) {
        alert(result.error.message);
      } else {
        $.ajax({
          type: 'POST',
          url: '/reservation_payment',
          data: {
            'payment_method_id': result.paymentMethod.id,
            'amount': roomPrice,
            'reservation_data': reservationData
          },
          dataType: 'JSON',
          success: function success(result) {
            handleServerResponse(result, reservationData);
          },
          error: function error(e) {
            console.log(e);
          }
        });
      }
    });
  });

  var handleServerResponse = function handleServerResponse(res, reservationData) {
    if (res.error) {
      alert(res.error);
    } else if (res.requires_action) {
      stripe.handleCardAction(res.payment_intent_client_secret).then(function (result) {
        if (result.error) {
          alert(result.error.message);
        } else {
          $.ajax({
            type: 'POST',
            url: 'reservation_payment',
            data: {
              'payment_intent_id': result.paymentIntent.id,
              'reservation_data': reservationData
            },
            dataType: 'JSON',
            success: function success(result) {
              handleServerResponse(result, reservationData);
            }
          });
        }
      });
    } else {
      // success
      alert("Successfully booked a room");
      $('#find-room-modal').modal('toggle');
    }
  };

  var displayPaymentForm = function displayPaymentForm(data) {
    $('#room-found-msg').removeClass('d-none');
    $('#customer-name-input').removeClass('d-none');
    $('#email-and-phone-input').removeClass('d-none');
    $('#payment-info').removeClass('d-none');
    $('#card-button').removeClass('d-none');
    $('#find-room-button').addClass('d-none');
    $('input[name="room_id"]').val(data.room_id);
    $('input[name="room_value"]').val(data.room_number);
  };
});

/***/ }),

/***/ 1:
/*!*************************************!*\
  !*** multi ./resources/js/modal.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\my_projects\Laravel\AlphaHotel\resources\js\modal.js */"./resources/js/modal.js");


/***/ })

/******/ });
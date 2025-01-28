/******/ (() => { // webpackBootstrap
/*!*********************************!*\
  !*** ./resources/js/sign-up.js ***!
  \*********************************/
var inputs = document.querySelectorAll('input[name^="captcha_"]');
inputs.forEach(function (input, i) {
  input.addEventListener("input", function (event) {
    var value = event.target.value;
    event.target.value = value.replace(/[^0-9]/g, "").slice(0, 1);
    if (value) {
      if (i < inputs.length - 1) {
        inputs[i + 1].focus();
      }
    }
  });
  input.addEventListener("keypress", function (event) {
    if (isNaN(event.key)) {
      event.preventDefault();
    } else {
      event.target.value = event.key.slice(0, 1);
    }
  });
  input.addEventListener("keydown", function (event) {
    if (event.key === "Backspace" && event.target.value === "") {
      if (i > 0) {
        inputs[i - 1].focus();
      }
    }
  });
});
/******/ })()
;
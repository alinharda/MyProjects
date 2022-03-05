"use strict";
document.querySelector(".menu-icon").addEventListener("click", function () {
  document.querySelector("#meniu").classList.toggle("active");
  document.querySelector(".menu-icon").classList.toggle("active");
});
document.querySelector(".items").addEventListener("click", function () {
  document.querySelector("#meniu").classList.toggle("active");
  document.querySelector(".menu-icon").classList.toggle("active");
});

const firstImage = document.querySelector(".showcase .photos .first");
const secondImage = document.querySelector(".showcase .photos .second");
const thirdImage = document.querySelector(".showcase .photos .third");
const fourthImage = document.querySelector(".showcase .photos .fourth");

var seconds = 0;

function timeDisp() {
  seconds++;
  console.log(seconds);

  if (seconds === 5) {
    firstImage.classList.toggle("active");
    secondImage.classList.toggle("active");
  }
  if (seconds === 10) {
    secondImage.classList.toggle("active");
    thirdImage.classList.toggle("active");
  }
  if (seconds === 15) {
    thirdImage.classList.toggle("active");
    fourthImage.classList.toggle("active");
  }
  if (seconds === 20) {
    fourthImage.classList.toggle("active");
    firstImage.classList.toggle("active");
    seconds = 0;
  }
}
setInterval(timeDisp, 1000);

"use strict";

let userImage = document.querySelector(
  "#our-team .pop-up .content .profile img"
);
let userName = document.querySelector("#our-team .pop-up .content h2");
let userDesc = document.querySelector("#our-team .pop-up .content .descriere");

document
  .querySelector("#our-team .pop-up")
  .addEventListener("click", function () {
    document.querySelector("#our-team .pop-up").classList.toggle("visible");
  });

const memberElements = document.querySelectorAll("#our-team .choose-member");

[...memberElements].forEach((member) => {
  member.addEventListener("click", () => {
    const hiddenInfo = member.querySelector(".hidden-info");
    const image = hiddenInfo.querySelector(".image");
    const title = hiddenInfo.querySelector(".title").textContent;
    const description = hiddenInfo.querySelector(".description").textContent;

    document.querySelector(".pop-up").classList.toggle("visible");
    userImage.src = image.src;
    userName.textContent = title;
    userDesc.textContent = description;
  });
});

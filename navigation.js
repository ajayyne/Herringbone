"use strict";

/*mobile navigation hamburger menu*/
/*activate css animations when hamburger is clicked*/

const hamburgerContainer = document.querySelector(".hamburger-container");
const hamburger1 = document.querySelector(".hamburger-1");
const hamburger2 = document.querySelector(".hamburger-2");
const hamburger3 = document.querySelector(".hamburger-3");
const nav = document.querySelector(".navigation");
const listItems = document.querySelectorAll('li'); // Select all li elements for fade effect
/*Create boolean for if the navigation menu is clicked or not*/
let isClicked = false;


hamburgerContainer.addEventListener("click", (e) => {
  if (e.target.classList.contains("hamburger")) {
    /*If the button IS clicked - the following*/
    if (!isClicked) {
      hamburger1.style.animationName = "flipDown";
      hamburger2.style.animationName = "fadeOut";
      hamburger3.style.animationName = "flipUp";
      nav.style.display = "block";
      listItems.forEach((item, index) => {
        setTimeout(() => {
            item.classList.add('fade-in'); // Add the fade-in class to each item
        }, index * 200); 
    });
      isClicked = true;
    } else {
      hamburger1.style.animationName = "";
      hamburger2.style.animationName = "";
      hamburger3.style.animationName = "";
      nav.style.display = "none";
      isClicked = false;
    }
  }
});
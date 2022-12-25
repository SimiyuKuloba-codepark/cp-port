/**
 * Copyright (c) 2020 Simiyu Kuloba <simiyukuloba1@gmail.com>
 * @author Simiyu Kuloba
 * @version 1.3.0
 */

// Scroll Function
window.onscroll = function() {
  scrollFunction()
};

// navbar scroll settings
function scrollFunction() {
  if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 60) {
    document.querySelector('.cp-navbar-content').style.backgroundColor = "white";
    document.querySelector('.cp-navbar-content').style.position = "sticky";
    document.querySelector('.cp-navbar-content').style.top = "0";
    document.querySelector('.cp-navbar-content').style.left = "0";
    document.querySelector('.cp-navbar-content').style.boxShadow = "1px 5px 5px 0px rgba(0,0,0,0.3)";
    // document.querySelector('.logo').style.width = "250px";
    // document.querySelector('.cp-menu').style.fontSize = ".9rem";
    document.querySelector('.cp-navbar-content').style.height = "10vh";
  } else {
    document.querySelector('.cp-navbar-content').style.position = "sticky";
    document.querySelector('.cp-navbar-content').style.boxShadow = "10px 10px 5px 0px rgba(0,0,0,0)";
    // document.querySelector('.logo').style.width = "300px";
    // document.querySelector('.cp-menu').style.fontSize = "1rem";
    document.querySelector('.cp-navbar-content').style.height = "12vh";
  }
}


// responsive-menu
// Get Event Listeners
document.getElementById('bar-icon').addEventListener('click', openMenu);
document.getElementById('close-icon').addEventListener('click', closeMenu);

function openMenu(e){
  // console.log('open menu clicked');
  document.getElementById('bar-icon').style.display = 'none';
  document.querySelector('.small-screen-menu').style.height = '60%';
  document.getElementById('close-icon').style.display = 'block';
  e.preventDefault();
}

function closeMenu(e){
  // console.log('closed')
  document.getElementById('close-icon').style.display = 'none';
  document.querySelector('.small-screen-menu').style.height = '0%';
  document.getElementById('bar-icon').style.display = 'block';
  e.preventDefault();
}

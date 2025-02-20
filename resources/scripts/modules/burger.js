import {slideUp, slideDown} from './slideToggle.js';

function burgerMenu() {
  const burger = document.querySelector('.js-menu-btn');
  const headerMenu = document.querySelector('.l-header__menu');


  burger.addEventListener('click', () => {
    if (burger.classList.contains('is-open')) {
      burger.classList.remove('is-open');
      slideUp(headerMenu);
    } else {
      burger.classList.add('is-open');
      slideDown(headerMenu);
    }
  });
}

export default burgerMenu;
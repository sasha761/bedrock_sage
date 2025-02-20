import domReady from '@roots/sage/client/dom-ready';
import burgerMenu from './modules/burger.js';
import initMenu from './modules/menu.js';

/**
 * Application entrypoint
 */
domReady(async () => {
  burgerMenu();

  initMenu({
    parentActiveClass: 'is-active', 
    childActiveClass: 'is-active',
    menuSelector: '.c-menu',
    parentSelector: '.c-menu__item.has-child',
    childSelector: '.c-menu__child',  
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);

import mobileMenu from './modules/mobile-menu.mjs';
import headerSubmenu from './modules/header-submenu.mjs';
import phoneMask from './modules/phone-mask.mjs';
import Accordion from './modules/accordion.mjs';
import Popup from './modules/popup.mjs';

window.addEventListener('DOMContentLoaded', () => {

  mobileMenu();
  headerSubmenu();

  document.querySelector('.header').addEventListener('click', async () => {
    const StaggerItems = await import('./modules/stagger-items.mjs');
    console.log('Async module is working!');
  }, { once: true });

});

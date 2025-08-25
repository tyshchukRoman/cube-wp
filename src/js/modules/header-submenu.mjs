/*
 * Header Submenu
 */
function headerSubmenu() {
  if(!document.querySelector('.menu-item-has-children')) {
    return;
  }

  document.querySelectorAll('.header .menu-item-has-children').forEach(item => {
    const link = item.querySelector('a');
    const submenu = item.querySelector('.sub-menu');

    link.addEventListener('click', (e) => {
      e.preventDefault();

      // Close all other submenus
      document.querySelectorAll('.header .sub-menu.open').forEach(openSub => {
        if (openSub !== submenu) {
          openSub.classList.remove('open');
        }
      });

      // Toggle this submenu
      submenu.classList.toggle('open');
    });
  });

  // Click outside to close
  document.addEventListener('click', (e) => {
    // If click is inside a menu item, do nothing
    if (e.target.closest('.header .menu-item-has-children')) {
      return;
    }

    // Otherwise, close all submenus
    document.querySelectorAll('.header .sub-menu.open').forEach(submenu => {
      submenu.classList.remove('open');
    });
  });
}

export default headerSubmenu;

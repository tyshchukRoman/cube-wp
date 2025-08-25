window.addEventListener('DOMContentLoaded', () => {

  /*
   * Mobile Menu
   */
  function mobileMenu() {
    if(!document.querySelector('.mobile-menu')) {
      return;
    }

    const button = document.querySelector('.header__menu-button');
    const menu = document.querySelector('.mobile-menu');

    // on button click
    button.addEventListener('click', () => {
      menu.classList.toggle('open');
    });
    
    // on click outside
    document.addEventListener('click', (e) => {
      if (e.target.closest('.header__menu-button') || e.target.closest('.menu-item-has-children')) {
        return;
      }

      // Otherwise, close
      menu.classList.remove('open');
    });
  }

  mobileMenu();


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

  headerSubmenu();


  /*
   * Ukrainian Phone Mask
   */
  function phoneMask() {
    document.querySelectorAll('input[type="tel"]').forEach(input => {

      // Ensure +380 is there on load
      if (!input.value.startsWith('+380')) {
        input.value = '+380';
      }

      // Prevent deleting +380
      input.addEventListener('input', () => {
        if (!input.value.startsWith('+380')) {
          input.value = '+380';
        }
      });

      // Keep cursor after +380 on focus
      input.addEventListener('focus', () => {
        if (input.selectionStart < 4) {
          input.setSelectionRange(4, 4);
        }
      });

      // Also when clicking
      input.addEventListener('click', () => {
        if (input.selectionStart < 4) {
          input.setSelectionRange(4, 4);
        }
      });
    });
  }

  phoneMask();


  /*
   * Faq Accordion
   */
  window.allAccordions = [];

  class Accordion {
    constructor(el) {
      this.el = el;
      this.summary = el.querySelector('.accordion__button');
      this.content = el.querySelector('.accordion__dropdown');

      this.animation = null;
      this.isClosing = false;
      this.isExpanding = false;
      this.summary.addEventListener('click', (e) => this.onClick(e));
    }

    onClick(e) {
      e.preventDefault();
      this.el.style.overflow = 'hidden';
      if (this.isClosing || !this.el.open) {
        this.open();
      } else if (this.isExpanding || this.el.open) {
        this.shrink();
      }
    }

    shrink() {
      this.isClosing = true;
      
      const startHeight = `${this.el.offsetHeight}px`;
      const endHeight = `${this.summary.offsetHeight}px`;
      
      if (this.animation) {
        this.animation.cancel();
      }
      
      this.animation = this.el.animate({
        height: [startHeight, endHeight]
      }, {
        duration: 400,
        easing: 'ease-out'
      });
      
      this.animation.onfinish = () => this.onAnimationFinish(false);
      this.animation.oncancel = () => this.isClosing = false;
    }

    open() {
      this.el.style.height = `${this.el.offsetHeight}px`;
      this.el.open = true;
      window.requestAnimationFrame(() => this.expand());
    }

    expand() {
      this.isExpanding = true;
      const startHeight = `${this.el.offsetHeight}px`;
      const endHeight = `${this.summary.offsetHeight + this.content.offsetHeight}px`;
      
      if (this.animation) {
        this.animation.cancel();
      }
      
      this.animation = this.el.animate({
        height: [startHeight, endHeight]
      }, {
        duration: 400,
        easing: 'ease-out'
      });
      this.animation.onfinish = () => this.onAnimationFinish(true);
      this.animation.oncancel = () => this.isExpanding = false;
    }

    onAnimationFinish(open) {
      this.el.open = open;
      this.animation = null;
      this.isClosing = false;
      this.isExpanding = false;
      this.el.style.height = this.el.style.overflow = '';
    }
  }

  document.querySelectorAll('.accordion').forEach((el) => {
    window.allAccordions.push(new Accordion(el));
  });


  /*
   * Popup
   */
  class Popup {
    constructor(el){
      this.state(el);
      this.query(el);
      this.events();
    }

    state(el) {
      this.autoopen = el.dataset.autoopen;
    }

    query(el) {
      this.popup = el;
      this.closeButton = el.querySelector('.popup__close');
      this.buttons = [...document.querySelectorAll(`a[href="#${el.id}"]`)];
    }

    events() {
      this.buttons.forEach(button => button.addEventListener('click', () => this.popup.showModal()));
      this.closeButton.addEventListener('click', () => this.popup.close());

      // Close on backdrop click
      this.popup.addEventListener('click', event => {
        let rect = event.target.getBoundingClientRect();
        
        if ((rect.left > event.clientX ||
            rect.right < event.clientX ||
            rect.top > event.clientY ||
            rect.bottom < event.clientY) &&
            this.popup.open
        ) {
            this.popup.close();
        }
      });

      // Autoopen popup
      if(this.autoopen && !this.checkPopupClosedState()) {
        setTimeout(() => {
          this.popup.showModal();
          this.savePopupClosedState();
        }, this.autoopen * 1000);
      }
    }

    checkPopupClosedState() {
      return sessionStorage.getItem(`popup-${this.popup.id}`) === 'closed';
    }

    savePopupClosedState() {
      sessionStorage.setItem(`popup-${this.popup.id}`, 'closed');
    }
  }

  window.allPopups = [];

  document.querySelectorAll('dialog').forEach((el) => {
    window.allPopups.push(new Popup(el));
  });


  /*
   * Stagger Items
   */
  function StaggerItems(section, items) {
    [...document.querySelectorAll(section)].forEach(section => {
      if(!section) {
        return;
      }

      gsap.timeline({
        scrollTrigger: {
          trigger: section,
          start: 'top center',
          end: 'bottom center',
          toggleActions: "play none none none",
        }
      })
        .from(section.querySelectorAll(items), {
          stagger: 0.2,
          x: -20,
          duration: 1,
          autoAlpha: 0,
          ease: "power1.out",
        });
    });
  }

  StaggerItems('.section-name', '.section-item');

});

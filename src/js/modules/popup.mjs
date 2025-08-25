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

export default Popup;

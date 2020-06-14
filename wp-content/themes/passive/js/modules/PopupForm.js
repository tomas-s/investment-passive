function validateEmail(email) {
  const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

import $ from 'jquery';

class PopupForm {
  constructor() {
    this.header = $('header');
    this.events();
  }

  events() {}

  initContent() {
    const headerHeight = this.header.outerHeight();
    this.header.next().css('margin-top', headerHeight);
  }
}

export default PopupForm;

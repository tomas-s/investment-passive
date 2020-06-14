import $ from 'jquery';

class Header {
  constructor() {
    this.header = $('header');
    this.events();
    this.initContent();
  }

  events() {}

  initContent() {
    const headerHeight = this.header.outerHeight();
    this.header.next().css('margin-top', headerHeight);
  }
}

export default Header;

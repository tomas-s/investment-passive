import $ from 'jquery';

class MobileMenu {
  constructor() {
    this.menu = $('#menu-togg');
    this.openButton = $('#menu-toggle');
    this.events();
  }

  events() {
    this.openButton.on('click', this.addRemoveClass.bind(this));
  }

  addRemoveClass() {
    this.openButton.toggleClass('open');
    this.openMenu();
  }

  openMenu() {
    $('nav').toggleClass('open');
    this.setMenuHeight();
  }

  setMenuHeight() {
    const menuHeight =
      this.getWindowHeight() -
      this.getHeaderHeight() +
      this.getVerticalScroll() +
      1;
    $('nav').css('height', `${menuHeight}px`);
  }

  getWindowHeight() {
    return $(window).height();
  }

  getHeaderHeight() {
    return $('header').outerHeight();
  }

  getVerticalScroll() {
    return window.pageYOffset;
  }
}

export default MobileMenu;

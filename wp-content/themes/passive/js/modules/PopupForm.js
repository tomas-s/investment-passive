import $ from 'jquery';

class PopupForm {
  constructor() {
    this.popup = $('.popup-form');
    this.events();
    console.log(1);
  }

  events() {
    this.popup.find('.close').on('click', this._closePopup.bind(this));

    this.popup.on('click', this._detectOutsideClick.bind(this));

    this.popup.find('.submit-btn').on('click', this._validateInputs.bind(this));

    this.popup
      .find('input[name="message_password"]')
      .on('keydown', this._hideAuthErrors.bind(this));

    this.popup
      .find('input[name="message_email"]')
      .on('keydown', this._hideEmailErrors.bind(this));
  }

  _validateInputs(e) {
    let autentifikatorMsg = '';
    if (!this._checkNumbersAuth()) {
      e.preventDefault();
      autentifikatorMsg = 'Google Autentifikátor musí obsahovať iba čísla.';
      this._showAutentifikatorError(autentifikatorMsg);
    } else if (this._checkAutentifikatorLength() != 6) {
      e.preventDefault();
      autentifikatorMsg =
        this._checkAutentifikatorLength() == 0
          ? 'Zadajte Google Autentifikátor.'
          : 'Google Authentifikátor musí mať dĺžku 6 znakov.';
      this._showAutentifikatorError(autentifikatorMsg);
    }

    let emailMsg = '';
    if (!this._checkEmail()) {
      e.preventDefault();
      emailMsg =
        $('input[name="message_email"]').val().trim().length == 0
          ? 'Zadajte email.'
          : 'Zdá sa, že ste zadali nesprávnu e-mailovú adresu.';
      this._showEmailError(emailMsg);
    }
  }

  _hideEmailErrors() {
    this.popup.find('.email-error').text('');
    this._hideError();
  }

  _hideAuthErrors() {
    this.popup.find('.password-error').text('');
    this._hideError();
  }

  _hideError() {
    this.popup.find('.errors').text('');
  }

  _showAutentifikatorError(msg) {
    this.popup.find('.password-error').text(msg);
  }

  _showEmailError(msg) {
    this.popup.find('.email-error').text(msg);
  }

  _checkAutentifikatorLength() {
    const value = $('input[name="message_password"]').val().trim();
    return value.length;
  }

  _checkNumbersAuth() {
    const value = $('input[name="message_password"]').val().trim();
    return !isNaN(value);
  }

  _checkEmail() {
    const email = $('input[name="message_email"]').val().trim();
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
  }

  _closePopup() {
    this.popup.find('.succeess-message').addClass('closed');
  }

  _detectOutsideClick(e) {
    if ($(e.target).hasClass('container')) {
      this._closePopup();
    }
  }
}

export default PopupForm;

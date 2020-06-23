import $ from 'jquery';

class FAQ {
  constructor() {
    this.faq = $('.faq');
    this.events();
  }

  events() {
    this.faq.find('.faq-title').on('click', this._toggleFaq.bind(this));
  }

  _toggleFaq(e) {
    console.log(1);
    $(e.target)
      .closest('.collapse')
      .toggleClass('open')
      .find('.collapse-content')
      .slideToggle('slow');
  }
}

export default FAQ;

import $ from 'jquery';

class Testimonials {
  constructor() {
    this.testimonials = $('.testimonials');
    this.events();
    this.initialCounter();
    this.initialHeight();
  }

  events() {
    this.testimonials.find('.next').on('click', this._nextSlide.bind(this));
    this.testimonials.find('.prev').on('click', this._prevSlide.bind(this));
  }

  _nextSlide() {
    const slides = this.testimonials.find('.carousel-item');
    $.each(slides, (i, slide) => {
      if (!$(slide).hasClass('active')) {
        $(slide).addClass('active');
        return false;
      }
    });
    this._increaseCounter();
  }

  _prevSlide() {
    const slides = this.testimonials.find('.carousel-item.active');
    if (slides.length < 2) return;
    $(slides).last().removeClass('active');
    this._decreaseCounter();
  }

  _increaseCounter() {
    const slides = this.testimonials.find('.carousel-item.active');
    this.testimonials
      .find('.testimonials-start')
      .text(slides.length < 10 ? `0${slides.length}` : slides.length);
  }

  _decreaseCounter() {
    const slides = this.testimonials.find('.carousel-item.active');
    this.testimonials
      .find('.testimonials-start')
      .text(slides.length < 10 ? `0${slides.length}` : slides.length);
  }

  initialCounter() {
    const slides = this.testimonials.find('.carousel-item');
    this.testimonials
      .find('.testimonials-end')
      .text(slides.length < 10 ? `0${slides.length}` : slides.length);
  }

  initialHeight() {
    const slides = this.testimonials.find('.carousel-item');
    const slidesHeight = [];

    $.each(slides, (i, slide) => {
      slidesHeight.push($(slide).height());
    });

    $(slides).css('height', Math.max(...slidesHeight));
    this.testimonials
      .find('.carousel')
      .css('height', Math.max(...slidesHeight) + 10);
  }
}

export default Testimonials;

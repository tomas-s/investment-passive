import $ from 'jquery';

class Gallery {
  constructor() {
    this.galleryItems = $('.blocks-gallery-item');
    this.fullsize = $('.fullsize');
    this.events();
    this.addIndexToImg();
    this.initSlider();
  }

  events() {
    this.galleryItems.on('click', this._insertImage.bind(this));
  }

  addIndexToImg() {
    this.galleryItems.find('img').each(function (index) {
      $(this).attr('data-index', index);
    });
  }

  initSlider() {
    this.galleryItems.find('img').clone().appendTo(this.fullsize);
    this.fullsize.slick({
      adaptiveHeight: false,
    });
  }

  _showSlider(activeSlideNumber) {
    this.fullsize.slick('slickGoTo', activeSlideNumber, true);
  }

  _insertImage(e) {
    this.fullsize.addClass('active');
    this._showSlider($(e.target).data('index'));
  }
}

export default Gallery;

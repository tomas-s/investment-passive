import $ from 'jquery';

class Course {
  constructor() {
    this.course = $('.course');
    this.events();
    // this.initContent();
    this.readActualPosition();
  }

  events() {
    this.course
      .find('.course-nav-sub-item')
      .on('click', this._insertContent.bind(this));

    this.course.find('.section').on('click', this._toggleCollapse.bind(this));

    this.course
      .find('.shown-content')
      .on('click', this._contentEvents.bind(this));

    this.course
      .find('.courses-levels button')
      .on('click', this._changeLevel.bind(this));

    $('.popup-form .close').on('click', this._closePopup.bind(this));

    this.course.on('click', this._saveActualPosition.bind(this));

    this.course
      .find('.submit-btn')
      .on('click', this._validateInputs.bind(this));
  }

  _validateInputs() {}

  _saveActualPosition() {
    const index = this.course.find('.course-nav-sub-item.active').data('index');
    localStorage.setItem('active-index', index);
  }

  readActualPosition() {
    const activeIndex = localStorage.getItem('active-index');
    if (activeIndex) {
      $.each(this.course.find('.course-nav-sub-item'), (i, el) => {
        if ($(el).data('index') == activeIndex) {
          $(el).trigger('click');
          return false;
        }
      });
      this._openSection();
    } else {
      this.initContent();
    }
  }

  _insertContent(e) {
    const element = $(e.target).closest('.course-nav-sub-item');
    const content = $(element).find('.content').first().clone();
    this._removeAllActive(element);
    $(element).addClass('active');
    $(element).closest('.course').find('.shown-content').html(content);
  }

  initContent() {
    $.each(this.course, (i, el) => {
      const content = $(el)
        .find('.course-nav-sub-item')
        .first()
        .addClass('active')
        .find('.content')
        .first()
        .clone();
      $(el).find('.shown-content').html(content);
      this._openSection();
    });
  }

  _removeAllActive(el) {
    $(el).closest('.course').find('.course-nav-sub-item').removeClass('active');
  }

  _toggleCollapse(e) {
    $(e.target)
      .closest('.course-nav-item')
      .toggleClass('open')
      .find('.sub-menu')
      .slideToggle('slow');
  }

  _contentEvents(e) {
    if ($(e.target).hasClass('next-lesson')) {
      this._nextLesson();
    } else if ($(e.target).hasClass('prev-lesson')) {
      this._prevLesson();
    } else if ($(e.target).hasClass('btn-popup')) {
      this._openPopup();
    }
  }

  _nextLesson() {
    let escapeIndex;
    $.each(this.course.find('.course-nav-sub-item'), (i, el) => {
      if ($(el).hasClass('active')) {
        escapeIndex = i + 1;
      }
      if (i == escapeIndex) {
        $(el).trigger('click');
        return false;
      }
    });
    this._openSection();
  }

  _prevLesson() {
    const navArray = this.course.find('.course-nav-sub-item');
    $.each(navArray, (i, el) => {
      if ($(el).hasClass('active')) {
        $(navArray[i - 1]).trigger('click');
        return false;
      }
    });
    this._openSection();
  }

  _openSection() {
    $.each(this.course.find('.section'), (i, section) => {
      $.each(
        $(section).closest('.course-nav-item').find('.course-nav-sub-item'),
        (j, el) => {
          if (
            $(el).hasClass('active') &&
            !$(section).closest('.course-nav-item').hasClass('open')
          ) {
            $(section).trigger('click');
          }
        }
      );
    });
  }

  _changeLevel(e) {
    this.course.find('.courses-levels button').removeClass('active');
    $(e.target).closest('button').addClass('active');

    const navArray = this.course.find('.course-nav-sub-item');
    if ($(e.target).closest('button').hasClass('mine')) {
      $(navArray[0]).trigger('click');
      this._openSection();
    } else {
      $(navArray[navArray.length - 1]).trigger('click');
      this._openSection();
    }
  }

  _openPopup() {
    $('.popup-form').addClass('active');
  }

  _closePopup() {
    $('.popup-form').removeClass('active');
  }
}

export default Course;

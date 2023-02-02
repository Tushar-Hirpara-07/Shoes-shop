(function () {
    let sliderOpen = $('.openSlide');
    sliderOpen.hide();
    sliderOpen.eq(0).show();
    $('.questions').on('click', function () {
      let dataNo = $(this).attr('data-no');
      let xy = $(this);
      $('.content').each(function() {
        let eachdatano = $(this).attr('data-no');
        if (dataNo == eachdatano) {
          xy.next().slideToggle();
          xy.addClass('active');
          xy.find('i').toggleClass("fa-plus-square fa-minus-square");
        } else if (dataNo != eachdatano) {
          $(this).find('p#openSlide'+eachdatano).slideUp(); 
          $(this).find('.questions').removeClass("active");; 
          $(this).find('i').removeClass("fa-minus-square");; 
          $(this).find('i').addClass("fa-plus-square");; 
        }
      })
    })
  })();
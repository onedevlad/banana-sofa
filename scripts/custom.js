var video = {
  resettingDelay: 5,
  resetting: 0,
  running: false,
  top: 0,
}

$.fn.isInView = function(maxTopCoord, maxBottomCoord, fixedTop) {
  console.log(window.innerHeight / maxBottomCoord)
  return fixedTop - pageYOffset >= window.innerHeight / maxTopCoord &&
         fixedTop - pageYOffset <= window.innerHeight / maxBottomCoord
}

$(document).ready(function(){ // Phone mask module
  $("#phone").mask("+38 (099) 999-99-99")
})


$(document).ready(function(){ // Video module
  var $video = $('video')
  video.top = $video.offset().top

  function videoClick(){
    clearTimeout(video.resetting)
    video.running ? pause($video[0]) : play($video[0])
  }
  function play(){
    $video[0].play()
    video.running = true
    clearTimeout(video.resetting)
  }
  function pause(){
    $video[0].pause()
    video.running = false
    clearTimeout(video.resetting)
  }
  function handleScroll(){
    if($video.isInView(-2.5, 2, video.top)) play()
    else{
      pause()
      video.resetting = setTimeout(function(){
        $video[0].currentTime = 0
      }, video.resettingDelay * 1000)
    }
  }

  $(window).scroll(handleScroll).bind('touchmove', handleScroll)

  $('video').click(videoClick)
})


$(document).ready(function(){ // Slider module
  $('.slick-slider').slick({
    accessibility: true,
    autoplay: true,
    dots: true,
    autoplaySpeed: 3000,
  })
  .on('afterChange', function(slick, currentSlideObj){
    $('.gallery-img-title.active').removeClass('active')
    $('.gallery-img-title[data-index="'+currentSlideObj.currentSlide+'"]').addClass('active')
  })

  $('.gallery-img-title').click(function(){
    var index = $(this).attr('data-index')
    $('.slick-slider').slick('slickGoTo', index)
  })
})

$(document).ready(function(){ // Order module
  $('.order').on('click', function(){
    $('#order-modal').modal()
  })
})

$(document).ready(function(){
  $('.desc-img').ready(function(){
    $('.desc-text').css('height', $('.desc-img').height()+'px')
  })
})

if(window.innerWidth >= 992){
  $(document).ready(function(){ // Floating module
    function handleScroll() {
      $('.floating-block').each(function(i){
        var $this = $(this)
        if($this.isInView(-5, 1.3, $(this).offset().top)) $this.addClass('floating')
        else $this.removeClass('floating')
      })
    }
    $(window).scroll(handleScroll).bind('touchmove', handleScroll)
  })
}
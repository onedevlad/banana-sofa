var video = {
  resettingDelay: 5,
  resetting: 0,
  running: false,
}

$.fn.isInView = function() {
  return this[0].getBoundingClientRect().top >= - window.innerHeight / 2 &&
         this[0].getBoundingClientRect().top <= window.innerHeight / 2
}

$(document).ready(function(){ // Phone mask module
  $("#phone").mask("+38 (099) 999-99-99")
})


$(document).ready(function(){ // Video module
  var $video = $('video')

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
    if($video.isInView()) play()
    else{
      pause()
      video.resetting = setTimeout(function(){
        $video[0].currentTime = 0
      }, video.resettingDelay * 1000)
    }
  }

  $('body').scroll(handleScroll).bind('touchmove', handleScroll)

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

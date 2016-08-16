var video = {
  resettingDelay: 5,
  resetting: 0,
  running: false,
  top: 0,
}
var config = null
var chosenColor = null
var chosenColorName = null

$.fn.isInView = function(maxTopCoord, maxBottomCoord, fixedTop) {
  return fixedTop - pageYOffset >= window.innerHeight / maxTopCoord &&
         fixedTop - pageYOffset <= window.innerHeight / maxBottomCoord
}

$(document).ready(function(){ // Config module
  function applyConfig(){
    $('.original-price-value').html(config['original-price'])
    $('.new-price-value').html(config['new-price'])
    $('.discount-value').html(config['discount-percent'])
    $('.overlay-black').css('display', config['goods-status']['black'] === 'true' ? 'none' : 'block')
    $('.overlay-blue').css('display', config['goods-status']['blue'] === 'true' ? 'none' : 'block')
    $('.overlay-green').css('display', config['goods-status']['green'] === 'true' ? 'none' : 'block')
    $('.overlay-red').css('display', config['goods-status']['red'] === 'true' ? 'none' : 'block')
    $('.overlay-violet').css('display', config['goods-status']['violet'] === 'true' ? 'none' : 'block')
    $('.overlay-yellow').css('display', config['goods-status']['yellow'] === 'true' ? 'none' : 'block')
  }

  var xhr = new XMLHttpRequest()
  xhr.open('GET', 'scripts/config.json', true)
  xhr.send()
  xhr.onreadystatechange = function(){
    if(xhr.readyState === 4) {
      config = JSON.parse(xhr.responseText)
      applyConfig()
    }
  }
})

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
  $('.goto-order').on('click', function(){
    $('body').animate({'scrollTop': $('#order-screen').offset().top}, 500);
  })
  $('.buy').on('click', function(){
    chosenColor = $(this).attr('id').split('-')[1]
    switch(chosenColor) {
      case 'black': chosenColorName = 'Чёрный'; break;
      case 'blue': chosenColorName = 'Голубой'; break;
      case 'green': chosenColorName = 'Зелёный'; break;
      case 'red': chosenColorName = 'Красный'; break;
      case 'violet': chosenColorName = 'Фиолетовый'; break;
      case 'yellow': chosenColorName = 'Жёлтый'; break;
    }
    $('#color-name').val(chosenColorName)
    $('#order-modal').modal()
    $('#order').click(function(){
      yaCounter39026405.reachGoal('ordering')
    })
  })
})

$(document).ready(function() { //Minor UI tweaks
  $('.desc-img').ready(function() {
    setTimeout(function() {
      var descImgRect = $('.desc-img')[0].getBoundingClientRect()
      var height = descImgRect.bottom - descImgRect.top
      $('.desc-text').css('height', height+'px')
    }, 0)
  })

  var slidingDelay = 250
  var activeQuestion = null
  $('.answer').slideUp(slidingDelay)
  $('.question').each(function(i) {
    $(this).click(function() {
      if(activeQuestion !== i) {
        $('.answer').eq(activeQuestion).slideUp(slidingDelay)
        $('.question-arrow').eq(activeQuestion).removeClass('expanded')
      }
      $('.answer').eq(i).slideToggle(slidingDelay)
      $(this).find('.question-arrow').toggleClass('expanded')
      activeQuestion = i
    })
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
var video = {
	resettingDelay: 5,
	resetting: 0,
	running: false,
}

$.fn.isInView = function() {
	return this[0].getBoundingClientRect().top >= 0 &&
				 this[0].getBoundingClientRect().bottom <= window.innerHeight
}


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
})
var order;

$(document).ready(function(){//Order module
	jQuery(function($){
		$("#phone, #special-phone").mask("+38 (099) 99-99-999");
	});

	$('#order, #special-order').click(function(){
		var prefix='';
		if(this.id === 'special-order') prefix='special-';

		if($('#'+prefix+'name').val() !== '' && $('#'+prefix+'phone').val() !== '' && $('#'+prefix+'surname').val() !== ''){
			alert('Спасибо, Ваш заказ принят!');
			$('#'+prefix+'form').submit();
		}
		else{
			alert('Заполните все поля формы.');
		}
	});
	order=function(){
		$('body').animate({'scrollTop': $('#order-screen').offset().top}, 500);
	};
	$('.order:not("#special-order")').click(order);

	if(originalPrice.slice(0, 2) === '<?') originalPrice='250';
	if(discount.slice(0, 2) === '<?') discount='30';
	if(newPrice.slice(0, 2) === '<?') newPrice='179';
	if(specialSuggestionPrice.slice(0, 2) === '<?') specialSuggestionPrice='120';
	if(newPrice === '') newPrice=parseInt((originalPrice-(originalPrice/100)*discount), 10);
	originalPrice=parseFloat(originalPrice);
	discount=parseFloat(discount);
	newPrice=parseFloat(newPrice);
	$('.original-price-value').html(originalPrice);
	$('.discount-value').html(discount);
	$('.new-price-value').html(newPrice);
	$('.special-suggestion-price').html(specialSuggestionPrice);
});

$(document).ready(function(){
	setTimeout(function(){
		$('.desc-text').css('height', $('.desc-img').height()+'px');
		//$('.video').css('height', $('.header-form-wrapper').height());
	}, 500);
});
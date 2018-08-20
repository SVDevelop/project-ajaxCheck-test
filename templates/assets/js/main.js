$(document).ready(function() {
	$("#loginForm").submit(function(event) {
		event.preventDefault();
		//var data1 = $(this).serialize();
		var email = $("#email").val();
		var password = $("#password").val();
		if ( email == "" && password == "" ) {
			$(".error").fadeIn(800);
			// $(".error").toggleClass('.hidden');
			$(".error").html("Поля не могут быть пустыми");
			$('.login-page-form__row').each(function() {
				$(this).find('input').focusin(function() {
					$(".error").fadeOut(700);
				});
			});
		} else {
			$(".error").fadeOut(800);
			var data = new FormData(this);
			console.log(data);
			ajax($(this).attr('action'), $(this).attr('method'), data);
		}
	});

	function ajax(action, method, data){
		$.ajax({
			url: action,
			type: method,
			dataType: 'json',
			data: data,
			processData: false,
			contentType: false,
			cache: false,
			success: function (data) {
				if (data == 'Don!!!') {
					$( "#loginForm" ).unbind().submit();
				} else {
					$(".error").html(data);
					$(".error").fadeIn(800);
					console.log(data);
				}
			}
		});
	}
});
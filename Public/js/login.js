/* js login start */

	/* check username */
	$('.regis-form #checkUserName').on('keyup',function(){
		var name = $(this).val();
		$.ajax({
			url: '../Ajax/checkExistUSName',
			method: 'post',
			data: {userName:name},
			success: function(response){
				$('.regis-form #showMessage').html(response);
			}
		});
	}); 

	/* toggle form */
	$('.option-2 a').click(function(){
		$('form').animate({
			height: 'toggle',
			opacity: 'toggle'
		}, 'slow');
	});

/* js login end */

jQuery.fn.extend({
	check: function() {
		return this.each(function() { this.checked = true; });
	},
	uncheck: function() {
		return this.each(function() { this.checked = false; });
	}
});

var delay = (function(){
	var timer = 0;
	return function(callback, ms){
		clearTimeout (timer);
		timer = setTimeout(callback, ms);
	};
})();


var Login = (function() { 

	var selectRole = function() { 
		$("#loginView li").click(function(){ 
			var roleValue = $(this).children("a").text();  	  
			
			$("#loginView #role").val(roleValue);  
			 
		});
	};   

	var whenModalClose = function() { 
		$('#modal1').on('hidden.bs.modal', function (e) {
			$("#loginView .alert-danger").fadeOut("fast");
		});
	};


	var loginSubmit = function() {   
		$("#loginView").ajaxForm({
			dataType: 'json',
			forceSync: true,
			beforeSubmit: loading,
			success: success_status
		});       

		function loading() { 
			$("#loginView .alert-danger").fadeOut("slow");    
			$('.preloader').removeClass('animated fadeOut').css("opacity", "0.5").show();   
			
		};   

		function success_status(data) { 
			
			setTimeout(function(){ 
				// Preloader
				$('.intro-tables, .parallax, header').css('opacity', '0');
				$('.preloader').addClass('animated fadeOut').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
					$('.preloader').hide();
					$('.parallax, header').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
						$('.intro-tables').addClass('animated fadeInUp').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend');
					});
				});	
			}, 3000);

			if(data.status) { 
				window.location = data.redirect;
			} else { 
				$("#loginView .alert-danger").fadeIn("slow");
			}   		      

		}	
	};  

	return { 
		loginSubmit: 	loginSubmit, 
		selectRole:  	selectRole, 
		whenModalClose: whenModalClose 
	}

})()   

Login.selectRole();
Login.loginSubmit();  
Login.whenModalClose();  

var CrudModule = (function() { 

	var checkBoxesOperates = function() { 

		$(document).on('click', ".main_check", function(){
			if($(this).is(":checked")) {
				$(".sub_check").check();
			} else {
				$(".sub_check").uncheck();
			}
		});
		
		$(document).on('click', ".sub_check", function(){
			if($(".sub_check:checked").length === $(".sub_check").length) {
				$(".main_check").check();
			} else {
				$(".main_check").uncheck();
			}
		});        

	};  

	return { 
		checkBoxesOperates: 	checkBoxesOperates
	}

})()   

CrudModule.checkBoxesOperates();    


var UserModule = (function() { 

	var addUserFormSubmit = function() { 

		$("#addUserForm").ajaxForm({
			dataType: 'json',
			forceSync: true,
			beforeSubmit: loading,
			success: success_status
		});       

		function loading() { 
			return true;
		}    

		function success_status(data) { 
			
			console.log(data);

			if(data.status) { 
				$(".confirmation_message").fadeIn("fast", function(){ 
					$(this).removeClass("bg-danger").addClass("bg-success").text(data.message);
				});
			} else { 
				$(".confirmation_message").fadeIn("fast", function(){ 
					$(this).removeClass("bg-success").addClass("bg-danger").text(data.message);
				});
			}   

			delay(function(){ 
				
				$(".confirmation_message").fadeOut("slow");

			}, 5000);
		}  


	};   

	return { 
		addUserFormSubmit: 	addUserFormSubmit
	}

})()    

UserModule.addUserFormSubmit();



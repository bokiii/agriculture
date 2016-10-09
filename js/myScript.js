
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

var Crud = (function() { 

	var selectEditDelete = function() { 
		$(document).on("click", ".selectEditClick", function(){ 
			$(this).parent().parent().siblings(".select-action").children(".btn").removeClass("btn-select-action btn-delete-update").addClass("btn-edit-update").text("Update");                                            
			$(this).parent().parent().siblings(".hasValue").children("input").removeAttr("disabled");    
			$(this).parent().parent().siblings(".priveleges").children('label').each(function(){ 
				$(this).children('.privelege_check').removeAttr('disabled');
			});

		});  

		$(document).on("click", ".selectDeleteClick", function(){ 
			$(this).parent().parent().siblings(".select-action").children(".btn").removeClass("btn-select-action btn-edit-update").addClass("btn-delete-update").text("Delete");  
			$(this).parent().parent().siblings(".hasValue").children("input").attr("disabled", "disabled");
		});   

		$(document).on("click", ".selectNoneClick", function(){ 
			$(this).parent().parent().siblings(".select-action").children(".btn").removeClass("btn-delete-update btn-edit-update").addClass("btn-select-action").text("Select Action");  
			$(this).parent().parent().siblings(".hasValue").children("input").attr("disabled", "disabled");
			$(this).parent().parent().siblings(".priveleges").children('label').each(function(){ 
				$(this).children('.privelege_check').attr({ 
					"disabled": "disabled"
				}).removeAttr("checked");
			});
		});
	};  

	return { 
		selectEditDelete: 	selectEditDelete
	}

})()  


Crud.selectEditDelete();

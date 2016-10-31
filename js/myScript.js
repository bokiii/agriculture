
jQuery.fn.extend({
	check: function() {
		return this.each(function() { this.checked = true; });
	},
	uncheck: function() {
		return this.each(function() { this.checked = false; });
	}
}); // end 

var delay = (function(){
	var timer = 0;
	return function(callback, ms){
		clearTimeout (timer);
		timer = setTimeout(callback, ms);
	};
})(); // end 

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
})() // end    

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
})() // end    

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
			

			if(data.status) { 
				$(".confirmation_message").fadeIn("fast", function(){ 
					$(this).removeClass("bg-danger").addClass("bg-success").text(data.message);
				});
			} else { 
				$(".confirmation_message").fadeIn("fast", function(){ 
					$(this).removeClass("bg-success").addClass("bg-danger").text(data.message);
				});
			}      

			$("#addUserForm").trigger("reset");

			delay(function(){ 
				
				$(".confirmation_message").fadeOut("slow");  

			}, 5000);  

			angular.element($("#mainSection")).scope().getUsers();  
		}  
	}; // end     

	var deleteUserFormSubmit = function() { 

		$("#userDeleteForm").ajaxForm({
			dataType: 'json',
			forceSync: true,
			beforeSubmit: loading,
			success: success_status
		});       

		function loading() { 
			return true;
		}    

		function success_status(data) { 
		
			angular.element($("#mainSection")).scope().getUsers();    

		}  
	}; // end  

	var updateUserFormSubmit = function() { 
		$("#updateUserForm").ajaxForm({
			dataType: 'json',
			forceSync: true,
			beforeSubmit: loading,
			success: success_status
		});       

		function loading() { 
			return true;
		}    

		function success_status(data) { 
			$("#editModal").modal('hide');
			angular.element($("#mainSection")).scope().getUsers();      
			alert(data.message);    
		}  

	}; // end 

	return { 
		addUserFormSubmit: 		addUserFormSubmit, 
		deleteUserFormSubmit: 	deleteUserFormSubmit, 
		updateUserFormSubmit: 	updateUserFormSubmit
	}      
})() // end     

UserModule.addUserFormSubmit();  
UserModule.deleteUserFormSubmit();  
UserModule.updateUserFormSubmit();   

var DataInventoryModule = (function() { 

	var navigate = function() { 
		
		$("#firstNext").on("click", function(e){ 
			e.preventDefault();  
			/*if(angular.element($("#mainSection")).scope().checkFirstData()) { 
				
				$("#firstData").slideUp("slow", function(){ 
					$("#secondData").slideDown("fast");
				});  

			} else { 
				var firstDataErrorMessage = angular.element($("#mainSection")).scope().firstDataErrorMessage.join(", ");   
				
				$("#firstData .confirmation_message").text("Please enter " + firstDataErrorMessage).fadeIn();
			} */    

			$("#firstData").slideUp("slow", function(){ 
				$("#secondData").slideDown("fast", function(){ 
					$("#addDataSubmitButtonContainer").show("fast");
				});
			});    			
		}); // end        

		$("#firstPrev").on("click", function(e){   
			$("#addDataSubmitButtonContainer").hide("fast");
			$("#secondData").slideUp("slow", function(){ 
				$("#firstData").slideDown("fast");
			});  
		}); // end 

		// below for number of assets   
		var currentNumOfAssets = 1;    
		$("#num_assets").on("click", function(){ 
			var numOfAssets = $(this).val();      
			var assetMainContainer = $(".assetContainer").html();   
			if(numOfAssets > 1) {   

				if(currentNumOfAssets < numOfAssets) { 
					currentNumOfAssets = numOfAssets;   
					var assetToAppend = '<div class="row assetContainer">' + assetMainContainer + '</div>'; 
					$("#assetMainContainer").append(assetToAppend);
				} else if(currentNumOfAssets > numOfAssets) {     
					currentNumOfAssets = numOfAssets;   
					$(".assetContainer:last-child").remove();
				}
				
			} else if(numOfAssets == 1) {   
				currentNumOfAssets = numOfAssets;  
				var assetToAppend = '<div class="row assetContainer">' + assetMainContainer + '</div>'; 
				$("#assetMainContainer").html(assetToAppend);
			}  
		}); // end 

		// below event when add data modal is closed 
		/*$('#addDataModal').on('hidden.bs.modal', function (e) {
			angular.element($("#mainSection")).scope().first_name = "";  
			angular.element($("#mainSection")).scope().middle_name = "";  
			angular.element($("#mainSection")).scope().last_name = "";
		})*/    
	}; // end     

	var addDataFormSubmit = function() { 

		$("#addDataForm").ajaxForm({
			dataType: 'json',
			forceSync: true,
			beforeSubmit: loading,
			success: success_status
		});     

		function loading() {   
			console.log("Trying to submit...");
			return false;
		}      

		function success_status(data) { 
			console.log(data);
		}

	};    

	return { 
		navigate: 			navigate, 
		addDataFormSubmit:	addDataFormSubmit
	}   

})() // end   

DataInventoryModule.navigate();  
DataInventoryModule.addDataFormSubmit();



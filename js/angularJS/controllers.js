"use strict";

var controllers = angular.module('agriculture.controllers', []);

// below are the controllers for the admin account 
controllers.controller('users', function($scope, $http, $sce){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;      

	var getUsersUrl = fullUrl + "/get_users";       
	$scope.users;

	$scope.getUsers = function() {
		$http.get(getUsersUrl).success(function(data){    

			for(var i = 0; i < data.users.length; i++) { 
				
				if(data.users[i].can_add == 1) { 
					data.users[i].can_add = "yes";
				} else { 
					data.users[i].can_add = "no";
				}    

				if(data.users[i].can_delete == 1) { 
					data.users[i].can_delete = "yes";
				} else { 
					data.users[i].can_delete = "no";
				}    

				if(data.users[i].can_edit == 1) { 
					data.users[i].can_edit = "yes";
				} else { 
					data.users[i].can_edit = "no";
				}  

			}


			$scope.users = data.users;       
		});    
	}; // end     

	$scope.getUsers();  

	$scope.username;    
	$scope.password;   
	$scope.canAdd;    
	$scope.canEdit;
	$scope.canDelete;  
	$scope.id;

	$scope.getUserById = function(id) {   
		var getUserByIdUrl = fullUrl + "/get_user_by_id?id=" + id;  
		
		$http.get(getUserByIdUrl).success(function(data){    
			if(data.user[0].can_add == 1) { 
				data.user[0].can_add = "<input type='checkbox' name='can_add' value='1' checked> &nbsp; Can Add";                            
			} else { 
				data.user[0].can_add = "<input type='checkbox' name='can_add' value='1'> &nbsp; Can Add";  
			}       

			if(data.user[0].can_edit == 1) { 
				data.user[0].can_edit = "<input type='checkbox' name='can_edit' value='1' checked> &nbsp; Can Edit";  
			} else { 
				data.user[0].can_edit = "<input type='checkbox' name='can_edit' value='1'> &nbsp; Can Edit";  
			}  

			if(data.user[0].can_delete == 1) { 
				data.user[0].can_delete = "<input type='checkbox' name='can_delete' value='1' checked> &nbsp; Can Delete";  
			} else { 
				data.user[0].can_delete = "<input type='checkbox' name='can_delete' value='1'> &nbsp; Can Delete";  
			}    

		
			$scope.username = data.user[0].username;     
			$scope.password = data.user[0].password;
			$scope.canAdd = $sce.trustAsHtml(data.user[0].can_add);
			$scope.canEdit = $sce.trustAsHtml(data.user[0].can_edit);
			$scope.canDelete = $sce.trustAsHtml(data.user[0].can_delete);  
			$scope.id = data.user[0].id;  

		});    
	}; // end 
}); // end         

controllers.controller('dataInventory', function($scope, $http, $sce){
	
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;   

	$scope.first_name = ""; 
	$scope.middle_name = "";  
	$scope.last_name = "";    
	$scope.address = "";  
	$scope.civil_status = "";  
	$scope.gender = "";

	$scope.firstDataErrorMessage;  

	$scope.asset = [];   
	$scope.asset_description = [];

	$scope.checkFirstData = function() { 
		var error = [];  
		switch($scope.first_name) { 
			case "":    
				error.push("First Name");
				break;     
			case undefined:    
				error.push("First Name");
				break;     
		}   
		switch($scope.middle_name) {   
			case "":    
				error.push("Middle Name");
				break;  
			case undefined:    
				error.push("Middle Name");
				break;  
		}    
		switch($scope.last_name) {   
			case "":    
				error.push("Last Name");
				break;  
			case undefined:    
				error.push("Last Name");
				break;
		}    
		switch($scope.address) {   
			case "":    
				error.push("Address");
				break;  
			case undefined:    
				error.push("Address");
				break;
		}    
		switch($scope.civil_status) {   
			case "":    
				error.push("Civil Status");
				break;  
			case undefined:    
				error.push("Civil Status");
				break;
		}     
		switch($scope.gender) {   
			case "":    
				error.push("Gender");
				break;  
			case undefined:    
				error.push("Gender");
				break;
		}    
		$scope.firstDataErrorMessage = error;    
		if($scope.firstDataErrorMessage.length > 0) { 
			return false;
		}  else { 
			return true;
		}
	}; // end           

	$scope.datas;
	var getDatasUrl = fullUrl + "/get_data";  
	$scope.getDatas = function() {    
		$http.get(getDatasUrl).success(function(data){    
			$scope.datas = data;  
		});   
	};       

	$scope.getDatas();	
}); // end      

controllers.controller('individualDataInventory', function($scope, $http, $sce){  
	var protocol = window.location.protocol + "//" + window.location.host;
	var fullUrl = protocol + window.location.pathname + window.location.search;      

	var getIndividualDataUrl = fullUrl.replace("get_data_by_id", "get_data_by_id_angular");      
	$scope.data;
	$scope.getIndividualData = function() { 
		$http.get(getIndividualDataUrl).success(function(data){ 
			$scope.data = data[0];  
		});  
	}    
	$scope.getIndividualData();      

	
	$scope.data_asset;
	$scope.getAssetById = function(id) { 
		
		var getAssetByIdTempUrl = protocol + window.location.pathname;    
		var getAssetByIdUrl = getAssetByIdTempUrl.replace("get_data_by_id", "get_data_asset_by_id") + "?id=" + id;        

		$http.get(getAssetByIdUrl).success(function(data){ 
			$scope.data_asset = data[0];  
			console.log($scope.data_asset);
		});

	};  
}); // end    



















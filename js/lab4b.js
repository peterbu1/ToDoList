$(document).ready(function(){
	var RegState = 0;
	$.ajax({
	  type: 'GET',
	  url:'php/readRegState.php',
	  async: false,
	  dataType:"json",
	  encode: true
	}).always(function(data) {
	  console.log(data);
	  RegState = parseInt(data.RegState);

	});	
	if(RegState != 4){
		window.location.href ="index.html";
	}
	$("#logoutBtn").click(function(e){
		//Make Ajax call here
		$.ajax({
		  type: 'POST',
		  url:'php/logout.php',
		  async: true,
		  dataType:'json',
		  encode: true
		}).always(function(data) {
		  console.log(data);
		  RegState = parseInt(data.RegState);
		  if(RegState == 0){
			window.location.href = "index.html";
			return;
		  }
		   $("#logOutMessage").html(data.Message);
		});	
	})
})
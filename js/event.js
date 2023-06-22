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
	$("#saveToDb").click(function(e){
		event.preventDefault(e);
		//Make Ajax call here
		var formData = {
			'name' : $('input[name=name]').val(),
			'startDate' : $('input[name=startDate]').val(),
			'endDate' : $('input[name=endDate]').val(),
			'startTime' : $('input[name=startTime]').val(),
			'endTime' : $('input[name=endTime]').val()
		};
		$.ajax({
		  type: 'GET',
		  url:'php/event.php',
		  async: true,
		  data: formData,
		  dataType:'json',
		  encode: true
		}).always(function(data) {
		  console.log(data);
		  RegState = parseInt(data.RegState);
		  $("#toDoListMessage").html(data.Message);
		  return;
		});	
	})
})
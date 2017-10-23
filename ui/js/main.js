$(document).ready(function(){
    "use strict";
	
	$(".btn").on('click', function()
	{
		loadData();
	});	
	$("#query").keypress(function (e) {
	  if (e.which === 13) {
		loadData();
	  }
	});	
	function loadData()
	{
		var query = $("#query").val();

		$.ajax({
			type: "GET",
			url: "base/Load/loadPerson.php",
			data: "data="+query,
			async:true,
			beforeSend: function(){
				$('.content-result').html('<img src="ui/img/loader.gif" width="32" height="32"  alt=""/>&nbsp;&nbsp;Moment please...');
			},
			success: function(datos){
				$('.content-result').html(datos);
				$('.content-header').hide();
			},
			timeout: 300000
		});			
	}
    
});
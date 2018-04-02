$(document).ready(function(){
	 
	var baseurl= $('input[name="baseurl"]').val();
	var userid= $('input[name="userid"]').val();
	$.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('input[name="_token"]').val()
          }
        });
    $("#logout").click(function(){
        $.ajax({
		  type: 'POST',
		  url: baseurl+'/Pipedrive/logout',
		  data: {id : userid},
		  dataType: "text",
		  success: function(resultData) { 
		     var obj = JSON.parse(resultData);
			 if(obj.logout == 1) 
			 {
				location.reload();
			 }
		  }
		});
    });
});

var button = $("#buttonChekIn");
  var latitude;
  var longitude;
navigator.geolocation.getCurrentPosition(function(position) {
            latitude = position.coords.latitude;
            longitude = position.coords.longitude;
			
});
 



button.click(function(){
	$.post("../position.php",{"attr[]":[latitude,longitude]},function(data){
		
	});

});
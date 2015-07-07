
var button = $("#buttonChekIn");
  var latitude;
  var longitude;
  var accuracy;	
navigator.geolocation.getCurrentPosition(function(position) {
            latitude = position.coords.latitude;
            longitude = position.coords.longitude;
            accuracy = position.coords.accuracy;	
			
});
 



button.click(function(){
	$.post("../position.php",{"latitude":latitude,"longitude":longitude,"accuracy":accuracy},function(data){
		
	},"json");

});

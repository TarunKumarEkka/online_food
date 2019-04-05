function initMap(){
	if(navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(success,fail);
	}
	else
	{
		$("p").html("Doesn't support");
	}
}
function success(position)
{
	$("p").html("latitude "+position.coords.latitude+"<br> Longitude "+position.coords.longitude+"<br> Accuracy "+position.coords.accuracy);
	 
	var lac= new  google.maps.LatLng(position.coords.latitude,position.coords.longitude);
	var optn={
		zoom:12  ,
		center:lac,
		mapTypeId:google.maps.MapTypeId.ROAD
	}
	var pmap =document.getElementById("map");
	var map =new google.maps.Map(pmap,optn);
	addmarker(map,lac,"Restaurant Name","<h4><b>Restaurant Name</b></h4><br>Proovide delicious food to eat both veg and <br>non-veg & also deleviery food order <br>online or via phone");
	var locapi= "https://maps.googleapis.com/maps/api/geocode/json?address="+position.coords.latitude+","+position.coords.longitude+"&key=AIzaSyB6Y1I2DA7Vx6UTKOujb-Nw01uneOgSpdo";
    $.get({
    	url:locapi,
    	suc:function(data)
    	{
    		console.log(data);
    		$("h4").html(data.results[0].address_components[4].long_name+", "+data.results[0].address_components[5].long_name+", "+data.results[0].address_components[6].long_name);
    	}
    });
}
function addmarker(map,lac,title,content )
{
	var markerOptn={
		position:lac,
		map:map,
		title:title,
		animation:google.maps.Animation.DROP
	}; 
	var marker =new google.maps.Marker(markerOptn);
	var infoWindows=new google.maps.InfoWindow({content:content,position:lac});
	google.maps.event.addListener(marker,"click",function()
	{
      infoWindows.open(map);
	});
}
function fail(error)
{
  var errorType={
    0:"UnKnown Error",
    1:"Permission denied by the user",
    2:"POSITION of the user not available",
    3:"Request timed out"
  };
  var errMsg=errorType[error.code];
  if(error.code==0|| error.code==2 ){
    errMsg=errMsg+"-"+error.message;
  }
  $("p").html(errMsg);
 }
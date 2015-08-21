<?php
session_start();
if (empty($_SESSION['email'])){
  header('Location:auth.php');
}
?>
<!doctype html>
<html lang="en">	
<head>
 
	<meta charset="UTF-8">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<title>document</title>
  <script src="js/jquery.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
 
<body>
    <div id="panel">
      <input onclick="clearMarkers();" type=button value="Hide Markers">
      <input onclick="showMarkers();" type=button value="Show All Markers">
      <input onclick="deleteMarkers();" type=button value="Delete Markers">
      <input onclick="console_markers();" type=button value="Console Markers">
    </div>
	<div id="map-canvas"></div>
  <button id="buttonChekIn" class="btn btn-warning">Check in</button>


  <script src="js/ajaxCheck.js"></script>
<script src="js/main.js"></script>
</body>
</html>
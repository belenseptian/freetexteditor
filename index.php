<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/custom.css">
    	<title>Free HTML Text Editor</title>
</head>
<body>
	<div class="container-fluid">
		<h1><center>Free HTML Text Editor</center></h1>
		<div class="row">
			<div class="col-sm-4 col-md-4"></div>
			<div class="col-sm-4 col-md-4">
			
				<!--
				<button onclick="saveSelection();">save</button>
				<button onclick="restoreSelection();">Restore</button>
				-->
				<div id="container-box">
					<button id="b"><i class="fa fa-bold"></i></button>
					<button id="i"><i class="fa fa-italic"></i></button>
					<button id="u"><i class="fa fa-underline"></i></button>
					<button id="al"><i class="fa fa-align-left"></i></button>
					<button id="ac"><i class="fa fa-align-center"></i></button>
					<button id="l"><i class="fa fa-link"></i></button>
					<button id="imge"><i class="fa fa-image"></i></button>
					
				
				</div>
				<div style="display:none;" id="container-box0">
					<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
						<input type="file" name="file" id="file" class="inputfile inputfile-1" required>
						<input style="display:none;" class="myup" type="submit" value="Upload" class="submit" />
					</form>
				</div>
				<div style="display:none;" id="container-box1"><input type="text" class="form-control" name="tautlink" id="tautlink" placeholder="Link; Example : http://www.google.com"></div>
				<div style="display:none;" id="container-box2"><input type="text" class="form-control" name="tautlabel" id="tautlabel" placeholder="Label; Example : Google"></div>
				<div style="display:none;" id="container-box3"><button type="button" class="btn btn-info btn-block" name="mytaut" id="mytaut">Insert</button></div>
				<div contenteditable="true" id="bum">Insert your contents here...</div>
				<br>
				<button id="getedVal" class="btn btn-success btn-block">Get Editor Value</button>
				<br>
				<textarea id="getVal" class="form-control" disabled></textarea>
				<h5><i><center>Made by Belen Septian powered by Rangy library + Bootstrap + Jquery</center></i></h5>
			</div>
			<div class="col-sm-4 col-md-4"></div>
		</div>
	</div> 						
	<script type="text/javascript" src="rangi-libs/rangy-core.js"></script>
    <script type="text/javascript" src="rangi-libs/rangy-selectionsaverestore.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/custom-file-input.js"></script>
	<script type="text/javascript" src="js/bootbox.min.js"></script>

    <script type="text/javascript" src="js/custom.js"></script>

</body>
</html>

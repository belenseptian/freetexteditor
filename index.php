<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	
	<style type="text/css">
		#bum
		{
			padding:5px;
			border:1px solid #ccc;
			height:300px;
			overflow-y:auto;
		}
		#container-box,#container-box1,#container-box2,#container-box3,#container-box0
		{
			padding:5px;
			background-color:#ccc;
		}
		form
		{
			display:inline;
			margin:0px;
			padding:0px;
		}
	
		
	</style>
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

    <script type="text/javascript">
        function gEBI(id) {
            return document.getElementById(id);
        }

        var savedSel = null;
        var savedSelActiveElement = null;

        function saveSelection() {
            // Remove markers for previously saved selection
            if (savedSel) {
                rangy.removeMarkers(savedSel);
            }
            savedSel = rangy.saveSelection();
            savedSelActiveElement = document.activeElement;
            
        }

        function restoreSelection() {
            if (savedSel) {
                rangy.restoreSelection(savedSel, true);
                savedSel = null;
              
                window.setTimeout(function() {
                    if (savedSelActiveElement && typeof savedSelActiveElement.focus != "undefined") {
                        savedSelActiveElement.focus();
                    }
                }, 1);
				
				
            }
        }
		
		function validateFileType(){
			var fileName = document.getElementById("file").value;
			var idxDot = fileName.lastIndexOf(".") + 1;
			var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
			if (extFile=="jpg" || extFile=="jpeg" || extFile=="png")
			{
				//TO DO
			}
			else
			{
				return true;
			}   
		}
		
		$(document).ready(function(){
			$("#b").click(function(){
				document.execCommand('bold',false,null);
			});
			
			$("#i").click(function(){
				document.execCommand('italic',false,null);
			});
			
			$("#u").click(function(){
				document.execCommand('underline',false,null);
			});
			
			$("#al").click(function(){
				document.execCommand('justifyLeft',false,null);
				$("#bum").focus();
			});
			
			$("#ac").click(function(){
				document.execCommand('justifyCenter',false,null);
				$("#bum").focus();
			});
			
			$("#mytaut").click(function(){
				if($("#tautlabel").val()=="" || $("#tautlink").val()=="")
				{
					bootbox.dialog({ closeButton: true, message: 'Please fill all the inputs!' });
				}
				else
				{
					$("#linkModal").modal("hide");
					restoreSelection();
					document.execCommand('insertHTML',false,"<a href='"+$("#tautlink").val()+"'>"+$("#tautlabel").val()+"</a>");
					$("#container-box1").css("display","none");
					$("#container-box2").css("display","none");
					$("#container-box3").css("display","none");
					$("#tautlink").val("");
					$("#tautlabel").val("");
				}
			});
			
			$("#file").change(function(){
				
				if(validateFileType()==true)
				{
					$("#container-box0").css("display","none");
					bootbox.dialog({ closeButton: true, message: 'Only image files are allowed!', onEscape: function() {
						restoreSelection();
					} });
				}
				else
				{
					if (this.files && this.files[0] && this.files[0].size <= 500000) {
						var reader = new FileReader();

						reader.onload = function(e) {
							//alert(e.target.result);
						}

						reader.readAsDataURL(this.files[0]);
					}
				
					$("#uploadimage").submit();
					//$("#movetoserver").css("display","block");
					bootbox.dialog({ closeButton: false, message: '<div class="text-center"><i class="fa fa-spin fa-spinner"></i> Please wait...</div>' });
				}
				
			});
			
			$("#uploadimage").on('submit',(function(e) {
				e.preventDefault();
				$.ajax({
					url: "php/ajax_php_file.php", // Url to which the request is send
					type: "POST",             // Type of request to be send, called as method
					data:new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
					contentType: false,       // The content type used when sending data to the server.
					cache: false,             // To unable request pages to be cached
					processData:false,        // To send DOMDocument or non processed data file it is set to false
					success: function(data)   // A function to be called if request succeeds
					{
						if(data=="error")
						{
							$("#container-box0").css("display","none");
							bootbox.hideAll();
							//failed to upload, please check connection
							bootbox.dialog({ closeButton: true, message: 'Upload is failed, please check your internet connection and ensure that image formats are ["jpeg","jpg","png",".gif"]!', onEscape: function() {
								restoreSelection();
							} });
						}
						else if(data=="gagal")
						{
							$("#container-box0").css("display","none");
							bootbox.hideAll();
							//image size is too large
							bootbox.dialog({ closeButton: true, message: 'Upload is failed, image exceeds the limit of 500 KB!', onEscape: function() {
								restoreSelection();
							} });
			
						}
						else
						{
							$("#container-box0").css("display","none");
							//success
							bootbox.hideAll();
							restoreSelection();
							document.execCommand('insertHTML',false,"<img class='img-responsive' src='php/uploaded_image/"+data+"'>");
							

						}
					},
					error: function(xhr)
					{
						$("#container-box0").css("display","none");
						bootbox.hideAll();
						//failed to upload, please check connection
						bootbox.dialog({ closeButton: true, message: 'Upload is failed, please check your internet connection and ensure that image formats are ["jpeg","jpg","png",".gif"]!', onEscape: function() {
							restoreSelection();
						} });
					}
				});
			}));
			
			$("#imge").click(function(){
				saveSelection();
				$("#container-box0").css("display","block");
			});
			
			$("#l").click(function(){
				saveSelection();
				$("#container-box1").css("display","block");
				$("#container-box2").css("display","block");
				$("#container-box3").css("display","block");
			});
			
			$("#bum").click(function(){
				$("#container-box0").css("display","none");
				$("#container-box1").css("display","none");
				$("#container-box2").css("display","none");
				$("#container-box3").css("display","none");
			});
			
			$("#bum").keydown(function(){
				$("#container-box0").css("display","none");
				if($("#tautlabel").val()=="" || $("#tautlink").val()=="")
				{
					$("#container-box1").css("display","none");
					$("#container-box2").css("display","none");
					$("#container-box3").css("display","none");
				}
			});
			
			$("#getedVal").click(function(){
				$("#getVal").val($("#bum").html());
			});
		});
    </script>

</body>
</html>

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

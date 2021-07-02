# FREE HTML TEXT EDITOR

This is free HTML text editor built from rangy library, bootstrap, and jquery. This code supports custom image upload by which you can upload image to your own server throughout ajax request. You can edit as per your need and don't forget to share to anyone who needs it.

P.S. : 

If you encounter an ajax error while uploading the picture, please change the following line in js/custom.js

url: "php/ajax_php_file.php"

into

url: "../php/ajax_php_file.php"


If the image doesn't show after it's successfully uploaded, please change the following line in js/custom.js

document.execCommand('insertHTML',false,"<img class='img-responsive' src='php/uploaded_image/"+data+"'>"); //show preview of the image

into

document.execCommand('insertHTML',false,"<img class='img-responsive' src='../php/uploaded_image/"+data+"'>"); //show preview of the image


Thank You

Belen Septian


  
 

# FREE HTML TEXT EDITOR

This is free HTML text editor built from rangy library, bootstrap, and jquery. This code supports custom image upload by which you can upload image to your own server throughout ajax request. This code is built using native language, if you use/plan to use framework then it can be changed accordingly. You can edit as per your need and don't forget to share to anyone who needs it.


P.S. : 

If you encounter an ajax error while uploading the picture, please change the following line in js/custom.js

url: "php/ajax_php_file.php"

into

url: "../php/ajax_php_file.php"


If the image doesn't show after it's successfully uploaded, please change the following line in js/custom.js

document.execCommand('insertHTML',false,"<*img class='img-responsive' src='php/uploaded_image/"+data+"'>"); //you may remove * symbol

into

document.execCommand('insertHTML',false,"<*img class='img-responsive' src='../php/uploaded_image/"+data+"'>"); //you may remove * symbol

Screenshots :

![ScreenHunter 07 (01)](https://user-images.githubusercontent.com/42172216/124319694-3c69a300-db98-11eb-865e-25cd848829f7.png)


![ScreenHunter 08](https://user-images.githubusercontent.com/42172216/124319662-31167780-db98-11eb-886b-dc5e0c569710.png)



Thank You

Belen Septian


  
 

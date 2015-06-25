<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            #status {
                width:200px;
                height:200px;
                position:absolute;
                left:50%; /* centers the loading animation horizontally one the screen */
                top:50%; /* centers the loading animation vertically one the screen */
                background-image:url(../img/status.gif); /* path to your loading animation */
                background-repeat:no-repeat;
                background-position:center;
                margin:-100px 0 0 -100px; /* is width and height divided by two */
              }
              
              body{
                  background-color: black;                 
              }
            
        </style>
        <script language="javascript">      

      
      function startApplication(){
        window.location = "../index.php/backend/login";
      }

      function onLoadBody(){
        setTimeout("startApplication()", 0);
      }
    </script>   
    </head>
    <body onload="onLoadBody();">
        <div id="preloader">
            <div id="status"></div>
        </div>
    </body>
</html>

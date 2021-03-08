<?php
    
include "../data/https.php";
?>
<?php 
session_start();
session_unset();
session_destroy();

if($_GET['logOutNow'] == "true") {
    echo "Uspješna odjava!";
} else {
    
}


//$link = "https://www.office.com/estslogout?ru=%2F%3Fref%3Dlogout";

?>


<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="/apps/favicon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Odjava iz aplikacije Škola na dlanu - Gimnazija Pula">
    <meta property="og:site_name" content="Škola na dlanu">
    <meta property="og:url" content="https://www.školanadlanu.hr">
    <meta property="og:description" content="Odjava uz pomoć AAI@EduHR modula i Office365">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/data/logo.png">
    <meta property='og:image:width' content='1200' />
    <meta property='og:image:height' content='900' />

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <meta name="Description" content="Odjava">
    <title>Odjava uz AAI@EduHr sustav</title>
    <style>
        html, body {
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }
        #appLogin {
            width: 100%;
            height: 100%;
            border: unset;
            overflow:hidden;
        }
    </style>
</head>

<body>
<iframe id="appLogin" src="https://apps.powerapps.com/play/32e79cd5-ccab-448f-8a66-4794dc9f48aa?tenantId=9b5af216-c634-4b80-ab02-0c9a3d029091&Action=Logout"></iframe>
<script>
        //setTimeout(function(){ window.close(); }, 10000); 
</script>

</body>

</html>

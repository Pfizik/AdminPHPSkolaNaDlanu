<?php
   include("../../data/https.php");
   ?>
<?php 
   include("../../data/session.php");
   if(!isset($_SESSION["sessionID"])) {
       header("Location: ../../data/disabled.html");
   } 
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <title>Odgovor</title>
      <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="../favicon.png" type="image/png">
      <style>
         html,
         body {
         margin: 0;
         padding: 0;
         font-family: 'Open Sans', sans-serif;
         }
         #povratak, a {
         position: absolute;
         left: 1rem;
         height: 4.5rem;
         }
         /*za naslov*/
         .page-header {
         height: 8rem;
         width: 100%;
         background-color: #a3006d;
         display: flex;
         justify-content: center;
         align-items: center;
         margin-top: 0;
         padding: 0;
         }
         .page-header span {
         width: max-content;
         font-size: 3rem;
         color: white;
         font-family: 'Audiowide', cursive;
         }
         /**/
         /*za prikaz cijele stranice*/
         .container {
         padding: 0;
         margin: 0;
         width: 100%;
         }
         /**/
         /*za opis stranice*/
         .lead {
         padding-left: 4rem;
         padding-right: 4rem;
         text-align: justify;
         }
         /**/
         /*za formu*/
         .form-horizontal {
         padding-left: 5rem;
         padding-right: 5rem;
         }
         /**/
         #my-response {
         margin: 10px;   
         }
         h4 {
         font-weight: bold;
         font-size: 1.8rem;
         margin-top: 1rem;
         margin-bottom: 1rem;
         }
         /*za naziv unosa*/
         .col-sm-2 {
         padding-right: 1.5rem;
         padding-left: 1.5rem;
         }
         /**/
         /*za unos*/
         .form-control {
         height: 3.4rem;
         }
         /**/
         /*za naslove formi*/
         /*
         .panel-default>.panel-heading {
         color: black;
         background-color: rgb(232, 232, 232); hsl(80, 90%, 50%)
         border-color: #ddd;
         }
         */
         /* Dodao */
         .panel-default>.panel-heading {
         color: white;
         background-color: #000000cc;
         border-color: #ddd;
         }
         .panel-heading {
         padding: 1rem 1.5rem;
         }
         /**/
         /*za dugme*/
         .btn {
         font-weight: bold;
         align-self: center;
         }
         .btn-lg{
         position: relative;
         left: 50%;
         transform: translateX(-50%);
         background-color: hsl(320, 100%, 32%); /* Dodao */
         border: 1px solid hsl(320, 100%, 32%);  /* Dodao */
         transition: 0.3s; /* Dodao */
         color: white; /* Dodao */
         padding-left: 2rem; /* Dodao */
         padding-right: 2rem; /* Dodao */
         }
         /* Dodao */
         .btn-default:hover {
         color: white !important;
         background-color: #7b0454 !important;
         border: 1px solid #7b0454 !important;
         transition: 0.3s;
         }
         /**/
         /*prilagodba mobitelima*/
         @media screen and (max-device-width: 500px), (max-width: 500px) {
         html, body {
         font-size: 5px;
         min-height: 100vh;
         }
         #povratak, a {
         display: none;
         }
         .page-header {
         height: 11rem;
         }
         .page-header span {
         font-size: 5rem;
         }
         .lead {
         font-size: 3rem;
         margin-bottom: 3rem;
         }
         .form-horizontal {
         padding-left: 3rem;
         padding-right: 3rem;
         }
         .form-horizontal .control-label {
         text-align: left;
         margin-bottom: 2rem;
         }
         h4 {
         font-size: 3rem;
         }
         .col-sm-2 {
         font-size: 3rem;
         float: none;
         width: 95%;
         height: 3rem;
         }
         .form-control {
         width: 100%;
         /* margin-left: 2rem; */
         height: 6rem;
         font-size: 3rem;
         }
         .btn-lg{
         position: relative;
         left: 50%;
         transform: translateX(-50%);
         font-size: 4rem;
         margin-top: -2rem;
         margin-bottom: 0rem;
         padding: 2rem 3rem 2rem 3rem;
         }
         .alert-danger {
         font-size: 2rem;
         }
         }
         /**/
      </style>
   </head>
   <body>
      <?php
         require_once __DIR__ . '/vendor/autoload.php';
         use infobip\api\client\SendMultipleTextualSmsAdvanced;
         use infobip\api\configuration\BasicAuthConfiguration;
         use infobip\api\model\Destination;
         use infobip\api\model\sms\mt\send\Message;
         use infobip\api\model\sms\mt\send\textual\SMSAdvancedTextualRequest;
         if (isset($_POST['toInput'])) {
             // Create configuration object that will tell the client how to authenticate API requests
             // Additionally, note the use of http protocol in base path.
             // That is for tutorial purposes only and should not be done in production.
             // For production you can leave the baseUrl out and rely on the https based default value.
             /*
             
             
             */
             //$configuration = new BasicAuthConfiguration($_POST['username'], $_POST['password'], 'http://api.infobip.com/');
             //*W4b9*buAC#2nKU
             $configuration = new BasicAuthConfiguration("nikVuj123!", "*W4b9*buAC#2nKU", 'http://api.infobip.com/');
             // Create a client for sending sms texts by passing it the configuration object
             $client = new SendMultipleTextualSmsAdvanced($configuration);
             // Destination holds recipient's phone number along with id used to uniquely identify the message later on
             $destination = new Destination();
             $destination->setTo($_POST['toInput']);
             $destination->setMessageId($_POST['messageIdInput']);
             // Message has text and the sender of the sms along with other metadata useful for tracking delivery
             $message = new Message();
             // One message can be sent to multiple destinations, that is why it takes an array of Destination objects
             // In this example we send sms only to a single phone number so an array with only one destination is set
             $message->setDestinations([$destination]);
             $message->setFrom($_POST['fromInput']);
             $message->setText($_POST['textInput']);
             $message->setNotifyUrl($_POST['notifyUrlInput']);
             $message->setNotifyContentType($_POST['notifyContentTypeInput']);
             $message->setCallbackData($_POST['callbackDataInput']);
             // SMSAdvancedTextualRequest model is sent to the API client
             $requestBody = new SMSAdvancedTextualRequest();
             // One request can have multiple different text messages, in this example we only send one
             $requestBody->setMessages([$message]);
             try {
                 // Executing request
                 $apiResponse = $client->execute($requestBody);
                 ?>
      <?php echo '   
         <div id="my-response">
         <h4>Response</h4><br>
         <div>
             <table id="logs_table" class="table table-condensed">
                 <thead>
                     <tr>
                         <th>Message ID</th>
                         <th>To</th>
                         <th>Status Group ID</th>
                         <th>Status Group Name</th>
                         <th>Status ID</th>
                         <th>Status Name</th>
                         <th>Status Description</th>
                         <th>SMS Count</th>
                     </tr>
                 </thead>
                 <tbody>
                     '; ?>
      <?php
         $messages = $apiResponse->getMessages();
         foreach ($messages as $message) {
             echo "<tr>";
             echo "<td>" . $message->getMessageId() . "</td>";
             echo "<td>" . $message->getTo() . "</td>";
             echo "<td>" . $message->getStatus()->getGroupId() . "</td>";
             echo "<td>" . $message->getStatus()->getGroupName() . "</td>";
             echo "<td>" . $message->getStatus()->getId() . "</td>";
             echo "<td>" . $message->getStatus()->getName() . "</td>";
             echo "<td>" . $message->getStatus()->getDescription() . "</td>";
             echo "<td>" . $message->getSmsCount() . "</td>";
             echo "</tr>";
         }
         ?>
      <?php 
         echo "
         </tbody>
         </table>
         </div>
         </div>
         "; ?>
      <?php
         } catch (Exception $apiCallException) {
             // Handling errors in request execution
             ?>
      <?php 
         echo '
         <div class="alert alert-danger" role="alert">
             <b>Pojavila se greška</b> Razlog:'; ?>
      <?php
         $errorMessage = $apiCallException->getMessage();
         $errorResponse = json_decode($apiCallException->getMessage());
         if (json_last_error() == JSON_ERROR_NONE) {
             $errorReason = $errorResponse->requestError->serviceException->text;
         } else {
             $errorReason = $errorMessage;
         }
         echo $errorReason;
         ?>
      <?php  echo "</div>"; ?>
      <?php
         }
         }
         ?>
      <?php echo "</div>"; ?>
   </body>
</html>
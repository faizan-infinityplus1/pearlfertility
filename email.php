<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- SweetAlert2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<style>
  body {
    font-family: sans-serif;
    text-align: center;
  }

  button {
    background-color: cadetblue;
    color: whitesmoke;
    border: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
    font-size: 18px;
    font-weight: 500;
    border-radius: 7px;
    padding: 15px 35px;
    cursor: pointer;
    white-space: nowrap;
    margin: 10px;
  }

  img {
    width: 200px;
  }

  input[type="text"] {
    padding: 12px 20px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-sizing: border-box;
  }

  h1 {
    border-bottom: solid 2px grey;
  }

  #success {
    background: green;
  }

  #error {
    background: red;
  }

  #warning {
    background: coral;
  }

  #info {
    background: cornflowerblue;
  }

  #question {
    background: grey;
  }
</style>
<button style="display:none" id="success">Success</button>

<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Load Composer's autoloader
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();

$mail->SMTPDebug = 0;
$mail->Host = "mail.pearlfertilityandivf.com";

$mail->Port = 465;
$mail->IsHTML(true);

//Set who the message is to be sent from
$mail->setFrom('info@pearlfertilityandivf.com', 'Pearl Fertility');

//Set an alternative reply-to address
// $mail->addReplyTo('replyto@gmail.com', 'Secure Developer');

//Set who the message is to be sent to
// $mail->addAddress('', 'Nighar Akhtar');
$mail->addAddress('pearlfertilitynivf@gmail.com', 'Perl Feartility');
$mail->addAddress('mirzafaizan1931@gmail.com', 'Faizan');


//Set the subject line
$mail->Subject = 'Contact form submitted data.';
//Read an HTML message body from an external file, convert referenced images to embedded,

//convert HTML into a basic plain-text alternative body
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_SESSION["redirection"] = "done";
  $name = ($_POST['name'] != '') ? $_POST['name'] : '';
  $email = ($_POST['email'] != '') ? $_POST['email'] : '';
  $phone = ($_POST['phone'] != '') ? $_POST['phone'] : '';
  $message = ($_POST['message'] != '') ? $_POST['message'] : '';




  // var_dump($message);

  $html = "  
    <table style='width: 100%;border: 2px solid black;border-collapse: collapse;'>
    <tr style='width: 100%;border: 2px solid black;'>";
  if (!empty($name)) {
    $html .= "     <th style='width: 20%;border: 2px solid black;'>Enter your Name</th>";
  }
  if (!empty($email)) {
    $html .= "      <th style='width: 20%;border: 2px solid black;'>Enter your Email</th>";
  }
  if (!empty($phone)) {
    $html .= "      <th style='width: 20%;border: 2px solid black;'>Enter your Mobile Number</th>";
  }
  if (!empty($message)) {
    $html .= "      <th style='width: 20%;border: 2px solid black;'>Enter your Message</th>";
  }

  $html .= "    
    </tr>
    <tr style='width: 100%;border: 2px solid black;'>";
  if (!empty($name)) {
    $html .= "     <th style='width: 20%;border: 2px solid black;'>" . $name . "</th>";
  }
  if (!empty($email)) {
    $html .= "     <th style='width: 20%;border: 2px solid black;'>" . $email . "</th>";
  }
  if (!empty($phone)) {
    $html .= "     <th style='width: 20%;border: 2px solid black;'>" . $phone . "</th>";
  }
  if (!empty($message)) {
    $html .= "     <th style='width: 20%;border: 2px solid black;'>" . $message . "</th>";
  }
  $html .= "         </tr>
            </table>";


  //            $curl = curl_init();
  //     curl_setopt_array($curl, array(
  //         CURLOPT_RETURNTRANSFER => 1,
  //         CURLOPT_URL => 'https://sanjarcrm.com/api/leads/submit',
  //         CURLOPT_POST => 1,
  //         CURLOPT_POSTFIELDS => array(
  //             'name' => $name,
  //             'contact' => $contact,
  //             'email' => $email,
  //             'message' => $message,
  //             'extra' => $city,
  //              'table_alias' => 'cinemaonstage_com_',
  //              'api_key' => '3c97a03bf567aa7ade93f52110a11652'
  //         )
  // ));

  // Send the request & save response to $resp
  //  $resp = curl_exec($curl);
  // Close request to clear up some resources
  //  curl_close($curl);

  $mail->msgHTML($html);
}

if (isset($_SESSION['redirection'])) {
  echo '';
} else {
  header("Location:https://pearlfertilityandivf.com/demo");
}

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';


// add attachment

// if ($_POST) {
//     // die($_POST);
//     $path = 'upload/' . $_FILES["resume"]["name"];
//     move_uploaded_file($_FILES["resume"]["tmp_name"], $path);
//     // var_dump($_POST);
//     var_dump($path);


//     $mail->AddAttachment($path);
//     var_dump($path,$name,$experience,$contact,$email,$message);
//     // die('$name');
// }


// send the message, check for errors
if (!$mail->send()) {
  echo "
            <script type=\"text/javascript\">
            swal(
				'Success',
        	'Your mail has been sent <b style=color:green>Successfully</b> ',
				'success'
			)
            </script>
        ";
  session_unset();

  // header("Location:https://saraogihospital.in/");
  // die(' i m here');
} else {
  echo "
    <script type=\"text/javascript\">
    swal(
        'Success',
        	'Your mail has been sent <b style=color:green>Successfully</b> ',
        'success'
    )
    </script>
";
  session_unset();


  // header("Location:index.html");
}
?>

<script>
  $('body').click(function() {


    window.location = "https://pearlfertilityandivf.com/demo";

  });
</script>
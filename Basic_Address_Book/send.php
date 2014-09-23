<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Contact Added</title>
    </head>
    <body>
        <?php
            // Variables
            date_default_timezone_set('Canada/Eastern');
            $fName = $_POST['firstN'];
            $lName = $_POST['lastN'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $prov = $_POST['prov'];
            $gender = $_POST['gender'];
            $hTel = $_POST['hTel'];
            $cTel = $_POST['cTel'];
            $cEmail = $_POST['cEmail'];
            $vEmail = $_POST['vEmail'];
            $uEmail = $_POST['uEmail'];
            $time = new DateTime();
            $currentTime = $time->format('l, F d, Y,  g:i A  T');
            $ok = true;
            
            // Check to make sure no fields are left empty
            if (empty($fName)) {
                echo 'First name is required. <br />';
                $ok = false;
            }
            if (empty($lName)) {
                echo 'Last name is required. <br />';
                $ok = false;
            }
            if (empty($address)) {
                echo 'Address is required <br />';
                $ok = false;
            }
            if (empty($city)) {
                echo 'City is required <br />';
                $ok = false;
            }
            // Only one telephone field had to be filled in
            if (empty($hTel) && empty($cTel)) {
                echo 'Telphone number is required <br />';
                $ok = false;
            }
            if (empty($cEmail)) {
                echo 'Contact email is required <br />';
                $ok = false;
            }
            if (empty($uEmail)) {
                echo 'Need a verification email address <br />';
                $ok = false;
            }
            
            
            // Check to make sure first and last name are non-numeric
            if (is_numeric($fName)) {
                echo 'No numbers are allowed as a first name. <br />';
                $ok = false;
            }
            if (is_numeric($lName)) {
                echo 'No numbers are allowed as a last name. <br />';
                $ok = false;
            }
            
            // Check to make sure telephone numbers are numeric
            if (!is_numeric($hTel) && !empty($hTel)) {
                echo 'Telephone number must be numeric. <br />';
                $ok = false;
            }
            if (!is_numeric($cTel) && !empty($cTel)) {
                echo 'Cell number must be numeric. <br />';
                $ok = false;
            }
            
            // Verification emails must match
            if ($uEmail != $vEmail){
                echo 'Verification email fields must match <br />';
                $ok = false;
            }
            
            // Phone number must be 10 digits, no more, no less
            if (strlen($hTel) != 10 && !empty($hTel))
            {
                echo'Phone number must be a 10 digit numeric value. <br />';
                $ok = false;
            }
            if (strlen($cTel) != 10 && !empty($cTel))
            {
                echo'Phone number must be a 10 digit numeric value. <br />';
                $ok = false;
            }
            
            // If all the fields pass validation, then we're good to go!
            if ($ok == true){
                // Connect to the database
                $conn = new PDO('mysql:host=localhost;dbname=dbname','user','pass');
                
                //Throw an error if connection failed
		if (!$conn)  {
                    die('Could not connect');
		}
                
                // SQL Insert statement that needs to be sent to the database
                $sql = "INSERT INTO contacts (fName, lName, address, city, prov, gender, tel, cTel, email, dateAdded) VALUES ('$fName','$lName','$address','$city','$prov','$gender','$hTel','$cTel','$cEmail','$currentTime');";
                
                // Execute the query
                $conn->exec($sql);
                
                // Close the connection
                $conn = null;
                
                // Email the confirmation email
                mail($uEmail, 'Verification email: Contact Added!', 'This message is to verify that 1 record had been added to your address book.', 'From: Blake_Murdock(200260568@student.georgianc.on.ca)');
                
                // Print confirmation message to the screen
                echo '1 Record Added';
            }
        ?>
    </body>
</html>

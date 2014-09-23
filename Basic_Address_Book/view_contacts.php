<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            @import url("styles.css");
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Address Book: View Contacts</title>
    </head>
    <body>
        <nav>
            <!--Navigation links -->
            <ul>
                <li><a href="index.php" alt="Create a Contact" />Create  A Contact</a></li>
                <li><a href="view_contacts.php" alt="View Contacts" />View Contacts</a></li>
            </ul>
        </nav>
        <h1><br />Address Book: View Contacts</h1>

        <?php
            // Connect to the db
            $conn = new PDO('mysql:host=localhost;dbname=dbname', 'user', 'pass');

            // Set up the sql instruction that needs to be run
            $sql = "SELECT * FROM contacts";

            // Execute the query and store the results to an array
            $result = $conn->query($sql);

            // Start the table
            echo '<table border = "1"><tr><th>First Name</th><th>Last Name</th><th>Address</th><th>City</th><th>Province</th><th>Gender</th><th>Telephone#</th><th>Cell#</th><th>Email</th><th>Date Added</th><tr>';


            // Loop though each row in the result and output the values to the screen
            foreach ($result as $row) {
                echo '<tr><td>' . $row['fName'] . '</td>
                    <td>' . $row['lName'] . '</td>
                    <td>' . $row['address'] . '</td>
                    <td>' . $row['city'] . '</td>
                    <td>' . $row['prov'] . '</td>
                    <td>' . $row['gender'] . '</td>
                    <td>' . $row['tel'] . '</td>
                    <td>' . $row['cTel'] . '</td>
                    <td> <a href="mailto:' . $row['email'] . '">' . $row['email'] . '</a></td>
                    <td>' . $row['dateAdded'] . '</td></tr>';
            }

            // Close the table
            echo '</table>';

            // Disconnect
            $conn = null;
        ?>
    </body>
</html>

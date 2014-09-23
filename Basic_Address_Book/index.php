<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
            @import url("styles.css");
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Address Book: Add Contact</title>
    </head>
    <body>
        <nav>
            <!--Navigation links -->
            <ul>
                <li><a href="index.php" alt="Create a Contact" />Create  A Contact</a></li>
                <li><a href="view_contacts.php" alt="View Contacts" />View Contacts</a></li>
            </ul>
        </nav>
        <h1><br />Address Book: Add a Contact</h1>
        <form method="post" action="send.php">
            <!--Form elements -->
            <fieldset>
                <legend>Contact Information</legend>
                <div>
                    <label for="firstN">First Name (No numbers allowed):</label>
                    <input type="text" name="firstN" autofocus/>
                </div>
                <div>
                    <label for="lastN">Last Name (No numbers allowed):</label>
                    <input type="text" name="lastN" />
                </div>
                <div>
                    <label for="address">Address:</label>
                    <input type="text" name="address" />
                </div>
                <div>
                    <label for="city">City:</label>
                    <input type="text" name="city" />
                </div>
                <div>
                    <!--Province Drop Down List -->
                    <label for="prov">Province:</label>
                    <select name="prov">
                        <?php
                            // Make the connection to the database
                            $conn = new PDO('mysql:host=localhost;dbname=db200260568','db200260568','70707');
                            // This is the SQL query that will be used
                            $sql = 'SELECT provinceName FROM provinces';
                            // Execute the SQL query, and store it as an array in a variable
                            $result = $conn->query($sql);
                            // Cycle through the array variable, and output the results to a dropdown list
                            foreach ($result as $row)
                            {
                                echo '<option value = "' . $row['provinceName'] . '">' . $row['provinceName'] . '</option>';
                            }
                            // Close the connection to the database
                            $conn = null;
                        ?>
                    </select>
                </div>
                <div>
                    <!--Gender drop down list -->
                    <label for="gender">Gender:</label>
                    <select name="gender">
                        <?php
                            // Make the connection to the database
                            $conn = new PDO('mysql:host=localhost;dbname=db200260568','db200260568','70707');
                            //This is the SQL query that will be used for the dropdown list
                            $sql = 'SELECT * FROM gender';
                            //Execute the query, and store it in as an array in a variable
                            $result = $conn->query($sql);
                            // Go through each part of the array, and add it to the dropdown list
                            foreach ($result as $row)
                            {
                                echo '<option value = "' . $row['gender'] . '">' . $row['gender'] . '</option>';
                            }
                            //Close the connection
                            $conn = null;
                        ?>
                    </select>
                </div>
                <div>
                    <label for="hTel">Home Telephone Number (Must be 10 digits, please use format 1112223333):</label>
                    <input type="tel" name="hTel" />
                </div>
                <div>
                    <label for="cTel">Cell Number (If same as home number leave blank):</label>
                    <input type="tel" name="cTel" />
                </div>
                <div>
                    <label for="cEmail">Contact email:</label>
                    <input type="email" name="cEmail" />
                </div>
                <div>
                    <!--Confirmation email address -->
                    <br />
                    <label for="uEmail">Please enter an email that a confirmation can be sent to:</label>
                    <input type="email" name="uEmail" />
                </div>
                <div>
                    <!--Verify the confirmation email address -->
                    <label for="vEmail">Verify Email:</label>
                    <input type="email" name="vEmail" />
                </div>
                <div>
                    <!--Submit Button -->
                    <input type="submit" name="submit" value="Submit" />
                    <input type="reset" name="reset" value="Reset">
                </div>
            </fieldset>
        </form>
    </body>
</html>

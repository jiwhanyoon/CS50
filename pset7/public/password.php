<?php

    // configuration - requires = #include
    require("../includes/config.php"); 

    //similar to past forms
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
       render("password_form.php" , ["title" => "Password Change"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission - did the user input the old pw
        if(empty($_POST["oldpw"]))
        {
            apologize("Provide your old password.");
        }
        
        // validate submission - did the user input the new pw
        if(empty($_POST["newpw"]))
        {
            apologize("Provide a new password.");
        }
        
        // validate submission - did the user input the new pw again
        if(empty($_POST["confirmation"]))
        {
            apologize("Confirm your new password.");
        }
        
        // retrieve old password from hashed password data
        $row = CS50::query("SELECT hash FROM users WHERE id = ?", $_SESSION["id"]);
        
        //create a copy of it for comparison reason
        $oldpwcpy = $row[0]["hash"];
        
        // ?old password inputted = original existing password
        if(password_verify($_POST["oldpw"], $oldpwcpy) == false)
        {
            apologize("Incorrect old pw.");
        }
        
        // ?New password  = confirmation?
        else if($_POST["confirmation"] != $_POST["newpw"])
        {
            apologize("New password must match.");
        }    

        else
        {
            CS50::query("UPDATE users SET hash = ? WHERE id = ?", password_hash($_POST["newpw"], PASSWORD_DEFAULT), $_SESSION["id"]);
            redirect("/");
        }
    }    
?>
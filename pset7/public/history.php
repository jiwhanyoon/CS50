<?php

    // configuration
    require("../includes/config.php");
    
    //create list/array of correct stocks
    $rows = CS50::query("SELECT * FROM portfolio WHERE user_id = ?", $_SESSION["id"]);
    
    //create empty array
    $positions = [];
    
    //iterate through each item in the list
    foreach($rows as $row)
    {
        $positions[] = [
            "transaction" => $row["transaction"],
            "symbol" => $row["symbol"],
            "shares"=> $row["shares"],
            "price"=> $row["price"],
            "time"=> $row["time"]
        ];
    }
    
    //query for the cash amount
    $cash =	CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    
    //make sure it is the correct one in correct format
    $cash = $cash[0]["cash"];
    $cash = number_format($cash,2, '.' , ',');
    
    //query for the history data to pass it into history
    $history = CS50::query("SELECT * FROM history WHERE id = ?" , $_SESSION["id"]);
    
    //render to display content in an array
    render("history_form.php", ["title" => "History" , "cash" => $cash , "history" => $history, "cash" => $cash]);
    
?>
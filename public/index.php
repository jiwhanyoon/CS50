<?php

    // configuration
    require("../includes/config.php"); 
    
    //dummy variable rows to find the stock with correct tag
    $rows = CS50::query("SELECT * FROM portfolio WHERE id = ?", $_SESSION["id"]);

    // empty array to store things later
    $positions = [];
    
    //sort through
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        
        //if it indeed exists
        if($stock !== false)
        {
            //fill up the array 
            $positions[] = 
            [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"]
            ];
                
        }
    }
    
    //collect the cash values
    $cash = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
    //specify the very first cash value
    $cash = $cash[0]["cash"];
    
    // render portfolio
    render("portfolio.php", ["title" => "Portfolio" , "positions" => $positions, "cash" => $cash]);
    
?>

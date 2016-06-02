<?php

    // configuration
    require("../includes/config.php");
    
    //access via GET
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
       $rows = CS50::query("SELECT * FROM portfolio WHERE user_id = ?", $_SESSION["id"]);
       
       $symbols = [];
       
       foreach($rows as $row)
       {
           $symbol = $row["symbol"];
           
           $symbols[] = $symbol;
        }
       
       render("sell_form.php" , ["title" => "Sell", "symbols" => $symbols]);
    }
    //access via POST
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //define the transaction for history page later on
        $transaction = 'SELL';
        
        //time track
        date_default_timezone_set('EST');
        $time = date("Y/m/d H:i:s");
        
        //make sure the stock exists
        $stock = lookup($_POST["symbol"]);
        if($stock === false)
        {
            apologize("Invalid stock symbol");
        }
        
        //create shares array
        $shares = CS50::query("SELECT shares FROM portfolio WHERE user_id=? AND symbol=?" , $_SESSION["id"], $_POST["symbol"]);
        
        //create stock2 array
        $stock2 = CS50::query("SELECT * FROM portfolio WHERE user_id=? AND symbol=?",$_SESSION["id"],$_POST["symbol"]);
        
        if(empty($stock2))
        {
            apologize("Sorry.");
        }
        
        // Current Price of all of the shares    
        $current_price = $stock["price"] * $stock2[0]["shares"]; 
            
        // Add value of share
        CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $current_price, $_SESSION["id"]);
        
        // Delete the stock title
        CS50::query("DELETE FROM portfolio WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
        
        // Update history
        CS50::query("INSERT INTO history (user_id, transaction, symbol, shares, price, time) VALUES (?, ?, ?, ?, ?, ?)", $_SESSION["id"], $transaction, $_POST["symbol"], $shares[0]["shares"], $stock1["price"], $time);
        
        // coming back to portifolio page
        redirect("/");
        
    }
?>
<?php

    // configuration - requires = #include
    require("../includes/config.php"); 

    //access via GET
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
       render("buy_form.php" , ["title" => "Buy"]);
    }
    
    //access via POST
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
   
        //did the user input the symbol and the amount of shares you want
        if(empty($_POST["symbol"]) || empty($_POST["shares"]))
        {
           apologize("Empty Symbol or Quantity.");
        }
        
        //if symbol invalid
        if(lookup($_POST["symbol"]) === false)
        {
            apologize("Invalid stock symbol");
        }
        
        //if share is invalid
        if(preg_match("/^\d+$/", $_POST["shares"]) == false)
        {
            // apologize
            apologize("Please enter a whole, positive integer.");
        }
        
        //define the transaction for history later
        $transaction = 'BUY';
        
        //time track
        date_default_timezone_set('EST');
        $time = date("Y/m/d H:i:s");
        
        //access the stock
        $stock = lookup($_POST["symbol"]);
        
        //calculate price
        $cost = $stock["price"] * $_POST["shares"];
        
        //access the cost
        $cash = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        
        //if cash < cost
        if($cash < $cost)
        {
            apologize("Not enough money.");
        }
        
        else
        {
            // capitalize symbol
            $_POST["symbol"] = strtoupper($_POST["symbol"]);
                         
            // Update shares
            CS50::query("INSERT INTO portfolio (user_id, symbol, shares) VALUES(?, ?, ?) 
                ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], $_POST["symbol"], $_POST["shares"]);
            
            // since you paid, subtract cash
            CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $cost, $_SESSION["id"]);
            
            // update history
            CS50::query("INSERT INTO history (user_id, transaction, symbol, shares, price, time) VALUES (?, ?, ?, ?, ?, ?)", $_SESSION["id"], $transaction, $_POST["symbol"], $_POST["shares"], $stock["price"], $time);
            
            //redirect to portfolio
            redirect("/");  
        }
    }
?>
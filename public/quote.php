<?php

    // configuration - requires = #include
    require("../includes/config.php"); 

    //prepare for getting the info you want
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
       render("quote_form.php" , ["title" => "Quote"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //did the user input the symbol
        if(empty($_POST["symbol"]))
        {
            apologize("Please insert the symbol of the stock.");
        }
        
        //look up the symbol the user had inputted
        $stock = lookup($_POST["symbol"]);
        
        //check that inputted symbol exists within the POST (original data)
        if($stock === false)
        {
            apologize("Invalid symbol.");
        }
        else
        {
            //format the price accordingly
            $price = number_format($stock["price"], 2);
            
            //show the result form
            render("quote_result.php" , ["title" => "Quote" , "symbol" => $stock["symbol"] , "name" => $stock["name"] , "price" => $price]);
        }
    }
?>



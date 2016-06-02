<table class="table table-striped">

    <thead>
        <tr>
            <th>Transaction</th>
            <th>Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>
    
  <tbody>
    <?php

        foreach ($history as $position)
        {
            print("<tr>");
            print("<td align = 'middle'>" . $position["transaction"] . "</td>");
            print("<td align = 'middle'>" . $position["time"] . "</td>");
            print("<td align = 'middle'>" . $position["symbol"] . "</td>"); 
            print("<td align = 'middle'>" . $position["shares"] . "</td>");
            print("<td align = 'middle'>" . number_format($position["price"],2) . "</td>");
            print("</tr>");
        }
    ?>
    </table>
    <p>
       Cash balance: $ <?= htmlspecialchars($cash) ?>
    </p>


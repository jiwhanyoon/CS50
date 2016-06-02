<table class="table table-striped">

    <thead>
        <tr>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>
    
  <tbody>
    <?php

        foreach ($positions as $position)
        {
            print("<tr>");
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


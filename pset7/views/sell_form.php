<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <select name="symbol">
                <option value=''></option>
                <?php               
	                foreach ($symbols as $symbol)	
                    {   
                        echo("<option value='$symbol'>" . $symbol . "</option>");
                    }
                ?>
            </select>
        </div>
        
        
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Submit
            </button>
        </div>
        
    </fieldset>
</form>
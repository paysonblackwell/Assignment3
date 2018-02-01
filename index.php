<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

        <?php
                 //Initializing so Form doesn't complain
                $wallAmount = "";
                $paintPrice = "";
                $paintAmount = "";
                $laborAmount = "";
                $paintCost = "";
                $laborCost = "";
                $totalCost = "";
                
            //get data from form
            $wallAmount = filter_input(INPUT_POST, 'wall_amount');
            //get rid of $ if there is one
            $paintPrice = str_replace('$','',filter_input(INPUT_POST, 'paint_price'));
            
            //server side validation
            if($wallAmount && $paintPrice && $wallAmount > 0 && $paintPrice > 0)
            {
                //Rounded the amount of gallons of paint to the nearest gallon
                $paintAmount = ceil($wallAmount/115);
                
                //The hours of labor required
                $laborAmount = $paintAmount * 8;
                
                //The labor charges
                $laborCost = round($laborAmount * 20,2);
                
                $paintCost = $paintAmount * $paintPrice;
                
                $totalCost = $paintCost + $laborCost;

                
                //Formatting Numbers                
                $paintPrice = (string)"$".number_format($paintPrice,2);
                
                $paintAmount = (string)number_format($paintAmount);
                
                $laborAmount = (string)number_format($laborAmount);
                
                $paintCost = (string)"$".number_format($paintCost,2);
                
                $laborCost = (string)"$".number_format($laborCost,2);
                
                $totalCost = (string)"$".number_format($totalCost,2);
            }
            else
            {
                //If something isn't entered or a negative amount is entered then nothing will appear
                $wallAmount = "";
                $paintPrice = "";
                $paintAmount = "";
                $laborAmount = "";
                $paintCost = "";
                $laborCost = "";
                $totalCost = "";
            }
        ?>
        
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <script>
                function validate(obj)
                {
                    //Client side validation
                        //only submits to php when it is a positive number
                    var wall = obj.wall_amount.value;
                    if(wall <= 0 || wall == null || !(!isNaN(parseFloat(wall)) && isFinite(wall)))
                    {
                        alert("Invalid Number, The Wall Space must be a positive number!");
                        return false;
                    }
                    
                    var paint = obj.paint_price.value;
                    //get rid of $ if there is one
                    paint = paint.replace('$',' ');
                    if(paint <= 0 || paint == null || !(!isNaN(parseFloat(paint)) && isFinite(paint)))
                    {
                        alert("Invalid Number, The Price of paint must be a positive number!");
                        return false;
                    }
                    return true;
                }
            
            
         </script>
        <div align="center">
            <form class="form-style-4" method="post" onsubmit="return validate(this)" tablealign="center">
                <label>
                    <h1> Painting Calculator </h1>
                </label>
                <label for="field1">
                    <span>Amount of Wall Space (sqft):</span><input type="text" name="wall_amount" required="true" 
                    value="<?php echo $wallAmount; ?>"/>
                </label>
                </br>
                <label for="field2">
                    <span>Price of Paint (per Gallon):</span><input type="text" name="paint_price" required="true" 
                    value="<?php echo $paintPrice; ?>"/>
                </label>
                <span>&nbsp;</span>
                <input type="submit" value="Submit" />
                
                </br></br></br>
                
                <label>
                    <h2>Details</h2>
                </label>
                
                <label for="field3">
                    <span>Gallons of Paint:</span><input type="text" name="$paintAmount" readonly="true" disabled
                    value="<?php echo $paintAmount; ?>"/>
                </label>
                <label for="field4">
                    <span>Hours of Labor:</span><input type="text" name="$laborAmount" readonly="true" disabled
                    value="<?php echo $laborAmount; ?>"/>
                </label>
                <label for="field5">
                    <span>Cost of Paint:</span><input type="text" name="$paintCost" readonly="true" disabled
                    value="<?php echo $paintCost; ?>"/>
                </label>
                <label for="field6">
                    <span>Cost of Labor:</span><input type="text" name="$laborCost" readonly="true" disabled
                    value="<?php echo $laborCost; ?>"/>
                </label>
                <label for="field7">
                    <span>Final Price:</span><input type="text" name="$totalCost" readonly="true" disabled
                    value="<?php echo $totalCost; ?>"/>
                </label>
                
            </form>
            
        </div>
         
        
        <style type="text/css">
            .form-style-4{
                
                width: 50%;
                font-size: 16px;
                background: #495C70;
                padding: 30px 30px 15px 30px;
                border: 5px solid #53687E;
            }
            .form-style-4 input[type=submit],
            .form-style-4 input[type=button],
            .form-style-4 input[type=text],
            .form-style-4 input[type=email],
            .form-style-4 textarea,
            .form-style-4 label
            {
                font-family: Georgia, "Times New Roman", Times, serif;
                font-size: 16px;
                color: #fff;

            }
            .form-style-4 label {
                display:block;
                margin-bottom: 10px;
            }
            .form-style-4 label > span{
                display: inline-block;
                float: left;
                width: 150px;
            }
            .form-style-4 input[type=text],
            .form-style-4 input[type=email] 
            {
                background: transparent;
                border: none;
                border-bottom: 1px dashed #83A4C5;
                width: 275px;
                outline: none;
                padding: 0px 0px 0px 0px;
                font-style: italic;
            }
            .form-style-4 textarea{
                font-style: italic;
                padding: 0px 0px 0px 0px;
                background: transparent;
                outline: none;
                border: none;
                border-bottom: 1px dashed #83A4C5;
                width: 275px;
                overflow: hidden;
                resize:none;
                height:20px;
            }

            .form-style-4 textarea:focus, 
            .form-style-4 input[type=text]:focus,
            .form-style-4 input[type=email]:focus,
            .form-style-4 input[type=email] :focus
            {
                border-bottom: 1px dashed #D9FFA9;
            }

            .form-style-4 input[type=submit],
            .form-style-4 input[type=button]{
                background: #576E86;
                border: none;
                padding: 8px 10px 8px 10px;
                border-radius: 5px;
                color: #A8BACE;
            }
            .form-style-4 input[type=submit]:hover,
            .form-style-4 input[type=button]:hover{
            background: #394D61;
            }
   
            </style>
            
    </body>
</html>

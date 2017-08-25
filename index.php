<html>
    <head>
        <meta charset="UTF-8">
        <title>test random char gen</title>
        <script src="plug-ins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="plug-ins/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="plug-ins/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="plug-ins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="col-xs-6 col-xs-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    Random Key
                </div>
                <div class="panel-body">
                    <?php
                        include './RandomKeyGenerator.php';
                        
                        if(isset($_POST['get'])){
                            $leng = $_POST['leng'];
                            $pat = $_POST['pattern'];
                            $pat = "[".$pat."]";
                            $char = new RandomKeyGenerator();
                            $c1 = $char->generate(GenType::DIGITS_ONLY, $leng);
                            $c2 = $char->generate(GenType::LETTERS_LOWERCASE, $leng);
                            $c3 = $char->generate(GenType::LETTERS_UPPERCASE, $leng);
                            $c4 = $char->generate(GenType::LETTERS_UPPERLOWERCASE, $leng);
                            $c5 = $char->generate(GenType::DIGITS_LETTERS_LOWERCASE, $leng);
                            $c6 = $char->generate(GenType::DIGITS_LETTERS_UPPERCASE, $leng);
                            $c7 = $char->generate(GenType::DIGITS_LETTERS_UPPERLOWERCASE, $leng);
                            $c8 = $char->generateByPattern($pat);
                            
                            echo "<div class=\"col-xs-12\">Digit Only: $c1</div>";
                            echo "<div class=\"col-xs-12\">Letters (LC) : $c2</div>";
                            echo "<div class=\"col-xs-12\">Letters (UC) : $c3</div>";
                            echo "<div class=\"col-xs-12\">Letters (Both) : $c4</div>";
                            echo "<div class=\"col-xs-12\">Digits & Letters (LC) : $c5</div>";
                            echo "<div class=\"col-xs-12\">Digits & Letters (UC) : $c6</div>";
                            echo "<div class=\"col-xs-12\">Digits & Letters (Both) : $c7</div>";
                            echo "<div class=\"col-xs-12\">Pattern ('$pat') : $c8</div>";
                        }
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"
                        <div class="form-group">
                            <label for="patt">Pattern : </label>
                            <input id="patt"class="form-control" type="text" name="pattern" value=":itest-app-:XXXX-iiii-xxxxxx"  required=""/>
                            <label for="leng" >Length : </label>
                            <input name="leng" type="text" class="form-control gtext" id="leng" required="" value="20">
                            <br>
                            <input class="btn btn-primary btn-sm gtext" type="submit" value="Get" name="get" />   
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

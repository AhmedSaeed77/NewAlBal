<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Processing Payment</title>
</head>
<body>

    <form method="POST" action="<?php echo e($payUrl); ?>" id="pay">
        <center>Payment is Processing..</center>
    </form>

    <script>
        (function(){
            document.getElementById('pay').submit();
        })();
    </script>

</body>
</html>

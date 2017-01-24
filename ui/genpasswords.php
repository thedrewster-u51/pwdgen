<!DOCTYPE html>
<html lang="en">
<head>
  <title>Password generator</title>
  <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono" rel="stylesheet">
  <link rel="stylesheet" href="/static/css/normalize.css">
  <link rel="stylesheet" href="/static/css/skeleton.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <style>
    pre.jsonMask {
      font-family: 'Ubuntu Mono', monospace;
      height: 200px;
    }

    ul.password {
      font-family: 'Ubuntu Mono', monospace;
      list-style-type: none;
      background-color: #1F1F1F;
      color: white;
      padding: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
<?php
require_once('pwdgen.lib.php');

echo "<h4>JSON Mask:</h4>";
echo "<pre class='jsonMask'>". $_REQUEST['jsonMask'] . "</pre>";
try {
  PWGen::pwByMask($_REQUEST['jsonMask']);
} catch (Exception $e) {
  echo "Something isn't quite right:\n";
  echo "<strong>" . $e->getMessage() . "</strong>";
  echo "</div></body></html>";
  die();
}

echo "<h4>Passwords</h4>";
echo "<ul class='password'>";
for ($i = 0; $i < $_REQUEST['numberPasswords']; $i ++ ) {
  echo "<li>" . PWGen::pwByMask($_REQUEST['jsonMask']) . "</li>";
}
echo "</ul>"


?>
  </div>
</body>
</html>

<?php
require_once('pwdgen.lib.php');
$json = '{
    "mask" : [
      {"randword":{"len":8}},
      {"randchars":{"len":3,"select":["n","s"]}}
    ]
}';
echo PWGen::pwByMask($json) . "\n";
?>

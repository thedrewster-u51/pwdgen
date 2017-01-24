<?php
$query = $_REQUEST['q'];

$preset['01'] = '
{
    "mask" : [
      {"randword":{"len":8}},
      {"randchars":{"len":3,"select":["n","s"]}}
    ]
}';

$preset['02'] = '
{
    "mask" : [
      {"randchars":{"len":8}}
    ]
}';

$preset['03'] = '
{
    "mask" : [
      {"randchars":{"len":8,"select":["au","al","n","s"]}}
    ]
}';

$preset['04'] = '
{
    "mask" : [
      {"randword":{"len":4}},
      {"randchars":{"len":2,"select":["n"]}},
      {"randword":{"len":4}}
    ]
}';

$preset['05'] = '
{
    "mask" : [
      {"randchars":{"len":10,"select":["n"]}}
    ]
}';

$preset['06'] = '
{
    "mask" : [{
      "randchars":{
        "len":8,
        "select":["au","al","n","s"],
        "custom_strings": {
          "s": "@#$?"
        }
      }
    }]
}';

$preset['07'] = '{
	"mask": [
	{"randword": {"len": 5}},
	{"randchars": {
			"len": 1,
			"select": ["s"],
			"custom_strings": {
				"s": " "
			}
		}},
		{"randword": {"len": 5}},
		{"randchars": {
			"len": 1,
			"select": ["s"],
			"custom_strings": {
				"s": " "
			}
		}},
		{"randword": {
			"len": 5
		}}
	]
}';


header("Content-Type: text/plain");
echo trim($preset[$query]);
?>

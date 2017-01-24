
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
    textarea.jsonMask {
      font-family: 'Ubuntu Mono', monospace;
      height: 200px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class='row'>
      <h1>Password Generator</h1>
      <hr>
    </div>
    <div class='row'>
      <label for="presets">Mask Presets</label>
      <select id='presets'>
        <option value="01">Word + 3 Characters</option>
        <option value="02">8 Characters (Alphanumeric)</option>
        <option value="03">8 Characters (Alphanumeric + Special)</option>
        <option value="04">2 x Words joined by Numbers</option>
        <option value="05">Numbers (10 characters)</option>
        <option value="06">8 Characters, with custom Special</option>
        <option value="07">3 x 5 Letter words, separated by space</option>
      </select>
    </div>
    <form action='genpasswords.php' method='post'>
      <div class="row">
          <label for="jsonMask">Json Password Mask</label>
          <textarea class='u-full-width jsonMask' placeholder="" name="jsonMask" id="jsonMask"></textarea>
      </div>
      <div class="row">
          <label for="numberPasswords">Number of Passwords to Generate</label>
          <input value="5" id="numberPasswords" name='numberPasswords'>
      </div>
      <div class="row">
        <input class="button-primary" type="submit" value="Submit">
      </div>
    </form>
      <div class="row">
        <h3>Example Mask</h3>
        <pre style="background-color: #1F1F1F; color: white">
{
    "mask" : [
      {"randword":{"len":8}},
      {"randchars":{"len":3,"select":["n","s"]}}
    ]
}
      </pre>
      <div>
  </div>
</body>
<script>
$("#presets").on('change', function() {
  var presets = {'rand3char' : 'Blah blah blah' };
  $.ajax({
    url: 'presets.php?q='+this.value,
    dataType: "text",
    type: "POST",
    success: function (data) {
      $( "#jsonMask" ).text( data );
    }
  });
})
</script>
</html>

# PWGen
PWGen is a *(probably very oversimplified)* password generator library.
I wrote this to accept JSON as a "mask" for generating passwords, this allows
you to extend and customise the password generator in which ever way you see
fit. This means you could also write a frontend that accepts plain text
JSON form a user to custome the password generator for their needs.

## JSON format
The library will itterate over every mode provided withing the "mask" object
this allows to to string up a number of modes to provide complex passwords.

Example:
~~~~
{
    "mask" : [
      {"randword":{"len":8}},
      {"randchars":{"len":3,"select":["n","s"]}}
    ]
}
~~~~

Where "randword" and "randchars" are "modes"

## modes

At present I only have 2 modes. Maybe in the future i may extend it to include
diffirent dictionaries. At present, "randword", uses a very small dictionary
with mostly words with "positive" connitations. Don't want to end up sending
customers worded password with things such as "failure" or "miserable".

### Mode : randword

The "randword" mode selects a random word from a predefined dictionary. You
can optionally adjust the length of the word requested through the options.

#### Options
* len : The length of the word you want.

### Mode : randchar

"randchar" is a hightly customisable random password generator.

#### Options
* len : The length of the random string you want.
* select : An array of collections of strings you want to inlude in your
password. This includes "au" : Alpha Uppercase, "al" : Alpha Lowercase,
"s" : Special Characters, "n" : Numeric. Each of these string collections
can be over written using the "custom_strings" option.
* custom_strings : An associative array of the string you want to overwrite.

Example:
~~~~
{
    "mask" : [
      {"randword":{"len":8}},
      {"randchars":{
        "len":3,
        "select":["n","s"]},
        "custom_strings":{
          "n":"12345",
          "s":"!@#$%"
        }
      }
    ]
}
~~~~

## Usage

Most methods are static methods at present, this may change in the future, but
felt I didn't want to deal with dynamic classes in this instance.

You can simply call the PWGen::pwByMask static method. It accepts a string in
in JSON format as a parameter.

Syntax:
~~~~
PWGen::pwByMask($json)
~~~~

See example.php for a simple example.

## User Interface

I've included a quickly thrown together UI for PWDGen. You can find it in the "ui"
directory.

<?php
/**
 * pwdgen.lib.php
 *
 * Password Generator
 *
 * @category   Passwords
 * @package    Generator
 * @author     Andrew Archer
 * @copyright  2017 Andrew Archer
 * @license    https://www.gnu.org/licenses/gpl.txt  GNU GENERAL PUBLIC LICENSE Version 3
 * @version    1.0.0
 * @link       https://github.com/thedrewster-u51/pwdgen
 */

class PWGen {

  static function randWord($options = []) {
    $wlen = (isset($options['len']))?$options['len']:5;
    $file = $options['file'];
    $words = self::wordsLen($file,$wlen);
    $rand_keys = array_rand($words, 1);
    return $words[$rand_keys];
  }

  private static function wordsLen($file,$len) {
    $spl = new SplFileObject($file);
    while (!$spl->eof()) {
        $word = trim($spl->current());
        $dict[strlen($word)][] = $word;
        $spl->next();
    }
    if (!isset($dict[$len])) {
      return [];
    }
    return $dict[$len];
  }

  static function randChars($options = []) {

    // Default Settings
    $strings_def['au'] = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $strings_def['al'] = 'abcdefghijklmnopqrstuvwxyz';
    $strings_def['n'] = '1234567890';
    $strings_def['s'] = '~!@#$%^&*()_+=-<>,.?{}[]';
    $selected = isset($options['select'])?$options['select']:['au','al','n'];
    $len = isset($options['len'])?$options['len']:8;

    // Merge strings with custom ones
    if (isset($options['custom_strings'])) {
      $strings_def = array_merge($strings_def, $options['custom_strings']);
    }

    //Concatenate string according to the selected options
    $string_cat = '';
    foreach ($selected as $option) {
      if (isset($strings_def[$option])) {
        $string_cat .= $strings_def[$option];
      }
    }

    $string_new = '';
    while(strlen($string_new) < $len) {
      $string_cat = str_shuffle($string_cat);
      $string_new .= substr($string_cat,0,1);
    }

    return $string_new;
  }

  static function pwByMask ($mask_json) {
    $mask = json_decode($mask_json,1);
    if ($mask == null) {
      throw new Exception("Invalid JSON", 1);
    }

    $pw = '';
    foreach ($mask['mask'] as $element) {
      foreach ($element as $k => $options) {
        switch ($k) {
          case 'randchars':
            $pw .= self::randChars($options);
            break;
          case 'randword':
            $options['file'] = 'data/words.txt';
            $pw .= self::randWord($options);
            break;
        }
      }
    }
    return $pw;
  }
}
?>

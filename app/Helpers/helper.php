<?php
namespace App\Helpers;

class Helper{



 function  humanTiming ($time)
{

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'سنة',
        2592000 => 'شهر',
        604800 => 'اسبوع',
        86400 => 'يوم',
        3600 => 'ساعة',
        60 => 'دقيقة',
        1 => 'ثانية'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text;
    }

}

function getOrderByTable($order, $columns, $allowed = [])
{
    $orderColumn = "id";
    $dir = "desc";
    if (isset($order[0]["column"]) && $order[0]["column"])
        $orderColumn = (isset($columns[$order[0]["column"]]["name"]) && in_array($columns[$order[0]["column"]]["name"], $allowed) ? $columns[$order[0]["column"]]["name"] : "");

    if (isset($order[0]["dir"]) && $order[0]["dir"])
        $dir = in_array($order[0]["dir"], ["asc", "desc"]) ? $order[0]["dir"] : "desc";
    return [$orderColumn, $dir];
}

function getRoleClass($action, $roleActions, $roleActionsDefault)
{
    if (in_array($action, $roleActions) && in_array($action, $roleActionsDefault))
        return "blue";
    if (in_array($action, $roleActions) && !in_array($action, $roleActionsDefault))
        return "green";
    if (!in_array($action, $roleActions) && in_array($action, $roleActionsDefault))
        return "red";
    if (!in_array($action, $roleActions) && !in_array($action, $roleActionsDefault))
        return "black";
}

function generateBreadcrumbs($arr)
{
    $result = '';
    foreach ($arr as $key => $value) {
        if ($value || $key == trans("cp.dashboard"))
            $result .= '<li><a href="' . $value . '">' . $key . '</a><i class="fa fa-circle"></i></li>';
        else
            $result .= "<li><span>" . $key . "</span></li>";
    }

    return $result;
}

function escape_like($str)
{
    $temp = DB::getPdo()->quote($str);
    $temp = substr($temp, 1);
    $temp = substr($temp, 0, -1);
    return $temp;
}

function loadImage($fileName, $dest, $width = 0, $height = 0, $q = 50, $path = "")
{
    if (!$path)
        $path = url("uploads/" . $dest . "/" . $fileName);
    $result = url("") . "/thumb/timthumb.php?src=" . $path . "&zc=1&q=" . $q;
    if ($width)
        $result .= "&w=" . $width;
    if ($height)
        $result .= "&h=" . $height;
    return $result;
}

function detectDevice()
{
    $userAgent = $_SERVER["HTTP_USER_AGENT"];
    $devicesTypes = array(
        "computer" => array("msie 10", "msie 9", "msie 8", "windows.*firefox", "windows.*chrome", "x11.*chrome", "x11.*firefox", "macintosh.*chrome", "macintosh.*firefox", "opera"),
        "tablet" => array("tablet", "android", "ipad", "tablet.*firefox"),
        "mobile" => array("mobile ", "android.*mobile", "iphone", "ipod", "opera mobi", "opera mini"),
        "bot" => array("googlebot", "mediapartners-google", "adsbot-google", "duckduckbot", "msnbot", "bingbot", "ask", "facebook", "yahoo", "addthis")
    );
    foreach ($devicesTypes as $deviceType => $devices) {
        foreach ($devices as $device) {
            if (preg_match("/" . $device . "/i", $userAgent)) {
                $deviceName = $deviceType;
            }
        }
    }
    return $deviceName;
}
public static function getTimeLeft($ptime)
{
    $etime = time() - strtotime($ptime);

    if ($etime < 1) {
        return '0 ثانية';
    }

    $a = array(365 * 24 * 60 * 60 => 'سنة',
        30 * 24 * 60 * 60 => 'شهر',
//        7 * 24 * 60 * 60 => 'اسبوع',
        24 * 3  * 60 * 60 => '3 ايام',
        24 * 2  * 60 * 60 => 'يومان',
        24 * 60 * 60 => 'يوم',
        60 * 60 => 'ساعة',
        60 => 'دقيقة',
        1 => 'ثانية'
    );

    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return 'منذ ' . $r . ' ' . $str;
        }
    }
}

// cUrl handler to ping the Sitemap submission URLs for Search Engines…
function myCurl($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $httpCode;
}

function sslStream()
{
    $arrContextOptions = array(
        "ssl" => array(
            "verify_peer" => false,
            "verify_peer_name" => false,
        ),
    );

    return stream_context_create($arrContextOptions);
}

function clean($string)
{
    $string = str_replace(' ', '-', trim($string)); // Replaces all spaces with hyphens.

    //$string = preg_replace("/[^A-Za-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);
    $string = preg_replace("/[^A-Za-z0-9_\s-ءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]/u", "", $string);

    // Remove multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);

    // Convert whitespaces and underscore to the given separator
    $string = preg_replace("/[\s_]/", '-', $string);

    //return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

    return $string;
}

function getNumber($number)
{
    if ($number < 1000)
        return $number;

    if ($number < 1000000)
        return ((int)($number / 1000)) . "," . ((int)($number % 1000)) . "K";

    return ($number / 1000000) . "," . ($number % 1000000) . "M";
}

// for xx clean
/**
 * XSS Clean
 *
 * **************************************************************
 * *********** This function and other functions that it uses
 * *********** are taken from Codeigniter 2.1.3 and modified
 * *********** them to our needs. In turn, I have taken this from
 * *********** JasonMortonNZ.
 ***************************************************************
 *
 *
 * Sanitizes data so that Cross Site Scripting Hacks can be
 * prevented.  This function does a fair amount of work but
 * it is extremely thorough, designed to prevent even the
 * most obscure XSS attempts.  Nothing is ever 100% foolproof,
 * of course, but I haven't been able to get anything passed
 * the filter.
 *
 * Note: This function should only be used to deal with data
 * upon submission.  It's not something that should
 * be used for general runtime processing.
 *
 * This function was based in part on some code and ideas I
 * got from Bitflux: http://channel.bitflux.ch/wiki/XSS_Prevention
 *
 * To help develop this script I used this great list of
 * vulnerabilities along with a few other hacks I've
 * harvested from examining vulnerabilities in other programs:
 * http://ha.ckers.org/xss.html
 *
 * @param   mixed   string or array
 * @param   bool
 * @return  string
 */
function xss_clean($str, $is_image = FALSE)
{
    /*
     * Is the string an array?
     *
     */
    if (is_array($str)) {
        while (list($key) = each($str)) {
            $str[$key] = xss_clean($str[$key]);
        }
        return $str;
    }
    /*
     * Remove Invisible Characters
     */
    $str = remove_invisible_characters($str);
    // Validate Entities in URLs
    $str = validate_entities($str);
    /*
     * URL Decode
     *
     * Just in case stuff like this is submitted:
     *
     * <a href="http://%77%77%77%2E%67%6F%6F%67%6C%65%2E%63%6F%6D">Google</a>
     *
     * Note: Use rawurldecode() so it does not remove plus signs
     *
     */
    $str = rawurldecode($str);
    /*
     * Convert character entities to ASCII
     *
     * This permits our tests below to work reliably.
     * We only convert entities that are within tags since
     * these are the ones that will pose security problems.
     *
     */
    $str = preg_replace_callback("/[a-z]+=([\'\"]).*?\\1/si", function ($match) {
        return str_replace(array('>', '<', '\\'), array('&gt;', '&lt;', '\\\\'), $match[0]);
    }, $str);
    $str = preg_replace_callback("/<\w+.*?(?=>|<|$)/si", 'entity_decode', $str);
    /*
     * Remove Invisible Characters Again!
     */
    $str = remove_invisible_characters($str);
    /*
     * Convert all tabs to spaces
     *
     * This prevents strings like this: ja  vascript
     * NOTE: we deal with spaces between characters later.
     * NOTE: preg_replace was found to be amazingly slow here on
     * large blocks of data, so we use str_replace.
     */
    if (strpos($str, "\t") !== FALSE) {
        $str = str_replace("\t", ' ', $str);
    }
    /*
     * Capture converted string for later comparison
     */
    $converted_string = $str;
    // Remove Strings that are never allowed
    $str = do_never_allowed($str);
    /*
     * Makes PHP tags safe
     *
     * Note: XML tags are inadvertently replaced too:
     *
     * <?xml
     *
     * But it doesn't seem to pose a problem.
     */
    if ($is_image === TRUE) {
        // Images have a tendency to have the PHP short opening and
        // closing tags every so often so we skip those and only
        // do the long opening tags.
        $str = preg_replace('/<\?(php)/i', "&lt;?\\1", $str);
    } else {
        $str = str_replace(array('<?', '?' . '>'), array('&lt;?', '?&gt;'), $str);
    }
    /*
     * Compact any exploded words
     *
     * This corrects words like:  j a v a s c r i p t
     * These words are compacted back to their correct state.
     */
    $words = array(
        'javascript', 'expression', 'vbscript', 'script', 'base64',
        'applet', 'alert', 'document', 'write', 'cookie', 'window'
    );
    foreach ($words as $word) {
        $temp = '';
        for ($i = 0, $wordlen = strlen($word); $i < $wordlen; $i++) {
            $temp .= substr($word, $i, 1) . "\s*";
        }
        // We only want to do this when it is followed by a non-word character
        // That way valid stuff like "dealer to" does not become "dealerto"
        $str = preg_replace_callback('#(' . substr($temp, 0, -3) . ')(\W)#is', function ($matches) {
            return preg_replace('/\s+/s', '', $matches[1]) . $matches[2];
        }, $str);
    }
    /*
     * Remove disallowed Javascript in links or img tags
     * We used to do some version comparisons and use of stripos for PHP5,
     * but it is dog slow compared to these simplified non-capturing
     * preg_match(), especially if the pattern exists in the string
     */
    do {
        $original = $str;
        if (preg_match("/<a/i", $str)) {
            $str = preg_replace_callback("#<a\s+([^>]*?)(>|$)#si", function ($match) {
                return str_replace(
                    $match[1],
                    preg_replace(
                        '#href=.*?(alert\(|alert&\#40;|javascript\:|livescript\:|mocha\:|charset\=|window\.|document\.|\.cookie|<script|<xss|data\s*:)#si',
                        '',
                        filter_attributes(str_replace(array('<', '>'), '', $match[1]))
                    ),
                    $match[0]
                );
            }, $str);
        }
        if (preg_match("/<img/i", $str)) {
            $str = preg_replace_callback("#<img\s+([^>]*?)(\s?/?>|$)#si", function ($match) {
                return str_replace(
                    $match[1],
                    preg_replace(
                        '#src=.*?(alert\(|alert&\#40;|javascript\:|livescript\:|mocha\:|charset\=|window\.|document\.|\.cookie|<script|<xss|base64\s*,)#si',
                        '',
                        filter_attributes(str_replace(array('<', '>'), '', $match[1]))
                    ),
                    $match[0]
                );
            }, $str);
        }
        if (preg_match("/script/i", $str) OR preg_match("/xss/i", $str)) {
            $str = preg_replace("#<(/*)(script|xss)(.*?)\>#si", '[removed]', $str);
        }
    } while ($original != $str);
    unset($original);
    // Remove evil attributes such as style, onclick and xmlns
    $str = remove_evil_attributes($str, $is_image);
    /*
     * Sanitize naughty HTML elements
     *
     * If a tag containing any of the words in the list
     * below is found, the tag gets converted to entities.
     *
     * So this: <blink>
     * Becomes: &lt;blink&gt;
     */
    $naughty = 'alert|applet|audio|basefont|base|behavior|bgsound|blink|body|embed|expression|form|frameset|frame|head|html|ilayer|iframe|input|isindex|layer|link|meta|object|plaintext|style|script|textarea|title|video|xml|xss';
    $str = preg_replace_callback('#<(/*\s*)(' . $naughty . ')([^><]*)([><]*)#is', function ($matches) {
        // encode opening brace
        $str = '&lt;' . $matches[1] . $matches[2] . $matches[3];
        // encode captured opening or closing brace to prevent recursive vectors
        return $str .= str_replace(array('>', '<'), array('&gt;', '&lt;'), $matches[4]);
    }, $str);
    /*
     * Sanitize naughty scripting elements
     *
     * Similar to above, only instead of looking for
     * tags it looks for PHP and JavaScript commands
     * that are disallowed.  Rather than removing the
     * code, it simply converts the parenthesis to entities
     * rendering the code un-executable.
     *
     * For example: eval('some code')
     * Becomes:     eval&#40;'some code'&#41;
     */
    $str = preg_replace('#(alert|cmd|passthru|eval|exec|expression|system|fopen|fsockopen|file|file_get_contents|readfile|unlink)(\s*)\((.*?)\)#si', "\\1\\2&#40;\\3&#41;", $str);
    // Final clean up
    // This adds a bit of extra precaution in case
    // something got through the above filters
    $str = do_never_allowed($str);
    /*
     * Images are Handled in a Special Way
     * - Essentially, we want to know that after all of the character
     * conversion is done whether any unwanted, likely XSS, code was found.
     * If not, we return TRUE, as the image is clean.
     * However, if the string post-conversion does not matched the
     * string post-removal of XSS, then it fails, as there was unwanted XSS
     * code found and removed/changed during processing.
     */
    if ($is_image === TRUE) {
        return ($str == $converted_string) ? TRUE : FALSE;
    }
    return $str;
}//xss_clean
/**
 * Remove Invisible Characters
 *
 * This prevents sandwiching null characters
 * between ascii characters, like Java\0script.
 *
 * @access  public
 * @param   string
 * @return  string
 */
function remove_invisible_characters($str, $url_encoded = TRUE)
{
    $non_displayables = array();
    // every control character except newline (dec 10)
    // carriage return (dec 13), and horizontal tab (dec 09)
    if ($url_encoded) {
        $non_displayables[] = '/%0[0-8bcef]/';  // url encoded 00-08, 11, 12, 14, 15
        $non_displayables[] = '/%1[0-9a-f]/';   // url encoded 16-31
    }
    $non_displayables[] = '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S';   // 00-08, 11, 12, 14-31, 127
    do {
        $str = preg_replace($non_displayables, '', $str, -1, $count);
    } while ($count);
    return $str;
}//remove_invisible_characters
/**
 * Validate URL entities
 *
 * Called by xss_clean()
 *
 * @param   string
 * @return  string
 */
function validate_entities($str)
{
    /*
     * Protect GET variables in URLs
     */
    $xss_hash = md5(time() + mt_rand(0, 1999999999));
    $str = preg_replace('|\&([a-z\_0-9\-]+)\=([a-z\_0-9\-]+)|i', $xss_hash . "\\1=\\2", $str);
    /*
     * Validate standard character entities
     *
     * Add a semicolon if missing.  We do this to enable
     * the conversion of entities to ASCII later.
     *
     */
    $str = preg_replace('#(&\#?[0-9a-z]{2,})([\x00-\x20])*;?#i', "\\1;\\2", $str);
    /*
     * Validate UTF16 two byte encoding (x00)
     *
     * Just as above, adds a semicolon if missing.
     *
     */
    $str = preg_replace('#(&\#x?)([0-9A-F]+);?#i', "\\1\\2;", $str);
    /*
     * Un-Protect GET variables in URLs
     */
    $str = str_replace($xss_hash, '&', $str);
    return $str;
}//validate_entities
/**
 * Do Never Allowed
 *
 * A utility function for xss_clean()
 *
 * @param   string
 * @return  string
 */
function do_never_allowed($str)
{
    /**
     * List of never allowed strings
     */
    $never_allowed_str = array(
        'document.cookie' => '[removed]',
        'document.write' => '[removed]',
        '.parentNode' => '[removed]',
        '.innerHTML' => '[removed]',
        'window.location' => '[removed]',
        '-moz-binding' => '[removed]',
        '<!--' => '&lt;!--',
        '-->' => '--&gt;',
        '<![CDATA[' => '&lt;![CDATA[',
        '<comment>' => '&lt;comment&gt;'
    );
    /**
     * List of never allowed regex replacement
     */
    $never_allowed_regex = array(
        'javascript\s*:',
        'expression\s*(\(|&\#40;)', // CSS and IE
        'vbscript\s*:', // IE, surprise!
        'Redirect\s+302',
        "([\"'])?data\s*:[^\\1]*?base64[^\\1]*?,[^\\1]*?\\1?"
    );
    $str = str_replace(array_keys($never_allowed_str), $never_allowed_str, $str);
    foreach ($never_allowed_regex as $regex) {
        $str = preg_replace('#' . $regex . '#is', '[removed]', $str);
    }
    return $str;
}//do_never_allowed
/*
 * Remove Evil HTML Attributes (like evenhandlers and style)
 *
 * It removes the evil attribute and either:
 *  - Everything up until a space
 *      For example, everything between the pipes:
 *      <a |style=document.write('hello');alert('world');| class=link>
 *  - Everything inside the quotes
 *      For example, everything between the pipes:
 *      <a |style="document.write('hello'); alert('world');"| class="link">
 *
 * @param string $str The string to check
 * @param boolean $is_image TRUE if this is an image
 * @return string The string with the evil attributes removed
 */
function remove_evil_attributes($str, $is_image)
{
    // All javascript event handlers (e.g. onload, onclick, onmouseover), style, and xmlns
    $evil_attributes = array('on\w*', 'style', 'xmlns', 'formaction');
    if ($is_image === TRUE) {
        /*
         * Adobe Photoshop puts XML metadata into JFIF images,
         * including namespacing, so we have to allow this for images.
         */
        unset($evil_attributes[array_search('xmlns', $evil_attributes)]);
    }
    do {
        $count = 0;
        $attribs = array();
        // find occurrences of illegal attribute strings without quotes
        preg_match_all('/(' . implode('|', $evil_attributes) . ')\s*=\s*([^\s>]*)/is', $str, $matches, PREG_SET_ORDER);
        foreach ($matches as $attr) {
            $attribs[] = preg_quote($attr[0], '/');
        }
        // find occurrences of illegal attribute strings with quotes (042 and 047 are octal quotes)
        preg_match_all("/(" . implode('|', $evil_attributes) . ")\s*=\s*(\042|\047)([^\\2]*?)(\\2)/is", $str, $matches, PREG_SET_ORDER);
        foreach ($matches as $attr) {
            $attribs[] = preg_quote($attr[0], '/');
        }
        // replace illegal attribute strings that are inside an html tag
        if (count($attribs) > 0) {
            $str = preg_replace("/<(\/?[^><]+?)([^A-Za-z<>\-])(.*?)(" . implode('|', $attribs) . ")(.*?)([\s><])([><]*)/i", '<$1 $3$5$6$7', $str, -1, $count);
        }
    } while ($count);
    return $str;
}//remove_evil_attributes
/**
 * HTML Entities Decode
 *
 * This function is a replacement for html_entity_decode()
 *
 * The reason we are not using html_entity_decode() by itself is because
 * while it is not technically correct to leave out the semicolon
 * at the end of an entity most browsers will still interpret the entity
 * correctly.  html_entity_decode() does not convert entities without
 * semicolons, so we are left with our own little solution here. Bummer.
 *
 * @param   string
 * @param   string
 * @return  string
 */
function entity_decode($arr, $charset = 'UTF-8')
{
    $str = $arr[0];
    if (stristr($str, '&') === FALSE) {
        return $str;
    }
    $str = html_entity_decode($str, ENT_COMPAT, $charset);
    $str = preg_replace_callback('~&#x(0*[0-9a-f]{2,5})~i', create_function('$matches', 'return chr(hexdec($matches[1]));'), $str);
    return preg_replace_callback('~&#([0-9]{2,4})~', create_function('$matches', 'return chr($matches[1]);'), $str);
}//entity_decode
/**
 * Filter Attributes
 *
 * Filters tag attributes for consistency and safety
 *
 * @param   string
 * @return  string
 */
function filter_attributes($str)
{
    $out = '';
    if (preg_match_all('#\s*[a-z\-]+\s*=\s*(\042|\047)([^\\1]*?)\\1#is', $str, $matches)) {
        foreach ($matches[0] as $match) {
            $out .= preg_replace("#/\*.*?\*/#s", '', $match);
        }
    }
    return $out;
}//filter_attributes



function closest($search, $arr) {
    $closest = null;
    foreach($arr as $item) {
        // distance from image width -> current closest entry is greater than distance from  
        if ($closest == null || abs($search - $closest) > abs($item - $search)) {
            $closest = $item;
        }
    }
    $closest = ($closest == null) ? $closest = $search : $closest;
    return $closest;
}

}
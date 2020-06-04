<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

if ( ! function_exists('randomPassword')) {
    function randomPassword($charNbr = 12)
    {
        $pwd = "";

        $string = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ023456789+@!$%?&";
        $stringLength= strlen($string);

        for($i = 1; $i <= $charNbr; $i++)
        {
            $randomPos = mt_rand(0,($stringLength-1));
            $pwd .= $string[$randomPos];
        }

        return $pwd;
    }
}

if ( ! function_exists('generatePromoCodes')) {
    function generatePromoCodes($promoNumber)
    {
        $cons="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $stringLength= strlen($cons);
        $code="";
        $randomPos = mt_rand(0,($stringLength-1));
        $code.= $cons[$randomPos];
        $code.=castNumberId($promoNumber);
        return $code;
    }
}

if ( ! function_exists('castNumberId')) {
    function castNumberId($number, $ent=3, $dec=0)
    {
        if ($dec==0) {
            $strNbr = "";
            $strNbr .= $number;
            if (strpos($strNbr, '.')!=false) {
                $tmp=explode('.', $strNbr);
                $strNbr="".$tmp[0];
            }

            $strSize = strlen($strNbr);
            $strFinal = array();
            for ($k = 1; $k <= $ent; $k++)
                array_push($strFinal, 0);
            for ($i = 0; $i < $strSize; $i++) {
                $strFinal[$ent - (1 + $i)] = $strNbr[$strSize - (1 + $i)];
            }
            $castedNbr = "";
            for ($j = 0; $j < $ent; $j++)
                $castedNbr .= $strFinal[$j];
            return $castedNbr;
        } else if ($dec!=0 and is_integer($dec))
        {
            $nt="";
            $nt.=$number;
            $fnt="";
            if (strpos($nt, '.')==false) {
                $strNbr = $nt;
                $strSize = strlen($strNbr);
                $strFinal = array();
                for ($k = 1; $k <= $ent; $k++)
                    array_push($strFinal, 0);
                for ($i = 0; $i < $strSize; $i++) {
                    $strFinal[$ent - (1 + $i)] = $strNbr[$strSize - (1 + $i)];
                }
                $castedNbr = "";
                for ($j = 0; $j < $ent; $j++)
                    $castedNbr .= $strFinal[$j];
                $int=$castedNbr;

                $fnt = $int . '.';
                for ($i = 1; $i <= $dec; $i++) $fnt .= '0';
                return $fnt;
            }
            else
            {
                $tmp=explode('.', $nt);
                //Partie entière
                $strNbr = "";
                $strNbr .= $tmp[0];
                $strSize = strlen($strNbr);
                $strFinal = array();
                for ($k = 1; $k <= $ent; $k++)
                    array_push($strFinal, 0);
                for ($i = 0; $i < $strSize; $i++) {
                    $strFinal[$ent - (1 + $i)] = $strNbr[$strSize - (1 + $i)];
                }
                $castedNbr = "";
                for ($j = 0; $j < $ent; $j++)
                    $castedNbr .= $strFinal[$j];
                $int=$castedNbr;

                //Partie décimale
                $strNbr = "";
                $strNbr .= $tmp[1];
                $strSize = strlen($strNbr);
                $strFinal = array();
                for ($k = 1; $k <= $dec; $k++)
                    array_push($strFinal, 0);
                for ($i = 0; $i < $strSize; $i++) {
                    $strFinal[$i] = $strNbr[$i];
                }
                $castedNbr = "";
                for ($j = 0; $j < $ent; $j++)
                    $castedNbr .= $strFinal[$j];
                $flt=$castedNbr;

                return $int.'.'.$flt;
            }
        } else return $number;
    }
}

if ( ! function_exists('registrationCode')) {
    function registrationCode($lessonCode, $regNbr)
    {
        $code="";
        $code.=$lessonCode.date('ymd').'N'.castNumberId($regNbr);
        return $code;
    }
}

if ( ! function_exists('numberId')) {
    function numberId($userNbr, $role)
    {
        $numberID = "";
        if (in_array($role, array('S', 'M', 'G', 'F', 'A')))
            $numberID .= date('y') . $role . castNumberId($userNbr) . 'MA';
        else
            $numberID .= "Role non reconnu";
        return $numberID;
    }
}

if ( ! function_exists('newNumberId')) {
    function newNumberId($userNbr)
    {
        $numberID = "";

        $cons="ZUDTQCSPHNXM";
        //$stringLength= strlen($cons);
        $quota=100;
        $letter=intval($userNbr/$quota);
        $nbr=$userNbr%$quota;
        $numberID .= date('y') ."-". castNumberId($nbr) . "-".$cons[$letter];
        return $numberID;
    }
}

if ( ! function_exists('promotionCode')) {
    function promotionCode($promoNbr, $quota=100)
    {
        $numberID = "";
        $cons="ZUDTQCSPHNXM";
        $letter=intval($promoNbr/$quota);
        $nbr=$promoNbr%$quota;
        $numberID .= date('y').$cons[$letter]. castNumberId($nbr);
        return $numberID;
    }
}

if ( ! function_exists('getWeek')) {
    function getWeek($dayDate, $format='Y-m-d')
    {
        $date = explode("-", $dayDate);

        $time = strtotime($date[0].'-'.$date[1].'-'.$date[2]);
        //var_dump($time); die();

        $day = date("w", "$time");
        $jourdeb=0;
        $jourfin=0;

        switch ($day) {
            case "0":
                $jourdeb = mktime(0,0,0,$date[1],$date[2]-6,$date[0]);
                $jourfin = mktime(0,0,0,$date[1],$date[2],$date[0]);
                break;

            case "1":
                $jourdeb = mktime(0,0,0,$date[1],$date[2],$date[0]);
                $jourfin = mktime(0,0,0,$date[1],$date[2]+6,$date[0]);
                break;

            case "2":
                $jourdeb = mktime(0,0,0,$date[1],$date[2]-1,$date[0]);
                $jourfin = mktime(0,0,0,$date[1],$date[2]+5,$date[0]);
                break;

            case "3":
                $jourdeb = mktime(0,0,0,$date[1],$date[2]-2,$date[0]);
                $jourfin = mktime(0,0,0,$date[1],$date[2]+4,$date[0]);
                break;

            case "4":
                $jourdeb = mktime(0,0,0,$date[1],$date[2]-3,$date[0]);
                $jourfin = mktime(0,0,0,$date[1],$date[2]+3,$date[0]);
                break;

            case "5":
                $jourdeb = mktime(0,0,0,$date[1],$date[2]-4,$date[0]);
                $jourfin = mktime(0,0,0,$date[1],$date[2]+2,$date[0]);
                break;

            case "6":
                $jourdeb = mktime(0,0,0,$date[1],$date[2]-5,$date[0]);
                $jourfin = mktime(0,0,0,$date[1],$date[2]+1,$date[0]);
                break;
        }
        $date=date_create(date('d-m-Y', $jourfin));
        date_sub($date,date_interval_create_from_date_string("1 days"));
        $week=new stdClass();
        $week->start=date($format,$jourdeb);
        $week->end=date_format($date, $format);

        //$week=array('debut'=>date('d/m/Y',$jourdeb), 'fin'=>date_format($date, 'd/m/Y'));
        return $week;
    }
}
if ( ! function_exists('permalink'))

{/**
     *
     * @param string $str La chaine à permalinker
     * @param array $replace Les chaine à remplqcer
     * @param string $delimiter Le delimiteur
     **/
    function permalink($str, array $replace=array(), $delimiter="-") {

        if(!$replace And is_array($replace)) {
            $str = str_replace((array)$replace, ' ', $str);
        }

        $a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ї','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','Ā','ā','Ă','ă','Ą','ą','Ć','ć','Ĉ','ĉ','Ċ','ċ','Č','č','Ď','ď','Đ','đ','Ē','ē','Ĕ','ĕ','Ė','ė','Ę','ę','Ě','ě','ё','Ĝ','ĝ','Ğ','ğ','Ġ','ġ','Ģ','ģ','Ĥ','ĥ','Ħ','ħ','Ĩ','ĩ','Ī','ī','Ĭ','ĭ','Į','į','İ','ı','ї','Ĳ','ĳ','Ĵ','ĵ','Ķ','ķ','Ĺ','ĺ','Ļ','ļ','Ľ','ľ','Ŀ','ŀ','Ł','ł','Ń','ń','Ņ','ņ','Ň','ň','ŉ','Ō','ō','Ŏ','ŏ','Ő','ő','Œ','œ','Ŕ','ŕ','Ŗ','ŗ','Ř','ř','Ś','ś','Ŝ','ŝ','Ş','ş','Š','š','Ţ','ţ','Ť','ť','Ŧ','ŧ','Ũ','ũ','Ū','ū','Ŭ','ŭ','Ů','ů','Ű','ű','Ų','ų','Ŵ','ŵ','Ŷ','ŷ','Ÿ','Ź','ź','Ż','ż','Ž','ž','ſ','ƒ','Ơ','ơ','Ư','ư','Ǎ','ǎ','Ǐ','ǐ','Ǒ','ǒ','Ǔ','ǔ','Ǖ','ǖ','Ǘ','ǘ','Ǚ','ǚ','Ǜ','ǜ','ϋ','Ǻ','ǻ','Ǽ','ǽ','Ǿ','ǿ','΄','ό','Α','ϊ','ฺB','Η','Ḩ','ā','ţ','ḯ','ố','ạ','ẖ','ộ','Ḩ','ḩ','H̱');

        $b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','u','A','a','AE','ae','O','o','','o','a','i','b','h','h','a','t','i','o','a','h','o','h','h','h');

        $clean = str_replace($a, $b, $str);

        return preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', $delimiter, ''), $clean);
    }
}
if ( ! function_exists('generateCode'))
{/**
 *
 * @param string $str La chaine à permalinker
 * @param array $replace Les chaine à remplqcer
 * @param string $delimiter Le delimiteur
 **/
    function generateCode($nombre)
    {
        $alphabet = array('a', 'b', 'c', 'd', 'e', 'f','g','h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
        if ($nombre < 1000) {
            return strtoupper($alphabet[0]) . castNumberId($nombre, 3, 0);
        }else{
            if(strlen($nombre) == 4){
                $chaine = strval($nombre);
                $reste = $nombre%1000;
                return strtoupper($alphabet[$chaine[0]]).castNumberId($reste);
            }else{
                $chaine = strval($nombre);
                $reste = $nombre%1000;
                return strtoupper($alphabet[$chaine[0].$chaine[1]]).castNumberId($reste);
            }
        }
    }

}
?>


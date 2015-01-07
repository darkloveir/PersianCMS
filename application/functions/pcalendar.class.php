<?php

class PersianCalendar
{
    var $transnumber=0;
    ///chosse your timezone
    var $TZhours=0;
    var $TZminute=0;
    var $need="";
    var $Buffer = "";
    var $result1="";
    var $result="";
    var $day_in_jalali_month=array(0,31,31,31,31,31,31,30,30,30,30,30,29);
    var $jalali_weekdays_short=array('&#1588;','&#1610;','&#1583;','&#1587;','&#1670;','&#1662;','&#1580;');
    var $jalali_weekname=array(
            '&#1588;&#1606;&#1576;&#1607;',
            '&#1610;&#1603;&#1588;&#1606;&#1576;&#1607;',
            '&#1583;&#1608;&#1588;&#1606;&#1576;&#1607;',
            '&#1587;&#1607;&#1588;&#1606;&#1576;&#1607;',
            '&#1670;&#1607;&#1575;&#1585;&#1588;&#1606;&#1576;&#1607;',
            '&#1662;&#1606;&#1580;&#1588;&#1606;&#1576;&#1607;',
            '&#1580;&#1605;&#1593;&#1607;');
    var $jalali_monthname=array(
            '',
            '&#1601;&#1585;&#1608;&#1585;&#1583;&#1610;&#1606;',
            '&#1575;&#1585;&#1583;&#1610;&#1576;&#1607;&#1588;&#1578;',
            '&#1582;&#1585;&#1583;&#1575;&#1583;',
            '&#1578;&#1610;&#1585;',
            '&#1605;&#1585;&#1583;&#1575;&#1583;',
            '&#1588;&#1607;&#1585;&#1610;&#1608;&#1585;',
            '&#1605;&#1607;&#1585;',
            '&#1570;&#1576;&#1575;&#1606;',
            '&#1570;&#1584;&#1585;',
            '&#1583;&#1610;',
            '&#1576;&#1607;&#1605;&#1606;',
            '&#1575;&#1587;&#1601;&#1606;&#1583;');

function pdate($d,$type,$maket="now")
{
    //global $jalali_weekname,$jalali_monthname;
    //set 1 if you want translate number to farsi or if you don't like set 0

    if($maket=="now"){
        $maket=time();
    }
    $maket+=$TZhours*3600+$TZminute*60;
    $date=$d;//date("Y-m-d",$maket);
    list( $year, $month, $day ) = explode ('-',$date);
    list( $pyear, $pmonth, $pday ) = $this->gregorian_to_jalali($year, $month, $day);

    $need= $maket;
    $i=0;
    $subtype="";
    $subtypetemp="";
    while($i<strlen($type))
    {
        $subtype=$type{$i};
        if($subtypetemp=="\\")
        {
            $result.=$subtype;
            $i++;
            continue;
        }

        switch ($subtype)
        {

            case "A":
                $result1=date("a",$need);
                if($result1=="pm") $result.= "&#1576;&#1593;&#1583;&#1575;&#1586;&#1592;&#1607;&#1585;";
                else $result.="&#1602;&#1576;&#1604;&#8207;&#1575;&#1586;&#1592;&#1607;&#1585;";
                break;

            case "a":
                $result1=date("a",$need);
                if($result1=="pm") $result.= "&#1576;&#46;&#1592;";
                else $result.="&#1602;&#46;&#1592;";
                break;
            case "d":
                if($pday<10)$result1="0".$pday;
                else     $result1=$pday;
                if($this->transnumber==1) $result.= $this->Convertnumber2farsi($result1);
                else $result.=$result1;
                break;
            case "D":
                $result1=date("w",$need)+1;
                if($result1==7)$result1=0;
                $result.=substr($this->jalali_weekname[(int)$result1],0,2);
                break;
            case "F":
                $result.=$this->jalali_monthname[(int)$pmonth];
                break;
            case "g":
                $result1=date("g",$need);
                if($this->transnumber==1) $result.= $this->Convertnumber2farsi($result1);
                else $result.=$result1;
                break;
            case "G":
                $result1=date("G",$need);
                if($this->transnumber==1) $result.= $this->Convertnumber2farsi($result1);
                else $result.=$result1;
                break;
            case "h":
                $result1=date("h",$need);
                if($this->transnumber==1) $result.= $this->Convertnumber2farsi($result1);
                else $result.=$result1;
                break;
            case "H":
                $result1=date("H",$need);
                if($this->transnumber==1) $result.= $this->Convertnumber2farsi($result1);
                else $result.=$result1;
                break;
            case "i":
                $result1=date("i",$need);
                if($this->transnumber==1) $result.= $this->Convertnumber2farsi($result1);
                else $result.=$result1;
                break;
            case "j":
                $result1=$pday;
                if($this->transnumber==1) $result.= $this->Convertnumber2farsi($result1);
                else $result.=$result1;
                break;
            case "l":
                $result1=date("l", mktime(0, 0, 0, $month  , $day, $year));
                if($result1=="Saturday") $result1="&#1588;&#1606;&#1576;&#1607;";
                else if($result1=="Sunday") $result1="&#1610;&#1603;&#1588;&#1606;&#1576;&#1607;";
                else if($result1=="Monday") $result1="&#1583;&#1608;&#1588;&#1606;&#1576;&#1607;";
                else if($result1=="Tuesday") $result1="&#1587;&#1607;&#32;&#1588;&#1606;&#1576;&#1607;";
                else if($result1=="Wednesday") $result1="&#1670;&#1607;&#1575;&#1585;&#1588;&#1606;&#1576;&#1607;";
                else if($result1=="Thursday") $result1="&#1662;&#1606;&#1580;&#1588;&#1606;&#1576;&#1607;";
                else if($result1=="Friday") $result1="&#1580;&#1605;&#1593;&#1607;";
                $result.=$result1;
                break;
            case "m":
                if($pmonth<10) $result1="0".$pmonth;
                else    $result1=$pmonth;
                if($this->transnumber==1) $result.= $this->Convertnumber2farsi($result1);
                else $result.=$result1;
                break;
            case "M":
                $result .= $this->jalali_monthname[(int)$pmonth];
                break;
            case "n":
                $result1=$pmonth;
                if($this->transnumber==1) $result.= $this->Convertnumber2farsi($result1);
                else $result.=$result1;
                break;
            case "N":
                $result1=date("N",$need);
                if($result1<=5)$result1+2;
                else $result1-6;
                if($this->transnumber==1) $result.= $this->Convertnumber2farsi($result1);
                else $result.=$result1;
                break;
            case "s":
                $result1=date("s",$need);
                if($this->transnumber==1) $result.= $this->Convertnumber2farsi($result1);
                else $result.=$result1;
                break;
            case "S":
                $result.="&#1575;&#1605;";
                break;
            case "t":
                $result.= $this->number_of_day($pmonth,$pyear);
                break;
            case "w":
                $result1=date("w",$need)+1;
                if($result1==7)$result1=0;
                if($this->transnumber==1) $result.= $this->Convertnumber2farsi($result1);
                else $result.=$result1;
                break;
            case "W":
                $result1= $this->pweek_of_year($pyear,$pmonth,$pday);
                if($this->transnumber==1) $result.= $this->Convertnumber2farsi($result1);
                else $result.=$result1;
                break;
            case "y":
                $result1=substr($pyear,2,4);
                if($this->transnumber==1) $result.= $this->Convertnumber2farsi($result1);
                else $result.=$result1;
                break;
            case "Y":
            case "o":
                $result1=$pyear;
                if($this->transnumber==1) $result.= $this->Convertnumber2farsi($result1);
                else $result.=$result1;
                break;
            case "U" :
                $result.=time();
                break;
            case "u" :
                $result.=date("u",$need);
                break;
            case "z" :
                $result.= $this->days_of_year($pmonth,$pday,$pyear);
                break;
            case "Z" :
                $result.=date("Z",$need);
                break;
            case "e" :
                $result.=date("e",$need);
                break;
            case "i" :
                $result.=date("e",$need);
                break;
            case "O" :
                $result.=date("O",$need);
                break;
            case "O" :
                $result.=date("O",$need);
                break;
            case "P" :
                $result.=date("P",$need);
            break;
            case "T" :
                $result.=date("P",$need);
            break;
            case "L" :
                if( $this->is_kabise($pyear))$result.="1";
                else $result.="0";
                break;
            default:
                $result.=$subtype;
        }
        $subtypetemp=substr($type,$i,1);
    $i++;
    }
    return $result;
}

//Find days in this year untile now
function days_of_year($pmonth,$pday,$pyear)
{
    //global $day_in_jalali_month;
    $result=0;
    for($i=1;$i<$pmonth;$i++){
        $result+=$this->day_in_jalali_month[(int)$i];
    }
    return $result+$pday;
}


// Return week of year in jalali
function pweek_of_year($year,$month,$day){
    list($y, $m, $d) = $this->jalali_to_gregorian($year, 1, 1);
    $timestamp = mktime(0,0,0, $m, $d, $y);
    $fwk = date('w', $timestamp);

    if ($fwk != 6) {
        list($y, $m, $d) = $this->jalali_to_gregorian($year, 1, 7 - $fwk);
        $timestamp = mktime(0,0,0, $m, $d, $y);
        $fwk = date('w', $timestamp);
    }
    list($yy, $mm, $dd) = $this->jalali_to_gregorian($year, $month, $day + 1);
    $timestamp2 = mktime(0,0,0, $mm, $dd, $yy);
    $fwk2 = date('w', $timestamp2);

    if ($fwk2 != 6) {
        list($yy, $mm, $dd) = $this->jalali_to_gregorian($year, $month, $day + (7 - $fwk2));
        $timestamp2 = mktime(0,0,0, $mm, $dd, $yy);
        $fwk2 = date('w', $timestamp2);
    }
    $diff = $timestamp2 - $timestamp;

    return floor($diff / (3600 * 24) / 7);

}

function pmktime($hour="",$minute="",$second="",$pmonth="",$pday="",$pyear="")
{
    if(!$hour && !$minute && !$second && !$pmonth && !$pmonth && !$pday && !$pyear)
        return mktime();
    list( $year, $month, $day ) = $this->jalali_to_gregorian($pyear, $pmonth, $pday);
    $i=mktime((int)$hour,(int)$minute,(int)$second,(int)$month,(int)$day,(int)$year);
    return $i;
}


///Find num of Day Begining Of Month ( 0 for Sat & 6 for Sun)
function mstart($month,$day,$year)
{
    list( $pyear, $pmonth, $pday ) = $this->gregorian_to_jalali($year, $month, $day);
    list( $year, $month, $day ) = $this->jalali_to_gregorian($pyear, $pmonth, "1");
    $timestamp=mktime(0,0,0,$month,$day,$year);
    return date("w",$timestamp);
}

//return number of Day in month
function number_of_day($pmonth,$pyear){

            $number_day=$this->day_in_jalali_month[(int)$pmonth];
            if($pmonth<12)return $number_day;
            if($this->is_kabise($pmonth))return $number_day+1;
            return $number_day;
}


////here convert to  number in persian
function Convertnumber2farsi($str)
{
    $out = '';
    $str = (string)$str;
    for ($i = 0; $i < strlen($str); $i++) {
        if (ctype_digit($str[$i])) {
            $out .= pack("C*", 0xDB, 0xB0 + $str[$i]);
        } else {
            $out .= $str[$i];
        }
    }
    return $out;

}///end conver to number in persian

function is_kabise($year)
{
    $mod=$year%33;
    if($mod==1 or $mod==5 or $mod==9 or $mod==13 or $mod==17 or $mod==22 or $mod==26 or $mod==30)return true;
    return false;
}


function pcheckdate($month,$day,$year)
{

    if($month<=12 and $month>0)
    {
        if($this->day_in_jalali_month[$month]>=$day &&     $day>0)
            return 1;
        if($this->is_kabise($year) and $month==12 and $day==30)
            return 1;
    }

    return 0;

}

function pgetdate($timestamp="")
{
    if($timestamp=="")
        $timestamp=mktime();
    $p=explode("|",$this->pdate("s|i|H|d|w|m|Y|t|l|F"));
    return array(
        0=>$timestamp,
        "seconds"=>$p[0],
        "minutes"=>$p[1],
        "hours"=>$p[2],
        "mday"=>$p[3],
        "wday"=>$p[4],
        "mon"=>$p[5],
        "year"=>$p[6],
        "yday"=>$p[7],
        "weekday"=>$p[8],
        "month"=>$p[9],
    );
}



// "jalali.php" is convertor to and from Gregorian and Jalali calendars.
// Copyright (C) 2000  Roozbeh Pournader and Mohammad Toossi
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// A copy of the GNU General Public License is available from:
//
//    <a href="http://www.gnu.org/copyleft/gpl.html" target="_blank">http://www.gnu.org/copyleft/gpl.html</a>
//


function div($a,$b) {
    return (int) ($a / $b);
}

function gregorian_to_jalali ($g_y, $g_m, $g_d)
{
    $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);





   $gy = $g_y-1600;
   $gm = $g_m-1;
   $gd = $g_d-1;

   $g_day_no = 365*$gy+ $this->div($gy+3,4)- $this->div($gy+99,100)+ $this->div($gy+399,400);

   for ($i=0; $i < $gm; ++$i)
      $g_day_no += $g_days_in_month[$i];
   if ($gm>1 && (($gy%4==0 && $gy%100!=0) || ($gy%400==0)))
      /* leap and after Feb */
      $g_day_no++;
   $g_day_no += $gd;

   $j_day_no = $g_day_no-79;

   $j_np = $this->div($j_day_no, 12053); /* 12053 = 365*33 + 32/4 */
   $j_day_no = $j_day_no % 12053;

   $jy = 979+33*$j_np+4* $this->div($j_day_no,1461); /* 1461 = 365*4 + 4/4 */

   $j_day_no %= 1461;

   if ($j_day_no >= 366) {
      $jy += $this->div($j_day_no-1, 365);
      $j_day_no = ($j_day_no-1)%365;
   }

   for ($i = 0; $i < 11 && $j_day_no >= $j_days_in_month[$i]; ++$i)
      $j_day_no -= $j_days_in_month[$i];
   $jm = $i+1;
   $jd = $j_day_no+1;

   return array($jy, $jm, $jd);
}

function jalali_to_gregorian($j_y, $j_m, $j_d)
{
    $g_days_in_month = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    $j_days_in_month = array(31, 31, 31, 31, 31, 31, 30, 30, 30, 30, 30, 29);



   $jy = $j_y-979;
   $jm = $j_m-1;
   $jd = $j_d-1;

   $j_day_no = 365*$jy + $this->div($jy, 33)*8 + $this->div($jy%33+3, 4);
   for ($i=0; $i < $jm; ++$i)
      $j_day_no += $j_days_in_month[$i];

   $j_day_no += $jd;

   $g_day_no = $j_day_no+79;

   $gy = 1600 + 400* $this->div($g_day_no, 146097); /* 146097 = 365*400 + 400/4 - 400/100 + 400/400 */
   $g_day_no = $g_day_no % 146097;

   $leap = true;
   if ($g_day_no >= 36525) /* 36525 = 365*100 + 100/4 */
   {
      $g_day_no--;
      $gy += 100* $this->div($g_day_no,  36524); /* 36524 = 365*100 + 100/4 - 100/100 */
      $g_day_no = $g_day_no % 36524;

      if ($g_day_no >= 365)
         $g_day_no++;
      else
         $leap = false;
   }

   $gy += 4* $this->div($g_day_no, 1461); /* 1461 = 365*4 + 4/4 */
   $g_day_no %= 1461;

   if ($g_day_no >= 366) {
      $leap = false;

      $g_day_no--;
      $gy +=  $this->div($g_day_no, 365);
      $g_day_no = $g_day_no % 365;
   }

   for ($i = 0; $g_day_no >= $g_days_in_month[$i] + ($i == 1 && $leap); $i++)
      $g_day_no -= $g_days_in_month[$i] + ($i == 1 && $leap);
   $gm = $i+1;
   $gd = $g_day_no+1;

   return array($gy, $gm, $gd);
}
}
?>
<?php
/*
	This is a Full Featured CMS for all.
	You may also have problems with this. Please report issues. we will fix that soon.
	Copyright (C) 2015  AmirHosein.L Email:AmirOperator@gmail.com

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
include ("application/languages/".$_SESSION['language']."/TopPlayer.php");
include "application/modules/pages/TopPlayer/control/TopPlayer.php";
?>
<div class="content-title"><h3><?= $p_topplayer['1'] ?></h3></div>
<div class="news-info">
    <div class="information">
    </div>
</div>
<div class="content-body">
   <div class="text">
         <div class="col-md-13">
        <table class="table table-condensed">
          <thead>
            <tr>
          <thead>
            <tr>
         <th><?= $p_topplayer['2'] ?></th>
        <th><?= $p_topplayer['3'] ?></th>
        <th><?= $p_topplayer['4'] ?></th>
        <th><?= $p_topplayer['5'] ?></th>
        <th><?= $p_topplayer['6'] ?></th>
            </tr>
          </thead>
          <tbody>
<?php

while($result = mysql_fetch_object($query)) 
{ 

 $name = $result->name; 
 $level = $result->level;  
 $Total_Kills = $result->totalKills;
 $Total_Honor = $result->totalHonorPoints;
 $Arena_Points=$result->arenaPoints;
    echo " 
 <tr>
 <td><i>",$name,"</i></td>
 <td><center>",$level,"</center></td>
 <td><center>",$Total_Honor,"</center></td>
 <td><center>",$Total_Kills,"</center></td>
  <td><center>",$Arena_Points,"</center></td>
 </tr>"; 

} 
?>
          </tbody>
        </table>
      </div>
   </div>
</div>
<div class="content-footer"></div>
<div class="content-end">&nbsp;</div>

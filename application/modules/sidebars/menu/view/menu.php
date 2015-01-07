<?php include ("application/languages/".$_SESSION['language']."/menu.php"); ?>
<div class="sidebar-module">
  <div class="sidebar-title"><?= $menu['category']; ?></div>
  <div class="sidebar-body">
      <div class="module_menu">
          <div class="sub-services">	
            <div class="sub-services-section">
                <div class="sub-title">
                    <span><span class="glyphicon glyphicon-usd"></span> <?= $menu['gamecard']; ?></span>
                </div>
                <ul>
                    <li><a href="<?= $_SESSION['website_address'] ?>pay" class="c1-l"><span><?= $menu['chargeaccount']; ?></span></a></li>
                    <li><a href="<?= $_SESSION['website_address'] ?>transdp" class="c1-2"><span><?= $menu['transcost']; ?></span></a></li>
                    <li><a href="<?= $_SESSION['website_address'] ?>cost" class="c1-3"><span><?= $menu['cost']; ?></span></a></li>
                </ul>					
            </div>
            <div class="sub-services-section">
                <div class="sub-title">
                    <span><span class="glyphicon glyphicon-user"></span> <?= $menu['account']; ?></span>
                </div>
                <ul>
                    <li><a href="<?= $_SESSION['website_address'] ?>premium" class="c2-3"><span><?= $menu['vip']; ?></span> <span class="label label-warning"><?= $menu['soon']; ?></span></a></li>
                    <li><a href="<?= $_SESSION['website_address'] ?>changepassword" class="c2-1"><span><?= $menu['changepw']; ?></span></a></li>
                    <li><a href="<?= $_SESSION['website_address'] ?>changemail" class="c2-2"><span><?= $menu['changemail']; ?></span></a></li>
                    <li><a href="<?= $_SESSION['website_address'] ?>recoveryacc" class="c2-4"><span><?= $menu['recoveryaccdata']; ?></span></a></li>
                    <li><a href="<?= $_SESSION['website_address'] ?>unban" class="c2-5"><span><?= $menu['unban']; ?></span></a></li>
                    <li><a href="<?= $_SESSION['website_address'] ?>bannedlist" class="c2-6"><span><?= $menu['bannedlistacc']; ?></span></a></li>
                </ul>					
            </div>
    
            <div class="sub-services-section">		
                <div class="sub-title">
                    <span><span class="glyphicon glyphicon-user"></span> <?= $menu['character']; ?></span>
                </div>
                <ul>
                    <li><a href="<?= $_SESSION['website_address'] ?>unstuck" class="c3-1"><span><?= $menu['unstuck']; ?></span> <span class="label label-success"><?= $menu['free']; ?></span></a></li>
                    <li><a href="<?= $_SESSION['website_address'] ?>rename" class="c3-2"><span><?= $menu['rename']; ?></span></a></li>
                    <li><a href="<?= $_SESSION['website_address'] ?>changerace" class="c3-3"><span><?= $menu['changerace']; ?></span></a></li>
                    <li><a href="<?= $_SESSION['website_address'] ?>changefaction" class="c3-4"><span><?= $menu['changefaction']; ?></span></a></li>
                    <li><a href="<?= $_SESSION['website_address'] ?>changeappear" class="c3-5"><span><?= $menu['changeappear']; ?></span></a></li>
					<li><a href="<?= $_SESSION['website_address'] ?>charbanlist" class="c2-6"><span><?= $menu['bannedlistchar']; ?></span></a></li>
                    <li><a href="<?= $_SESSION['website_address'] ?>unbanchar" class="c2-6"><span><?= $menu['unban']; ?></span></a></li>
                </ul>					
            </div>							
          </div>
      </div>
  </div>
</div>
<?php
include "application/modules/pages/joinArena/control/joinArena.php";
include ("application/languages/".$_SESSION['language']."/joinArena.php");
?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <?= $p_joinArena['1'] ?>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
<div class="content-title"><h3><?= $p_joinArena['2'] ?></h3></div>
<div class="news-info"></div>
<div class="content-body">
   <div class="text">
    <?= (isset($message)) ? $message : ''; ?>
    <form class="form-horizontal" method="post" id="form" action="">
        <div class="form-group">
          <label for="hero" class="col-sm-2 control-label"><?= $p_joinArena['3'] ?></label>
          <div class="col-sm-5">
               <input type="text" class="form-control" id="hero" name="hero"  placeholder="<?= $p_joinArena['4'] ?>">
         </div>
        </div>
      <div class="form-group">
          <label class="col-sm-2 control-label"><?= $p_joinArena['5'] ?></label>
              <div class="col-sm-5">
                <select class="form-control" id="noeevent" name="noeevent" data-bv-notempty data-bv-notempty-message="<?= $p_joinArena['6'] ?>">
                      <option value="">-- <?= $p_joinArena['7'] ?> --</option>
                      <option value="1v1">1v1</option>
                  </select>
              </div>
			  </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"><?= $p_joinArena['8'] ?></label>
          <div class="col-sm-5">
                <?= dsp_crypt(0,1); ?>
              </div>
             <div class="col-sm-5">
               <input type="text" class="form-control required" id="captcha" name="captcha" placeholder="<?= $p_joinArena['9'] ?>"
                     data-bv-message="<?= $p_joinArena['10'] ?>"
                     required data-bv-notempty-message="<?= $p_joinArena['11'] ?>"
                     pattern="^[0-9]+$" data-bv-regexp-message="<?= $p_joinArena['12'] ?>"
                     data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="<?= $p_joinArena['13'] ?>">
             </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"></label>
            <div class="col-sm-5">
              <input type="hidden" name="info" />
              <button type="submit" class="btn btn-primary" id="send" name="send"><?= $p_joinArena['14'] ?></button>
            </div>
        </div>
     </form>
   </div>
</div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <?= $p_joinArena['15'] ?>
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
<div class="content-title"><h3><?= $p_joinArena['16'] ?></h3></div>
<div class="news-info"></div>
<div class="content-body">
   <div class="text">
    <?= (isset($message)) ? $message : ''; ?>
    <form class="form-horizontal" method="post" id="form" action="">
        <div class="form-group">
          <label for="hero" class="col-sm-2 control-label"><?= $p_joinArena['17'] ?></label>
          <div class="col-sm-5">
               <input type="text" class="form-control" id="hero" name="hero"  placeholder="<?= $p_joinArena['18'] ?>">
         </div>
        </div>
        <div class="form-group">
          <label for="hero2" class="col-sm-2 control-label"><?= $p_joinArena['19'] ?></label>
          <div class="col-sm-5">
               <input type="text" class="form-control" id="hero2" name="hero2"  placeholder="<?= $p_joinArena['20'] ?>">
         </div>
        </div>
      <div class="form-group">
          <label class="col-sm-2 control-label"><?= $p_joinArena['21'] ?></label>
              <div class="col-sm-5">
                <select class="form-control" id="noeevent" name="noeevent" data-bv-notempty data-bv-notempty-message="<?= $p_joinArena['22'] ?>">
                      <option value="">-- <?= $p_joinArena['23'] ?> --</option>
                      <option value="2v2">2v2</option>
                  </select>
              </div>
			  </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"><?= $p_joinArena['24'] ?></label>
          <div class="col-sm-5">
                <?= dsp_crypt(0,1); ?>
              </div>
             <div class="col-sm-5">
               <input type="text" class="form-control required" id="captcha" name="captcha" placeholder="<?= $p_joinArena['25'] ?>"
                     data-bv-message="<?= $p_joinArena['26'] ?>"
                     required data-bv-notempty-message="<?= $p_joinArena['27'] ?>"
                     pattern="^[0-9]+$" data-bv-regexp-message="<?= $p_joinArena['28'] ?>"
                     data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="6" data-bv-stringlength-message="<?= $p_joinArena['29'] ?>">
             </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label"></label>
            <div class="col-sm-5">
              <input type="hidden" name="info" />
              <button type="submit" class="btn btn-primary" id="send" name="send"><?= $p_joinArena['30'] ?></button>
            </div>
        </div>
     </form>
   </div>
</div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">

      </div>
    </div>
  </div>
</div>
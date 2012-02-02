<div class="block block-<?php print $block->module; ?> unstyled-block" id="block-<?php print $block->module; ?>-<?php print $block->delta; ?>">
        <div class="sideblock-top-right">
          <div class="sideblock-top-left">
            <div class="sideblock-top">
            </div><!-- sideblock-top -->
          </div><!-- sideblock-top-left -->
        </div><!-- sideblock-top-right-->
        <div class="sideblock-cont-right">
        <div class="sideblock-cont-left">
        <div class="sideblock-cont">
  <?php if ($block->subject) { ?><h2 class="title"><?php print $block->subject; ?></h2><?php } ?>
  <?php if ($block->content) { ?><div class="content"><?php print $block->content; ?></div><?php } ?>
            </div> <!-- sideblock-cont -->
          </div> <!--sideblock-cont-left -->
					</div> <!-- sideblock-cont-right -->
        <div class="sideblock-bottom-right">
          <div class="sideblock-bottom-left">
            <div class="sideblock-bottom">
            </div><!--sideblock-bottom-->
          </div><!--sideblock-bottom-left-->
        </div><!--sideblock-bottom-right-->
</div>

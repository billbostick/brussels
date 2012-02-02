<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language ?>" xml:lang="<?php print $language ?>">
<head>
<title><?php print $head_title ?></title>
<?php print $head ?><?php print $styles ?><?php print $scripts ?>
<script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>

<?php if (theme_get_setting('brussels_width')) { ?>
<style type="text/css">
        .container {
      width : <?php print theme_get_setting('brussels_fixedwidth') ?>px;
    }
      </style>
<?php } else { ?>
<style type="text/css">
        .container {
      width: 95%;
    }
      </style>
<?php }  ?>
 
<?php if ($left_sidebar_width = theme_get_setting('brussels_leftsidebarwidth')) { ?>
   <style type="text/css">
      body.sidebar-left #main { margin-left: -<?php print ($left_sidebar_width) ?>px; }
      body.sidebars #main { margin-left: -<?php print ($left_sidebar_width) ?>px; }
      body.sidebar-left #squeeze-top-right { margin-left: <?php print ($left_sidebar_width + 10) ?>px; }
      body.sidebar-left #squeeze-cont-right { margin-left: <?php print ($left_sidebar_width + 10) ?>px; }
      body.sidebar-left #squeeze-bottom-right { margin-left: <?php print ($left_sidebar_width + 10) ?>px; }
      body.sidebars #squeeze-top-right { margin-left: <?php print ($left_sidebar_width + 10) ?>px; }
      body.sidebars #squeeze-cont-right { margin-left: <?php print ($left_sidebar_width + 10) ?>px; }
      body.sidebars #squeeze-bottom-right { margin-left: <?php print ($left_sidebar_width + 10) ?>px; }
      #sidebar-left { width: <?php print $left_sidebar_width ?>px; }
</style>
<?php }  ?>
<?php if ($right_sidebar_width = theme_get_setting('brussels_rightsidebarwidth')) { ?>
   <style type="text/css">
      body.sidebar-right #main { margin-right: -<?php print ($right_sidebar_width) ?>px; }
      body.sidebars #main { margin-right: -<?php print ($right_sidebar_width) ?>px; }
      body.sidebar-right #squeeze-top-right { margin-right: <?php print ($right_sidebar_width + 10) ?>px; }
      body.sidebar-right #squeeze-cont-right { margin-right: <?php print ($right_sidebar_width + 10) ?>px; }
      body.sidebar-right #squeeze-bottom-right { margin-right: <?php print ($right_sidebar_width + 10) ?>px; }
      body.sidebars #squeeze-top-right { margin-right: <?php print ($right_sidebar_width + 10) ?>px; }
      body.sidebars #squeeze-bottom-right { margin-right: <?php print ($right_sidebar_width + 10) ?>px; }
      body.sidebars #squeeze-cont-right { margin-right: <?php print ($right_sidebar_width + 10) ?>px; }
      #sidebar-right { width: <?php print $right_sidebar_width ?>px; }
   </style>
<?php }  ?>

   <?php if (theme_get_setting('brussels_fontfamily')) { ?>
     <style type="text/css">
         body {
           font-family : <?php print theme_get_setting('brussels_fontfamily') ?>;
         }
       </style>
     <?php }  ?>

     <?php if (theme_get_setting('brussels_fontfamily') == 'Custom') { ?>

       <?php if (theme_get_setting('brussels_customfont')) { ?>
         <style type="text/css">
            body {
              font-family : <?php print theme_get_setting('brussels_customfont') ?>;
            }
         </style>
       <?php }  ?>
   <?php }  ?>

<?php if (theme_get_setting('brussels_iepngfix')) { ?>
<!--[if lte IE 6]>
<script type="text/javascript"> 
    $(document).ready(function(){ 
        $(document).pngFix(); 
    }); 
</script> 
<![endif]-->
<?php } ?>

<?php if (theme_get_setting('brussels_usecustomlogosize')) { ?>
  <style type="text/css">
    img#logo {
      width : <?php print theme_get_setting('brussels_logowidth') ?>px;
      height: <?php print theme_get_setting('brussels_logoheight') ?>px;
    }
  </style>
<?php }  ?>
<!--[if IE]>
<style type="text/css" media="all">@import "<?php print base_path() . path_to_theme() ?>/css/ie.css";</style>
<![endif]-->
<!--[if lte IE 6]>
<style type="text/css" media="all">@import "<?php print base_path() . path_to_theme() ?>/css/ie6.css";</style>
<![endif]-->
<!--[if IE 7]>
<style type="text/css" media="all">@import "<?php print base_path() . path_to_theme() ?>/css/ie7.css";</style>
<![endif]-->
<script type="text/javascript" src="<?php print $GLOBALS['base_url']."/"; print $directory; ?>/js/pickstyle.js"></script>
</head>
<body<?php print phptemplate_body_class($sidebar_left, $sidebar_right); ?>>
<div id="page">
  <div id="masthead">
    <div class="container">
      <div id="header" class="clear-block">
        <?php if ($header) { ?>
          <?php print $header; ?>
        <?php } ?>
			  <?php print $search_box; ?>
        <?php if ($logo) { ?>
          <div id="logo-title">
            <a href="<?php print $base_path; ?>" title="<?php print t('Home'); ?>"> <img src="<?php print $logo; ?>" alt="<?php print t('Home');?>" /> </a>
          </div> <!-- /logo-title -->
        <?php } ?>
        <?php if ($site_name || $site_slogan) { ?>
          <div id="name-and-slogan">
						<?php if ($site_name) { ?>
              <h1 id='site-name'> <a href="<?php print $base_path ?>" title="<?php print t('Home'); ?>"> <?php print $site_name; ?> </a> </h1>
            <?php } ?>
            <?php if ($site_slogan) { ?>
              <div id='site-slogan'> <?php print $site_slogan; ?> </div>
            <?php } ?>
          </div> <!-- /name-and-slogan -->
        <?php } ?>
      </div> <!-- /header -->
    </div> <!-- /container -->
  </div> <!-- masthead -->
  <?php if ($primary_links) { ?>
    <div id="primary-links">
      <div class="container">
        <?php print theme('menu_links', $primary_links); ?>
      </div> <!-- /container -->
    </div><!-- /primary-links -->
  <?php } ?>
  <div id="stripe"></div>
  <?php if ($secondary_links) { ?>
    <div id="secondary-links">
      <div class="container">
        <?php print theme('menu_links', $secondary_links); ?>
      </div> <!-- /container -->
    </div><!--secondary-links-->
  <?php } ?>
  <div id="lower-page">
    <div class="container">
			<?php
         $section1count = 0;
         if ($user1)  { $section1count++; }
         if ($user2)  { $section1count++; }
         if ($user3)  { $section1count++; }
      ?>
      <?php if ($section1count) { ?>
        <?php $section1width = 'width' . floor(99 / $section1count); ?>
        <div id="section1" class="sections clear-block clr">
          <div class="section-top-right">
            <div class="section-top-left">
              <div class="section-top">
              </div><!-- section-top -->
            </div><!-- section-top-left -->
          </div><!-- section-top-right-->
          <div class="section-cont-right">
            <div class="section-cont-left">
              <div class="section-cont">
                <div class="sections">
                  <?php if ($user1) { ?>
                    <div class="section <?php echo $section1width ?>"><?php print $user1; ?></div>
                  <?php } ?>
                  <?php if ($user2) { ?>
                    <div class="section <?php echo $section1width ?>"><?php print $user2; ?></div>
                  <?php } ?>
                  <?php if ($user3) { ?>
                    <div class="section <?php echo $section1width ?>"><?php print $user3; ?></div>
                  <?php } ?>
                  <div style="clear:both"></div>
                </div> <!--/sections-->
              </div> <!-- section-cont -->
            </div> <!--section-cont-left -->
          </div> <!-- section-cont-right -->
          <div class="section-bottom-right">
            <div class="section-bottom-left">
              <div class="section-bottom">
              </div><!--section-bottom-->
            </div><!--section-bottom-left-->
          </div><!--section-bottom-right-->
        </div> <!-- /section1 -->
      <?php } ?>
      <div id="middlecontainer">
        <?php if ($sidebar_left) { ?>
          <div id="sidebar-left"><?php print $sidebar_left ?> </div>
        <?php } ?>
        <div id="squeeze-right">
          <div id="squeeze-left">
            <div id="main">
              <div id="squeeze">
                <div id="squeeze-top-right">
                  <div id="squeeze-top-left">
                    <div id="squeeze-top">
                    </div><!-- squeeze-top -->
                  </div><!-- squeeze-top-left -->
                </div><!-- squeeze-top-right-->
                <div id="squeeze-cont-right">
                  <div id="squeeze-cont-left">
                    <div id="squeeze-cont">
                      <div id="content-container">
                      <?php if (theme_get_setting('brussels_breadcrumb')) { ?>
                        <?php if ($breadcrumb) { ?>
                          <?php print $breadcrumb; ?>
                        <?php } ?>
                      <?php } ?>
                      <?php if ($mission) { ?>
                        <div id="mission"><?php print $mission ?></div>
                      <?php } ?>
                      <?php if ($content_top) { ?>
                        <div id="content-top"><?php print $content_top; ?></div>
                      <?php } ?>
                      <?php if ($title) { ?><h1 class="title"><?php print $title ?></h1><?php } ?>
                      <?php if ($tabs) { ?><div class="tabs"><?php print $tabs ?></div><?php } ?>
                      <?php print $help ?> 
                      <?php print $messages ?> 
                      <?php print $content; ?> 
                      <?php print $feed_icons; ?>
                      <?php if ($content_bottom) { ?>
                        <div id="content-bottom"><?php print $content_bottom; ?></div>
                      <?php } ?>
                      </div>
                    </div> <!-- squeeze-cont -->
                  </div> <!--squeeze-cont-left -->
                </div> <!-- squeeze-cont-right -->
                <div id="squeeze-bottom-right">
                  <div id="squeeze-bottom-left">
                    <div id="squeeze-bottom">
                    </div><!--squeeze-bottom-->
                  </div><!--squeeze-bottom-left-->
                </div><!--squeeze-bottom-right-->
              </div><!--squeeze-->
            </div><!--main-->
            <?php if ($sidebar_right) { ?>
              <div id="sidebar-right"><?php print $sidebar_right ?> </div>
            <?php } ?>
          </div> <!-- /squeeze-left -->
        </div> <!-- /squeeze-right -->
      </div><!--middle-container-->
      <?php
        $section2count = 0;
          if ($user4)  { $section2count++; }
          if ($user5)  { $section2count++; }
          if ($user6)  { $section2count++; }
      ?>
      <?php if ($section2count) { ?>
        <?php $section2width = 'width' . floor(99 / $section2count); ?>
        <div id="section2" class="sections clear-block clr" >
          <div class="section-top-right">
            <div class="section-top-left">
              <div class="section-top">
              </div><!-- section-top -->
            </div><!-- section-top-left -->
          </div><!-- section-top-right-->
          <div class="section-cont-right">
            <div class="section-cont-left">
              <div class="section-cont">
                <div class="sections">
                  <?php if ($user4) { ?>
                    <div class="section <?php echo $section2width ?>"><?php print $user4; ?></div>
                  <?php } ?>
                  <?php if ($user5) { ?>
                    <div class="section <?php echo $section2width ?>"><?php print $user5; ?></div>
                  <?php } ?>
                  <?php if ($user6) { ?>
                    <div class="section <?php echo $section2width ?>"><?php print $user6; ?></div>
                  <?php } ?>
                  <div style="clear:both"></div>
                </div> <!-- /sections -->
              </div> <!-- section-cont -->
            </div> <!--section-cont-left -->
          </div> <!-- section-cont-right -->
          <div class="section-bottom-right">
            <div class="section-bottom-left">
              <div class="section-bottom">
              </div><!--section-bottom-->
            </div><!--section-bottom-left-->
          </div><!--section-bottom-right-->
        </div> <!-- /section2 -->
      <?php } ?>
      <div style="clear:both"></div>
      <div id="footer">
        <?php if ($footer_region) { ?>
          <div id="footer-region"><?php print $footer_region?></div>
        <?php } ?>
        <?php if ($footer_message) { ?>
          <div id="footer-message"><?php print $footer_message ?></div>
        <?php } ?>
      </div> <!-- /footer -->
      <?php print $closure ?> 
    </div> <!-- /container -->
  </div> <!--/lower-page-->
</div><!-- /page -->
</body>
</html>

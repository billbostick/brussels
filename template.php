<?php
// $Id$

function phptemplate_body_class($sidebar_left, $sidebar_right) {
   if ($sidebar_left != '' && $sidebar_right != '') {
     $class = 'sidebars';
   }
   else {
     if ($sidebar_left != '') {
       $class = 'sidebar-left';
     }
     if ($sidebar_right != '') {
       $class = 'sidebar-right';
     }
   }
   if (isset($class)) {
     print ' class="'. $class .'"';
  }
}

if (is_null(theme_get_setting('brussels_style'))) {
  global $theme_key;

  // Save default theme settings
  $defaults = array(
    'brussels_style' => 'anderlecht',
    'brussels_width' => 0,
    'brussels_fixedwidth' => '850',
    'brussels_breadcrumb' => 0,
    'brussels_iepngfix' => 0,
    'brussels_fontfamily' => 0,
    'brussels_customfont' => '',
    'brussels_uselocalcontent' => 0,
    'brussels_localcontentfile' => '',
    'brussels_leftsidebarwidth' => '210',
    'brussels_rightsidebarwidth' => '210',
    'brussels_suckerfish' => 0,
    'brussels_usecustomlogosize' => 0,
    'brussels_logowidth' => '100',
    'brussels_logoheight' => '100',
  );

  variable_set(
    str_replace('/', '_', 'theme_'. $theme_key .'_settings'),
    array_merge(theme_get_settings($theme_key), $defaults)
  );
  // Force refresh of Drupal internals
  theme_get_setting('', TRUE);
}

function brussels_regions() {
  return array(
    'sidebar_left' => t('left sidebar'),
    'sidebar_right' => t('right sidebar'),
    'content_top' => t('content top'),
    'content_bottom' => t('content bottom'),
    'header' => t('header'),
    'user1' => t('user1'),
    'user2' => t('user2'),
    'user3' => t('user3'),
    'user4' => t('user4'),
    'user5' => t('user5'),
    'user6' => t('user6'),
    'footer_region' => t('footer')
  );
} 
 
function get_brussels_style() {
  $style = theme_get_setting('brussels_style');
  if (!$style)
  {
    $style = 'etterbeek';
  }
  if (isset($_COOKIE["brusselsstyle"])) {
    $style = $_COOKIE["brusselsstyle"];
  }
  return $style;
}

drupal_add_css(drupal_get_path('theme', 'brussels') . '/css/' . get_brussels_style() . '.css', 'theme');

if (theme_get_setting('brussels_iepngfix')) {
   drupal_add_js(drupal_get_path('theme', 'brussels') . '/js/jquery.pngFix.js', 'theme');
}

function _phptemplate_variables($hook, $vars) {
  if (module_exists('advanced_profile')) {
    $vars = advanced_profile_addvars($hook, $vars);
  }
  if (module_exists('advanced_forum')) {
    $vars = advanced_forum_addvars($hook, $vars);
  }
  if ($hook == 'page') {
    if (module_exists('page_title')) {
      $vars['head_title'] = page_title_page_get_title();
    }
  }
  return $vars;
}

function brussels_block($block) {
  if (module_exists('blocktheme')) {
    if ( $custom_theme = blocktheme_get_theme($block) ) {
      return _phptemplate_callback($custom_theme,array('block' => $block));
    }
  }
  return phptemplate_block($block);
}

/* If we're using a local content file, we want this to be the last CSS file that the page loads */
if (theme_get_setting('brussels_uselocalcontent'))
{
   $local_content = drupal_get_path('theme', 'brussels') . '/' . theme_get_setting('brussels_localcontentfile');
   if (file_exists($local_content)) {
      drupal_add_css($local_content, 'theme');
   }
}

// This code adds spans to the primary links so that we can display the tab images
function phptemplate_menu_links($primary_links){
  if ($plinks = $primary_links) {
    foreach ($plinks as $key => $link) {
      if (stristr($key, 'active')) {
        $plinks[$key]['attributes']['class'] = 'active';
      }
      $plinks[$key]['html'] = true;
      $plinks[$key]['title'] = '<span class="left"><span class="center">'.$link['title'].'</span></span><span  class="right"></span>';
    }
  return theme('links',$plinks, array('class' => 'links primary-links'));
  }
}

// this code overrides drupals default theme_menu_tree in favor of the next routine
function phptemplate_menu_tree($pid = 1) {
  if ($tree = phptemplate_menu_tree_improved($pid)) {
    return "\n<ul class=\"menu\">\n". $tree ."\n</ul>\n";
  }
}

// This code adds several class selectors to menu items. We use the first and last class
// in order to display the divider pipes between items in the footer menu
function phptemplate_menu_tree_improved($pid = 1) {
  $menu = menu_get_menu();
  $output = '';

  if (isset($menu['visible'][$pid]) && $menu['visible'][$pid]['children']) {
    $num_children = count($menu['visible'][$pid]['children']);
    for ($i=0; $i < $num_children; ++$i) {
      $mid = $menu['visible'][$pid]['children'][$i];
      $type = isset($menu['visible'][$mid]['type']) ? $menu['visible'][$mid]['type'] : NULL;
      $children = isset($menu['visible'][$mid]['children']) ? $menu['visible'][$mid]['children'] : NULL;
      $extraclass = $i == 0 ? 'first' : ($i == $num_children-1 ? 'last' : '');
      $output .= theme('menu_item', $mid, menu_in_active_trail($mid) || ($type & MENU_EXPANDED) ? theme('menu_tree', $mid) : '', count($children) == 0, $extraclass);
      }
  }
  return $output;
}

// this function adds the expanded and collapsed class to menu items
function phptemplate_menu_item($mid, $children = '', $leaf = TRUE, $extraclass = '') {
  return '<li class="'. ($leaf ? 'leaf' : ($children ? 'expanded' : 'collapsed')) . ($extraclass ? ' ' . $extraclass : '') . '">'. menu_item_link($mid, TRUE, $extraclass) . $children ."</li>\n";
}

function phptemplate_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    $styled_breadcrumb = '/images/' . get_brussels_style() . '/menu-leaf-strong.gif';
  	$output = '<div class="breadcrumb">';
	$count = count($breadcrumb);
	$i = 1;
	foreach ($breadcrumb as $crumb) {
		$output .= $crumb;
		$i++;
		if ($i <= $count) {	
			$bullet = base_path() . path_to_theme() . $styled_breadcrumb;
			$output .= ' <image src="' . $bullet . '" /> ';
		}
	}
	$output .= '</div>';
    return $output;
  }
}

function phptemplate_book_navigation($node) {
  $output = '';
  $links = '';

  if ($node->nid) {
    $tree = book_tree($node->nid);

    if ($prev = book_prev($node)) {
      drupal_add_link(array('rel' => 'prev', 'href' => url('node/'. $prev->nid)));
      $booknav_prev = '<image src="' . base_path() . path_to_theme() . '/images/' . get_brussels_style() . '/li-leaf-rev.gif'. '" /> ';
      $booknav_next = '<image src="' . base_path() . path_to_theme() . '/images/' . get_brussels_style() . '/li-leaf.gif'. '" /> ';
      $links .= l($booknav_prev . $prev->title, 'node/'. $prev->nid, array('class' => 'page-previous', 'title' => t('Go to previous page')), NULL, NULL, FALSE, TRUE);
    }
    if ($node->parent) {
      drupal_add_link(array('rel' => 'up', 'href' => url('node/'. $node->parent)));
      $links .= l(t('up'), 'node/'. $node->parent, array('class' => 'page-up', 'title' => t('Go to parent page')));
    }
    if ($next = book_next($node)) {
      drupal_add_link(array('rel' => 'next', 'href' => url('node/'. $next->nid)));
      $links .= l($next->title . $booknav_next, 'node/'. $next->nid, array('class' => 'page-next', 'title' => t('Go to next page')), NULL, NULL, FALSE, TRUE);
    }

    if (isset($tree) || isset($links)) {
      $output = '<div class="book-navigation">';
      if (isset($tree)) {
        $output .= $tree;
      }
      if (isset($links)) {
        $output .= '<div class="page-links clear-block">'. $links .'</div>';
      }
      $output .= '</div>';
    }
  }
  return $output;
}

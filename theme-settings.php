<?php

function phptemplate_settings($saved_settings) {

  $settings = theme_get_settings('brussels');

  $defaults = array(
    'brussels_style' => 'etterbeek',
    'brussels_width' => 0,
    'brussels_fixedwidth' => '850',
    'brussels_breadcrumb' => 0,
    'brussels_iepngfix' => 0,
    'brussels_fontfamily' => 0,
    'brussels_customfont' => '',
    'brussels_uselocalcontent' => 0,
    'brussels_localcontentfile' => '',
    'brussels_leftsidebarwidth' => '25',
    'brussels_rightsidebarwidth' => '25',
    'brussels_suckerfish' => 0,
    'brussels_usecustomlogosize' => 0,
    'brussels_logowidth' => '100',
    'brussels_logoheight' => '100',
  );

  $settings = array_merge($defaults, $settings);

  $form['brussels_style'] = array(
    '#type' => 'select',
    '#title' => t('Style'),
    '#default_value' => $settings['brussels_style'],
    '#options' => array(
      'anderlecht' => t('Anderlecht'),
      'etterbeek' => t('Etterbeek'),
      'forest' => t('Forest'),
      'jette' => t('Jette'),
      'koekelberg' => t('Koekelberg'),
      'schaarbeek' => t('Schaarbeek'),
      'uccle' => t('Uccle'),
    ),
  );

  $form['brussels_width'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use Fixed Width'),
    '#default_value' => $settings['brussels_width'],
  );

  $form['brussels_fixedwidth'] = array(
    '#type' => 'textfield',
    '#title' => t('Fixed Width Size'),
    '#default_value' => $settings['brussels_fixedwidth'],
    '#size' => 5,
    '#maxlength' => 5,
  );

  $form['brussels_breadcrumb'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show Breadcrumbs'),
    '#default_value' => $settings['brussels_breadcrumb'],
  );

  $form['brussels_iepngfix'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use IE PNG Fix'),
    '#default_value' => $settings['brussels_iepngfix'],
  );
  
  $form['brussels_fontfamily'] = array(
    '#type' => 'select',
    '#title' => t('Font Family'),
    '#default_value' => $settings['brussels_fontfamily'],
    '#options' => array(
     'Arial, Verdana, sans-serif' => t('Arial, Verdana, sans-serif'),
     '"Arial Narrow", Arial, Helvetica, sans-serif' => t('"Arial Narrow", Arial, Helvetica, sans-serif'),
     '"Times New Roman", Times, serif' => t('"Times New Roman", Times, serif'),
     '"Lucida Sans", Verdana, Arial, sans-serif' => t('"Lucida Sans", Verdana, Arial, sans-serif'),
     '"Lucida Grande", Verdana, sans-serif' => t('"Lucida Grande", Verdana, sans-serif'),
     'Tahoma, Verdana, Arial, Helvetica, sans-serif' => t('Tahoma, Verdana, Arial, Helvetica, sans-serif'),
     'Georgia, "Times New Roman", Times, serif' => t('Georgia, "Times New Roman", Times, serif'),
     'Custom' => t('Custom (specify below)'),
    ),
  );

  $form['brussels_customfont'] = array(
    '#type' => 'textfield',
    '#title' => t('Custom Font-Family Setting'),
    '#default_value' => $settings['brussels_customfont'],
    '#size' => 40,
    '#maxlength' => 75,
  );

  $form['brussels_uselocalcontent'] = array(
    '#type' => 'checkbox',
    '#title' => t('Include Local Content File'),
    '#default_value' => $settings['brussels_uselocalcontent'],
  );

  $form['brussels_localcontentfile'] = array(
    '#type' => 'textfield',
    '#title' => t('Local Content File Name'),
    '#default_value' => $settings['brussels_localcontentfile'],
    '#size' => 40,
    '#maxlength' => 75,
  );

  $form['brussels_leftsidebarwidth'] = array(
    '#type' => 'textfield',
    '#title' => t('Left Sidebar Width'),
    '#default_value' => $settings['brussels_leftsidebarwidth'],
    '#size' => 5,
    '#maxlength' => 5,
  );

  $form['brussels_rightsidebarwidth'] = array(
    '#type' => 'textfield',
    '#title' => t('Right Sidebar Width'),
    '#default_value' => $settings['brussels_rightsidebarwidth'],
    '#size' => 5,
    '#maxlength' => 5,
  );

  $form['brussels_suckerfish'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use Suckerfish Menus'),
    '#default_value' => $settings['brussels_suckerfish'],
  );

  $form['brussels_usecustomlogosize'] = array(
    '#type' => 'checkbox',
    '#title' => t('Specify Custom Logo Size'),
    '#default_value' => $settings['brussels_usecustomlogosize'],
  );

  $form['brussels_logowidth'] = array(
    '#type' => 'textfield',
    '#title' => t('Logo Width'),
    '#default_value' => $settings['brussels_logowidth'],
    '#size' => 5,
    '#maxlength' => 5,
  );

  $form['brussels_logoheight'] = array(
    '#type' => 'textfield',
    '#title' => t('Logo Height'),
    '#default_value' => $settings['brussels_logoheight'],
    '#size' => 5,
    '#maxlength' => 5,
  );

  return $form;
}

<?php
/**
 * @file
 * The primary PHP file for this theme.
 */

// Add scripts.min.js at end of body tag.
$theme_path = drupal_get_path('theme', 'mtpc_bootstrap');
drupal_add_js(
  $theme_path . '/build/js-custom/mtpc-scripts.min.js',
  [
    'type' => 'file',
    'scope' => 'footer',
  ]
);

/**
 * Implements hook_form_alter().
 */
function mtpc_bootstrap_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id === 'search_api_page_search_form_default_search') {
    // Modify placeholder text in search field.
    $form['keys_1']['#title'] = t('Search');
    $form['keys_1']['#attributes']['placeholder'] = t('Search...');
  }
}

/**
 * Implements hook_js_alter().
 */
function mtpc_bootstrap_js_alter(&$javascript) {
  // Use updated jQuery library on all but some paths.
  $node_admin_paths = [
    'node/*/edit',
    'node/add',
    'node/add/*',
  ];
  $replace_jquery = TRUE;
  if (path_is_admin(current_path())) {
    $replace_jquery = FALSE;
  }
  else {
    foreach ($node_admin_paths as $node_admin_path) {
      if (drupal_match_path(current_path(), $node_admin_path)) {
        $replace_jquery = FALSE;
      }
    }
  }
  // Swap out jQuery to use an updated version of the library.
  if ($replace_jquery) {
    $javascript['misc/jquery.js']['data'] = drupal_get_path('theme', 'mtpc_bootstrap') . '/js/jquery.min.js';
  }
}

/**
 * Implements hook_preprocess_entity().
 */
function mtpc_bootstrap_preprocess_entity(&$variables, $hook) {
  // Enable use of function mtpc_bootstrap_preprocess_entity_[entity_type]().
  $function = __FUNCTION__ . '_' . $variables['entity_type'];
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}

/**
 * Override or insert variables into the bean templates.
 */
function mtpc_bootstrap_preprocess_entity_bean(&$vars) {
  // Replace webform container block with content from webform block. This is
  // required as webforms are displayed within bean block containers, in order
  // to allow placement using Context module.
  $bean = $vars['bean'];
  $webform_block_container_deltas = [
    'mtpc_webform_feedback',
    'mtpc_webform_comment_form',
  ];

  if (in_array($bean->delta, $webform_block_container_deltas)) {
    $webform_block_mapping = variable_get('webform_block_mapping', []);
    $webform_delta = 'client-block-' . $webform_block_mapping[$bean->delta];

    // Replace webform container block with title and content from webform
    // block.
    $block = module_invoke('webform', 'block_view', $webform_delta);
    $vars['title'] = $block['subject'];
    $vars['content'] = $block['content'];
  }
}

/**
 * Implements theme_preprocess_page().
 */
function mtpc_bootstrap_preprocess_page(&$variables) {
  $search_form = drupal_get_form('search_block_form');
  $search_form_box = drupal_render($search_form);
  $variables['search_box'] = $search_form_box;
}

/**
 * Implements theme__preprocess_file_entity().
 */
function mtpc_bootstrap_preprocess_file_entity(&$variables) {
  if ($variables['content']['file']['#style_name'] == 'medium') {
    $variables['content']['file']['#style_name'] = 'full_size';
  }
}

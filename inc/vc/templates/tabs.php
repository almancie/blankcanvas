<?php

extract(
  vc_map_get_attributes(
    $this->getShortcode(), 
    $atts
  )
);

// CSS classes
$classes = [
  'element',
  'tabs'
];

// Navbar CSS classes
$navbarClasses = [
  'nav'
];

// Tab content CSS classes
$contentClasses = [
  'tab-content'
];

// Hide
if ($disable_element) {
  $classes[] = 'd-none';
}

// Attributes
$elAttributes = [];

// Id
if ($el_id) {
  $elAttributes[] = sprintf('id="%s"', $el_id);
}

// Nav style
if ($style) {
  $navbarClasses[] = sprintf('nav-%s', $style);
}

// Navbar position
// if ($navbar_position) {
//   $classes[] = 'd-flex';

//   switch ($navbar_position) {
//     case 'bottom':
//       $classes[] = 'flex-column-reverse';

//       break;

//     case 'start':
//       $classes[] = 'flex-row';
 
//       $navbarClasses[] = 'flex-column';

//       break;
//     case 'end':
//       $classes[] = 'flex-row-reverse';

//       $navbarClasses[] = 'flex-column';

//       break;
//   }
// }

// if ($nav_items_position) {
//   $navbarClasses[] = sprintf('justify-content-%s', $nav_items_position);
// }

if ($navbar_class) {
  $navbarClasses[] = $navbar_class;
}

if ($content_class) {
  $contentClasses[] = $content_class;
}

// Class
if ($el_class) {
  $classes[] = $el_class;
}

// Filter: VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG
$classes = apply_filters(
  VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 
  implode(' ', array_filter(array_unique($classes))), 
  $this->settings['base'], 
  $atts
);

if ($classes) {
  $elAttributes[] = sprintf('class="%s"', trim($classes));
}

// Nav Items
$navItems = [];

// Panels (updated)
$navPanels = [];

if (is_int((int) $active_section)) {
  $active_section--;
}

// Panels (initial)
preg_match_all('/\[panel(?:\s*)(.*?)\](?:.|\n)*?\[\/panel\]/', $content, $panels, PREG_SET_ORDER);


foreach ($panels as $key => $panel) {
  $panelShortcode = $panel[0];
  
  $panelAtts = $panel[1];
  
  // Is active
  $active = ($key === $active_section);
  
  extract(vc_map_get_attributes('panel', shortcode_parse_atts($panelAtts)));

  $navItems[] = sprintf(
    '<li class="nav-item">
    <a 
    class="nav-link%s%s" id="tab-%s" 
    type="button" role="tab"
    data-bs-toggle="tab" data-bs-target="#tab-%s-pane" 
    aria-controls="#tab-%s" aria-selected="%s"
    >
    %s
    </a>
    </li>', 
    $active ? ' active' : '', $nav_btn_class ? ' ' . $nav_btn_class : '', $tab_id,  $tab_id,  $tab_id, json_encode($active), $title ?: esc_html__('No Title', 'blankcanvas')
  );
  
  // Add extra atts to panel shortcode
  $panelShortcode = str_replace('[panel', sprintf('[panel active="%s" panel_class="%s"', $active, $panel_class), $panelShortcode);
  
  // Add updated panel shortcode
  $navPanels[] = $panelShortcode;
}

$content = implode('', $navPanels);

return sprintf(
  '<div %s>
    <ul class="%s">%s</ul>
    <div class="%s">%s</div>
  </div>',
  implode(' ', $elAttributes), 
  implode(' ', $navbarClasses),
  implode(' ', $navItems),
  implode(' ', $contentClasses),
  wpb_js_remove_wpautop($content)
);
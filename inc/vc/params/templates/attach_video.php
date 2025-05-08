<?php
$video_url = '';

if (! empty($value)) {
    $video_url = wp_get_attachment_url($value);
} ?>

<div class="custom-video-attach-wrapper">
  <input 
    type="hidden" 
    class="<?= esc_attr(sprintf('wpb_vc_param_value %s %s_field', $settings['param_name'], $settings['type'])) ?>"
    name="<?= esc_attr($settings['param_name']); ?>" value="<?= esc_attr($value) ?>"/>
  <button class="button attach-video-button">Select Video</button>
  <div class="video-preview" style="margin-top:10px;">

    <?php
    if ($video_url) { ?>
      <video width="300" controls>
        <source src="<?= esc_url($video_url) ?>">
      </video>
    <?php
    } ?>
  </div>
</div>
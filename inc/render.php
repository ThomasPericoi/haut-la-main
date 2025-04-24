<?php
/* RENDER
--------------------------------------------------------------- */

// Render CTA
function render_cta($selector_prefix, $post_id = false)
{
    $color = get_field("{$selector_prefix}_cta_color", $post_id);
    $type = get_field("{$selector_prefix}_cta_type", $post_id);

    $text_cta = get_field("{$selector_prefix}_cta_text", $post_id);
    $text_icon = get_field("{$selector_prefix}_cta_text_icon", $post_id);
    $text_icon_direction = get_field("{$selector_prefix}_cta_text_icon_direction", $post_id);
    $image_cta = get_field("{$selector_prefix}_cta_image", $post_id);

    if (!$text_cta && empty($image_cta['image'])) {
        return;
    }

    if ($type === 'text' && !empty($text_cta['title'])) {
        echo sprintf(
            '<a class="btn btn-%1$s btn-icon-%2$s %3$s" href="%4$s" target="%5$s">%6$s</a>',
            esc_attr($color),
            esc_attr($text_icon),
            esc_attr($text_icon_direction),
            esc_url($text_cta['url']),
            esc_attr($text_cta['target']),
            esc_html($text_cta['title'])
        );
    } elseif ($type === 'image' && !empty($image_cta['image'])) {
        echo sprintf(
            '<a class="btn btn-%1$s btn-image" href="%2$s" title="%3$s" aria-label="%3$s" target="%4$s">
                <img src="%5$s" alt="%3$s" />
            </a>',
            esc_attr($color),
            esc_url($image_cta['url']),
            esc_attr($image_cta['title']),
            esc_attr($image_cta['target']),
            esc_url($image_cta['image'])
        );
    }
}

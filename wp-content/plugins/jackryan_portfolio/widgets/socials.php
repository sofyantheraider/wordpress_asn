<?php

class jackryan_widget_socials extends WP_Widget {

    public function __construct() {
        $widget_details = array(
            'classname' => 'jackryan_widget_socials',
            'description' => esc_html__('Display Social Links.', 'jackryan')
        );
        parent::__construct('jackryan_widget_socials', esc_html__('Jack Ryan: Social Links', 'jackryan'), $widget_details);
    }

    public function widget($args, $instance) {

        if (!isset( $args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        $title = !empty($instance['title']) ? $instance['title'] : '';

        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        echo wp_kses_post( $args['before_widget'] );

        $widget_id = $args['widget_id'];


        $twitter = get_field('twitter', 'widget_' . $widget_id);
        $dribbble = get_field('dribbble', 'widget_' . $widget_id);
        $facebook = get_field('facebook', 'widget_' . $widget_id);
        $google_plus = get_field('google_plus', 'widget_' . $widget_id);
        $linkedin = get_field('linkedin', 'widget_' . $widget_id);
        $pinterest = get_field('pinterest', 'widget_' . $widget_id);
        $instagram = get_field('instagram', 'widget_' . $widget_id);
        $youtube = get_field('youtube', 'widget_' . $widget_id);
        $flickr = get_field('flickr', 'widget_' . $widget_id);
        $tumblr = get_field('tumblr', 'widget_' . $widget_id);
        $deviantart = get_field('deviantart', 'widget_' . $widget_id);
        $skype = get_field('skype', 'widget_' . $widget_id);
        $vimeo = get_field('vimeo', 'widget_' . $widget_id);
        $digg = get_field('digg', 'widget_' . $widget_id);
        $github = get_field('github', 'widget_' . $widget_id);
        $vine = get_field('vine', 'widget_' . $widget_id);
        $soundcloud = get_field('soundcloud', 'widget_' . $widget_id);
        $vk = get_field('vk', 'widget_' . $widget_id);
        $fivepx = get_field('500px', 'widget_' . $widget_id);
        $behance = get_field('behance', 'widget_' . $widget_id);


        if( $title ) {
            echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );
        }


        if(!empty($twitter)) {  echo '<li class="ms-btn"><a class="socicon-twitter" title="Twitter" target="_blank" href="' . esc_url($twitter) . '"></a></li>'; }
        if(!empty($dribbble)) { echo '<li class="ms-btn"><a class="socicon-dribbble" title="Dribbble" target="_blank" href="' . esc_url($dribbble) . '"></a></li>'; }
        if(!empty($facebook)) { echo '<li class="ms-btn"><a class="socicon-facebook" title="Facebook" target="_blank" href="' . esc_url($facebook) . '"></a></li>'; }
        if(!empty($google_plus)) { echo '<li class="ms-btn"><a class="socicon-googleplus" title="Google Plus" target="_blank" href="' . esc_url($google_plus) . '"></a></li>'; }
        if(!empty($linkedin)) { echo '<li class="ms-btn"><a class="socicon-linkedin" title="LinkedIn" target="_blank" href="' . esc_url($linkedin) . '"></a></li>'; }
        if(!empty($pinterest)) { echo '<li class="ms-btn"><a class="socicon-pinterest" title="Pinterest" target="_blank" href="' . esc_url($pinterest) . '"></a></li>'; }
        if(!empty($instagram)) {  echo '<li class="ms-btn"><a class="socicon-instagram" title="Instagram" target="_blank" href="' . esc_url($instagram) . '"></a></li>'; }
        if(!empty($youtube)) { echo '<li class="ms-btn"><a class="socicon-youtube" title="Youtube" target="_blank" href="' . esc_url($youtube) . '"></a></li>'; }
        if(!empty($flickr)) { echo '<li class="ms-btn"><a class="socicon-flickr" title="Flickr" target="_blank" href="' . esc_url($flickr) . '"></a></li>'; }
        if(!empty($tumblr)) { echo '<li class="ms-btn"><a class="socicon-tumblr" title="Tumblr" target="_blank" href="' . esc_url($tumblr) . '"></a></li>'; }
        if(!empty($vine)) { echo '<li class="ms-btn"><a class="socicon-vine" title="Vine" target="_blank" href="' . esc_url($vine) . '"></a></li>'; }
        if(!empty($vk)) { echo '<li class="ms-btn"><a class="socicon-vkontakte" title="VK" target="_blank" href="' . esc_url($vk) . '"></a></li>'; }
        if(!empty($deviantart)) { echo '<li class="ms-btn"><a class="socicon-deviantart" title="Deviantart" target="_blank" href="' . esc_url($deviantart) . '"></a></li>'; }
        if(!empty($skype)) { echo '<li class="ms-btn"><a class="socicon-skype" title="Skype" target="_blank" href="' . esc_url($skype) . '"></a></li>'; }
        if(!empty($vimeo)) { echo '<li class="ms-btn"><a class="socicon-vimeo" title="Vimeo" target="_blank" href="' . esc_url($vimeo) . '"></a></li>'; }
        if(!empty($digg)) { echo '<li class="ms-btn"><a class="socicon-digg" title="Digg" target="_blank" href="' . esc_url($digg) . '"></a></li>'; }
        if(!empty($soundcloud)) { echo '<li class="ms-btn"><a class="socicon-soundcloud" title="Soundcloud" target="_blank" href="' . esc_url($soundcloud) . '"></a></li>'; }
        if(!empty($github)) { echo '<li class="ms-btn"><a class="socicon-github" title="Github" target="_blank" href="' . esc_url($github) . '"></a></li>'; }
        if(!empty($fivepx)) { echo '<li class="ms-btn"><a class="socicon-500px" title="500px" target="_blank" href="' . esc_url($github) . '"></a></li>'; }
        if(!empty($behance)) { echo '<li class="ms-btn"><a class="socicon-behance" title="Behance" target="_blank" href="' . esc_url($behance) . '"></a></li>'; }


        echo wp_kses_post( $args['after_widget'] );

    }

    public function form($instance) {

        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';

        ?>
        <p><label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'jackryan'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

        <?php

    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        return $instance;
    }
}
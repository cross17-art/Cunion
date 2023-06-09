<?php
/* =============================================================================
 * WIDGETS.PHP
 * -----------------------------------------------------------------------------
 * WPTF Widgets.
=============================================================================
 */ 
class hc_widget_categories extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'hcy-widget-categories',
			'description' => esc_attr__('A list of categories.','hc'),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'hc_widget_categories', ' WPTF | ' . esc_attr__('Categories','hc'), $widget_ops );
	}
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? esc_attr__('Categories','hc') : $instance['title'], $instance, $this->id_base );
        $post_type = (!empty($instance['post_type'])) ? esc_attr($instance['post_type']) : 'post';
		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'] . '<ul>';
		}
        if ($post_type != 'post') {
            $arr = get_terms(array('taxonomy' => $post_type . '-cat','hide_empty' => false));
            for ($i = 0; $i < count($arr); $i++) { ?>
<li><a href="<?php echo esc_url(get_category_link($arr[$i]->term_id)) ?>"><?php echo esc_attr($arr[$i]->name) ?></a></li>
<?php  }
        }  else {
            $arr = get_categories();
            foreach ($arr as $term ) { ?>
<li><a href="<?php echo esc_url(get_category_link($term->term_id)) ?>"><?php echo esc_attr($term->name) ?></a></li>
<?php }
        }
        echo '</ul>' . $args['after_widget'];
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['post_type'] = $new_instance['post_type'];
		return $instance;
	}
	public function form( $instance ) {
        global $hc_all_post_types;
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = sanitize_text_field( $instance['title'] );
        $post_type = isset( $instance['post_type'] ) ? esc_attr($instance['post_type']) : 'post';
?>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','hc'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id( 'post_type' )); ?>"><?php esc_html_e( 'Post Type:','hc'); ?></label>
    <select name="<?php echo esc_attr($this->get_field_name( 'post_type' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'post_type' )); ?>" class="widefat">
        <?php
        for ($i = 0; $i < count($hc_all_post_types); $i++) {
            if ($hc_all_post_types[$i][1] != "page" && $hc_all_post_types[$i][1] != "y-post-types" && $hc_all_post_types[$i][1] != "y-post-types-arc") { ?>
        <option value="<?php echo esc_attr($hc_all_post_types[$i][1]) ?>" <?php echo esc_attr(selected($post_type, $hc_all_post_types[$i][1])) ?>><?php echo esc_attr($hc_all_post_types[$i][0]) ?></option>
        <?php }
        }
        ?>
    </select>
</p>
<?php
	}
}
class hc_widget_posts extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'hcy-widget-posts',
			'description' => esc_attr__('Your site&#8217;s most recent Posts.','hc'),
			'customize_selective_refresh' => true,
		);
		parent::__construct('hc_widget_posts', ' WPTF | ' . esc_attr__('Recent Post Types','hc'), $widget_ops);
		$this->alt_option_name = 'widget_recent_entries';
	}

	public function widget($args, $instance) {
		if (!isset( $args['widget_id'])) {
			$args['widget_id'] = $this->id;
		}
		$title = (!empty( $instance['title'] )) ? $instance['title'] : esc_attr__('Recent Posts','hc');
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);
        echo $args['before_title'] . esc_html($title) . $args['after_title'];

		$number = (!empty($instance['number'] )) ? absint($instance['number']) : 5;
        $post_type = (!empty($instance['post_type'])) ? esc_attr($instance['post_type']) : 'post';

        $arr = hc_get_post_type_items($post_type,"",$number,false,false);
        $html = '<div class="menu-inner menu-inner-vertical menu-inner-image"><ul>';
        for ($i = 0; $i < count($arr); $i++) { 
              $title = $arr[$i]["title"];
              if (strlen($title) > 60) $title = mb_substr($title, 0, 60) . " ...";
             $html .= '<li><a href="#">
                       <img src="' . hc_get_img($arr[$i]["image"],'thumbnail'). '" alt="">
                       <span>' . date_i18n('d M Y',  $arr[$i]["date"]) . '</span>' . esc_attr($title) . '</a>
                       </li>';

        }

        echo $html . '</ul></div>';
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
        $instance['post_type'] = $new_instance['post_type'];
        $instance['style'] = $new_instance['style'];
		return $instance;
	}
	public function form( $instance ) {
        global $hc_all_post_types;
		$title     = isset( $instance['title'] ) ? esc_attr($instance['title']) : '';
		$number    = isset( $instance['number'] ) ? absint($instance['number']) : 5;
        $post_type = isset( $instance['post_type'] ) ? esc_attr($instance['post_type']) : 'post';
        $style = isset( $instance['style'] ) ? esc_attr($instance['style']) : 'style_1';
?>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:','hc'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_html($title); ?>" />
</p>
<p>
     <label for="<?php echo esc_attr($this->get_field_id( 'post_type' )); ?>"><?php esc_html_e( 'Post Type:','hc'); ?></label>
    <select name="<?php echo esc_attr($this->get_field_name( 'post_type' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'post_type' )); ?>" class="widefat">
        <?php
        for ($i = 0; $i < count($hc_all_post_types); $i++) {
            if ($hc_all_post_types[$i][1] != "page" && $hc_all_post_types[$i][1] != "y-post-types" && $hc_all_post_types[$i][1] != "y-post-types-arc") { ?>
        <option value="<?php echo esc_attr($hc_all_post_types[$i][1]) ?>" <?php echo esc_attr(selected($post_type, $hc_all_post_types[$i][1])) ?>><?php echo esc_attr($hc_all_post_types[$i][0]) ?></option>
        <?php }
        }
        ?>
    </select>
</p>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_attr_e('Number of posts to show:','hc'); ?></label>
    <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" size="3" />
</p>
<?php	}
}
class hc_widget_search extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'hcy-widget-search',
			'description' => esc_attr__( 'A search form for your site.','hc'),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'hc_widget_search', ' WPTF | ' . esc_attr__( 'Search','hc'), $widget_ops );
	}
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget'];
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
?>
<form role="search" method="get" id="searchform-widget" class="form-box" action="<?php echo esc_url(HC_SITE_URL) ?>">
    <div class="input-text-btn">
        <input class="input-text"  name="s" id="sw" type="text" placeholder="<?php esc_attr_e( 'Search ...','hc') ?>"><input type="submit" id="searchsubmit-widget" value="<?php esc_attr_e( 'Search','hc') ?>" class="btn">
    </div>
</form>
<?php
		echo $args['after_widget'];
	}
	public function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr($instance['title']) : '';
?>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:','hc'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_html($title); ?>" />
</p>
<?php
    }
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args((array) $new_instance, array( 'title' => ''));
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		return $instance;
	}
}
add_action( 'widgets_init', function() {
    register_widget('hc_widget_categories');
    register_widget('hc_widget_posts');
    register_widget('hc_widget_search');
});
?>

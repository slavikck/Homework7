<?php
/**
 * Created by PhpStorm.
 * User: slavik
 * Date: 11.12.14
 * Time: 13:0
 Plugin Name: Arzamath_17th Widget
 Plugin URI: http://homework.local/
 Description: Arzamath_17th a simple widget that grabs a random post from Arzamath_17th plugin :)
 Author: Slavik
 Version: 1.0
 Author URI: http://slavik.com
 */

class Arzamath_17th_Widget extends WP_Widget
{
    function Arzamath_17th_Widget()
    {
        $widget_ops = array('classname' => 'Arzamath_17th_Widget', 'description' => 'Displays a random post from Arzamath_17th plugin');
        $this->WP_Widget('Arzamath_17th_Widget', 'Arzamath 17th Widget', $widget_ops);
    }

    function form($instance)
    {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
        $title = $instance['title'];
        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat"
        id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>"
        type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
    }

    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        return $instance;
    }

    function widget($args, $instance)
    {
        extract($args, EXTR_SKIP);

        echo $before_widget;
        $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

        query_posts('post_type=post-type-template');
        if ( have_posts() ) :
            while (have_posts()) : the_post();

        ?>
            <ul class="">
                <li><a class="text-warning" href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>
                <li><?php echo the_post_thumbnail(array(70, 70), array('class' => 'alignright') ); ?></li>
                <li><?php echo the_content();?></li>
                <li><a class="btn btn-primary btn-small" href="<?php the_permalink(); ?>">read more:)</a></li>
            </ul>
        <?php

        endwhile;

        endif;

        wp_reset_query();

        echo $after_widget;
    }
}
add_action( 'widgets_init', create_function('', 'return register_widget("Arzamath_17th_Widget");') );?>
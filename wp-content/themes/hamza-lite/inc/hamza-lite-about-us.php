<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * A class to create about us content
 */
class Hamza_Lite_About_Us extends WP_Customize_Control
{

    /**
     * Render the content of about us
     *
     * @return HTML
     */
    public function render_content()
    {
        $hamza_lite_eightdegree_link = esc_url('http://8degreethemes.com');

        $hamza_lite_return = '<p>';
        $hamza_lite_return .= __('Hamza Lite - is a FREE WordPress theme by', 'hamza-lite'); 
        $hamza_lite_return .= '<a target="_blank" href="'.$hamza_lite_eightdegree_link.'">';
        $hamza_lite_return .= __(' 8Degree Themes ', 'hamza-lite');
        $hamza_lite_return .= '</a>'; 
        $hamza_lite_return .= __('- A WordPress Division of 8Degree.', 'hamza-lite');
        $hamza_lite_return .= '</p>';            
        
        $hamza_lite_desc_theme_opt = "<span class='customize-text_editor_desc'>";
        $hamza_lite_desc_theme_opt .= "<strong>".__('Need help?','hamza-lite')."</strong><br />";
        $hamza_lite_desc_theme_opt .= "<span>".__('View documentation','hamza-lite').' : </span> <a target="_blank" href="'.esc_url('http://8degreethemes.com/documentation/hamza-lite/').'">'.__('here','hamza-lite').'</a> <br />';
        $hamza_lite_desc_theme_opt .= "<span>".__('Suggort forum','hamza-lite').' : </span><a target="_blank" href="'.esc_url('http://8degreethemes.com/support/forum/hamza-lite/').'">'.__('here','hamza-lite').'</a> <br />';
        $hamza_lite_desc_theme_opt .= "<span>".__('View Video tutorials','hamza-lite').' : </span><a target="_blank" href="'.esc_url('https://www.youtube.com/watch?list=PLyv2_zoytm1ifr1RwkKCsePhS6v5ynylV&v=HhSeA4TyvXQ').'">'.__('here','hamza-lite').'</a> <br />';
        $hamza_lite_desc_theme_opt .= "<span>".__('Email us','hamza-lite').' : </span><a target="_blank" href="'.esc_url('mailto:support@8degreethemes.com').'">support@8degreethemes.com</a> <br />';
        $hamza_lite_desc_theme_opt .= "<span>".__('More Details','hamza-lite').' : </span><a target="_blank" href="'.esc_url('http://8degreethemes.com/').'">'.__('here','hamza-lite').'</a><br />';

        $hamza_lite_desc_theme_opt .= "<strong>".__('More Themes','hamza-lite')."</strong><br />";
        $hamza_lite_desc_theme_opt .= '<a class="8dt-view-more-themes" target="_blank" href="'.admin_url().'themes.php?page=hamza-lite-themes">'.__('View','hamza-lite').'</a> <br />';

        $hamza_lite_desc_theme_opt .= "<strong>".__('PRO THEMES','hamza-lite')."</strong><br />";
        $hamza_lite_desc_theme_opt .= '<a target="_blank" href="http://8degreethemes.com/wordpress-themes/zincy-pro">'.__('Zincy PRO','hamza-lite').'</a> <br />';

        $hamza_lite_desc_theme_opt .= "<strong>".__('Our Plugins','hamza-lite')."</strong><br />";
        $hamza_lite_desc_theme_opt .= '<a target="_blank" href="'.esc_url('http://8degreethemes.com/wordpress-plugins/8-degree-coming-soon-page/').'">'.__('8Degree Coming Soon Page','hamza-lite').'</a> <br />';
        $hamza_lite_desc_theme_opt .= '<a target="_blank" href="'.esc_url('http://8degreethemes.com/wordpress-plugins/8-degree-notification-bar/').'">'.__('8Degree Notification Bar','hamza-lite').'</a> <br />';
        $hamza_lite_desc_theme_opt .= '<a target="_blank" href="'.esc_url('http://8degreethemes.com/wordpress-plugins/8-degree-availability-calendar/').'">'.__('8Degree Availability Calendar','hamza-lite').'</a> <br />';
        $hamza_lite_desc_theme_opt .= "</span>";


        $hamza_lite_return .= $hamza_lite_desc_theme_opt;
        echo $hamza_lite_return;
    }
}
?>
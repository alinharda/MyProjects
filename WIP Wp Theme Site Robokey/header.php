<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        wp_head();
        
    ?>
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri() . "/assets/img/favicon.ico"?>">
</head>
<body>
    <header>
            <div class="top">
                <div class="menu-icon">
                    
                </div>
                <div class="icon">
                    <?php
                        if(function_exists('the_custom_logo')){    
                            $custom_logo_id = get_theme_mod('custom_logo');
                            $logo = wp_get_attachment_image_src( $custom_logo_id );
                        }
                    ?>
                    <a href=""><img src="<?php echo $logo[0] ?>" alt=""></img></a>
                </div>
            </div>   

            <div id="meniu">       
                <div class="items">       
                    <h1><?php echo "Menu"; ?></h1>       
                    <?php  
                        wp_nav_menu(
                            array(
                                'menu' => 'primary',
                                'container' => '',
                                'theme_location' => 'primary'
                                // 'items_wrap' =>'<ul id="" class="">%3$s</ul>'
                            )
                        );
                    ?>
                </div>
                    <?php
                        dynamic_sidebar( 'sidebar-1' );
                    ?>    
            </div>  
    </header>
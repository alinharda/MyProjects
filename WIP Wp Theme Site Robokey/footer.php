<footer>
    <div class="container">
        <div class="grid col-2">
            <div>
                <p>Copyright Robokey 2022</p>
            </div>
            
            <div id="footer-menu">
                 <?php  
                //   if(wp_get_nav_menu_object('footer-right'));
                  
                    wp_nav_menu(
                        array(
                            'menu' => 'footer-right',
                            'container' => '',
                            'theme_location' => 'footer-right'
                        )
                    );
                ?>   
            </div>
        </div>
    </div>
</footer>
<?php
    wp_footer();
?>
</body>
</html>
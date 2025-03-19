<footer class="site-footer">

<div class="container">
    <div class="copyright">
        <p>Copyright Yll Bytyqi - All Rights Reserved</p>
    </div>
    <nav class="footer-menu">
    <?php 
    wp_nav_menu(
        array('theme_location' => 'ds_theme_footer_menu', 'depth' => 1));
    ?>
</nav>
</div>
</footer>
</body>
</html>
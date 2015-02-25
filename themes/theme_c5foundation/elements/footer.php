<?php  defined('C5_EXECUTE') or die("Access Denied.");
global $c;
global $cp;
$date = Loader::helper('date');
?>

    <footer id="colophon">
        <div class="container">
            <?php
                $a = new Area('Footer');
                $a->display($c);
            ?>

            <p>Copyright &copy; <?php echo $date->getLocalDateTime('now', 'Y'); ?></p>
        </div>
    </footer><!-- footer -->

</div><!-- page -->

<?php  Loader::element('footer_required'); ?>

</body>
</html>

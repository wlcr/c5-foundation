<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('elements/header.php'); 
global $c; 
?>

<div id="main">
    <div class="container">
        <?php
            $a = new Area('Content');
            $a->display($c);
        ?>
    </div>
</div>

<?php  $this->inc('elements/footer.php'); ?>

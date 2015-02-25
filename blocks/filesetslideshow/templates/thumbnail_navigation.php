<?php  defined('C5_EXECUTE') or die("Access Denied."); ?>

<?php  if ($files): ?>

<div class="fileset-slideshow">

  <div class="fileset-slideshow-images">

  <?php for ($i = 0; $i < $count; $i++): ?>
    <?php
      $title = $files[$i]->getTitle();
      $width = $files[$i]->getAttribute('width');
      $height = $files[$i]->getAttribute('height');
      $description = $files[$i]->getDescription();
      $src = $files[$i]->getRelativePath();
    ?>

    <img src="<?php echo $src ?>" title="<?php echo $title ?>" width="<?php echo $width ?>" height="<?php echo $height ?>" id="fileset-slideshow-image-<?php echo $i ?>" />

  <?php endfor ?>

  </div>

  <div class="fileset-slideshow-controls">

    <ul class="fileset-slideshow-captions">

    <?php for ($i = 0; $i < $count; $i++): ?>
      <?php
        $title = $files[$i]->getTitle();
        $description = $files[$i]->getDescription();
      ?>

      <li id="fileset-slideshow-caption-<?php echo $i ?>" class="fileset-slideshow-caption">
        <div class="fileset-slideshow-title"><?php echo $title ?></div>
        <div class="fileset-slideshow-description"><?php echo $description ?></div>
      </li>

    <?php endfor ?>

    </ul>

    <ul class="fileset-slideshow-nav">

      <li class="fileset-slideshow-previous">
        <a href="#">&lt;</a>
      </li>

      <?php for ($i = 0; $i < $count; $i++): ?>
      <li class="fileset-slideshow-nav-item"><a href="#fileset-slideshow-image-<?php echo $i ?>"><?php echo $i + 1 ?></a></li>
      <?php endfor ?>

      <li class="fileset-slideshow-next">
        <a href="#">&gt;</a>
      </li>

    </ul>

  </div>

  <div class="fileset-slideshow-thumbs">
    <ul class="fileset-slideshow-thumbs-list">
      <?php foreach($thumbs as $thumb): ?>
      <li class="fileset-slideshow-thumb-item">
        <a href="#">
          <img src="<?php echo $thumb->src ?>" width="<?php echo $thumb->width ?>" height="<?php echo $thumb->height ?>"  alt="" />
          <span class="overlay"></span>
        </a>
      </li>

      <?php endforeach ?>
    </ul>
    <div class="fileset-slideshow-thumbs-controls">
      <a href="#" class="fileset-slideshow-thumbs-previous">&lt;</a>
      <a href="#" class="fileset-slideshow-thumbs-next">&gt;</a>
    </div>
  </div>


</div>

<?php  endif; ?>

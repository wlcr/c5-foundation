<?php
defined('C5_EXECUTE') or die(_("Access Denied."));

class C5FoundationPackage extends Package {

  protected $pkgHandle = 'c5foundation';
  protected $appVersionRequired = '5.3.0';
  protected $pkgVersion = '1.0';

  public function getPackageDescription() {
    return t("by WEINLANDcreative.");
  }

  public function getPackageName() {
    return t("WEINLANDcreative Foundation");
  }

  public function install() {
    $pkg = parent::install();

    // install fileset_slideshow
    // BlockType::installBlockTypeFromPackage('filesetslideshow', $pkg);

    // Install theme
    // Change this to the name of your theme and change the name of the directory themes/theme_foundation to match
    PageTheme::add('theme_c5foundation', $pkg);

    /* Check if page exists. */
    Loader::model('collection_types');
    $pageType = CollectionType::getByHandle('default');

    /* Addd new page if does not exist. */
    if(!is_object($pageType))	{
      $data['ctHandle'] = 'default';
      $data['ctName'] = t('Default');
      $newPage = CollectionType::add($data, $pkg);
    }
  }
}

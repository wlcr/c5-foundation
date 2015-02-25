<?php
defined('C5_EXECUTE') or die("Access Denied.");

class OneBigPageHelper {
  /*
	public function getChildPages($c) {
    // from AutoNavBlockController::getChildPages()
    $db = Loader::db();

    // Get every first level subpage
    $sql = "SELECT cID from Pages WHERE cParentID = ?
            AND cIsActive = 1
            AND cIsTemplate = 0
            AND cIsSystemPage = 0
            ORDER BY cDisplayOrder ASC";
    $r = $db->query($sql, array($c->getCollectionID()));
    $pages = array();
    while ($row = $r->fetchRow()) {
        $pages[] = Page::getByID($row['cID']);
    }
    return $pages;
  }
  */

  public function getPageList($parent_cID, $filterByExcludeNav = false) {
    // Thanks JordanLev!
    // http://www.concrete5.org/community/forums/customizing_c5/custom-query-counting-number-of-pages-added-after-a-certain-date/
    $parentPage = Page::getByID($parent_cID);
    $parentPath = $parentPage->getCollectionPath();
    Loader::model('page_list');
    $pl = new PageList;
    $pl->filterByPath($parentPath);

    if ($filterByExcludeNav) {
      $pl->filterByExcludeNav(0);
    }
    

    return $pl->get();
  }

  public function getPageBlocks($page_cID, $blockArea) {
    $page = Page::getByID($page_cID, $version="RECENT");
    $blocks = $page->getBlocks($blockArea);
    return $blocks;
  }

  public function renderPageBlocks($page_cID, $blockArea) {
    $blockObjects = $this->getPageBlocks($page_cID, $blockArea);
    foreach ($blockObjects as $block) {
      $block->display();
    }
  }


}

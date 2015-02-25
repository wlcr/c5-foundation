<?php  defined('C5_EXECUTE') or die("Access Denied.");

class FilesetslideshowBlockController extends BlockController {

	protected $btName = 'File Set Slideshow';
	protected $btDescription = 'Creates a slideshow of images in a File Set.  The image title and caption come from the file properties "Title" and "Description".  File properties can be set in the File Manager by clicking on the file and selecting "Properties".';
	protected $btTable = 'btDCFilesetslideshow';

	protected $btInterfaceWidth = "700";
	protected $btInterfaceHeight = "450";

	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;




	public function getFiles() {
		if ($this->field_1_select_value) {
		  $fs = FileSet::getByID($this->field_1_select_value);
		  Loader::model('file_list');
		  Loader::model('file_set');
		  Loader::helper('image');
		  $fl = new FileList();
		  $fl->filterBySet($fs);
		  $fl->sortByFileSetDisplayOrder();
		  $files = $fl->get();
		} else {
		  $files = false;
		}

		return $files;
	}

	function getThumbnails() {
		$im = Loader::helper('image');
		$files = $this->getFiles();
		$thumbs = array();

		if ($files) {
			foreach($files as $image) {
				$thumb = $im->getThumbnail($image, 150, 150, true);
				array_push($thumbs, $thumb);
			}
		}

		return $thumbs;
	}

	public function view() {
		$fileSet = $this->getFiles();
		$fileCount = count($fileSet);
		$this->set('files', $fileSet);
		$this->set('count', $fileCount);
		$this->set('thumbs', $this->getThumbnails());
	}




}

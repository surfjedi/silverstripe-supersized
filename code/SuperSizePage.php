<?php 

class SuperSizePage extends Page {


//for text variables
/*
	Static $db = array(
		'Text1' => 'Text',
		'Text2' => 'Text'
			
	
	
	
	);
*/


// for photos

/*
   public static $has_one = array(
		'Photo' => 'Image',
		'Photo2' => 'Image'
	);

*/

      static $has_many = array (
        'Images' => 'ImageResource'
    );


//for CMS mod
function getCMSFields() { 
		$manager = new ImageDataObjectManager(
		            $this, // Controller
		            'Images', // Source name
		            'ImageResource', // Source class
		            'Attachment', // File name on DataObject
		            array(
		                'Title' => 'Title', 
		                'Caption' => 'Caption'
		            ), // Headings 
		            'getCMSFields_forPopup' // Detail fields
		            // Filter clause
		            // Sort clause
		            // Join clause
		        );
		$fields = parent::getCMSFields(); 
		
		
/*
		$fields->addFieldToTab('Root.Content.FirstCol', new ImageField('Photo', 'First Column Image'));
	
		$fields->addFieldToTab('Root.Content.FirstCol', new HtmlEditorField('Text1', 'First Column Text'));
*/
		
	
						$fields->addFieldToTab("Root.Content.Gallery", new HeaderField("Images for the gallery","2")); 
		$fields->addFieldToTab("Root.Content.Gallery",$manager);
		
		
		
		  
		return $fields; 

	}


}

class SuperSizePage_Controller extends Page_Controller {
	public function init() {
		parent::init();

		// Note: you should use SS template require tags inside your templates 
		// instead of putting Requirements calls here.  However these are 
		// included so that our older themes still work
		/*
Requirements::themedCSS('layout'); 
		Requirements::themedCSS('typography'); 
		Requirements::themedCSS('form'); 
*/
		//Requirements::css("themes/nzproperty/js/fancybox/jquery.fancybox-1.3.4.css");
	
		//Requirements::javascript("themes/nzproperty/js/fancybox/jquery.fancybox-1.3.4.js");
		//Requirements::javascript("themes/nzproperty/js/fancybox/gallery.js");
		Requirements::clear();
		
		//Requirements::css(MODULE_SUPERSIZE_DIR . '/css/supersized.css');

	Requirements::javascript(MODULE_SUPERSIZE_DIR . '/js/jquery.easing.min.js');
			Requirements::javascript(MODULE_SUPERSIZE_DIR . '/js/supersized.3.2.5.min.js');
		Requirements::javascript(MODULE_SUPERSIZE_DIR . '/theme/supersized.shutter.min.js');

	}



}

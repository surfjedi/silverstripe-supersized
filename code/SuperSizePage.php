<?php 

class SuperSizePage extends Page
{


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

      public static $has_many = array(
        'Images' => 'ImageResource'
    );


//for CMS mod
public function getCMSFields()
{
    $fields = parent::getCMSFields();

    $config = GridFieldConfig_RelationEditor::create(10);
    $config->addComponent(new GridFieldSortableRows('SortID'));
        // Set the names and data for our gridfield columns
/*
        $config->getComponentByType('GridFieldDataColumns')->setDisplayFields(array(
            'Images' => 'Images',
            'Title' => 'Title',
            'Attachment' => 'Attachement'
            'Project.Title'=> 'Project' // Retrieve from a has-one relationship
        )); 
*/
        // Create a gridfield to hold the Image relationship    
        $imagesField = new GridField(
            'Images', // Field name
            'ImageResource', // Field title
            $this->Images(), // List of all related images
            $config
        );
        // Create a tab named "gallery" and add our field to it
        $fields->addFieldToTab('Root.Gallery', $imagesField);

        
    
    $fields->addFieldToTab("Root.Content.Gallery", new HeaderField("Images for the gallery", "2"));

        
        
        
          
    return $fields;
}
}

class SuperSizePage_Controller extends Page_Controller
{
    public function init()
    {
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

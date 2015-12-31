<?php 
// /mysite/code/ImageResource.php



//Commented out due to this already being used in tabpage
class ImageResource extends DataObject
{
    public static $db = array(
        'Title' => 'Text',
        'Caption' => 'Text',
        'SortID'=>'Int'
    );
    
    
    
    public static $default_sort='SortID';
    
    public static $has_one = array(
        'Attachment' => 'Image', //Needs to be an image
        'SuperSizePage' => 'SuperSizePage',
        'HomePage' => 'HomePage'

    );
    
    public static $summary_fields = array(
        'Thumbnail'=>'Thumbnail',
        'Title' => 'Title',
        'Caption' => 'Caption'
    );
    
    public function getThumbnail()
    {
        if ($Image = $this->Attachment()->ID) {
            return $this->Attachment()->SetWidth(80);
        } else {
            return '(No Image)';
        }
    }
    
    public function getCMSFields()
    {
        return new Fieldlist(
            new TextField('Title'),
            new TextareaField('Caption'),
            new UploadField('Attachment')
        );
    }
}

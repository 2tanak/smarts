<?php
namespace Modules\Entity\Model\University;

use Modules\Entity\ModelParent;

class UniversitySocial extends ModelParent {
    protected $table = 'university_social';
    protected $fillable = [ 'university_id', 'instagram', 'twitter', 'facebook', 'youtube'];
    
}

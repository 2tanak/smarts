<?php
namespace Modules\Entity\Model\ContentSetting;

use Modules\Entity\ModelParent;

class ContentSetting extends ModelParent {
    protected $table = 'content_setting';
    protected $fillable = [ 'twitter', 'insta', 'facebook', 'youtube', 'meta_note', 'rel_user_id', 'meta_key_word', 'meta_note_ar', 'meta_key_word_ar'];
    
    function getMetaNote($lang){
        $ar = (array)json_decode($this->meta_note);
        if (!isset($ar[$lang]))
            return '';

        return $ar[$lang];
    }

    function getMetaNoteTr(){
        return $this->getMetaNote($this->lang);
    }
    
    function getMetaKeyWord($lang){
        $ar = (array)json_decode($this->meta_key_word);
        if (!isset($ar[$lang]))
            return '';

        return $ar[$lang];
    }

    function setMetaNoteArAttribute($ar){
        if ($ar && is_array($ar) && isset($ar['ru']) && isset($ar['en']))
            $this->attributes['meta_note'] = json_encode([
                'ru' => $ar['ru'],
                'en' => $ar['en']
            ]);

    }

    
    function setMetaKeyWordArAttribute($ar){
        if ($ar && is_array($ar) && isset($ar['ru']) && isset($ar['en']))
            $this->attributes['meta_key_word'] = json_encode([
                'ru' => $ar['ru'],
                'en' => $ar['en']
            ]);
    }

    function getMetaKeyWordTr(){
        return $this->getMetaKeyWord($this->lang);
    }

    function relRequirement(){
        return $this->belongsTo('Modules\Entity\Model\LibRequirement\LibRequirement', 'requirement_id');
    }
}

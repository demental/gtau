<?php
class Module_Preferences extends Module {
  public function getCacheId($action)
  {
    return false;
  }
  public function doExecIndex()
  {
    $prefs = array();
    $fbs = array();
    $pref = DB_DataObject::factory('preferences');
    $pref->find();
    $form = new HTML_QuickForm('prefform','POST',M_Office_Util::getQueryParams(array()));

    $pref->fb_createSubmit=false;
    while($pref->fetch()) {
      $prefs[$pref->id]=clone($pref);
      $prefs[$pref->id]->fb_elementNamePrefix = $pref->id.'_';
      $prefs[$pref->id]->fb_addFormHeader = false;
      $fbs[$pref->id]=MyFB::create($prefs[$pref->id]);
      $fbs[$pref->id]->useForm($form);
      $fbs[$pref->id]->getForm();
      $pref->unloadPlugins();
    }
    $form->addElement('submit','__submit__','Enregistrer les modifications');
    if($form->validate()) {
      foreach($fbs as $fb) {
        $form->process(array($fb,'processForm'),false);
      }
    }
    $this->assignRef('form',$form);
  }
  public function doExecAdd()
  {
    $p = DB_DataObject::factory('preferences');
    $p->fb_fieldsToRender = $p->fb_userEditableFields = array('type','var','description','section');
    $form = new HTML_QuickForm('prefform','post',M_Office_Util::getQueryParams());
    $fb = MyFB::create($p);
    $fb->useForm($form);
    $fb->getForm();
    if($form->validate()) {
      $form->process(array($fb,'processForm'),false);
      M_Office_Util::refresh(M_Office_Util::getQueryParams(array(),array('action')));
    }
    $this->assignRef('form',$form);
  }
}


?>
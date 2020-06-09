<?php

namespace Framework;

// Permet de définir quel form il faut construire. //
class FormHandler
{
    protected $form;
    protected $manager;
    protected $request;

    public function __construct(Form $form, Manager $manager, HTTPRequest $request)
    {
        $this->setForm($form);
        $this->setManager($manager);
        $this->setRequest($request);
    }

    public function processModificationPosts()
    {
        if($this->request->method() == 'POST' && $this->form->isValid())
        {
            $this->manager->modificationMyPosts($this->form->entity());

            return true;
        }

        return false;
    }

    public function processAddPosts() {

        if($this->request->method() == 'POST' && $this->form->isValid()) {

            $this->manager->addMyPosts($this->form->entity());

            return true;
        }
        
        return false;
    }

    public function processModificationComments()
    {
        if($this->request->method() == 'POST' && $this->form->isValid())
        {
            $this->manager->modificationMyComments($this->form->entity());

            return true;
        }

        return false;
    }

    public function processAddComments()
    {
        if($this->request->method() == 'POST' && $this->form->isValid())
        {
            $this->manager->addMyComments($this->form->entity());

            return true;
        }
        
        return false;
    }

    public function processAddPrivateMessages() {

        if($this->request->method() == 'POST' && $this->form->isValid())
        {
            $this->manager->addMyPrivateMessages($this->form->entity());

            return true;
        }
        
        return false;
    }

    public function processRegistrationUsers()
    {
        if($this->request->method() == 'POST' && $this->form->isValid())
        {
            $this->manager->registrationUsers($this->form->entity());

            return true;
        }
        
        return false;
    }

    public function processModificationUsersPassword() {

        if($this->request->method() == 'POST')
        {
            $this->manager->modificationMyUsersPassword($this->form->entity());

            return true;
        }

        return false;
    }

    public function processNewUsersPassword() {

        if($this->request->method() == 'POST')
        {
            $this->manager->confirmationModificationUsersPassword($this->form->entity());

            return true;
        }

        return false;
    }

    public function processAdminModificationUsers() {

        if($this->request->method() == 'POST') {
            
            $this->manager->adminModificationUsers($this->form->entity());

            return true;
        }
        
        return false;
    }

    public function processAdminModificationPosts() {

        if($this->request->method() == 'POST') {
            
            $this->manager->adminModificationPosts($this->form->entity());

            return true;
        }
        
        return false;
    }

    public function processAdminModificationComments() {

        if($this->request->method() == 'POST') {
            
            $this->manager->adminModificationComments($this->form->entity());

            return true;
        }
        
        return false;
    }

    public function setForm(Form $form)
    {
        $this->form = $form;
    }

    public function setManager(Manager $manager)
    {
        $this->manager = $manager;
    }

    public function setRequest(HTTPRequest $request)
    {
        $this->request = $request;
    }

}

?>
<?php

namespace App\Frontend\Modules\Profiles;

use \Framework\BackController;
use \Framework\HTTPRequest;

// Lié a la classe BackController.php. //
class ProfilesController extends BackController {
    
    public function executeIndex(HTTPRequest $request) {

        $this->page->addVar('title', 'Profile');
        $this->page->addVar('layout', 'connectedLayout');
        
        $users = $this->app->user()->user();

        $friends_request_idFK = $users['users_id'];
        $friends_receive = $request->getData('profiles_users_id');

        $users_profiles = $this->managers->getManagerOf('Users')->getUsersProfiles($request->getData('profiles_users_id'));
        $countPosts = $this->managers->getManagerOf('Posts')->countMyPosts($request->getData('profiles_users_id'));
        $countComments =  $this->managers->getManagerOf('Comments')->countMyComments($request->getData('profiles_users_id'));

        $this->page->addVar('users', $users);
        $this->page->addVar('users_profiles', $users_profiles);
        $this->page->addVar('countPosts', $countPosts);
        $this->page->addVar('countComments', $countComments);
    }

}

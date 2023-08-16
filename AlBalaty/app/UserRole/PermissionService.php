<?php


namespace App\UserRole;


use App\Models\Auth\Page;
use App\Models\Auth\Permission;
use App\Models\Auth\PageAdmin;
use Illuminate\Support\Facades\Auth;

class PermissionService
{
    /**
     * return page object or die
     *
     * @param $page
     * @return bool
     * @return Page
     */
    public function page($page){
        $page = Page::where('page', $page)->first();
        if($page){
            return $page;
        }
        return false;
    }

    /**
     * return permission object or die
     * @param $permission_
     * @return bool
     * @return Permission
     */

    public function permission($permission_){
        $permission = Permission::where('title', $permission_)->first();
        if($permission){
            return $permission;
        }
        return false;
    }
    /**
     *
     * check if the user has access to some page and permissions on that page
     *
     * @param $page_name
     * @param $permission_title
     * @return bool
     */

    public function hasPermission($page_name, $permission_title){

        if(in_array($permission_title, ['add', 'read'])){
            return true;
        }

        $permission = $this->permission($permission_title);
        if(!$permission){
            return false;
        }

        $page = $this->page($page_name);
        if(!$page){
            return false;
        }
        return Auth::user()->page_admin()
            ->where('page_id', $page->id)
            ->where('permission_id', $permission->id)
            ->where('is_granted',1)->first() ? true : false;
    }

    /**
     * attach new permission to user
     * @param $page_name
     * @param $permission_title
     * @return bool
     */

    public function addPermission($page_name, $permission_title){
        if($this->hasPermission($page_name, $permission_title)){
            return true;
        }

        $permission = $this->permission($permission_title);
        if(!$permission){
            return false;
        }

        $page = $this->page($page_name);
        if(!$page){
            return false;
        }


        $new_permission = new PageAdmin;
        $new_permission->page_id = $page->id;
        $new_permission->permission_id = $permission->id;
        $new_permission->is_granted = 1;

        Auth::user()->page_admin()->save($new_permission) ? true : false;
    }

    /**
     * remove permission from user
     * @param $page_name
     * @param $permission_title
     * @return bool
     */
    public function deletePermission($page_name, $permission_title){
        if(!$this->hasPermission($page_name, $permission_title)){
            return true;
        }

        $permission = $this->permission($permission_title);
        if(!$permission){
            return false;
        }

        $page = $this->page($page_name);
        if(!$page){
            return false;
        }

        $set_permission = PageAdmin::where('user_id', Auth::user()->id)
            ->where('page_id', $page->id)
            ->where('permission_id', $permission->id)
            ->first();
        $set_permission->is_granted = 0;
        $set_permission->save();
        return true;

    }

}

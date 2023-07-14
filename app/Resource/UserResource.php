<?php

namespace App\Resource;
use Illuminate\Support\Facades\DB;

class UserResource
{
    public function AuthUser(){
        $user = auth()->user();

        $checkRoleUsers = DB::table('role_user')
        ->select('role.id as roleId', 'role.name as roleName')
        ->leftJoin('roles as role', 'role_user.role_id', 'role.id')
        ->where('user_id', $user->id)
        ->get();
        $roleUsers = $checkRoleUsers->pluck('roleName');


        $permissionRoles = DB::table('permission_role')
        ->select('permission.name as permissionName')
        ->leftJoin('permissions as permission', 'permission.id', 'permission_role.permission_id')
        ->whereIn('permission_role.role_id', $checkRoleUsers->pluck('roleId'))
        ->groupBy('permission_role.permission_id')
        ->get()->pluck('permissionName');

        return [
            'user' => $user,
            'roleUser' => $roleUsers,
            'permissionRole' => $permissionRoles
        ];
    }
}

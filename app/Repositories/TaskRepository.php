<?php
/**
 * Created by PhpStorm.
 * User: ЖАкинС
 * Date: 16.06.2016
 * Time: 20:06
 */
namespace App\Repositories;
use \App\User;
class TaskRepository
{
    public  function forUser(User $user )
    {
        return $user->tasks()
            ->orderBy('created_at','asc')
            -get();
    }
}
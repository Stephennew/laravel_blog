<?php

namespace App\Policies;

use App\Model\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //这个授权策略     用于判断非该文章的作者不能修改该文章
    public function update(User $user,Post $post)
    {
        return $user->id == $post->authorid;
    }
}

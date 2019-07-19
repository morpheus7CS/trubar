<?php

namespace Wewowweb\Trubar\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Wewowweb\Trubar\Models\TrubarPost;
use Wewowweb\Trubar\Models\TrubarUser;

class TrubarPostPolicy
{
    use HandlesAuthorization;

    public function update(TrubarUser $user, TrubarPost $post)
    {
        return $post->author->id === $user->id;
    }
}

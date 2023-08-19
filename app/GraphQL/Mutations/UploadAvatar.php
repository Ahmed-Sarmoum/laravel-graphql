<?php

namespace App\GraphQL\Mutations;

use App\Models\User;

final class UploadAvatar
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $avatar = $args['image'];
        $path = $avatar->storePublicly('public/uploads');
        $user = User::find($args['id']);

        $user->update(['avatar' => $path]);
        return $user;
    }
}

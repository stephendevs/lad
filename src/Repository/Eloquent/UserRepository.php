<?php
namespace Stephendevs\Lad\Repository\Eloquent;

use Stephendevs\Lad\Repository\Eloquent\BaseRepository;
use Stephendevs\Lad\Repository\UserRepositoryInterface;
use App\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

}
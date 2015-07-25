<?php
/**
 * Created by PhpStorm.
 * User: Paulo
 * Date: 22/07/2015
 * Time: 23:24
 */

namespace CodeProject\Repositories;


use CodeProject\Entities\Client;
use Prettus\Repository\Eloquent\BaseRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    public function model()
    {
        return Client::class;
    }
}
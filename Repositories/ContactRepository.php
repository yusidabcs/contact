<?php namespace Modules\Contact\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface ContactRepository extends BaseRepository
{
    public function main();

    public function pendingMessage();
}

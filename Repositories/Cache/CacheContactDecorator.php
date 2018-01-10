<?php namespace Modules\Contact\Repositories\Cache;

use Modules\Contact\Repositories\ContactRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheContactDecorator extends BaseCacheDecorator implements ContactRepository
{
    public function __construct(ContactRepository $contact)
    {
        parent::__construct();
        $this->entityName = 'contact.contacts';
        $this->repository = $contact;
    }

    public function main()
    {

        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.main", $this->cacheTime,
                function () {
                    return $this->repository->main();
                }
            );

    }

    public function pendingMessage()
    {
        return $this->repository->pendingMessage();
    }
}

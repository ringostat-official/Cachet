<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Bus\Handlers\Commands\Perpetrator;
use CachetHQ\Cachet\Bus\Commands\Perpetrator\CreatePerpetratorCommand;
use CachetHQ\Cachet\Bus\Handlers\Traits\StoresMeta;
use CachetHQ\Cachet\Models\Perpetrator;
use CachetHQ\Cachet\Services\Dates\DateFactory;
use Illuminate\Contracts\Auth\Guard;
/**
 * This is the create incident command handler.
 *
 * @author James Brooks <james@alt-three.com>
 */
class CreatePerpetratorCommandHandler
{
    use StoresMeta;

    /**
     * The authentication guard instance.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * The date factory instance.
     *
     * @var \CachetHQ\Cachet\Services\Dates\DateFactory
     */
    protected $dates;

    /**
     * Create a new create incident command handler instance.
     *
     * @param \Illuminate\Contracts\Auth\Guard            $auth
     * @param \CachetHQ\Cachet\Services\Dates\DateFactory $dates
     *
     * @return void
     */
    public function __construct(Guard $auth, DateFactory $dates)
    {
        $this->auth = $auth;
        $this->dates = $dates;
    }

    /**
     * Handle the create incident command.
     *
     * @param \CachetHQ\Cachet\Bus\Commands\Perpetrator\CreatePerpetratorCommand $command
     *
     * @return \CachetHQ\Cachet\Models\Incident
     */
    public function handle(CreatePerpetratorCommand $command)
    {
        $data = [
            'name'     => $command->name,
        ];

        // Create the perpetrator
        $perpetrator = Perpetrator::create($data);
        return $perpetrator;
    }
}

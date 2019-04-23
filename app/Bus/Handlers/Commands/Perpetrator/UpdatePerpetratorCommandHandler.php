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
use CachetHQ\Cachet\Bus\Commands\Perpetrator\UpdatePerpetratorCommand;
use CachetHQ\Cachet\Bus\Handlers\Traits\StoresMeta;
use CachetHQ\Cachet\Services\Dates\DateFactory;
use Illuminate\Contracts\Auth\Guard;

/**
 * This is the update perpetrator command handler.
 *
 * @author James Brooks <james@alt-three.com>
 */
class UpdatePerpetratorCommandHandler
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
     * Create a new update perpetrator command handler instance.
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
     * Handle the update perpetrator command.
     *
     * @param \CachetHQ\Cachet\Bus\Commands\Perpetrator\UpdatePerpetratorCommand $command
     *
     * @return \CachetHQ\Cachet\Models\perpetrator
     */
    public function handle(UpdatePerpetratorCommand $command)
    {

        $perpetrator = $command->perpetrator;
        $perpetrator->fill($this->filter($command));
        $perpetrator->save();
        return $perpetrator;
    }

    /**
     * Filter the command data.
     *
     * @param \CachetHQ\Cachet\Bus\Commands\Perpetrator\UpdatePerpetratorCommand $command
     *
     * @return array
     */
    protected function filter(UpdatePerpetratorCommand $command)
    {
        $params = [
            'name'             => $command->name,
        ];
        return array_filter($params, function ($val) {
            return $val !== null;
        });
    }

}

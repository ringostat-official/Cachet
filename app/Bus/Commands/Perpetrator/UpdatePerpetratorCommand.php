<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Bus\Commands\Perpetrator;

use CachetHQ\Cachet\Models\Perpetrator;

/**
 * This is the update incident command.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Joseph Cohem <joe@alt-three.com>
 * @author Graham Campbell <graham@alt-three.com>
 */
final class UpdatePerpetratorCommand
{
    /**
     * The incident to update.
     *
     * @var \CachetHQ\Cachet\Models\Perpetrator
     */
    public $perpetrator;

    /**
     * The incident name.
     *
     * @var string
     */
    public $name;

    public $rules = [
        'name'             => 'nullable|string',
    ];

    /**
     * Create a new update incident command instance.
     *
     * @param \CachetHQ\Cachet\Models\Perpetrator $perpetrator
     * @param string                           $name
     * @return void
     */
    public function __construct(Perpetrator $perpetrator, $name)
    {
        $this->perpetrator = $perpetrator;
        $this->name = $name;
    }
}

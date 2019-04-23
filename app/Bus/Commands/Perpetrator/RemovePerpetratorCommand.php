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

final class RemovePerpetratorCommand
{
    /**
     * The perpetrator to remove.
     *
     * @var \CachetHQ\Cachet\Models\Perpetrator
     */
    public $perpetrator;

    /**
     * Create a new remove incident command instance.
     *
     * @param \CachetHQ\Cachet\Models\Perpetrator $perpetrator
     *
     * @return void
     */
    public function __construct(Perpetrator $perpetrator)
    {
        $this->perpetrator = $perpetrator;
    }
}

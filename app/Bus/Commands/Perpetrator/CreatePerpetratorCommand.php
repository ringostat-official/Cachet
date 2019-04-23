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

/**
 * This is the create perpetrator command.
 *
 * @author Joseph Cohen <joe@alt-three.com>
 * @author James Brooks <james@alt-three.com>
 */
final class CreatePerpetratorCommand
{
    /**
     * The perpetrator name.
     *
     * @var string
     */
    public $name;
    
    public $rules = [
        'name'             => 'required|string',
    ];

    /**
     * Create a new create perpetrator command instance.
     *
     * @param string      $name
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }
}

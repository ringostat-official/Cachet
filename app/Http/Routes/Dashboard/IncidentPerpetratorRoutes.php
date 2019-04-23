<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Http\Routes\Dashboard;

use Illuminate\Contracts\Routing\Registrar;

/**
 * This is the dashboard incident routes class.
 *
 * @author James Brooks <james@alt-three.com>
 * @author Connor S. Parks <connor@connorvg.tv>
 */
class IncidentPerpetratorRoutes
{
    /**
     * Defines if these routes are for the browser.
     *
     * @var bool
     */
    public static $browser = true;

    /**
     * Define the dashboard incident routes.
     *
     * @param \Illuminate\Contracts\Routing\Registrar $router
     *
     * @return void
     */
    public function map(Registrar $router)
    {
        $router->group([
            'middleware' => ['auth'],
            'namespace'  => 'Dashboard',
            'prefix'     => 'dashboard/perpetrators',
        ], function (Registrar $router) {
            $router->get('/', [
                'as'   => 'get:dashboard.perpetrators',
                'uses' => 'IncidentPerpetratorController@showIncidentPerpetrator',
            ]);

            $router->get('create', [
                'as'   => 'get:dashboard.perpetrators.create',
                'uses' => 'IncidentPerpetratorController@showAddIncidentPerpetrator',
            ]);
            $router->post('create', [
                'as'   => 'post:dashboard.perpetrators.create',
                'uses' => 'IncidentPerpetratorController@createIncidentPerpetratorAction',
            ]);

            $router->get('{perpetrator}', [
                'as'   => 'get:dashboard.perpetrators.edit',
                'uses' => 'IncidentPerpetratorController@showEditIncidentPerpetratorAction',
            ]);
            $router->post('{perpetrator}', [
                'as'   => 'post:dashboard.perpetrators.edit',
                'uses' => 'IncidentPerpetratorController@editIncidentPerpetratorAction',
            ]);
            $router->delete('{perpetrator}', [
                'as'   => 'delete:dashboard.perpetrators.delete',
                'uses' => 'IncidentPerpetratorController@deleteIncidentPerpetratorAction',
            ]);
        });
    }
}

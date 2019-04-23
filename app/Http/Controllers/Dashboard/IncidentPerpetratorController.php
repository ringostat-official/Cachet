<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Http\Controllers\Dashboard;

use AltThree\Validator\ValidationException;
use CachetHQ\Cachet\Bus\Commands\Perpetrator\CreatePerpetratorCommand;
use CachetHQ\Cachet\Bus\Commands\Perpetrator\UpdatePerpetratorCommand;
use CachetHQ\Cachet\Bus\Commands\Perpetrator\RemovePerpetratorCommand;
use CachetHQ\Cachet\Integrations\Contracts\System;
use CachetHQ\Cachet\Models\Component;
use CachetHQ\Cachet\Models\ComponentGroup;
use CachetHQ\Cachet\Models\Perpetrator;
use CachetHQ\Cachet\Models\IncidentTemplate;
use GrahamCampbell\Binput\Facades\Binput;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;

/**
 * This is the incident controller.
 *
 * @author James Brooks <james@alt-three.com>
 */
class IncidentPerpetratorController extends Controller
{
    /**
     * Stores the sub-sidebar tree list.
     *
     * @var array
     */
    protected $subMenu = [];

    /**
     * The guard instance.
     *
     * @var \Illuminate\Contracts\Auth\Guard
     */
    protected $auth;

    /**
     * The system instance.
     *
     * @var \CachetHQ\Cachet\Integrations\Contracts\System
     */
    protected $system;

    /**
     * Creates a new incident controller instance.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
     *
     * @return void
     */
    public function __construct(Guard $auth, System $system)
    {
        $this->auth = $auth;
        $this->system = $system;

        View::share('subTitle', trans('dashboard.incidents_perpetrator.title'));
    }

    /**
     * Shows the incidents_perpetrator view.
     *
     * @return \Illuminate\View\View
     */
    public function showIncidentPerpetrator()
    {
        $incidents_perpetrator = Perpetrator::all();

        return View::make('dashboard.incidents_perpetrator.index')
            ->withPageTitle(trans('dashboard.incidents_perpetrator.incidents_perpetrator').' - '.trans('dashboard.dashboard'))
            ->withPerpetrators($incidents_perpetrator);
    }

    /**
     * Shows the add incident view.
     *
     * @return \Illuminate\View\View
     */
    public function showAddIncidentPerpetrator()
    {
        return View::make('dashboard.incidents_perpetrator.add')
            ->withPageTitle(trans('dashboard.incidents_perpetrator.add.title').' - '.trans('dashboard.dashboard'));
    }

    /**
     * Creates a new incident.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createIncidentPerpetratorAction()
    {
        try {
            $perpetrator = execute(new CreatePerpetratorCommand(
                Binput::get('name')
            ));
        } catch (ValidationException $e) {
            return cachet_redirect('dashboard.perpetrators.create')
                ->withInput(Binput::all())
                ->withTitle(sprintf('%s %s', trans('dashboard.notifications.whoops'), trans('dashboard.incidents_perpetrator.add.failure')))
                ->withErrors($e->getMessageBag());
        }

        return cachet_redirect('dashboard.perpetrators')
            ->withSuccess(sprintf('%s %s', trans('dashboard.notifications.awesome'), trans('dashboard.incidents_perpetrator.add.success')));
    }

    /**
     * Deletes a given incident.
     *
     * @param \CachetHQ\Cachet\Models\Perpetrator $perpetrator
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteIncidentPerpetratorAction(Perpetrator $perpetrator)
    {
        execute(new RemovePerpetratorCommand($perpetrator));

        return cachet_redirect('dashboard.perpetrators')
            ->withSuccess(sprintf('%s %s', trans('dashboard.notifications.awesome'), trans('dashboard.incidents_perpetrator.delete.success')));
    }

    /**
     * Shows the edit incident view.
     *
     * @param \CachetHQ\Cachet\Models\Perpetrator $perpetrator
     *
     * @return \Illuminate\View\View
     */
    public function showEditIncidentPerpetratorAction(Perpetrator $perpetrator)
    {
        return View::make('dashboard.incidents_perpetrator.edit')
            ->withPageTitle(trans('dashboard.incidents_perpetrator.edit.title').' - '.trans('dashboard.dashboard'))
            ->withPerpetrator($perpetrator);
    }

    /**
     * Edit an incident.
     *
     * @param \CachetHQ\Cachet\Models\Perpetrator $perpetrator
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editIncidentPerpetratorAction(Perpetrator $perpetrator)
    {
        try {
            $perpetrator = execute(new UpdatePerpetratorCommand(
                $perpetrator,
                Binput::get('name')
            ));
        } catch (ValidationException $e) {
            return cachet_redirect('dashboard.perpetrators.edit', ['id' => $perpetrator->id])
                ->withInput(Binput::all())
                ->withTitle(sprintf('%s %s', trans('dashboard.notifications.whoops'), trans('dashboard.incidents_perpetrator.templates.edit.failure')))
                ->withErrors($e->getMessageBag());
        }

        return cachet_redirect('dashboard.perpetrators.edit', ['id' => $perpetrator->id])
            ->withSuccess(sprintf('%s %s', trans('dashboard.notifications.awesome'), trans('dashboard.incidents_perpetrator.edit.success')));
    }
}

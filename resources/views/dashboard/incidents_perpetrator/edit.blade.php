@extends('layout.dashboard')

@section('content')
<div class="header">
    <div class="sidebar-toggler visible-xs">
        <i class="ion ion-navicon"></i>
    </div>
    <span class="uppercase">
        <i class="ion ion-ios-information-outline"></i> {{ trans('dashboard.incidents_perpetrator.incidents_perpetrator') }}
    </span>
    &gt; <small>{{ trans('dashboard.incidents_perpetrator.edit.title') }}</small>
</div>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            @include('partials.errors')
            <form class="form-vertical" name="IncidentPerpetratorForm" role="form" method="POST" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <fieldset>
                    <div class="form-group">
                        <label for="incident-name">{{ trans('forms.incidents_perpetrator.name') }}</label>
                        <input type="text" class="form-control" name="name" id="incident-name" required value="{{$perpetrator->name}}" placeholder="{{ trans('forms.incidents_perpetrator.name') }}">
                    </div>
                </fieldset>

                <div class="form-group">
                    <div class="btn-group">
                        <button type="submit" class="btn btn-success">{{ trans('forms.update') }}</button>
                        <a class="btn btn-default" href="{{ cachet_route('dashboard.perpetrators') }}">{{ trans('forms.cancel') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@extends('layout.dashboard')

@section('content')
<div class="header">
    <div class="sidebar-toggler visible-xs">
        <i class="ion ion-navicon"></i>
    </div>
    <span class="uppercase">
        <i class="ion ion-ios-information-outline"></i> {{ trans('dashboard.incidents_perpetrator.incidents_perpetrator') }}
    </span>
    &gt; <small>{{ trans('dashboard.incidents_perpetrator.add.title') }}</small>
</div>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12">
            @include('partials.errors')
            <report-incident inline-template>
                <form class="form-vertical" name="IncidentPerpetratorForm" role="form" method="POST" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <fieldset>
                        <div class="form-group">
                            <label for="incident-name">{{ trans('forms.incidents_perpetrator.name') }}</label>
                            <input type="text" class="form-control" name="name" id="incident-name" required value="{{ Binput::old('name') }}" placeholder="{{ trans('forms.incidents_perpetrator.name') }}" v-model="name">
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-success">{{ trans('forms.add') }}</button>
                            <a class="btn btn-default" href="{{ cachet_route('dashboard.perpetrators') }}">{{ trans('forms.cancel') }}</a>
                        </div>
                    </div>
                </form>
            </report-incident>
        </div>
    </div>
</div>
@stop

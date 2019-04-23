@extends('layout.dashboard')

@section('content')
<div class="content-panel">
    @includeWhen(isset($subMenu), 'dashboard.partials.sub-sidebar')
    <div class="content-wrapper">
        <div class="header sub-header">
            <span class="uppercase">
                <i class="ion ion-ios-information-outline"></i> {{ trans('dashboard.incidents_perpetrator.incidents_perpetrator') }}
            </span>
            <a class="btn btn-md btn-success pull-right" href="{{ cachet_route('dashboard.perpetrators.create') }}">
                {{ trans('dashboard.incidents_perpetrator.add.title') }}
            </a>
            <div class="clearfix"></div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('partials.errors')
                <div class="striped-list">
                    @foreach($perpetrators as $perpetrator)
                        <div class="row striped-list-item">
                            <div class="col-md-6">
                                <strong>{{ $perpetrator->name }}</strong>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ cachet_route('dashboard.perpetrators.edit', [$perpetrator->id]) }}" class="btn btn-default">{{ trans('forms.edit') }}</a>
                                <a href="{{ cachet_route('dashboard.perpetrators.delete', [$perpetrator->id], 'delete') }}" class="btn btn-danger confirm-action" data-method='DELETE'>{{ trans('forms.delete') }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop

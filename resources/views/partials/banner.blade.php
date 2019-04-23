@if($appHeader)
{!! $appHeader !!}
@else
@if($appBanner)
<div @if($appBannerStyleFullWidth)class="app-banner"@endif>
    <div class="container">
        <div class="row app-banner-padding  @if(!$appBannerStyleFullWidth) app-banner @endif">
                <div class="col-sm-12">
                    @if($appDomain)
                    <a href="{{ $appDomain }}" class="links"><img src="data:{{ $appBannerType }};base64, {{ $appBanner }}" class="banner-image img-responsive"></a>
                    @else
                    <img src="data:{{ $appBannerType }};base64, {{ $appBanner }}" class="banner-image img-responsive">
                    @endif
                    @if(Request::url() === cachet_route('subscribe'))
                        <a href="{{ cachet_route('status-page') }}" class="btn btn-success btn-outline pull-right"><i class="ion ion-home"></i></a></p>
                    @else
                    @if($enableSubscribers)
                        <a class="btn btn-success btn-outline pull-right" href="{{ cachet_route('subscribe') }}">{{ trans('cachet.subscriber.button') }}</a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
@endif
@endif

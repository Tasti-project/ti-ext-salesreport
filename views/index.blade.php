<div class="row-fluid">
    {!! $this->renderList() !!}


    @if(!empty($gross_total['total']))

        <div class="row">
            <div class="col-lg-4">
                <div class="paper" >
                    <h2>Summary</h2>
                    <hr>
                @if(!empty($gross_total['subtotal']))
                <div class="d-flex justify-content-between">
                    <h5>@lang('lang:tasti.salesreport::default.text_order_subtotal')</h5>
                    <h5>{{ currency_format($gross_total['subtotal']) }}</h5>
                </div>
                @endif
                <hr>
                @if(!empty($gross_total['payment_fee']))
                <div class="d-flex justify-content-between text-muted">
                    <h5>@lang('lang:tasti.salesreport::default.text_payment_fee')</h5>
                    <h5>{{ currency_format($gross_total['payment_fee']) }}</h5>
                </div>
                @endif
                @if(!empty($gross_total['tax']))
                <div class="d-flex justify-content-between text-muted">
                    <h5>@lang('lang:tasti.salesreport::default.text_tax')</h5>
                    <h5>{{ currency_format($gross_total['tax']) }}</h5>
                </div>
                @endif
                <hr>
                @if(!empty($gross_total['total']))
                <div class="d-flex justify-content-between">
                    <h5>@lang('lang:tasti.salesreport::default.text_order_total')</h5>
                    <h5>{{ currency_format($gross_total['total']) }}</h5>
                </div>
                @endif
            </div>


        </div>
        @if(!empty($payments))
        <div class="col-lg-4">
            <div class="paper" >
                <h2>Payment Methods</h2>
                <hr>
            @foreach($payments as $code => $total)
            <div class="d-flex justify-content-between text-muted">
                <h5>{{ $code }}</h5>
                <h5>{{ currency_format($total) }}</h5>
            </div>
            @endforeach
            <hr>
            @if(!empty($gross_total['total']))
            <div class="d-flex justify-content-between">
                <h5>@lang('lang:tasti.salesreport::default.text_total')</h5>
                <h5>{{ currency_format($gross_total['total']) }}</h5>
            </div>
            @endif
        </div>
        @endif
    </div>
    @endif

</div>


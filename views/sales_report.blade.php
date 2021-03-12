<table>
    @if(!empty($columns))
    <thead>
    <tr>
        @foreach($columns as $col)
        <th>{{$col}}</th>
        @endforeach
    </tr>
    </thead>
    @endif
    <tbody>
    @foreach($records as $record)
        <tr>
            <td>{{ $record->order_id }}</td>
            <td>{{ $record->location->location_name }}</td>
            <td>{{ $record->first_name.' '.$record->last_name }}</td>
            <td>{{ $record->order_type_name }}</td>
            <td>{{ $record->order_date }}</td>
            <td>{{ $record->order_time }}</td>
            <td>{{ $record->status_name }}</td>
            <td>{{ $record->subtotal }}</td>
            <td>{{ $record->paymentFee }}</td>
            <td>{{ $record->tax }}</td>
            <td>{{ $record->order_total }}</td>
            <td>{{ $record->date_added }}</td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr><td colspan="{{ count($columns)}}"></td></tr>
        <tr><td colspan="{{ count($columns)}}"></td></tr>
        <tr><td colspan="{{ count($columns)}}"></td></tr>
        <tr>
            <td colspan="{{ count($columns) -1}}" align="right" style="font-size: 14px; font-weight: bold">@lang('lang:tasti.salesreport::default.text_order_subtotal')</td>
            <td align="right" style="font-size: 14px; font-weight: bold">{{ $gross['subtotal'] }}</td>
        </tr>
        <tr>
            <td colspan="{{ count($columns) -1}}" align="right" style="font-size: 14px; font-weight: bold">@lang('lang:tasti.salesreport::default.text_payment_fee')</td>
            <td align="right" style="font-size: 14px; font-weight: bold">{{ $gross['payment_fee'] }}</td>
        </tr>
        <tr>
            <td colspan="{{ count($columns) -1}}" align="right" style="font-size: 14px; font-weight: bold">@lang('lang:tasti.salesreport::default.text_tax')</td>
            <td align="right" style="font-size: 14px; font-weight: bold">{{ $gross['tax'] }}</td>
        </tr>
        <tr>
            <td colspan="{{ count($columns) -1}}" align="right" style="font-size: 14px; font-weight: bold">@lang('lang:tasti.salesreport::default.text_order_total')</td>
            <td align="right" style="font-size: 14px; font-weight: bold">{{ $gross['total'] }}</td>
        </tr>
    </tfoot>
</table>

<?php
$config['list']['filter'] = [
    'search' => [
        'prompt' => 'lang:tasti.salesreport::default.text_filter_search',
        'mode' => 'all',
    ],
    'scopes' => [
        'location' => [
            'label' => 'lang:tasti.salesreport::default.text_filter_location',
            'type' => 'select',
            'conditions' => 'location_id = :filtered',
            'modelClass' => 'Admin\Models\Locations_model',
            'nameFrom' => 'location_name',
            'locationAware' => 'hide',
        ],
        // 'status' => [
        //     'label' => 'lang:tasti.salesreport::default.text_filter_status',
        //     'type' => 'select',
        //     'conditions' => 'status_id = :filtered',
        //     'modelClass' => 'Admin\Models\Statuses_model',
        //     'options' => 'getDropdownOptionsForOrder',
        // ],
        'type' => [
            'label' => 'lang:tasti.salesreport::default.text_filter_order_type',
            'type' => 'select',
            'conditions' => 'order_type = :filtered',
            'options' => [
                'dinein' => 'lang:tasti.salesreport::default.text_dinein',
                'delivery' => 'lang:tasti.salesreport::default.text_delivery',
                'collection' => 'lang:tasti.salesreport::default.text_collection',
            ],
        ],
        'payment' => [
            'label' => 'lang:tasti.salesreport::default.text_filter_payment',
            'type' => 'select',
            'conditions' => 'payment = :filtered',
            'modelClass' => 'Admin\Models\Payments_model',
            'options' => 'getDropdownOptions',
        ],
        'date' => [
            'label' => 'lang:tasti.salesreport::default.text_filter_date',
            'type' => 'daterange',
            'conditions' => 'order_date >= CAST(:filtered_start AS DATE) AND order_date <= CAST(:filtered_end AS DATE)',
        ],
    ],
];

$config['list']['toolbar'] = [
    'buttons' => [
        'delete' => [
            'label' => 'lang:tasti.salesreport::default.text_download',
            'class' => 'btn btn-primary',
            'href' => admin_url('tasti/salesreport/views?download=1'),
        ],
    ],
];

$config['list']['columns'] = [
    'order_id' => [
        'label' => 'lang:tasti.salesreport::default.column_id',
        'searchable' => TRUE,
    ],
    'location' => [
        'label' => 'lang:tasti.salesreport::default.column_location',
        'relation' => 'location',
        'select' => 'location_name',
        'searchable' => TRUE,
        'locationAware' => 'hide',
        'invisible' => TRUE,
    ],
    'full_name' => [
        'label' => 'lang:tasti.salesreport::default.column_customer_name',
        'select' => "concat(first_name, ' ', last_name)",
        'searchable' => TRUE,
    ],
    'order_type_name' => [
        'label' => 'lang:tasti.salesreport::default.label_type',
        'type' => 'text',
        'sortable' => FALSE,
    ],
    'order_date' => [
        'label' => 'lang:tasti.salesreport::default.column_date',
        'type' => 'date',
        'searchable' => TRUE,
    ],
    'order_time' => [
        'label' => 'lang:tasti.salesreport::default.column_time',
        'type' => 'time',
    ],
    'status_name' => [
        'label' => 'lang:tasti.salesreport::default.label_status',
        'relation' => 'status',
        'select' => 'status_name',
        'type' => 'text'
    ],
    'subtotal' => [
        'label' => 'lang:tasti.salesreport::default.text_order_subtotal',
        'type' => 'currency',
        'sortable' => FALSE,
    ],
    'paymentFee' => [
        'label' => 'lang:tasti.salesreport::default.text_payment_fee',
        'type' => 'currency',
        'sortable' => FALSE,
    ],
    'tax_text' => [
        'label' => 'lang:tasti.salesreport::default.text_tax',
        'type' => 'text',
        'sortable' => FALSE,
    ],
    'order_total' => [
        'label' => 'lang:tasti.salesreport::default.text_order_total',
        'type' => 'currency',
    ],

    'date_added' => [
        'label' => 'lang:tasti.salesreport::default.column_date_added',
        'type' => 'timesince',
        'invisible' => TRUE,
    ],
];

return $config;

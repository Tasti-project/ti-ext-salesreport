<?php
$config['list']['filter'] = [
    'search' => [
        'prompt' => 'lang:admin::lang.reports.text_filter_search',
        'mode' => 'all',
    ],
    'scopes' => [
        'location' => [
            'label' => 'lang:admin::lang.text_filter_location',
            'type' => 'select',
            'conditions' => 'location_id = :filtered',
            'modelClass' => 'Admin\Models\Locations_model',
            'nameFrom' => 'location_name',
            'locationAware' => 'hide',
        ],
        // 'status' => [
        //     'label' => 'lang:admin::lang.text_filter_status',
        //     'type' => 'select',
        //     'conditions' => 'status_id = :filtered',
        //     'modelClass' => 'Admin\Models\Statuses_model',
        //     'options' => 'getDropdownOptionsForOrder',
        // ],
        'type' => [
            'label' => 'lang:admin::lang.orders.text_filter_order_type',
            'type' => 'select',
            'conditions' => 'order_type = :filtered',
            'options' => [
                'dinein' => 'lang:admin::lang.orders.text_dinein',
                'delivery' => 'lang:admin::lang.orders.text_delivery',
                'collection' => 'lang:admin::lang.orders.text_collection',
            ],
        ],
        'payment' => [
            'label' => 'lang:admin::lang.orders.text_filter_payment',
            'type' => 'select',
            'conditions' => 'payment = :filtered',
            'modelClass' => 'Admin\Models\Payments_model',
            'options' => 'getDropdownOptions',
        ],
        'date' => [
            'label' => 'lang:admin::lang.text_filter_date',
            'type' => 'daterange',
            'conditions' => 'order_date >= CAST(:filtered_start AS DATE) AND order_date <= CAST(:filtered_end AS DATE)',
        ],
    ],
];

$config['list']['toolbar'] = [
    'buttons' => [
        'delete' => [
            'label' => 'lang:admin::lang.button_download',
            'class' => 'btn btn-primary',
            'href' => admin_url('tasti/salesreport/views?download=1'),
        ],
    ],
];

$config['list']['columns'] = [
    'order_id' => [
        'label' => 'lang:admin::lang.column_id',
        'searchable' => TRUE,
    ],
    'location' => [
        'label' => 'lang:admin::lang.orders.column_location',
        'relation' => 'location',
        'select' => 'location_name',
        'searchable' => TRUE,
        'locationAware' => 'hide',
        'invisible' => TRUE,
    ],
    'full_name' => [
        'label' => 'lang:admin::lang.orders.column_customer_name',
        'select' => "concat(first_name, ' ', last_name)",
        'searchable' => TRUE,
    ],
    'order_type_name' => [
        'label' => 'lang:admin::lang.label_type',
        'type' => 'text',
        'sortable' => FALSE,
    ],
    'order_date' => [
        'label' => 'lang:admin::lang.orders.column_date',
        'type' => 'date',
        'searchable' => TRUE,
    ],
    'order_time' => [
        'label' => 'lang:admin::lang.orders.column_time',
        'type' => 'time',
    ],
    'status_name' => [
        'label' => 'lang:admin::lang.label_status',
        'relation' => 'status',
        'select' => 'status_name',
        'type' => 'text'
    ],
    'subtotal' => [
        'label' => 'lang:admin::lang.reports.text_order_subtotal',
        'type' => 'currency',
        'sortable' => FALSE,
    ],
    'paymentFee' => [
        'label' => 'lang:admin::lang.reports.text_payment_fee',
        'type' => 'currency',
        'sortable' => FALSE,
    ],
    'tax_text' => [
        'label' => 'lang:admin::lang.reports.text_tax',
        'type' => 'text',
        'sortable' => FALSE,
    ],
    'order_total' => [
        'label' => 'lang:admin::lang.reports.text_order_total',
        'type' => 'currency',
    ],

    'date_added' => [
        'label' => 'lang:admin::lang.column_date_added',
        'type' => 'timesince',
        'invisible' => TRUE,
    ],
];

return $config;

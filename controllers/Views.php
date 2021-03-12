<?php
namespace Tasti\SalesReport\Controllers;

use Tasti\SalesReport\Classes\Exports\ReportsExport;
use Admin\Models\Payments_model;
use AdminMenu;
use Template;


class Views extends \Admin\Classes\AdminController
{

    public $implement = [
        'Admin\Actions\ListController'
    ];

    public $listConfig = [
        'list' => [
            'model' => 'Tasti\SalesReport\Models\SalesReport',
            'title' => 'Reports',
            'emptyMessage' => 'lang:tasti.salesreport::default.text_empty',
            'defaultSort' => ['order_id', 'DESC'],
            'configFile' => 'salesreport',
            'showCheckboxes' => false,
        ],
    ];

    protected $requiredPermissions = [
        'Tasti.SalesReport.*',
    ];

    public function __construct()
    {
        parent::__construct();

        AdminMenu::setContext('salesreport', 'sales');
        Template::setTitle(lang('lang:tasti.salesreport::default.text_title'));
    }

    public function index()
    {
        parent::index();

        $payments = $this->getListWidget()->prepareModel()->get()->groupBy('payment');

        foreach($payments as $code => $orders){
            $payment = Payments_model::where('code',$code)->first('name');
            $this->vars['payments'][ !empty($payment)? $payment->name : $code] = $orders->sum('order_total');
        }

        $records = $this->getListWidget()->prepareModel()->get();

        // return $this->getListWidget()->render();

        foreach($records as $order){
            $order->subtotal = $order->subtotal;
            $order->tax = $order->tax;
            $order->payment_fee = $order->payment_fee;
        }

        $this->vars['gross_total'] = [
            'total' => $records->sum('order_total'),
            'subtotal' => $records->sum('subtotal'),
            'tax' => $records->sum('tax'),
            'payment_fee' => $records->sum('payment_fee'),
        ];

        $inputs = request()->all();

        if(!empty($inputs['download'])){
            return \Excel::download(new ReportsExport($this->getListWidget()->columns, $records, $this->vars['gross_total']), 'report-'.date('Y-m-d H:i').'.xlsx');
        }

    }



    public function download($context, $recordId = null)
    {
        return $context;
    }

    public function formExtendFieldsBefore($form)
    {
        if (!array_key_exists('invoice_number', $form->tabs['fields']))
            return;

        if (!$form->model->hasInvoice()) {
            array_pull($form->tabs['fields']['invoice_number'], 'addonRight');
        }
        else {
            $form->tabs['fields']['invoice_number']['addonRight']['attributes']['href'] = admin_url('orders/invoice/'.$form->model->getKey());
        }
    }

    public function listExtendQueryBefore($query, $scope)
    {
       $query->whereIn('status_id',setting('completed_order_status'));
    }


}

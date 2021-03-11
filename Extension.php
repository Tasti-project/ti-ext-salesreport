<?php
namespace Tasti\SalesReport;

use Illuminate\Foundation\AliasLoader;

class Extension extends \System\Classes\BaseExtension
{


    public function register()
    {
        $this->app->register(\Maatwebsite\Excel\ExcelServiceProvider::class);
        AliasLoader::getInstance()->alias('Excel', \Maatwebsite\Excel\Facades\Excel::class);
    }

    public function boot()
    {

    }

    public function registerPermissions()
    {
        return [
            'Tasti.SalesReport.View' => [
                'description' => 'View Orders Sales Report',
                'group' => 'module',
            ]
        ];
    }

    public function registerNavigation()
    {
        return [
            'sales' => [
                'child' => [
                    'salesreport' => [
                        'priority' => 50,
                        'class' => 'pages',
                        'href' => admin_url('tasti/salesreport/views'),
                        'title' => lang('lang:tasti.salesreport::default.text_title'),
                        'permission' => 'Tasti.SalesReport.View',
                    ],
                ],
            ],
        ];
    }

}

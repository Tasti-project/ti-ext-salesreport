<?php

namespace Tasti\SalesReport\Models;

use Admin\Models\Orders_model;

class SalesReport extends Orders_model {

    public function getTaxAttribute(){
        $orderTotals = $this->getOrderTotals();
        if(!empty($orderTotals)){
            $tax = $orderTotals->where('code','tax')->first('value');
            if(!empty($tax)){
                return $tax->value;
            }
        }
        return 0;
    }

    public function getTaxTextAttribute(){
        $orderTotals = $this->getOrderTotals();
        if(!empty($orderTotals)){
            $tax = $orderTotals->where('code','tax')->first('value','title');
            if(!empty($tax)){
                return (!empty($tax->value) ? currency_format($tax->value) : '').' '.(!empty($tax->title) ? $tax->title : '');
            }
        }
        return '';
    }

    public function getPaymentFeeAttribute(){
        $orderTotals = $this->getOrderTotals();
        if(!empty($orderTotals)){
            $tax = $orderTotals->where('code','paymentFee')->first('value');
            if(!empty($tax)){
                return $tax->value;
            }
        }
        return 0;
    }
    public function getSubtotalAttribute(){
        $orderTotals = $this->getOrderTotals();
        if(!empty($orderTotals)){
            $tax = $orderTotals->where('code','subtotal')->first('value');
            if(!empty($tax)){
                return $tax->value;
            }
        }
        return 0;
    }

}

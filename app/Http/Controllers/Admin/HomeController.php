<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sale;

class HomeController extends Controller
{

    public function __construct(){
//        $this->middleware('admin');
//        $this->middleware('web');
    }

    /**
     *
     */
    public function index() {
        $sales = Sale::all()->load('product')->toArray();
        $sold_products_qnt = 0;
        $income = 0;
        $in_stock_products_qnt = 0;
        foreach ($sales as $sale) {
            $sold_products_qnt += $sale['qnt'];
            $income += $sale['qnt'] * ($sale['product']['price'] - $sale['product']['cost_price']);
            $in_stock_products_qnt += $sale['product']['qnt'] - $sale['qnt'];
        }

        return view('admin\index', compact([
            'in_stock_products_qnt',
            'income',
            'sold_products_qnt'
        ]));
    }
}

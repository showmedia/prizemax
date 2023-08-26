<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venda;
use MercadoPago\SDK;
USE MercadoPago;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Venda::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SDK::setAccessToken("APP_USR-6676594080831518-091522-03e3710137636e1ab4f5417ec0ecb573-195549231");
        switch($_POST["type"]) {
      case "payment":
          $payment = MercadoPago\Payment::find_by_id($request->data->id);
          $venda = Venda::where([
            ['pagamento','=',$payment->id]
        ]);
          if($payment->status == 'approved'){
            $venda->status = 1;
            $venda->update();
          }
          break;
      case "plan":
          $plan = MercadoPago\Plan::find_by_id($request->data->id);
          break;
      case "subscription":
          $plan = MercadoPago\Subscription::find_by_id($request->data->id);
          break;
      case "invoice":
          $plan = MercadoPago\Invoice::find_by_id($request->data->id);
          break;
      case "point_integration_wh":
          // $_POST contém as informações relacionadas à notificação.
          break; 
  }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

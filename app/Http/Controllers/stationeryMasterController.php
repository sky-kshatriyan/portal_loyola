<?php

namespace App\Http\Controllers;

use App\Http\Models\stationeryMasterModel;

use DB;
use Illuminate\Http\Request;
use Session;

class stationeryMasterController extends Controller {

    public function index() {
        $allstationeryMaster = stationeryMasterModel::all()->where('status', '!=', 0);

        $search_data = array(
            'search_stationary_name'     => "",
            'search_amount'   => "",
            'search_status'    => ""
        );
        return view('stationerymaster')->with(compact(
            'allstationeryMaster'
        ))->with($search_data);
    }

    public function findAction(Request $request) {
        if ($request->has('insert_submit')) {

            $this->validate($request, [
                'stationary_name'   => 'required',
                'amount'   => 'required',
            ]);

            $stam               = new stationeryMasterModel;
            $stam->stationary_name = $request->stationary_name;
            $stam->amount = $request->amount;
            $stam->status       = 1;
            $stam->c_on         = DB::raw('NOW()');
            $stam->c_by         = Session::get('userid');
            $stam->m_on         = DB::raw('NOW()');
            $stam->m_by         = Session::get('userid');

            if ($stam->save()) {
                Session::flash('message', 'Stationery Item '.$stam->stationary_name.' successfully added');
            } else {
                Session::flash('error_message', 'Something went wrong! Try again!');
            }
            return redirect('stationerymaster');

        } else if ($request->has('search_submit')) {

            $s_stationary_name     = $request->search_stationary_name;
            $s_amount   = $request->search_amount;
            $s_status    = $request->search_status;


            $search_data = array(
                'search_stationary_name'     => $s_stationary_name,
                'search_amount'   => $s_amount,
                'search_status'    => $s_status,

            );

            $query = stationeryMasterModel::select('*');

            if ($s_stationary_name != "") {$query     = $query->where('stationary_name', 'like',"%".$s_stationary_name."%");}
            if ($s_amount != "") {$query   = $query->where('amount', 'like',"%".$s_amount."%");}
            $allstationeryMaster = $query->get();



            return view('stationerymaster')->with(compact(
                'allstationeryMaster'
            ))->with($search_data);
        }
    }

    public function update(Request $request) {

        $this->validate($request, [
            'edit_id'        => 'required',
            'edit_stationary_name'   => 'required',
            'edit_amount'   => 'required'
        ]);
        $stam               = stationeryMasterModel::find($request->edit_id);
        $stam->stationary_name = $request->edit_stationary_name;
        $stam->amount     = $request->edit_amount;
        $stam->m_on         = DB::raw('NOW()');
        $stam->m_by         = Session::get('userid');

        if ($stam->save()) {
            Session::flash('message', 'satff Member '.$stam->stationary_name.' successfully Updated');
        } else {
            Session::flash('error_message', 'Something went wrong! Try again!');
        }

        return redirect('stationerymaster');
    }
    public function statusupdate($id, $status) {
        $stam         = stationeryMasterModel::find($id);
        $stam->m_on   = DB::raw('NOW()');
        $stam->m_by   = Session::get('userid');
        $stam->status = $status;

        if ($status == 1) {$status_t = "Activated";} else if ($status == 2) {$status_t = "Suspended";} else if ($status == 0) {$status_t = "Deleted";}

        if ($stam->save()) {
            Session::flash('message', 'satff Member '.$stam->stationary_name.' suscessfully '.$status_t);
        } else {
            Session::flash('error_message', 'Something went wrong! Try again!');
        }
        return redirect('stationerymaster');
    }

    public function search(Request $request) {

    }

}

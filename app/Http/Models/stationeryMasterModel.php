<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;


class stationeryMasterModel extends MyBaseModel {

    protected $connection = 'key';
    protected $table = 'stationery_master';
    public $timestamps  = false;

}
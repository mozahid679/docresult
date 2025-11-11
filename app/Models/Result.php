<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
   protected $fillable = [
      'FormSerial',
      'pin',
      'roll',
      'serial',
      'fullName',
      'Gender',
      'TestScore',
      'meritScore',
      'meritPosition',
      'allocatedInstituteCode',
      'allocatedInstituteName',
      'allocationCriteria',
      'allocationStatus'
   ];
}

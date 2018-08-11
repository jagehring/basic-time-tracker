<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $table = "projects";

  // An array of the fields we can fill in the time_entries table
  protected $fillable = ['user_id', 'client', 'description'];

  protected $hidden = ['user_id'];

  // Eloquent relationship that says one user belongs to each time entry
  public function user()
  {
      return $this->belongsTo('App\User');
  }

  // Eloquent relationship that says one user belongs to each time entry
  public function time()
  {
      return $this->hasMany('App\Times');
  }
}

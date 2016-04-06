<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Fileentry extends Model
{
	protected $dates = ['created_at', 'updated_at', 'disabled_at','expiration','downloaded_at'];

	

	public function user()
    {
        return $this->belongsTo('App\User');
    }


	public function human_filesize($dec = 2) { 
		$bytes = $this->size;
		$size = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'); 
		$factor = floor((strlen($bytes) - 1) / 3); 
		return sprintf("%.{$dec}f", $bytes / pow(1024, $factor)) ." ". @$size[$factor]; 
	}

	public function get_status() {
		if($this->expiration<Carbon::now()->addDays(2)) {
			return 2;
		} else if($this->expiration<Carbon::now()->addWeek()) {
			return 1;
		}

		return 0;
	}

	public function get_percentage() {			
		$diff = $this->expiration->diffInMinutes($this->created_at);
		$diff2 = $this->expiration->diffInMinutes(Carbon::now());
		return $diff." - ".$diff2;
	}

	public function get_extension() {
		switch($this->mime) {
	    case 'image/gif'    : $extension = 'gif';   break;
	    case 'image/png'    : $extension = 'png';   break;
	    case 'image/jpeg'   : $extension = 'jpg';   break;

	    default :
	        throw new ApplicationException('The file uploaded was not a valid image file.');
	    break;
	    	}
	    return $extension;
	}
}


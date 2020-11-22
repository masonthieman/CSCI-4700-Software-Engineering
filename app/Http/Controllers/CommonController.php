<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use App\Models\Practice;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
//use App\Models\TcmPatientContactAddlAttempt;

/**
 * This controller is used for generic features
 */
class CommonController extends Controller
{
	public function physicians(Practice $practice)
	{
		$physicians = [];
		foreach ($practice->physicians as $physician) {
			$physicians[$physician->id] = $physician->json();
		}
		return response()->json($physicians);
	}

	/* Returns count of patient contact attempt for a patient */
	public function patientAttempt($tcmId)
	{
		//$count = TcmPatientContactAddlAttempt::where('tcm_form_id', '=', $tcmId)->count();
		$count = DB::table('tcm_patient_contact_addl_attempts')->where('tcm_form_id', $tcmId)->count();
		return response()->json($count);
	}
	/* Returns count of patient contact attempt for a patient */

}

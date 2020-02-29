<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\water_results;
use App\calories_results;
use App\weight_results;
use Illuminate\Support\Facades\DB;
use Auth;


class PageController extends Controller
{
    public function calorie_form(){
        return view('calorie');
    }

    public function calorie_calculation(Request $request){
        $user_info = new calories_results;
        $last_Time = new \DateTime();
        $userId = Auth::id();
        $weight = $request->input('weight');
        $age = $request->input('age');
        $height = $request->input('height');
        $gender = $request->input('options');
        $result_male = null;
        $result_female = null;
        //calculation
        if(isset($_POST['calculate'])){
            if($gender == "Male"){
                $result_male = round(($age * 6.8 * 5 * $height +
                13.8 * $weight + 66.5), 0);
            }elseif($gender == "Female"){
                $result_female = round((($age * 4.7) * (1.9 * $height) +
                (9.6 * $weight) + 655.1), 0);
            }
            //To insert data in database
            if($result_male != null){
                $user_info->user_id = $userId;
                $user_info->calories_result = $result_male;
                $user_info->laset_result = $last_Time->format('Y-m-d');
                $user_info->save();

            }elseif($result_female != null){
                $user_info->user_id = $userId;
                $user_info->calories_result = $result_female;
                $user_info->laset_result = $last_Time->format('Y-m-d');
                $user_info->save();
                }
            // select information fron database
            $users_report = DB::table('calories_results')
            ->select('user_id','calories_result','laset_result')
            ->where('user_id','=', $userId)
            ->get();
        }
        return view('calorie', compact('result_female', 'result_male',
         'users_report'));
    }


    public function weight_form(){
        return view('weight');
    }


    public function weight_calculation(Request $request){
        $user_info = new weight_results;
        $last_Time = new \DateTime();
        $userId = Auth::id();
        $height = $request->input('height');
        $weight = $request->input('weight');
        $height_m = ($height / 100);
        $bmi = null;

        if(isset($_POST['calculate'])){

            if ($weight != 0) {
                $bmi = round($weight / ($height_m * $height_m), 0);
            }

            if($bmi != null ){
                // To insert data in database
                $user_info->user_id = $userId;
                $user_info->weight_result = $bmi;
                $user_info->laset_result = $last_Time->format('Y-m-d');
                $user_info->save();
            // echo $user_info;
            }
           
            //select information fron database
            $users_report = DB::table('weight_results')
            ->select('user_id','weight_result','laset_result')
            ->where('user_id','=', $userId)
            ->get();

        }

        return view('weight', compact('bmi', 'users_report'));
    }


    public function water_form(){
        return view('water');
    }

    public function water_calculation(Request $request){
        $weight = $request->input('weight');
        $age = $request->input('age');
        //create object from function water_result
        $user_info = new water_results;
        $last_Time = new \DateTime();
        $userId = Auth::id();
        $balance_sum_2 = null;
        $balance_sum_3 = null;
        $balance_sum_4 = null;

        if(isset($_POST['calculate'])){

            if(!(isset($age)) || !(isset($weight))){
                echo ("Muset fill all information");
            }else{
                $sum_1 = $weight / 2.2;
                if($age > 55){
                    $sum_2 = $sum_1 * 30;
                    $balance_sum_2 = round($sum_2 / 28.3,0);
                }
                elseif($age >= 30 && $age <= 55){
                        $sum_3 = $sum_1 * 35;
                        $balance_sum_3 = round($sum_3 / 28.3,0);
                }
                elseif($age < 30){
                        $sum_4 = $sum_1 * 40;
                        $balance_sum_4 = round($sum_4 / 28.3,0);
                }
            }
            if($balance_sum_2 != null || $balance_sum_3 != null 
            || $balance_sum_4 != null){
                // To insert data in database
                $user_info->user_id = $userId;
                $user_info->water_result = $balance_sum_2;
                $user_info->water_result = $balance_sum_3;
                $user_info->water_result = $balance_sum_4;
                $user_info->laset_result = $last_Time->format('Y-m-d');
                $user_info->save();
            // echo $user_info;
            }
           
            //select information fron database
            $users_report = DB::table('water_results')
            ->select('user_id','water_result','laset_result')
            ->where('user_id','=', $userId)
            ->get();
        }
        return view('water', compact('balance_sum_2', 'balance_sum_3',
         'balance_sum_4',  'users_report'));
    }





}

?>
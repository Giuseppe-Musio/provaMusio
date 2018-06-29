<?php
/**
 * Created by PhpStorm.
 * User: andreese
 * Date: 01/02/2018
 * Time: 18:13
 */

namespace App\Http\Controllers\ControllersHelper;

use App\Models\UmuxQuestionary;
use App\Models\AttrakdiffQuestionary;
use App\Models\NasatlxQuestionary;
use App\Models\NpsQuestionary;
use App\Models\StudyUser;
use App\Models\SusQuestionary;
use App\Models\Task;
use Illuminate\Foundation\Auth\User;

class QuestionaryHelper
{
    public static function getAttrakdiffData($studyUser)
    {
        return self::attrakdiffData($studyUser);
    }

    public static function getNasatlxData($studyUserTask)
    {
        return self::nasatlxData($studyUserTask);
    }

    public static function getNPSData($studyUser)
    {
        return self::npsData($studyUser);
    }

    public static function getSUSData($studyUser)
    {
        return self::susData($studyUser);
    }

    public static function getUmuxData($studyUser){
        return self::umuxData($studyUser);
    }

    /**
     * Funzione che calcola i dati per il questionario Attrakdiff
     *
     * @param $studyUser
     * @return array
     */
    private static function attrakdiffData($studyUser)
    {
        if (isset($studyUser) && !empty($studyUser)){
            $data = array();
            $medie = array();

            foreach ($studyUser as $value) {
                $singleTuple = AttrakdiffQuestionary::all()->where('study_user_id', $value['id'])->toArray();
                if (sizeof($singleTuple) != 0)
                    array_push($data, $singleTuple);
            }

            if (sizeof($data) > 0) {
                $number_of_questionaries = sizeof($data[0]);
                $questionaries = $data[0];

                for ($i = 0; $i < 28; $i++) {
                    $sum = 0;
                    for ($j = 0; $j < $number_of_questionaries; $j++) {
                        $sum = $sum + $questionaries[$j]["r" . ($i + 1)];
                        //array_push($medie, ($sum / $number_of_questionaries));
                    }
                    array_push($medie, ($sum / $number_of_questionaries));
                }

                $PQ = (($medie[0] + $medie[4] + $medie[7] + $medie[9] + $medie[11] + $medie[19] + $medie[27]) / 7) - 4;
                $HQI = (($medie[1] + $medie[5] + $medie[10] + $medie[12] + $medie[13] + $medie[14] + $medie[15]) / 7) - 4;
                $HQS = (($medie[3] + $medie[17] + $medie[21] + $medie[22] + $medie[23] + $medie[24] + $medie[26]) / 7) - 4;
                $ATT = (($medie[2] + $medie[6] + $medie[8] + $medie[16] + $medie[18] + $medie[20] + $medie[25]) / 7) - 4;

                $MHQ = ($HQI + $HQS) / 2;

                $PQ_array = array(
                    $medie[0],
                    $medie[4],
                    $medie[7],
                    $medie[9],
                    $medie[11],
                    $medie[19],
                    $medie[27]
                );
                $HQ_array = array(
                    $medie[1],
                    $medie[5],
                    $medie[10],
                    $medie[12],
                    $medie[13],
                    $medie[14],
                    $medie[15],
                    $medie[3],
                    $medie[17],
                    $medie[21],
                    $medie[22],
                    $medie[23],
                    $medie[24],
                    $medie[26]
                );

                // CALCOLO L'INTERVALLO DI CONFIDENZA 95%
                $dev_std = self::stddev($PQ_array);
                $ic_PQ = ($dev_std / sqrt(count($PQ_array))) * 1.96;
                $ic_HQ = ($dev_std / sqrt(count($HQ_array))) * 1.96;

                $posX = 162 + intval((242 / 6) * $PQ);
                $posY = 128 - intval((242 / 6) * $MHQ);
                $sizeX = intval($ic_PQ * (242 / 3));
                $sizeY = intval($ic_HQ * (242 / 3));

                $result = array();

                array_push($result, $medie);
                array_push($result, $PQ);
                array_push($result, $HQI);
                array_push($result, $HQS);
                array_push($result, $ATT);
                array_push($result, $posX);
                array_push($result, $posY);
                array_push($result, $sizeX);
                array_push($result, $sizeY);

                return $result;
            }else{
                return array();
            }
        } else {
            return array();
        }
    }

    /**
     * Funzione che calcola i dati per il questionario NasaTLX
     *
     * @param $studyUserTask
     * @return array
     */

    private static function nasatlxData($studyUserTask)
    {
        if (isset($studyUserTask) && !empty($studyUserTask)) {

            $data = array();
            $temp = array();
            $tasks = array();
            $tasksId = array();
            $studyUsers = array();

            foreach ($studyUserTask as $value) {
                if (!in_array($value['study_user_id'], $studyUsers)) {
                    $singleTuple = NasatlxQuestionary::all()->where('study_user_id', $value['study_user_id'])->toArray();
                    if (sizeof($singleTuple) != 0 && sizeof($singleTuple) == 1) {
                        $studyUser = StudyUser::where('id', $value['study_user_id'])->get()->toArray();
                        $studyUser = $studyUser[key($studyUser)];
                        $user = User::where('id', $studyUser['user_id'])->get(['email'])->toArray();
                        $user = $user[key($user)];
                        array_push($singleTuple[key($singleTuple)], $user['email']);
                        array_push($temp, $singleTuple[key($singleTuple)]);
                    } else {
                        foreach ($singleTuple as $newValue) {
                            $studyUser = StudyUser::all()->where('id', $newValue['study_user_id'])->toArray();
                            $studyUser = $studyUser[key($studyUser)];
                            $user = User::where('id', $studyUser['user_id'])->get(['email'])->toArray();
                            $user = $user[key($user)];
                            array_push($newValue, $user['email']);
                            array_push($temp, $newValue);
                        }
                    }

                    array_push($studyUsers, $value['study_user_id']);
                }

                if (!in_array($value['task_id'], $tasksId)) {
                    array_push($tasks, Task::all()->where('id', $value['task_id'])->toArray());
                    array_push($tasksId, $value['task_id']);
                }
            }

            array_push($data, $tasks);
            array_push($data, $temp);

            if(sizeof($data) > 0){
                return $data;
            }else{
                return array();
            }
        } else {
            return array();
        }
    }

    /**
     * Funzione che calcola i dati per il questionario NPS
     *
     * @param $studyUser
     * @return array
     */
    private static function npsData($studyUser)
    {
        if (isset($studyUser) && !empty($studyUser)) {

            $data = array();

            foreach ($studyUser as $value) {
                $singleTuple = NpsQuestionary::all()->where('study_user_id', $value['id'])->toArray();
                $user = User::where('id', $value['user_id'])->get(['email'])->toArray();
                $user = $user[key($user)];
                if (sizeof($singleTuple) != 0) {
                    array_push($singleTuple[key($singleTuple)], $user['email']);
                    array_push($data, $singleTuple[key($singleTuple)]);
                }
            }

            if(sizeof($data) > 0){
                $num_questionari = sizeof($data);

                $promotori = 0;
                $detrattori = 0;
                $neutri = 0;

                for ($j = 0; $j < $num_questionari; $j++) {
                    if (intval($data[$j]['r1']) > 8 && intval($data[$j]['r1']) < 11)
                        $promotori++;
                    else if (intval($data[$j]['r1']) > 6 && intval($data[$j]['r1']) < 9)
                        $neutri++;
                    else if (intval($data[$j]['r1']) >= 0 && intval($data[$j]['r1']) < 7)
                        $detrattori++;
                }

                $promotori = $promotori / $num_questionari;
                $neutri = $neutri / $num_questionari;
                $detrattori = $detrattori / $num_questionari;
                $valNPS = ($promotori - $detrattori) * 100;

                $result = [
                    'promotori' => $promotori,
                    'neutri' => $neutri,
                    'detrattori' => $detrattori,
                    'valNPS' => $valNPS,
                    'data' => $data,
                ];

                return $result;
            }else{
                return array();
            }
        } else {
            return array();
        }
    }

    /**
     * Funzione che calcola i dati per il questionario SUS
     *
     * @param $studyUser
     * @return array
     */
    private static function susData($studyUser)
    {
        if (isset($studyUser) && !empty($studyUser)) {
            $total_sus_score = 0;
            $total_sus_usability = 0;
            $total_sus_learnability = 0;

            $data = array();
            $result = array();

            foreach ($studyUser as $value) {
                $singleTuple = SusQuestionary::all()->where('study_user_id', $value['id'])->toArray();
                $user = User::where('id', $value['user_id'])->get(['email'])->toArray();
                $user = $user[key($user)];

                if (sizeof($singleTuple) != 0) {
                    $singleTuple[key($singleTuple)]['email'] = $user['email'];
                    array_push($data, $singleTuple[key($singleTuple)]);
                }
            }

            if(sizeof($data) > 0){
                foreach ($data as $key => $value) {
                    $sum = 0;
                    for ($i = 1; $i < 11; $i++) {
                        if (($i % 2) == 0) {
                            $data[$key]['r' . $i] = 5 - (int)($value['r' . $i]);
                        } else {
                            $data[$key]['r' . $i] = (int)($value['r' . $i]) - 1;
                        }
                        $sum = $sum + $value["r" . $i];
                    }

                    $data[$key]['learnability'] = ($data[$key]['r3'] + $data[$key]['r9']) * 12.5;
                    $data[$key]['sus_usability'] = ($sum - $data[$key]['r3'] - $data[$key]['r9']) * 3.125;
                    $data[$key]['sus_score'] = $sum * 2.5;
                    $data[$key]['mean'] = $data[$key]['sus_usability'] * 0.8 + $data[$key]['learnability'] * 0.2;

                    $total_sus_score = $total_sus_score + $data[$key]['sus_score'];
                    $total_sus_learnability = $total_sus_learnability + $data[$key]['learnability'];
                    $total_sus_usability = $total_sus_usability + $data[$key]['sus_usability'];
                }

                $result['data'] = $data;

                $total_sus_score = $total_sus_score / sizeof($data);

                $total_sus_learnability = $total_sus_learnability / sizeof($data);
                $total_sus_usability = $total_sus_usability / sizeof($data);

                $result["devSusScoreData"] = self::devStandard($data, 'sus_score', $total_sus_score);
                $result["devLearnabilityData"] = self::devStandard($data, 'learnability', $total_sus_learnability);
                $result["devSusUsabilityData"] = self::devStandard($data, 'sus_usability', $total_sus_usability);

                $result['total_sus_score'] = $total_sus_score;

                return $result;
            }else{
                return array();
            }
        } else {
            return array();
        }
    }

    /**
     * Funzione che calcola i dati per il questionario Umux
     *
     * @return array
     */

    private static function umuxData($studyUser){
        if (isset($studyUser) && !empty($studyUser)) {

            $data = array();
            $result = array();
            $total_umux_score = 0;

            foreach ($studyUser as $value) {
                $singleTuple = UmuxQuestionary::all()->where('study_user_id', $value['id'])->toArray();
                $user = User::where('id', $value['user_id'])->get(['email'])->toArray();
                $user = $user[key($user)];
                if (sizeof($singleTuple) != 0) {
                    $singleTuple[key($singleTuple)]['email'] = $user['email'];
                    array_push($data, $singleTuple[key($singleTuple)]);
                }
            }

            if(sizeof($data) > 0){
                foreach ($data as $key => $value){
                    $data[$key]['umux_score'] = self::calculateUmux($value['r1'], $value['r2']);
                    $total_umux_score = $total_umux_score + $data[$key]['umux_score'];
                }

                $result['data'] = $data;
                $result["devUmuxScoreData"] = self::devStandard($data, 'umux_score',$total_umux_score);

                return $result;
            }else{
                return array();
            }
        }else{
            return array();
        }
    }

    /**
     * Funzione per il calcolo della deviazione standard per SusScore, Learnability, SusUsability
     * e Umux Lite
     *
     * @param $data
     * @param $name
     * @param $total_generic
     * @return array
     */
    private static function devStandard($data, $name, $total_generic)
    {
        $generic = array();
        $generic_data = array();

        if (sizeof($data) > 1) {
            foreach ($data as $key => $value) {
                array_push($generic, $data[$key][$name]);
            }

            $devGenericScore = self::stddev($generic);

            // CALCOLO L'INTERVALLO DI CONFIDENZA 95%
            $ic = ($devGenericScore / sqrt(count($generic))) * 1.96;
            // Ora ricavo l'intervallo di fiducia:
            $upper_ci_bound = $total_generic + ($ic / 2);
            $lower_ci_bound = $total_generic - ($ic / 2);

            $generic_data['total' . $name] = $total_generic;
            $generic_data['dev' . $name . 'Score'] = $devGenericScore;
            $generic_data['ic'] = $ic;
            $generic_data['upper_ci_bound'] = $upper_ci_bound;
            $generic_data['lower_ci_bound'] = $lower_ci_bound;

            return $generic_data;
        }else{
            $generic_data['total' . $name] = $total_generic;
            $generic_data['dev' . $name . 'Score'] = 0;
            $generic_data['ic'] = 0;
            $generic_data['upper_ci_bound'] = 0;
            $generic_data['lower_ci_bound'] = 0;

            return $generic_data;
        }
    }

    /**
     * Funzione per calcolare la deviazione standard
     * Radice quadrata della somma dei quadrati diviso per N - 1
     *
     * @param $array
     * @return float
     */

    private static function stddev($array)
    {
        return sqrt(array_sum(array_map("QuestionaryHelper::sd_square", $array, array_fill(0, count($array), (array_sum($array) / count($array))))) / (count($array) - 1));
    }

    /**
     * Funzione per calcolare il quadrato di un valore - media
     *
     * @param $x
     * @param $mean
     * @return float|int
     */

    private static function sd_square($x, $mean)
    {
        return pow($x - $mean, 2);
    }

    /**
     * Funzione che calcola il valore di Umux di una riga
     *
     * @param $r1
     * @param $r2
     * @return float
     */
    private static function calculateUmux($r1,$r2) {
        $result = 0.65 * (($r1+$r2-2) * (100/12) + 22.9);
        return $result;
    }
}
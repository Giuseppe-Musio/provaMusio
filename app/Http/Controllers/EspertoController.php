<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Support\Facades\DB;
use App\Models\Study;
use App\Models\StudyUser;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\CustomMail;
use Illuminate\Support\Facades\Mail;

class EspertoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function goToIndex()
    {
        return redirect()->route('esperto.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Study::where('user_id', Auth::user()->getAuthIdentifier())->paginate(10);
        return view('front.esperto.home', ['data' => $data]);
    }

    public function info()
    {
        return view('front.esperto.info');
    }

    public function newStudio()
    {
        $data = User::all()->where('role', 'tester')->toArray();
        return view('front.esperto.studio.newStudio', ['data' => $data]);
    }

    public function joinTesterToStudy(Request $request)
    {
        if ($request->input('user') == Auth::user()->getAuthIdentifier()) {
            $id_study = $request->input('study');

            $array_testers = DB::table('users')
                ->where('users.role', 'tester')
                ->whereNotIn('users.id', function ($query) use ($id_study) {
                    $query->select('users.id')->from('users')
                        ->join('study_user', 'users.id', '=', 'study_user.user_id')
                        ->where('study_user.study_id', $id_study);
                })
                ->get();

            return view('front.esperto.joinTesterToStudy', ['array_testers' => $array_testers, 'id_study' => $id_study]);
        } else {
            return $this->goToIndex();
        }
    }

    public function createStudio(Request $request)
    {
        $url_prefix = $request->input('prefixUrl');

        $studio = new Study();

        $studio->setAttribute("goal", $request->input('goal'));
        $studio->setAttribute("url", $url_prefix . $request->input('url'));
        $studio->setAttribute("user_id", Auth::user()->getAuthIdentifier());
        $studio->setAttribute("description", $request->input('description'));


        $recordAV = $request->input('recordAV');

        if (isset($recordAV)) {
            if ($recordAV == 'audio') {
                $studio->setAttribute("flag_audio", 1);
                $studio->setAttribute("flag_video", 0);
            } else if($recordAV == 'video'){
                $studio->setAttribute("flag_audio", 0);
                $studio->setAttribute("flag_video", 1);
            }
        } else {
            $studio->setAttribute("flag_audio", 0);
            $studio->setAttribute("flag_video", 0);
        }

        $recordMouseMoving = $request->input("recordMouseMoving");

        if ($recordMouseMoving)
            $studio->setAttribute("flag_mouse_tracking", 1);
        else
            $studio->setAttribute("flag_mouse_tracking", 0);

        $attrakdiff = $request->input("attrakdiff");

        if (isset($attrakdiff))
            $studio->setAttribute("flag_assessment_aa", 1);
        else
            $studio->setAttribute("flag_assessment_aa", 0);

        $sus = $request->input("sus");

        if (isset($sus))
            $studio->setAttribute("flag_assessment_sus", 1);
        else
            $studio->setAttribute("flag_assessment_sus", 0);

        $nps = $request->input("nps");

        if (isset($nps))
            $studio->setAttribute("flag_assessment_nps", 1);
        else
            $studio->setAttribute("flag_assessment_nps", 0);

        $nasatlx = $request->input("nasatlx");

        if (isset($nasatlx))
            $studio->setAttribute("flag_assessment_nasatlx", 1);
        else
            $studio->setAttribute("flag_assessment_nasatlx", 0);

        $umux = $request->input("umux");

        if (isset($umux))
            $studio->setAttribute("flag_assessment_umux", 1);
        else
            $studio->setAttribute("flag_assessment_umux", 0);

        $studio->save();

        $id_studio = $studio->getAttribute("id");

        $numberOfTasks = $request->input("numberOfTasks");

        for ($i = 1; $i <= $numberOfTasks; $i++) {
            $task = new Task();

            $verifyExisting = $request->input("goal" . $i);
            if (isset($verifyExisting)) {
                $task->setAttribute("goal", $verifyExisting);
                $task->setAttribute("instruction", $request->input("instruction" . $i));
                $task->setAttribute("time_max", $request->input("time_max" . $i));
                $task->setAttribute("start_url", $url_prefix . $request->input("start_url" . $i));
                $task->setAttribute("end_url", $url_prefix . $request->input("end_url" . $i));
                $task->setAttribute("study_id", $id_studio);

                $task->save();
            }
        }

        $data = User::all()->where('role', 'tester');
        $arrayEmails = explode(', ', $request->input("emailAdded"));
        $j = 0;

        foreach ($data as $value) {

            $testerEmail = $request->input("emailTesterInvite" . $j);

            if ($testerEmail != "") {
                $study_user = new StudyUser();
                $current_user = User::where('email', $testerEmail)->first();
                $study_user->setAttribute("study_id", $id_studio);
                $study_user->setAttribute("user_id", $current_user->id);

                $study_user->save();

                Mail::to($current_user->email)->later(5, new CustomMail($current_user, $studio));
            }
            $j++;
        }

        if ($arrayEmails[0] != "") {
            for ($i = 0; $i < sizeof($arrayEmails); $i++) {
                $existsUser = User::where('email', $arrayEmails[$i])->first();

                if ($existsUser == null) {
                    $existsUser = new User();
                    $existsUser->email = $arrayEmails[$i];

                    Mail::to($existsUser->email)->later(5, new CustomMail($existsUser, $studio));
                }
            }
        }

        return $this->goToIndex();
    }

    public function addNewTester(Request $request)
    {
        $j = 0;

        $study = Study::where('id', $request->input('id_study'))->first();

        do {
            $testerEmail = $request->input("emailTesterInvite" . $j);
            if ($testerEmail != "") {
                $study_user = new StudyUser();
                $study_user->setAttribute('study_id', $request->input('id_study'));
                $current_user = User::where('email', $testerEmail)->first();
                $study_user->setAttribute('user_id', $current_user->id);

                $verify_study_user = StudyUser::where([['user_id', $current_user->id], ['study_id', $request->input('id_study')]])->exists();

                if (!$verify_study_user) {
                    $study_user->save();

                    Mail::to($current_user->email)->later(5, new CustomMail($current_user, $study));
                }
            }
            $j++;

        } while ($testerEmail != "");

        $arrayEmails = explode(', ', $request->input("emailAdded"));

        if ($arrayEmails[0] != "") {
            for ($i = 0; $i < sizeof($arrayEmails); $i++) {
                $existsUser = User::where('email', $arrayEmails[$i])->first();

                if ($existsUser == null) {
                    $existsUser = new User();
                    $existsUser->email = $arrayEmails[$i];

                    Mail::to($existsUser->email)->later(5, new CustomMail($existsUser, $study));
                }
            }
        }

        return $this->goToIndex();
    }
}
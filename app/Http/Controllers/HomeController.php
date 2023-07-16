<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Member;
use App\Models\MembersVisa;
use App\Models\News;
use App\Models\Program;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $announcement = News::where('is_announcement', true)
            ->offset(0)
            ->limit(5)
            ->orderBy('created_at', 'desc')
            ->get();
        $news = News::where('is_announcement', false)
            ->offset(0)
            ->limit(3)
            ->orderBy('created_at', 'desc')
            ->get();
        $program = array();
        $programDate = Program::select('date')->groupBy('date')->get();
        foreach ($programDate as $key => $value) {
            $classBg = '';
            switch (date('D', strtotime($value->date))) {
                case 'Mon':
                    $classBg = 'bg-pale-yellow';
                    break;
                case 'Tue':
                    $classBg = 'bg-pale-pink';
                    break;
                case 'Wed':
                    $classBg = 'bg-pale-leaf';
                    break;
                case 'Thu':
                    $classBg = 'bg-pale-red';
                    break;
                case 'Fri':
                    $classBg = 'bg-pale-blue';
                    break;
                case 'Sat':
                    $classBg = 'bg-pale-purple';
                    break;
                case 'Sun':
                    $classBg = 'bg-pale-red';
                    break;
            }

            $program[$key]['date'] = array(
                'date' => $value->date,
                'classBg' => $classBg
            );
            $inDate = Program::where('is_highlight', true)
                ->where('date', $value->date)
                ->orderBy('date', 'asc')
                ->orderBy('startTime', 'asc')
                ->get();
            foreach ($inDate as $data) {
                $program[$key]['item'][] = $data;
            }
        }
        return view('home', [
            'announcement' => $announcement,
            'news' => $news,
            'program' => $program,
            'quote' => Setting::where('key', 'config-quote')->first(),
        ]);
    }

    public function about()
    {
        return view('about', [
            'about' => Setting::where('key', 'config-aboutus')->first(),
        ]);
    }

    public function visa()
    {
        return view('visa');
    }

    public function visastore(Request $request)
    {
        $this->validate(
            $request,
            [
                'memberId' => 'required',
                'nationality' => 'required',
                'gender' => 'required',
                'identification_number' => 'required',
                'passport_number' => 'required',
                'passport_expiry_date' => 'required',
                'passport_issue_date' => 'required',
                'place_of_birth' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
            ]
        );
        $data = new MembersVisa($request->all());
        $data->save();

        $visa = Member::with('members_visas')->where('id', Auth::user()->id)->first();
        $pdf = Pdf::loadView('pdf', ['data' => $visa]);
        // $pdf->download(date('YmdhisA', strtotime(now())) . '.pdf');

        // return redirect()->route('home');
        return $pdf->stream();
    }

    public function genpdf()
    {
        $data = Member::with('members_visas')->where('id', Auth::user()->id)->first();
        if ($data->members_visas->count() == 0) {
            return redirect()->route('visa', ['countries' => Country::all()]);
        } else {
            $pdf = Pdf::loadView('pdf', ['data' => $data]);

            // return $pdf->stream();
            return $pdf->download(date('YmdhisA', strtotime(now())) . '.pdf');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Program;
use App\Models\Setting;
use Illuminate\Http\Request;

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
                case 'Wed':
                    $classBg = 'bg-pale-leaf';
                    break;
                case 'Thu':
                    $classBg = 'bg-pale-red';
                    break;
                case 'Fri':
                    $classBg = 'bg-pale-blue';
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
}

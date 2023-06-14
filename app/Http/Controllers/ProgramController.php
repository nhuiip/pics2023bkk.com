<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            $inDate = Program::where('date', $value->date)
                ->orderBy('date', 'asc')
                ->orderBy('startTime', 'asc')
                ->get();
            foreach ($inDate as $data) {
                $program[$key]['item'][] = $data;
            }
        }
        return view('program.main', [
            'data' => $program,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function jsondata(Request $request)
    {
        $date = $request->date;
        $keyword = trim($request->keyword);


        $program = array();
        $programDate = Program::select('date')
            ->when($date, function ($query, $date) {
                return $query->where('date', $date);
            })
            ->when($keyword, function ($query, $keyword) {
                return $query->where(function ($query) use ($keyword) {
                    $query->orWhere('name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('room', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->groupBy('date')
            ->get();

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
            $inDate = Program::where('date', $value->date)
                ->when($keyword, function ($query, $keyword) {
                    return $query->where(function ($query) use ($keyword) {
                        $query->orWhere('name', 'LIKE', '%' . $keyword . '%')
                            ->orWhere('room', 'LIKE', '%' . $keyword . '%');
                    });
                })
                ->orderBy('date', 'asc')
                ->orderBy('startTime', 'asc')
                ->get();
            foreach ($inDate as $data) {
                if ($data->is_highlight) {
                    $program[$key]['itemHighlight'][] = $data;
                } else {
                    $program[$key]['item'][] = $data;
                }
            }
        }

        return $program;
    }
}

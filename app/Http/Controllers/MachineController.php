<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use App\Rules\ValidateSendDate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    public function index()
    {
        $machine = Machine::all();
        return view('machine.index')->with('machines',$machine);
    }

    public function create()
    {
        return view('machine.machine-form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'required|image|mimes:jpeg,png,svg|max:1024',
        ]);
        
        $horaActual = Carbon::now()->format('H:i:s');

        $horaLimite = '15:00:00';
        if ($horaActual < $horaLimite) {
            $sendDate = Carbon::parse($request->input('send_date'))->addDay();
        } else {
            $sendDate = Carbon::parse($request->input('send_date'))->addDays(2);
        }

        $machine = $request->all();
        if($image = $request->file('image')){
            $routeSaveImg = 'image/';
            $imgMachine = date('YmdHis').".". $image->getClientOriginalExtension();
            $image->move($routeSaveImg,$imgMachine);
            $machine['image'] = "$imgMachine";
        }

        $machine['send_date'] = $sendDate->toDateTimeString();

        //var_dump($machine['image']);
        Machine::create($machine); 
        return redirect()->route('machineIndex');
    }

    public function show(string $id)
    {
        //
    }
    
    public function edit(string $id)
    {
        $machine = Machine::find($id);
        return view('machine.machine-form')->with('machine',$machine);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,svg|max:1024',
        ]);
        $machine = $request->all();
        if($image = $request->file('image')){
            $routeSaveImg = 'image/';
            $imgMachine = date('YmdHis').".". $image->getClientOriginalExtension();
            $image->move($routeSaveImg,$imgMachine);
            $machine['image'] = "$imgMachine";
        }else {
            unset($machine['image']);
        }
        $machineModel = Machine::find($id);
        $machineModel->update($machine);

        return redirect()->route('machineIndex');
    }

    public function destroy(string $id)
    {
        $machine = Machine::find($id);
        if ($machine) {
            $machine->delete();
        }
        return redirect()->back();
    }
}

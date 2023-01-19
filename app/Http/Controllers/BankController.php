<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
class BankController extends Controller
{
    public function datatable(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
     
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('datatables');
    }
    public function index()
    {
        $banks = Bank::paginate(1);
        return view('banks.index',['banks' => $banks]);
    }

    

    public function create()
    {
        return view('banks.create-edit');
    }

  
    public function store(Request $request)
    {
        if(isset($request->id)){
            $bank = Bank::findOrFail($request->id);
            $bank->fill(request()->except('_token'));
            $bank->update();
        }else{
            $bank = new Bank();
            $bank->fill(request()->except('_token'));
            $bank->save();
        }
        return redirect()->route('banks.index');
    }

  
    public function show(Bank $bank)
    {
        return "<br> Show <br> ".$bank;
    }


    public function edit(Bank $bank)
    {
        return view('banks.create-edit',['bank' => $bank]);
    }


    public function update(Request $request, Bank $bank)
    {
        //
    }

    public function destroy(Bank $bank)
    {
        $bank->delete();
        return redirect()->route('banks.index');
    }
}

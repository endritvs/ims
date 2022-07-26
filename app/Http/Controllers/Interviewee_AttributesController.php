<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interviewee_Attribute;
use App\Models\Interviewee_Type;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class Interviewee_AttributesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

        $intervieweesA = Interviewee_Attribute::with('interviewee_type')->orderBy('id', 'asc')->where('company_id', Auth::user()->company_id)->paginate(5, ['*'], 'intervieweesA');
        $intervieweesT = Interviewee_Type::orderBy('id', 'asc')->where('company_id', Auth::user()->company_id)->paginate(5, ['*'], 'intervieweesT');

        $sql="SELECT t.name, GROUP_CONCAT( i.name ) as 'Attributes' FROM interviewee_attributes i inner join interviewee_types t on i.interviewee_type_id=t.id group by i.interviewee_type_id, ims_database.t.name";
        $exec=DB::select(DB::raw($sql));

        $data = $this->paginate($exec);

        $data->withPath('/candidate-options');

        return view('intervieweeAttributesComponents/table')->with(['data'=>$data,'intervieweesA' => $intervieweesA, 'intervieweesT' => $intervieweesT]);
    }
    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


    public function store(Request $request)
    {

        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->get();

        $request->validate([
            'name' => ['required'],
            'interviewee_type_id' => ['required'],
            'company_id' => ['required'],

        ]); 
        
        Interviewee_Attribute::create([
            'name' => $request['name'],
            'interviewee_type_id' => $request['interviewee_type_id'],
            'company_id' => Auth::user()->company_id,
        ]);
      
        return  back()->with(['intervieweesT' => $intervieweesT]);
    }
 
    public function edit($id)
    {
        $interviewee=Interviewee_Attribute::with('interviewee_type')->orderBy('id', 'asc')->get();
        $intervieweesT = Interviewee_Type::orderBy('id', 'desc')->get();
        $interviewee = Interviewee_Attribute::findOrFail($id);
        return view('intervieweeAttributesComponents/edit')->with(['interviewee' => $interviewee,'intervieweesT' => $intervieweesT]);
    }
    public function update(Request $request, $id)
    {
        $interviewee = Interviewee_Attribute::findOrFail($id);
        $request->validate([
            'name' => ['required'],
            'interviewee_type_id' => ['required'],
        ]);
        $interviewee->name = $request->name;
        $interviewee->interviewee_type_id = $request->interviewee_type_id;
        $interviewee->save();

        return back();
    }
    public function destroy($id)
    {
        $interviewee = Interviewee_Attribute::findOrFail($id);
        $interviewee->delete();
        return back();
    }
}
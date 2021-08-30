<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Requests\SavePartnerRequest;

class PartnerController extends Controller
{
    
    public function index()
    {
        $partners = Partner::orderBy('name', 'ASC')->paginate(25);

        return view('partners.index', compact('partners'));
    }

    public function create()
    {
        $users = User::where('type', 'Socio')
        ->doesntHave('partners')->select('id', 'name')
        ->get();

        return view('partners.create', compact('users')); 
    }

    public function store(SavePartnerRequest $request)
    {
        $partnerCreated = Partner::create([
            'name'                  => $request->name,
            'last_name'             => $request->last_name,
            'document'              => $request->document,
            'address'               => $request->address,
            'email'                 => $request->email,
            'phone'                 => $request->phone,
            'investment_mount'      => $request->investment_mount,
            'rate'                  => $request->rate,
            'percent_investment'    => $request->percent_investment,
            'percent_participation' => $request->percent_participation,
        ]); 

        if($request->user_id != 0){
    
            $user = User::findOrFail($request->user_id);
            $userAttach = $partnerCreated->users()->attach($user);

        }

        alert()->success('Socio creado','Socio creado con éxito.')->autoclose(2000);

        return redirect('/socios');
    }

    public function show(Partner $partner)
    {
        //
    }

    public function edit($partner)
    {
        $partner = Partner::findOrFail($partner);

        $users = User::where('type', 'Socio')
        ->select('id', 'name')
        ->get();

        return view('partners.edit', ['partner' => $partner, 'users' => $users]);
    }

    public function update(Request $request, $partner)
    {
        $partner = Partner::findOrFail($partner);

        $partner->update([
            'name'                  => $request->name,
            'last_name'             => $request->last_name,
            'document'              => $request->document,
            'address'               => $request->address,
            'email'                 => $request->email,
            'phone'                 => $request->phone,
            'investment_mount'      => $request->investment_mount,
            'rate'                  => $request->rate,
            'percent_investment'    => $request->percent_investment,
            'percent_participation' => $request->percent_participation,
        ]);

        $partnerUpdated = Partner::find($partner->id);  

        if($request->user_id != 0){
    
            $user = User::findOrFail($request->user_id);
            $userAttach = $partnerUpdated->users()->attach($user);

        }

        alert()->success('Socio actualizado','Socio actualizado con éxito.')->autoclose(2000);

        return redirect('/socios');
    }

    public function destroy($partner)
    {
        $partner = Partner::findOrFail($partner);

        $partner->delete();

        alert()->success('Socio eliminado','Socio eliminado con éxito.')->autoclose(2000);

        return back();
    }
}

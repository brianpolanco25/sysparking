<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use UxWeb\SweetAlert\SweetAlert;
use Illuminate\Http\Request;
use App\Http\Requests\SaveCustomerRequest;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    
    public function index()
    {
        $customers = Customer::orderBy('name', 'Desc')->paginate(25);

        return view('customers.index', compact('customers'));
    }

    public function create(){

        $users = User::where('type', 'Cliente')
        ->doesntHave('customers')->select('id', 'name')
        ->get();

        return view('customers.create', compact('users'));    

    }
    
    public function store(SaveCustomerRequest $request)
    {
        
        $customerCreated = Customer::create([
                                    'name'              => $request->name,
                                    'last_name'         => $request->last_name,
                                    'document'          => $request->document,
                                    'address'           => $request->address,
                                    'email'             => $request->email,
                                    'phone'             => $request->phone,
                                    'investment_mount'  => $request->investment_mount,
                                    'rate'              => $request->rate,
                                ]); 

        if($request->user_id != 0){
    
            $user = User::findOrFail($request->user_id);
            $userAttach = $customerCreated->users()->attach($user);

        }

        alert()->success('Cliente creado','Cliente creado con éxito.')->autoclose(2000);

        return redirect('/clientes');
    }

    public function edit($customer){

        $customer = Customer::findOrFail($customer);

        $users = User::where('type', 'Cliente')
        ->select('id', 'name')
        ->get();

        return view('customers.edit', ['customer' => $customer, 'users' => $users]);

    }

    
    public function update(Request $request, $customer)
    {

        $customer = Customer::findOrFail($customer);
        // return $request->user_id;
        $customer->update([
            'name'              => $request->name,
            'last_name'         => $request->last_name,
            'document'          => $request->document,
            'address'           => $request->address,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'investment_mount'  => $request->investment_mount,
            'rate'              => $request->rate,
        ]);

        $customerUpdated = Customer::find($customer->id);

        if($request->user_id != 0){
            $user = User::findOrFail($request->user_id);
            $userAttach = $customerUpdated->users()->attach($user);
        }

        alert()->success('Cliente actualizado','Cliente actualizado con éxito.')->autoclose(2000);

        return redirect('/clientes');

    }

    
    public function destroy($customer)
    {
        $customer = Customer::findOrFail($customer);

        $customer->delete();

        alert()->success('Cliente eliminado','Cliente eliminado con éxito.')->autoclose(2000);

        return back();
    }
}

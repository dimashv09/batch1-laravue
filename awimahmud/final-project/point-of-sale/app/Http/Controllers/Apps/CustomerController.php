<?php

namespace App\Http\Controllers\Apps;

use Inertia\Inertia;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get customer
        $customers = Customer::when(request()->q, function($customers) {
            $customers->where('name', 'like', '%' . request()->q . '%');
        })->latest()->paginate(5);
        
        $currentPage = $customers->currentPage();
        $perPage = $customers->perPage();
        $startIndex = ($currentPage - 1) * $perPage;

        return Inertia::render('Apps/Customers/Index', [
            'customers' => $customers,
            'startIndex' => $startIndex,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //render with inertia
        return Inertia::render('Apps/Customers/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'name'      => 'required',
            'no_telp'   => 'required|unique:customers',
            'address'   => 'required',
        ]);

        //create customer
        Customer::create([
            'name'      => $request->name,
            'no_telp'   => $request->no_telp,
            'address'   => $request->address,
        ]);

        //redirect
        return redirect()->route('apps.customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function edit(Customer $customer)
    {
        return Inertia::render('Apps/Customers/Edit', [
            'customer' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //validate
        $this->validate($request, [
            'name'      => 'required',
            'no_telp'   => 'required|unique:customers,no_telp,' . $customer->id,
            'address'   => 'required',
        ]);

        //update customer
        $customer->update([
            'name'      => $request->name,
            'no_telp'   => $request->no_telp,
            'address'   => $request->address,
        ]);

        //redirect
        return redirect()->route('apps.customers.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //find customer by id
        $customer = Customer::findOrfail($id);
        
        //delete customer
        $customer->delete();

        //redirect
        return redirect()->route('apps.customers.index');
    }
}
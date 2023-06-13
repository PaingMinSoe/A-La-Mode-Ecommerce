<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('admin.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:suppliers',
            'phone_number' => 'required|string|unique:suppliers',
            'address' => 'required|max:255',
        ]);

        Supplier::create($validated);
        return redirect(route('admin.suppliers.index'))->with('message', 'Supplier Successfully Added!')->with('class', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param Supplier $supplier
     * @return Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Supplier $supplier
     * @return Application|Factory|View
     */
    public function edit(Supplier $supplier)
    {
        return view('admin.suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Supplier $supplier
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|max:255|unique:suppliers,name,' . $supplier->id,
            'phone_number' => 'required|numeric|digits:11',
            'address' => 'required|max:255',
        ]);

        $supplier->name = $request->name;
        $supplier->phone_number = $request->phone_number;
        $supplier->address = $request->address;

        $supplier->save();
        return redirect(route('admin.suppliers.index'))->with('message', 'Supplier Successfully Updated!')->with('class', 'success');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Supplier $supplier
     * @return RedirectResponse
     */
    public function destroy(Supplier $supplier): RedirectResponse
    {
        $supplier->delete();
        return back()->with('message', 'Supplier Successfully Deleted!')->with('class', 'success');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Company;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'allContacts' => Contact::latestFirst()->paginate(10),
            'allCompanies' => Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', ''),
            'companyFilter' => request('company_id')
        ];

        return view('contacts.index', $data);
    }

    public function create()
    {
        $data = [
            'companies' => Company::orderBy('name')->pluck('name', 'id')->prepend('Select Company', ''),
            'contact' => new Contact(),
        ];
        return view('contacts.create', $data);
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        $company = Company::find($contact->company_id);
        $data = [
            'contact' => $contact,
            'company' => $company
        ];
        return view('contacts.show', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts.index')->with('message', 'Contact has been added successfully');
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        $companyId = null;
        if ($contact->exists) {
            $companyId = $contact->company_id;
        }

        $data = [
            'contact' => $contact,
            'companies' => Company::orderBy('name')->pluck('name', 'id')->prepend('Select Company', ''),
            'company_id' => $companyId,
        ];
        return view('contacts.edit', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'contact_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        $contactId = request('contact_id');
        $contact = Contact::findOrFail($contactId);
        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message', 'Contact has been updated successfully');
    }

    public function destroy($id)
    {
        echo 'delete this contact<br>';
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return back()->with('message', 'Contact has been deleted successfully');
    }
}

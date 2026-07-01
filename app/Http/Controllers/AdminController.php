<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $records = \App\Models\Student_Data::all()->map(function($item) {
            return [
                'id' => $item->id,
                'name' => $item->name,
                'cls' => $item->class,
                'section' => $item->section,
                'roll' => $item->roll_number,
                'dob' => $item->date_of_birth,
                'admNo' => $item->admission_number,
                'father' => $item->father_name,
                'mother' => $item->mother_name,
                'contact' => $item->contact_number,
                'contact2' => $item->alternate_contact_number,
                'address' => $item->address,
                'leaveDate' => $item->leaving_date,
                'tcDate' => $item->tc_date_issued,
                'status' => $item->tc_status,
                'reason' => $item->leaving_reason,
                'transferTo' => $item->transfer_to_school,
                'docType' => $item->document ? (in_array(strtolower(pathinfo($item->document, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png']) ? 'image' : 'file') : null,
                'docData' => $item->document ? asset('storage/'.$item->document) : null,
                'docName' => $item->document ? basename($item->document) : '',
                'createdAt' => $item->created_at->format('Y-m-d')
            ];
        });

        return view('admin.dashboard', compact('records'));
    }

    public function store(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'name' => 'required',
            'class' => 'required',
            'father_name' => 'required',
            'contact_number' => 'required|digits:10',
            'address' => 'required',
            'leaving_date' => 'required',
            'leaving_reason' => 'required',
            'document' => 'nullable|file|mimes:png,jpg,jpeg,pdf,doc,docx|max:5120'
        ]);

        $data = $request->except(['_token', 'editId', 'document']);

        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $safeName = \Illuminate\Support\Str::slug($request->name);
            $safeClass = \Illuminate\Support\Str::slug($request->class);
            $filename = $safeName . '_' . $safeClass . '_' . time() . '.' . $extension;
            $path = $file->storeAs('documents', $filename, 'public');
            $data['document'] = $path;
        }

        if ($request->editId) {
            \App\Models\Student_Data::where('id', $request->editId)->update($data);
            return redirect()->back()->with('success', 'Record updated successfully!');
        } else {
            \App\Models\Student_Data::create($data);
            return redirect()->back()->with('success', 'Record added successfully!');
        }
    }

    public function delete($id)
    {
        \App\Models\Student_Data::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Record deleted successfully!');
    }
}

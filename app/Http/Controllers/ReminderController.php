<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;

class ReminderController extends Controller
{
    /**
     * Display the vaccency view.
     */
    public function index() 
    {
        $reminders = Reminder::all();
        return view('admin.adminhome', ['reminders' => $reminders]);
    }
    
    public function reminder() 
    {
        $reminders = Reminder::all();
        return view('reminder.create', ['reminders' => $reminders]);
    }

    public function create(Request $request) {
        $request->validate([
            'title' => ['required', 'max:255']
        ]);

        $reminders = Reminder::create([
            'title' => $request->input('title')
        ]);

        return redirect('/home')->with('message', 'Successfully Added Reminder');
    }

    public function edit($id)
    {
        $reminders = Job::find($id);
        if (! $reminders)
        {
            return redirect('/home')->with('message', 'Reminder Not Found');
        }

        return view('reminder.edit', ['reminders' => $reminders]);
    }

    public function update(UpdateJobRequest $request) {

        $title = $request->input('title');

        $reminders = Reminder::where('id' , $id )
            ->update([
                'title' => $title
        ]);

        return redirect('/jobs')->with('message', 'Job Vaccency updated successfully.');
    }

    public function destroy($id) { 
        $reminders = Reminder::find($id);
        if (! $job)
        {
            return redirect('/jobs')->with('message', 'Vaccency Not Found');
        }
        $reminders-> delete();
        return redirect('/jobs')->with('message', 'Job Vaccency Deleted Successfully');
    }
}
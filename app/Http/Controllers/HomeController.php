<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Reminder;
use App\Models\Job;
use App\Models\Application;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id())
        {
            $usertype = Auth()->user()->usertype;
            $reminders = Reminder::all();
            $users = User::all();
            $usersCount = User::count();
            $jobsCount = Job::count();
            $applicationsCount = Application::count();

            if ($usertype == 'user')
            {
                return view('dashboard', ['reminders' => $reminders]);
            }
            else if ($usertype == 'admin')
            {
                return view('admin.adminhome', compact('reminders', 'users', 'usersCount', 'jobsCount', 'applicationsCount'));
            }
            else
            {
                return redirect("{{ route('login') }}");
            }
        }
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
        $reminders = Reminder::find($id);
        if (! $reminders)
        {
            return redirect('/home')->with('message', 'Reminder Not Found');
        }

        return view('reminder.edit', ['reminders' => $reminders]);
    }

    public function update(Request $request) {
        $request->validate([
            'title' => ['required', 'max:255'],
            'completed' => ['required'],
        ]);
    
        $title = $request->input('title');
        $completed = $request->input('completed');

        $reminder_id = $request->input('id');
    
        $reminders = Reminder::where('id', $reminder_id)
            ->update([
                'title' => $title,
                'completed' => $completed,
        ]);
    
        return redirect('/home')->with('message', 'Reminder updated successfully.');
    }

    public function delete($id) { 
        $reminders = Reminder::find($id);
        if (! $reminders)
        {
            return redirect('/home')->with('message', 'Reminder Not Found');
        }
        $reminders-> delete();
        return redirect('/home')->with('message', 'Reminder Deleted Successfully');
    }
}

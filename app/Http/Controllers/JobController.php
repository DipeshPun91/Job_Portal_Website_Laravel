<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Requests\ApplicationJobRequest;
use App\Models\Job;
use App\Models\Category;
use App\Models\User;
use App\Models\Application;
use Auth;

class JobController extends Controller
{
    /**
     * Display the vaccency view.
     */
    public function vaccency() 
    {
        $categories = Category::all();
        return view('jobs.jobvaccency', ['categories' => $categories]);
    }

    public function create_job(CreateJobRequest $request)
    {
        $user_id = Auth::id();
        $category_id = $request->input('category');;
        $title = $request->input('title');
        $salary = $request->input('salary');
        $deadline = $request->input('deadline');
        $profile = $request->input('description');

        $job = Job::create([
            'user_id' => $user_id,
            'category_id' => $category_id,
            'title' => $title,
            'salary' => $salary,
            'deadline' => $deadline,
            'description' => $profile
        ]);

        return redirect('/home')->with('message', 'Successfully Added Vaccency');
    }

    public function display_job(Request $request) {
        if ($request->has('category') || $request->has('user')) {
            // $jobs = Job::where('category_id', $request->category)->get();
            
            $category = Category::find($request->category);
            $user = User::find($request->user);
            if ($category && $user) {
                $jobs = Job::where('category_id', $request->category)->where('user_id', $request->user)->paginate(5)->withQueryString();
            }
            elseif ($category) {
                $jobs = Job::where('category_id', $request->category)->paginate(5)->withQueryString();
            }
            elseif ($user) {
                $jobs = Job::where('user_id', $request->user)->paginate(5)->withQueryString();
            }
            else {
                $jobs = Job::paginate(5)->withQueryString();
            }
        } 
        else {
            // $jobs = Job::all();
            $jobs = Job::paginate(5)->withQueryString();
        }

        $categories = Category::all();
        $users = User::all();
        // return view('jobs.displaylist', compact('jobs'));
        return view('jobs.displaylist', ['jobs' => $jobs, 'categories' => $categories, 'users' => $users]);
    }

    public function destroy($id) { 
        $job = Job::find($id);
        if (! $job)
        {
            return redirect('/jobs')->with('message', 'Vaccency Not Found');
        }

        $applications = $job->applications;
        $application_ids = [];

        foreach ($applications as $application) {
            $application_ids [] = $application->id;
        }
        Application::destroy($application_ids);
        $job-> delete();
        return redirect('/jobs')->with('message', 'Job Vaccency Deleted Successfully');
    }

    public function edit($id)
    {
        $job = Job::find($id);
        if (! $job)
        {
            return redirect('/jobs')->with('message', 'Job Vaccency Not Found');
        }

        $categories = Category::all();

        return view('jobs.editvaccency', ['job' => $job, 'categories' => $categories]);
    }

    public function update(UpdateJobRequest $request) {

        $title = $request->input('title');
        $category = $request->input('category_id');
        $salary = $request->input('salary');
        $deadline = $request->input('deadline');
        $profile = $request->input('description');

        $job_id = $request->input('id');

        $job = Job::where('id' , $job_id )
            ->update([
                'title' => $title,
                'category_id' => $category,
                'salary' => $salary,
                'deadline' => $deadline,
                'description' => $profile
        ]);

        return redirect('/jobs')->with('message', 'Job Vaccency updated successfully.');
    }

    public function learn($id) {

        $job = Job::find($id);
        // $job =Job::where('id', $id)->get()->first();
        if (! $job)
        {
            return redirect('/jobs')->with('message', 'Job Vaccency Not Found');
        }

        return view('jobs.viewjob', ['job' => $job]);
    }

    public function apply($id) {
       return view('jobs.applyvacancy', ['job_id' => $id]);
    }

    public function submit(ApplicationJobRequest $request) {
        if ($request->hasFile('attachments'))
        {
            $attachment = $request->file('attachments');
            $attachment_name = $attachment->hashName();
            $path = $attachment->move('attachments/',$attachment_name);
        }
        else
        {
            $attachment_name=null;
        }

        $job_id = $request->input('job_id');
        $name = $request->input('name');
        $address = $request->input('address');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $attachments = $attachment_name;
        $cover_letter = $request->input('cover_letter');
        
        $application = Application::create([
            'job_id' => $job_id,
            'name' => $name,
            'address' => $address,
            'email' => $email,
            'phone' => $phone,
            'attachments' => $attachments,
            'cover_letter' => $cover_letter
        ]);

        return redirect('/jobs')->with('message', 'Successfully Applied For Vaccency');
    }

    public function applications(Request $request) {
        $user = Auth::user();
        // $jobs = Job::select('id')->where('user_id', $user-id)->get();

        $jobs = $user->jobs;
        $job_ids = [];
        foreach ($jobs as $job) {
            $job_ids [] = $job->id;
        }
        if ($request->has('search')) {
            $applications = Application::whereIn('job_id',  $job_ids)
            ->where('address', 'like', '%'.$request->search.'%')
            ->paginate(2)->withQueryString();
        }
        else {
            $applications = Application::whereIn('job_id',  $job_ids)
            ->paginate(2)->withQueryString();
        }

        return view('jobs.applicationlist', ['applications' => $applications]);
    }

    public function delete($id) { 
        $user = Auth::user();
        $jobs = $user->jobs;
        $job_ids = [];
        foreach ($jobs as $job) {
            $job_ids [] = $job->id;
        }

        $application = Application::find($id);
        $application_job_id = $application->job_id;
        if (in_array($application_job_id, $job_ids))
        {
            $application-> delete();
            return redirect('/applications')->with('message', 'Job Application Deleted Successfully');
        }
        else {
            return redirect('/applications')->with('message', 'You are not authorized to delete this application');
        }
    }
}

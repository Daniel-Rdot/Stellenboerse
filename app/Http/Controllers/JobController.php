<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Repositories\JobRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JobController extends Controller
{
    protected JobRepository $jobRepository;

    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $user = $request->user();
        $data = $request->query();

        // Manage Listings View (Filter Jobs by Company)

        if (isset($data['manage'])) {
            $jobs = $user->company->jobs()->paginate(20);
        } else {
            $jobs = Job::paginate(20);
        }


        // Code für Suchfeld
//        $jobs = Job::query()
//            ->when(isset($data['company_id']), function ($query) use ($data) {
//                $query->where('company_id', 'LIKE', '%' . $data['company_id'] . '%');
//            })
//            ->paginate();

        return view('jobs.index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate(Job::validationRules());

        $job = $this->jobRepository->updateOrCreate($data);

        return redirect(route('jobs.show', ['job' => $job]))->with('message', trans('app.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job): View
    {
        return view('jobs.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job): View
    {
        return view('jobs.edit', ['job' => $job]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job): RedirectResponse
    {
        $data = $request->validate(Job::validationRules());

        $this->jobRepository->updateOrCreate($data, $job);

        return redirect($job->url)->with('message', trans('app.successfully_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job): RedirectResponse
    {
        $job->delete();

        return back()->with('message', trans('app.successfully_deleted'));
    }
}

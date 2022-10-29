<?php

namespace App\Http\Controllers\Backend;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Repositories\Backend\TicketRepository;

class TestimonialController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * Setting Authentication
     *
     * @param \App\Repositories\Backend\TicketRepository $repository
     * @return void
    */
    public function __construct(TicketRepository $repository)
    {
        $this->middleware('auth:admin');

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
       $testimonials = Testimonial::all();
        return view('backend.testimonial.index', [
            'datas' => $testimonials
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('backend.ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'file'    => 'file|mimes:zip|max:5000',
            'email'   => 'required|exists:users,email',
            'message' => 'required|max:255',
            'subject' => 'required|max:255'
        ]);

        $this->repository->store($request);
        return redirect()->route('backend.ticket.index')->withSuccess(__('New Ticket Added Successfully.'));
    }

    /**
     * Change the status for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function publish($id)
    {
        Testimonial::findOrFail($id)->update([ 'status' => 1]);
        return redirect()->route('backend.testimonial.index')->withSuccess(__('Testimonial Updated Successfully.'));
    }
    public function unpublish($id)
    {
        Testimonial::findOrFail($id)->update([ 'status' => 0]);
        return redirect()->route('backend.testimonial.index')->withSuccess(__('Testimonial Updated Successfully.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $testimonial = Testimonial::where('id',$id)->first();
        return view('backend.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'message' => 'required|max:255'
        ]);
        $this->repository->update($ticket, $request);
        return redirect()->back()->withSuccess(__('Ticket Reply Successfully.'));
    }

    /**
     * Remove the specified resoruce from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        Testimonial::findOrFail($id)->delete();
        return redirect()->route('backend.testimonial.index')->withSuccess(__('Testimonial Deleted Successfully.'));
    }
}

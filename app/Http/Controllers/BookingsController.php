<?php

namespace App\Http\Controllers;

use App\Bookings;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $display_all_bookings = Bookings::all();

        foreach ($display_all_bookings as $values) {
            if (($values->vehicle === "8 Ton") ) {
                $values->price = $values->number_of_labour * 420;
            } else if ($values->vehicle === "1.5 Ton") {
                $values->price = $values->number_of_labour * 320;
            } else if ($values->vehicle === "1.5 Ton") {
                $values->price = $values->number_of_labour * 120;
            } else if ($values->vehicle === "1 Ton") {
                $values->price = $values->number_of_labour * 100;
            } else if ($values->vehicle === "Mini Van") {
                $values->price = $values->number_of_labour * 70;
            } else {
                $values->price = 0;
            }
        }
        return view('index', compact('display_all_bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saveBookings = new Bookings;

        $this->user_validation_script_save_and_update($request, $saveBookings, null);
        // Redirect page after saving record(s)
        return redirect(route('home'))->with('success_message', 'Your bookings were successfully saved!!!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function show(Bookings $bookings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editBookings = Bookings::findOrFail($id);
        return view('edit', compact('editBookings'))->withData($editBookings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateBooking = Bookings::find($id);
        // $this->user_validation_script_save_and_update($request, $updateBooking, $id);
        Bookings::where('id', $id)->update($this->validateUserForm());
         // Redirect page after updating record(s)
        return redirect(route('home'))->with('success_message', 'Your bookings were successfully updated!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $editBookings = Bookings::findOrFail($id)->delete();
        return redirect(route('home'))->with('success_message', 'Your record was successfully deleted!!!');
    }

    protected function validateUserForm()
    {
        return \request()->validate([
            "pickup_address" => 'required',
            "dropoff_address" => 'required',
            "client_name" => 'required',
            "client_phone_number" => 'requiredmax:10',
            "pickup_date" => 'required',
            "pickup_time" => 'required',
            "courier_name" => 'required',
            "courier_phone_number" => 'required|max:10',
            "number_of_labour" => 'required',
            "comments" => 'required',
            "vehicle" => 'required',
        ]);
    }

    private function user_validation_script_save_and_update($request, $model, $id)
    {
        $model->pickup_address = $request->input('pickup_address');
        $model->client_name = $request->input('client_name');
        $model->client_phone_number = $request->input('client_phone_number');
        $model->pickup_date = $request->input('pickup_date');
        $model->pickup_time = $request->input('pickup_time');
        $model->number_of_labour = $request->input('number_of_labour');
        $model->vehicle = $request->input('vehicle');
        $model->dropoff_address = $request->input('dropoff_address');
        $model->courier_name = $request->input('courier_name');
        $model->courier_phone_number = $request->input('courier_phone_number');
        $model->comments = $request->input('comments');
        // check the form [method] - Save record(s)
        if ($request->isMethod('post')) {
            return $model->create($this->validateUserForm());
        }
    }
}

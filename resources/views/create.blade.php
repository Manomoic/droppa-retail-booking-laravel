@extends('main')

@section('content')
<section class="my-5">

    <form action="{{ route('store') }}" method="POST">
        {{-- {{ csrf_field() }} --}}
        @csrf

        <div class="row flex-row align-items-center">

            <div class="col-lg-4 col-sm-12">
                <div class="table-responsive-xxl">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td colspan="2">Pick up Address</td>
                                <td colspan="4">
                                    <input type="text" name="pickup_address"
                                        class="form-control @error('pickup_address') is-invalid @enderror"
                                        value="{{ old('pickup_address') }}" />
                                    {{-- Throw an input error --}}
                                    @error('pickup_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td colspan=" 2">Name</td>
                                <td colspan="4">
                                    <input type="text" name="client_name"
                                        class="form-control @error('client_name') is-invalid @enderror"
                                        value="{{ old('client_name') }}" />
                                    {{-- Throw an input error --}}
                                    @error('client_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Phone number</td>
                                <td colspan="4">
                                    <input type="text" name="client_phone_number"
                                        class="form-control @error('client_phone_number') is-invalid @enderror"
                                        value="{{ old('client_phone_number') }}" />
                                    {{-- Throw an input error --}}
                                    @error('client_phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>Pick Up Date</td>
                                <td>
                                    <input type="date" class="form-control @error('pickup_date') is-invalid @enderror"
                                        name="pickup_date" value="{{ old('pickup_date') }}" />
                                    {{-- Throw an input error --}}
                                    @error('pickup_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td>Pick Up Time</td>
                                <td>
                                    <input type="time" class="form-control @error('pickup_time') is-invalid @enderror"
                                        name="pickup_time" value="{{ old('pickup_time') }}" />
                                    {{-- Throw an input error --}}
                                    @error('pickup_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Number Of Labour</td>
                                <td colspan="4">
                                    <input type="number"
                                        class="form-control @error('number_of_labour') is-invalid @enderror"
                                        name="number_of_labour" id="number_of_labour"
                                        value="{{ old('number_of_labour') }}" />
                                    {{-- Throw an input error --}}
                                    @error('number_of_labour')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="card border border-light shadow-0 mb-3 mx-auto" style="max-width: 20rem">
                    <div class="card-body">
                        <img src="{{ asset('img/default.jpg')}}" class="card-img-top img-fluid" alt="..."
                            id="select_motor_vehicle" />

                        <select name="vehicle" id="vehicle" class="form-control @error('vehicle') is-invalid @enderror">
                            <option value="Select a vehicle" onclick="imagesliderFN('{{ asset('img/default.jpg')}}')">
                                Select
                                Vehicle</option>
                            <option value="Mini Van" onclick="imagesliderFN('{{ asset('img/mini_van.png')}}')"> Mini
                                Van
                            </option>
                            <option value="1 Ton" onclick="imagesliderFN('{{ asset('img/one_ton.png')}}')"> 1 Ton
                            </option>
                            <option value="1.5 Ton" onclick="imagesliderFN('{{ asset('img/one_half_ton.png')}}')">
                                1.5 Ton
                            </option>
                            <option value="4 Ton" onclick="imagesliderFN('{{ asset('img/four_ton.png')}}')">
                                4 Ton
                            </option>
                            <option value="8 Ton" onclick="imagesliderFN('{{ asset('img/eight_ton.png')}}')">
                                8 Ton
                            </option>
                            {{-- Throw an input error --}}
                            @error('vehicle')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </select>

                        {{-- <label for="price" name="price" id="price" class="form-control mt-2"></label> --}}
                        <input type="text" class="form-control mt-2" name="price" id="price" placeholder="Cost Price"
                            value="{{ old('price') }}" />
                        {{-- Throw an input error --}}
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-sm-12">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td colspan="2">Drop Off Address</td>
                                <td colspan="4">
                                    <input type="text" name="dropoff_address"
                                        class="form-control @error('dropoff_address') is-invalid @enderror"
                                        value="{{ old('dropoff_address') }}" />
                                    {{-- Throw an input error --}}
                                    @error('dropoff_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Name</td>
                                <td colspan="4">
                                    <input type="text" name="courier_name"
                                        class="form-control @error('courier_name') is-invalid @enderror"
                                        value="{{ old('courier_name') }}" />
                                    {{-- Throw an input error --}}
                                    @error('courier_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Phone number</td>
                                <td colspan="4">
                                    <input type="text"
                                        class="form-control @error('courier_phone_number') is-invalid @enderror"
                                        value="{{ old('courier_phone_number') }}" name="courier_phone_number" />
                                    {{-- Throw an input error --}}
                                    @error('courier_phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">Comment</td>
                                <td colspan="4">
                                    <textarea class="form-control @error('comments') is-invalid @enderror"
                                        name="comments" placeholder="Leave an instruction for the driver"></textarea>
                                    {{-- Throw an input error --}}
                                    @error('comments')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-lg btn-primary float-right" type="submit" id="createButton">Create
                    Bookings</button>
            </div>
        </div>
    </form>

</section>

@endsection
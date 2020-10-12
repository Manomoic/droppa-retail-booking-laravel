@extends('main')

@section('content')
<section class="my-5">
    <h3 class="display-5 font-weight-light mb-4">Drop Off Address</h3>

    {{-- If results are save, spit this session message out. --}}
    @if (session('success_message'))
    <div class="alert fade" data-hidden="true" data-offset="100" role="alert" data-color="primary">
        {{ session('success_message') }}
    </div>
    @endif

    <div class="table-responsive-xxl mt-4">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Pick Up Address</th>
                    <th scope="col">Drop Off Address</th>
                    <th scope="col">Vehicle Type</th>
                    <th scope="col">Labour(s)</th>
                    <th scope="col">Price</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

                @forelse ($display_all_bookings as $bookings)
                <tr class="table-active">
                    <th scope="row">{{ $bookings->id }}</th>
                    <td>{{ $bookings->pickup_date }}</td>
                    <td>{{ $bookings->pickup_address }} </td>
                    <td>{{ $bookings->dropoff_address }}</td>
                    <td>{{ $bookings->vehicle }}</td>
                    <td>{{ $bookings->number_of_labour }}</td>
                    <td>R {{ $bookings->price }}</td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            {{-- Edit --}}
                            <a href="{{ route('edit', $bookings->id) }}" type="button"
                                class="btn btn-sm btn-light">Edit</a>

                            {{-- Delete --}}
                            <form action="{{ route('delete', $bookings->id) }}" method="post"
                                id="delete-{{$bookings->id}}" style="display: none;">

                                @csrf
                                @method('delete')
                            </form>
                            <a type="button" class="btn btn-sm btn-outline-danger"
                                onclick="document.querySelector('#delete-{{$bookings->id}}').submit()">Delete</a>
                        </div>
                    </td>
                </tr>
                {{-- onDeleteBookings({{ $bookings->id }}) --}}
                @empty
                <tr>
                    <td colspan="8">No available bookings.</td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>

</section>
@endsection
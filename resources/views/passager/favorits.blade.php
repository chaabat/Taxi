<x-app-layout>

    <div class="relative bg-gray-50 dark:bg-slate-900 w-full h-full pattern">


    <div class="container">
        <h1>Favorit Reservations</h1>

        @if($favoritReservations->isEmpty())
            <p>No favorit reservations found.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Départ</th>
                        <th>Destination</th>
                        <!-- Add more table headers as needed -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($favoritReservations as $reservation)
                        <tr>
                            <td>{{ $reservation->date }}</td>
                            <td>{{ $reservation->depart }}</td>
                            <td>{{ $reservation->destination }}</td>
                            <!-- Add more table cells to display other reservation details -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>


   
       @include('passager.sidebar')
    </div>
        
    </x-app-layout>
    
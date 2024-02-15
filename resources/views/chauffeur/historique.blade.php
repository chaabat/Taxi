<x-app-layout>

        <div class="relative bg-gray-50 dark:bg-slate-900 w-full h-full pattern">
            <div class="container">
                <h1 class="text-2xl font-bold">Historique des réservations</h1>
                <h2 class="text-xl font-semibold mt-4">{{ $chauffeurs->name }}</h2>
                    @if($routes->isEmpty())
                        <p>Aucune réservation trouvée pour ce chauffeur.</p>
                    @else
                        <table class="table mt-2">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Départ</th>
                                    <th>Destination</th>
                                    <!-- Add more table headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($routes as $reservation)
                                    <tr>
                                        <td>{{ $reservation->date }}</td>
                                        <td>{{ $reservation->depart }}</td>
                                        <td>{{ $reservation->destination }}</td>
                                        <!-- Add more table cells as needed -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
            </div>
        </div>
        @include('chauffeur.sidebar')
    </x-app-layout>
    

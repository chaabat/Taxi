<x-app-layout>

    <div class="relative bg-gray-50 dark:bg-slate-900 w-full h-full pattern">
   


    <div class="container">
        <h1>Historique des réservations</h1>

        @if($reservations->isEmpty())
            <p>Aucune réservation trouvée.</p>
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
                    @foreach($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->date }}</td>
                            <td>{{ $reservation->depart }}</td>
                            <td>{{ $reservation->destination }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
 
</div>
</div>
       @include('passager.sidebar')
    </div>
      
    
       
        
    </x-app-layout>
    
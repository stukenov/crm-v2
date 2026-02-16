<div>
    <h2>История взаимодействий с {{ $contact->first_name }} {{ $contact->last_name }}</h2>

    <ul>
        @foreach($interactions as $interaction)
            <li>
                <strong>{{ $interaction->interaction_type }}</strong> - 
                {{ $interaction->interaction_datetime->format('d-m-Y H:i') }}: 
                {{ $interaction->interaction_summary }}
                <p>{{ $interaction->interaction_details }}</p>
            </li>
        @endforeach
    </ul>
</div>

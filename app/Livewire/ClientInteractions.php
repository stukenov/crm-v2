<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Interaction;

class ClientInteractions extends Component
{
    public $contact;
    public $interactions;

    public function mount(Contact $contact)
    {
        $this->contact = $contact;
        $this->loadInteractions();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }


    

    public function loadInteractions()
    {
        $this->interactions = $this->contact->interactions()->orderBy('interaction_datetime', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.client-interactions', [
            'interactions' => $this->interactions
        ]);
    }
}

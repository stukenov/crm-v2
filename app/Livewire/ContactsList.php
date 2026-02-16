<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Livewire\ClientInteractions;
use App\Models\Interaction;
use Livewire\WithPagination;

class ContactsList extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'first_name'; // Поле для сортировки
    public $sortDirection = 'asc'; // Направление сортировки

    public $contactId;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $company_name;
    public $position;
    public $address;
    public $notes;
    public $tags = [];
    public $showModal = false; // Добавлено свойство showModal
    public $showEditModal = false; // Добавлено свойство showEditModal
    public $showDeleteModal = false; // Добавлено свойство showDeleteModal
    public $showInteractionsModal = false; // Добавлено свойство showInteractionsModal
    public $interactions = []; // Добавлено свойство interactions

    protected $queryString = ['search'];

    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'nullable|email|max:255|unique:contacts,email',
        'phone' => 'nullable|string|max:20|unique:contacts,phone',
        'company_name' => 'nullable|string|max:255',
        'position' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:500',
        'notes' => 'nullable|string',
        'tags' => 'nullable|array',
    ];

    public function mount($contactId = null)
    {
        if ($contactId) {
            $this->loadContact($contactId);
        }
    }

    public function loadContact($contactId)
    {
        $contact = Contact::findOrFail($contactId);
        $this->contactId = $contact->id;
        $this->first_name = $contact->first_name;
        $this->last_name = $contact->last_name;
        $this->email = $contact->email;
        $this->phone = $contact->phone;
        $this->company_name = $contact->company_name;
        $this->position = $contact->position;
        $this->address = $contact->address;
        $this->notes = $contact->notes;
        $this->tags = $contact->tags;
    }

    public function save()
    {
        $this->validate();

        $contact = Contact::updateOrCreate(
            ['id' => $this->contactId],
            [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'company_name' => $this->company_name,
                'position' => $this->position,
                'address' => $this->address,
                'notes' => $this->notes,
                'tags' => $this->tags,
            ]
        );

        session()->flash('message', $this->contactId ? 'Contact updated successfully!' : 'Contact created successfully!');

        $this->showModal = false;
        $this->showEditModal = false;
        $this->showDeleteModal = false;

        return redirect()->to('/contacts');
    }

    public function edit($contactId)
    {
        $this->loadContact($contactId);
        $this->showEditModal = true;
    }

    public function delete($contactId)
    {
        $this->contactId = $contactId;
        $this->showDeleteModal = true;
    }

    public function confirmDelete()
    {
        Contact::findOrFail($this->contactId)->delete();

        session()->flash('message', 'Contact deleted successfully!');

        $this->showDeleteModal = false;

        return redirect()->to('/contacts');
    }

    public function viewInteractions($contactId)
    {
        $this->loadContact($contactId);
        $this->showInteractionsModal = true;
        $this->loadInteractions();
    
    }

    public function loadInteractions()
    {
        $contact = Contact::findOrFail($this->contactId);
        $this->interactions = $contact->interactions()->orderBy('interaction_datetime', 'desc')->get();
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

    public function render()
    {
        $contacts = Contact::query()
            ->where('first_name', 'like', '%' . $this->search . '%')
            ->orWhere('last_name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate(10);

        $contact = Contact::find($this->contactId);

        $interactions = Interaction::all();

        return view('livewire.contacts-list', [
            'contacts' => $contacts,
            'interactions' => $interactions,
            'contact' => $contact
        ]);
    }
}
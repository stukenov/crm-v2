<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Deal;
use App\Models\Contact;
use App\Models\User;

class DealFormModal extends Component
{
    public $deal;
    public $contacts;
    public $users;
    public $dealId;
    public $show;

    protected $listeners = ['closeModal'];

    protected $rules = [
        'deal.title' => 'required|string|max:255',
        'deal.description' => 'nullable|string',
        'deal.amount' => 'required|numeric|min:0',
        'deal.status' => 'required|in:lead,proposal,negotiation,closed_won,closed_lost',
        'deal.contact_id' => 'required|exists:contacts,id',
        'deal.assigned_to' => 'required|exists:users,id',
    ];

    public function mount($dealId = null)
    {
        $this->initializeData($dealId);
    }

    private function initializeData($dealId)
    {
        $this->contacts = Contact::all();
        $this->users = User::all();
        
        $this->deal = $dealId ? Deal::find($dealId) : new Deal();
    }

    public function closeModal()
    {
        $this->show = false;
        $this->emit('modalClosed');
    }

    

    public function save()
    {
        $this->validate();

        $this->deal->save();

        session()->flash('message', 'Сделка успешно сохранена.');

        return redirect()->route('deals.index');
    }

    public function render()
    {
        return view('livewire.deal-form-modal');
    }
}

<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Deal;

class DealIndex extends Component
{
    public $deals;
    public $showDealFormModal = false;
    public $dealId;
    
    public function mount()
    {
        $this->deals = Deal::with('contact', 'assignedUser')->get();
    }

    public function showDealFormModalFunction()
    {
        $this->showDealFormModal = true;
    }

    public function closeDealFormModalFunction()
    {
        $this->showDealFormModal = false;
    }

    public function render()
    {
        return view('livewire.deal-index');
    }
}

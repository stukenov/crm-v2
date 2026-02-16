<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ContactGroup;

class ContactGroups extends Component
{
    public $group_name;
    public $description;
    public $groupId;

    protected $rules = [
        'group_name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ];

    public function save()
    {
        $this->validate();

        ContactGroup::updateOrCreate(
            ['id' => $this->groupId],
            ['group_name' => $this->group_name, 'description' => $this->description]
        );

        session()->flash('message', $this->groupId ? 'Group updated successfully!' : 'Group created successfully!');

        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->group_name = '';
        $this->description = '';
        $this->groupId = null;
    }

    public function edit($id)
    {
        $group = ContactGroup::findOrFail($id);
        $this->groupId = $group->id;
        $this->group_name = $group->group_name;
        $this->description = $group->description;
    }

    public function delete($id)
    {
        ContactGroup::findOrFail($id)->delete();
        session()->flash('message', 'Group deleted successfully!');
    }

    public function render()
    {
        return view('livewire.contact-groups', [
            'groups' => ContactGroup::all()
        ]);
    }
}
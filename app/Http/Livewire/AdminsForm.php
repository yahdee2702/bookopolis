<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class AdminsForm extends Component
{

    use WithFileUploads;

    public $admin, $password, $photo;

    protected function rules() {
        $id = $this->admin->id ?? 0;
        return [
            "admin.name" => "required|string|min:4|max:255",
            "admin.username" => "required|string|max:255|regex:/^[a-zA-Z0-9_\-]+$/|min:4|max:255|unique:admins,username,".$id,
            "photo" => "nullable|file",
            "password" => "nullable|string|min:8|max:255",
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->password)
            $this->admin->password = $this->password;

        if ($this->photo) {
            $fileName = $this->photo->storePublicly('uploads/admins/'.$this->admin->username);
            $this->admin->image = $fileName;
        }

        $this->admin->save();

        $this->emitUp('updateParent');

        auth("admin")->user()->createActivity("Updated '" . $this->admin->username . "' admin account.");
    }

    public function delete() {
        $this->emit("deleteAdmin");
    }

    public function render()
    {
        return view('pages.admin.admins.form');
    }
}

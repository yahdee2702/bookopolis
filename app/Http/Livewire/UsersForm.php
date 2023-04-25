<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UsersForm extends Component
{

    use WithFileUploads;

    public $user, $password, $photo;

    protected function rules() {
        $id = $this->user->id ?? 0;
        return [
            "user.username" => "required|string|regex:/^[a-zA-Z0-9_\-]+$/|min:4|max:255|unique:users,username,".$id,
            'user.email' => 'required|string|max:255|email|unique:users,email,'.$id,
            'password' => 'nullable|string|min:8|max:255',
            "photo" => "nullable|file",
        ];
    }

    public function submit()
    {
        $this->validate();

        if ($this->password)
            $this->user->password = $this->password;

        if ($this->photo) {
            $fileName = $this->photo->storePublicly('uploads/users/'.$this->user->username);
            $this->user->image = $fileName;
        }

        $this->user->save();

        $this->emitUp('updateParent');

        auth("admin")->user()->createActivity("Updated '" . $this->user->username . "' user account.");
    }

    public function delete() {
        $this->emit("deleteUser");
    }

    public function render()
    {
        return view('pages.admin.users.form');
    }
}

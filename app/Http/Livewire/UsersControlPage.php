<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersControlPage extends Component
{
    protected $listeners = ['updateParent' => '$refresh', 'deleteUser'];

    public $users;
    public $user;

    public function mount()
    {
        $this->refreshList();
    }

    public function switch ($id)
    {
        $this->reset(["user"]);
        if ($id > -1) {
            $this->user = User::find($id);
        }
    }

    public function deleteUser() {
        $username = $this->user->username;
        $this->user->delete();
        $this->reset(["user"]);
        $this->refreshList();

        auth("admin")->user()->createActivity("Deleted '" . $username . "' user account.");
    }

    public function create() {
        $newKey = count($this->users) + 1;
        $newUser = User::create([
            "username" => "user" . $newKey,
            "email" => fake()->email(),
            "password" => "1234567890"
        ]);

        $this->refreshList();
        $this->switch($newUser->id);
        auth("admin")->user()->createActivity("Created '" . $newUser->username . "' user account.");
    }

    private function refreshList() {
        $this->users = User::query()->orderBy("created_at", "desc")->get();
    }

    public function render()
    {
        return view('pages.admin.users.index')
            ->layout("layouts.admin", [
                "title" => "Users",
                "navTitle" => "Users",
                "selected" => 1
            ]);
    }
}

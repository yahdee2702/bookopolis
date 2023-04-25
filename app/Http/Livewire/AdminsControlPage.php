<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Livewire\Component;

class AdminsControlPage extends Component
{
    protected $listeners = ['updateParent' => '$refresh', 'deleteAdmin'];

    public $admins;
    public $admin;

    public function mount()
    {
        $this->refreshList();
    }

    public function switch ($id)
    {
        $this->reset(["admin"]);
        if ($id > -1) {
            $this->admin = Admin::find($id);
        }
    }

    public function deleteAdmin()
    {
        $username = $this->admin->username;
        $this->admin->delete();
        $this->reset(["admin"]);
        $this->refreshList();

        auth("admin")->user()->createActivity("Deleted '" . $username . "' admin account.");
    }

    public function create()
    {
        $newKey = count($this->admins) + 1;
        $newAdmin = Admin::create([
            "username" => "admin" . $newKey,
            "name" => "New Admin " . $newKey,
            "password" => "admin" . $newKey . "-1234567890"
        ]);

        $this->refreshList();
        $this->switch($newAdmin->id);
        auth("admin")->user()->createActivity("Created '" . $newAdmin->username . "' admin account.");
    }

    private function refreshList()
    {
        $this->admins = Admin::query()->orderBy("created_at", "desc")->get();
    }

    public function render()
    {
        return view('pages.admin.admins.index')
            ->layout("layouts.admin", [
                "title" => "Admins",
                "navTitle" => "Admins",
                "selected" => 0
            ]);
    }
}

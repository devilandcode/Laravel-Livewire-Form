<?php

namespace App\Livewire\Profile;

use App\Contracts\User\UserRepositoryInterface;
use App\Http\Requests\StoreFormRequest;
use App\Models\File;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $name;
    public $lastName;
    public $midName;
    public $dob;
    public $email;
    public $phone;
    public $phoneCode;
    public $yourself;
    public $familyStatus;
    public $docs = [];

    public function rules(): array
    {
        return (new StoreFormRequest)->rules();
    }
    public function messages(): array
    {
        return (new StoreFormRequest)->messages();
    }

    public function saveUser(UserRepositoryInterface $userRepository)
    {

        $user = $userRepository->store($this->name, $this->lastName, $this->dob);

//        $validationData = $this->validate();

        foreach ($this->docs as $doc) {
            $r = $doc->store('files');
            $file = new File();
            $file->path = $r;
            $res = $user->files()->save($file);
            dd($res);
        }



    }
    public function render()
    {
        return view('livewire.profile.form')->extends('layouts.app');
    }
}

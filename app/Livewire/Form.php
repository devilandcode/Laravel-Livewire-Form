<?php

namespace App\Livewire;

use App\Contracts\User\UserRepositoryInterface;
use App\Http\Requests\StoreFormRequest;
use App\Models\File;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;

    public $name;
    public $last_name;
    public $mid_name;
    public $dob;
    public $email;
    public $phone = [];
    public $phoneCode = [];
    public $inputs;
    public $i;
    public $about;
    public $status;
    public $submitted = false;

    #[Validate('mimes:jpg,png,pdf|max:5096')]
    public $docs = [];

    public function rules(): array
    {
        return (new StoreFormRequest)->rules();
    }
    public function messages(): array
    {
        return (new StoreFormRequest)->messages();
    }

    public function save(UserRepositoryInterface $userRepository)
    {
        $validated = $this->validate($this->rules());

        try {
            DB::transaction(function () use ($userRepository, $validated) {
                $user = $userRepository->store($validated);

                if (!empty($this->docs)) {
                    $this->saveDocs($this->docs, $user);
                }

                if (!empty($this->phone) && !empty($this->phoneCode)) {
                    $this->savePhones(
                        $this->phone,
                        $this->phoneCode,
                        $user
                    );
                }
            });
            $this->submitted = true;

        } catch(\Exception $e) {
            session()->flash('error', $e->getMessage());
            redirect()->to('/');
        }
    }

    public function mount(): void
    {
        $this->inputs = [];
        $this->phone = [];
        $this->phoneCode = [];

        $this->i = 1;
    }

    public function add($i)
    {
        if (count($this->inputs) < 4) {
            $this->i = $i + 1;
            array_push($this->inputs, $i);
        }
    }

    public function remove($key): void
    {
        unset($this->inputs[$key]);
        $this->i -= 1;
    }
    public function render()
    {
        return view('livewire.profile.form')->extends('layouts.app');
    }

    private function saveDocs(array $docs, User $user)
    {
        foreach ($docs as $doc) {

            $filePath = $doc->store('images');
            $file = new File();
            $file->path = $filePath;

            $user->files()->save($file);
        }
    }
    private function savePhones(array $phones, array $codes, User $user)
    {
        foreach($phones as $key => $value) {
            $phones = new Phone();
            $phones->code = $codes[$key];
            $phones->number = $value;

            $user->phones()->save($phones);
        }
    }
}

<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class Chat extends Component
{
    #[Validate('required|max:1000')]
    public string $body = '';
    public array $messages = [];

    public function send(){
        $this->validate();
    }
    public function render()
    {
        return view('livewire.chat');
    }
}

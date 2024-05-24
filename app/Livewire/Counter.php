<?php

namespace App\Livewire;

use Livewire\Component;

#[Lazy]
class Counter extends Component
{ 

    public $count = 0;
    public $entries = [];
 
    public function increment()
    {
        $this->count++;
        $this->entries[] = [
            'count' => $this->count, 
            'date' => date('Y-m-d H:i:s'),
            'type' => '+', 
        ];
    }
 
    public function decrement()
    {
        $this->count--;
        $this->entries[] = [
            'count' => $this->count, 
            'date' => date('Y-m-d H:i:s'),
            'type' => '-', 
        ];
    }

    public function render()
    {
        return view('livewire.counter', ['logs' => $this->entries]);
    }
}

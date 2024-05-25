<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Events\SlugUpdateAfterName;
use Illuminate\Database\Eloquent\Model;

class ModelEditInput extends Component
{

    public Model | null $model = null;
    public string | null $field = null;
    public string | null $eventName = null;
    public $value;

    public string $class = ""; 

    public function handleInputUpdate() {

        $this->model->{$this->field} = $this->value;
        $this->model->save();
        // dd($this->eventName);
        if($this->eventName){

            $eventClass = "App\\Events\\" . $this->eventName;
            if (class_exists($eventClass)) {
                event(new $eventClass($this->model));
            }
        }
        
        // return true;
    }
    public function validateModel() {


        return true;
    }

    public function mount(Model $model, string $field, string | null $eventName = null) {

        // dump($model);
        $this->model = $model;
        $this->field = $field;
        $this->eventName = $eventName;
        $this->value = $this->model->{$field}; 
    }

    public function render()
    {
        return view('livewire.components.model-edit-input', ['show' => $this->validateModel()]);
    }
}

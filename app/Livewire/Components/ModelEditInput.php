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

    public $dbValue;

    public string $class = "";

    public string $response = "";

    public function handleInputUpdate() {

        $this->model->{$this->field} = $this->value;
        $this->model->save();
        $this->dbValue = $this->value;
        // dd($this->eventName);
        if($this->eventName){

            $eventClass = "App\\Events\\" . $this->eventName;
            if (class_exists($eventClass)) {
                event(new $eventClass($this->model));
            }
        }
        
        // return true;
    }

    public function updatedValue(){

        $this->response = "";

        if(empty($this->value)) {
            $this->value = $this->dbValue;
            $this->response = "Field cannot be empty";
            return;
        }


        $this->handleInputUpdate();
        $this->response = "Field updated!";


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
        $this->dbValue = $this->value; 
    }

    public function render()
    {
        return view('livewire.components.model-edit-input', ['show' => $this->validateModel()]);
    }
}

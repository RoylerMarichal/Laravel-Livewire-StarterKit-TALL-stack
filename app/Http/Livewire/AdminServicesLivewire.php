<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AdminServicesLivewire extends Component
{
    use LivewireAlert;
    
    public $name;

    public $price;

    public $description;

    public $status;

    public $view = 'new';

    public $serviceToEdit;

    public function render()
    {
        return view('livewire.admin-services-livewire', [
            'services' => Service::paginate(10)
        ]);
    }

    //Save new Service or update an exist
    public function saveService()
    {
        //Validate the data for a new service
        $this->validate([
            'name' => 'required|min:2|max:256'
        ]);

        //Store New or update
        if ($this->serviceToEdit) {
            $service = $this->serviceToEdit;
            $service->status = $this->status;
        } else {
            $service = new Service();
        }

        $service->name = $this->name;
        $service->description = $this->description;
        $service->price = $this->price;
        $service->save();
        $this->sendAlert('success', 'Success', 'top-end');
    }

    //Delete a service
    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
    }

    //newAgain
    public function newAgain()
    {
        $this->reset();
    }

    //Select Service to Edit
    public function editService($id)
    {
        $service = Service::findOrFail($id);
        $this->serviceToEdit = $service;
        $this->view = 'edit';
        //Add the values to editar
        $this->name = $this->serviceToEdit->name;
        $this->description = $this->serviceToEdit->description;
        $this->price = $this->serviceToEdit->price;
        $this->status = $this->serviceToEdit->status;
    }

    public function sendAlert($tipo, $texto, $posicion)
    {
        $this->alert($tipo, $texto, [
            'position' =>  $posicion,
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);
    }
}

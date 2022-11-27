<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Livewire\Component;

class DependentCountry extends Component
{
    public $countries;
    public $states;
    public $cities;

    public $selectedCountry = null;
    public $selectedState = null;

    public function mount()
    {
        $this->countries = Country::all();
    }

    public function updatedSelectedCountry($country_id)
    {
        if (!is_null($this->selectedCountry)) {
            $this->states = State::where(['country_id' => $country_id, 'is_active' => 1])->get();
        }
    }

    public function updatedSelectedState($state_id)
    {
        if (!is_null($this->selectedState)) {
            $this->cities = City::where('state_id', $state_id)->get();
        }
    }

    public function render()
    {
        return view('livewire.dependent-country');
    }
}

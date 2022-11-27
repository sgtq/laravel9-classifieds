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
    public $selectedCity = null;

    public function mount($country_id = null, $state_id = null, $city_id = null)
    {
        $this->countries = Country::all();

        // According to docs, these should be assigned if the key is sent as param from blade, but it does not work
        $this->selectedCountry = $country_id;
        $this->selectedState = $state_id;
        $this->selectedCity = $city_id;
        //

        $this->updatedSelectedCountry(); // call it for edit case. Create case will have null
    }

    public function updatedSelectedCountry()
    {
        if (!is_null($this->selectedCountry)) {
            $this->states = State::where(['country_id' => $this->selectedCountry, 'is_active' => 1])->get();
            $this->updatedSelectedState(); // call it for edit case. Create case will have null
        } else {
            $this->reset(['selectedState', 'selectedCity', 'cities']);
        }
    }

    public function updatedSelectedState()
    {
        if (!is_null($this->selectedState)) {
            $this->cities = City::where('state_id', $this->selectedState)->get();
        } else {
            $this->reset(['selectedCity', 'cities']);
        }
    }

    public function render()
    {
        return view('livewire.dependent-country');
    }
}

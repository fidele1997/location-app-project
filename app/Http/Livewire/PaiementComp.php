<?php

namespace App\Http\Livewire;


use Livewire\Component;
use Livewire\WithPagination;


class PaiementComp extends Component
{


    public function render()
    {



        return view('livewire.paiements.index')
            ->extends("layouts.master")
            ->section("contenu");
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Location;
use App\Models\StatutLocation;
use App\Models\ArticleLocation;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Query;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;


class locationComp extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $location_id = [];
    public $addLocation = [];
    public $editLocation = [];
    public $addArticleLocation = [];
    public $search = "";
    public $clients;
    public $statuts;

    public function render()
    {


        Carbon::setLocale("fr");


        $query = Location::query();
        $search = $this->search;

        if (isset($search))
            $this->resetPage();

        $query->when($search != "", function ($query) use ($search) {
            $query->where("nom", "like", "%{$search}%");
            $query->orWhere("prenom", "like", "%{$search}%");
        });

        return view('livewire.locations.index', [
            "locations" => $query->latest()->paginate(4),
            "statut_location" => StatutLocation::orderBy("nom", "ASC")->get(),
            "client" => Client::query("nom", "prenom")->get(),
            "user" => User::query("nom", "prenom")->get(),
            "article" => Article::query("nom")->get()

        ])
            ->extends("layouts.master")
            ->section("contenu");
    }


    public function rules()
    {
        if ($this->currentPage == PAGEEDITFORM) {

            return [
                'editLocation.client' => 'required',
                'editLocation.user' => 'required',
                'editLocation.statut_location' => 'required',
                'editLocation.dateDabut' => 'required',
                'editLocation.dateFin' => 'required',
                'editLocation.article' => 'required',
            ];
        }

        return [
            'addLocation.dateDebut' => ' required',
            'addLocation.client' => ' required',
            'addLocation.user_id' => ' required',
            'addLocation.statut_location_id' => ' required',
            'addLocation.article' => ' required',
        ];
    }

    public function goToAddLocation()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditLocation($id)
    {
        $this->editLocation = Location::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }

    public function goToListLocation()
    {
        $this->currentPage = PAGELIST;
        $this->editLocation = [];
    }

    protected $messages = [
        'addLocation.dateDebut.required' => 'Veuillez Selectionner le date svp',
        'addLocation.client.required' => 'Veuillez Selectionner le client svp',
        'addLocation.user_id.required' => 'Veuillez Selectionner la  svp',
        'addLocation.statut_location_id.required' => 'Veuillez Selectionner la statut svp',
        'addLocation.article_id.required' => 'Veuillez Selectionner l\'article svp',
    ];

    public function showAddArticleModal()
    {
        $this->resetValidation();
        $this->addLocation = [];

        $this->dispatchBrowserEvent("showModal");
    }


    public function addLocation()
    {
        $validator = Validator::make($this->addLocation, [
            'addLocation.dateDebut.required' => 'Veuillez Selectionner le date svp',
            'addLocation.client.required' => 'Veuillez Selectionner le client svp',
            'addLocation.user_id.required' => 'Veuillez Selectionner la  svp',
            'addLocation.statut_location_id.required' => 'Veuillez Selectionner la statut svp',
            'addLocation.article_id.required' => 'Veuillez Selectionner l\'article svp',
        ])->validate();

        Location::create($this->addLocation);

        $int = DB::table('locations')->latest('id')->first();
        $int = $int->id;
        // dd($int);
        // $validator['addLocation']['location_id'] = $int;
        // ArticleLocation::create([
        //     "location_id" => $this->addLocation["location_id"],
        //     "article_id" =>  $this->addLocation["article_id"],
        // ]);

        // ArticleLocation::create($this->addLocation);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Location ajouté avec succès!"]);
    }

    public function updateLocation()
    {
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();


        Location::find($this->editLocation["id"])->update($validationAttributes["editLocation"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Location mis à jour avec succès!"]);
    }



    public function confirmDelete($name, $id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des clients. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "location_id" => $id
            ]
        ]]);
    }

    public function deleteClient($id)
    {
        Location::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Location supprimé avec succès!"]);
    }
}

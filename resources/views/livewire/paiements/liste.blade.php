
<body>
<div class="row p-4 pt-5">
    <div class="col-12">

    <p>Mise à jour....</p>
    Mise en traitement...
      {{-- <div class="card">
        <div class="card-header bg-gradient-primary d-flex align-items-center">
          <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Liste des Locations</h3>

          <div class="card-tools d-flex align-items-center ">
          <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddLocation()"><i class="fas fa-user-plus"></i> Nouveau Location</a>
            <div class="input-group input-group-md" style="width: 250px;">
              <input type="text" name="table_search" class="form-control float-right" wire:model.debounce.700ms="search" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0 table-striped" style="height: 455px;">
         <table class="table table-head-fixed">
            <thead>
              <tr>
                <th style="width:20%;">Client</th>
                <th style="width:25%;">Gerants</th>
                <th style="width:5%;">Article</th>
                <th style="width:5%;" >Statut</th>
                <th style="width:5%;" >Date Début</th>
                <th style="width:30%;" >Date Fin</th>
                <th style="width:20%;" class="text-center">Ajouté</th>
                <th style="width:30%;" class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($locations as $location)
              <tr>
                <td>{{ $location->client->nom}} {{ $location->client->prenom}}</td>
                <td>{{ $location->user->nom}} {{ $location->user->prenom}}</td>
                <td>{{ $location->AllArticlesNames}}</td>
                <td>
                  @if($location->statut->nom == "En cours")
                  <span class="badge badge-success">En cours</span>
                  @else
                    @if($location->statut->nom == "En attente")
                     <span class="badge badge-primary">En attente</span>
                    @else
                      @if($location->statut->nom == "Terminée")
                      <span class="badge badge-danger">Terminée</span>
                      @endif
                   @endif
                  @endif
                </td>
                <td>{{ $location->dateDebut}}</td>
                <td>{{ $location->dateFin}}</td>
                <td class="text-center"><span class="tag tag-success">{{ $location->created_at->diffForHumans() }}</span></td>
                <td class="text-center">
                  <button class="btn btn-link" wire:click="goToEditLocation({{$location->id}})"> <i class="far fa-edit"></i> </button>
                  <button class="btn btn-link" wire:click="confirmDelete('{{ $location->prenom }} {{ $location->nom }}', {{$location->id}})"> <i class="far fa-trash-alt"></i> </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <div class="float-right">
              {{ $locations->links() }}
          </div>
        </div>
      </div> --}}
      <!-- /.card -->
    </div>
  </div>





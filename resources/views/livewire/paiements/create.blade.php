<div class="row p-4 pt-5">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'ajout de Locations</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" wire:submit.prevent="addLocation()" method="POST">
                <div class="card-body">

                    <div class="form-group">
                      <label for="">Clients</label>
                      <select  class="form-control" wire:model="addLocation.client_id"  @error('addLocation.client_id') is-invalid @enderror>
                        <option wire:model="addLocation.client_id" @error('addLocation.client_id') is-invalid @enderror value=""></option>
                          @foreach ($client as $client)
                        <option value="{{$client->id}}">{{ $client->nom }}</option>
                          @endforeach
                      </select>

                      @error("addLocation.client_id")
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                   
                   
                     <div class="form-group">
                      <label for="">Gérant</label>
                      <select  class="form-control" wire:model="addLocation.user_id"  @error('addLocation.user_id') is-invalid @enderror required>
                        <option value=""></option>
                        <option value="{{userFullNameId()}}">{{ userFullName() }}</option>
                      </select>

                       @error("addLocation.user_id")
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="">Articles</label>
                      <select  class="form-control" wire:model="addLocation.article_id"  @error('addLocation.article_id') is-invalid @enderror required>
                        <option value=""></option>
                          @foreach ($article as $article)
                        <option value="{{$article->id}}">{{ $article->nom }}</option>
                          @endforeach
                      </select>

                       @error("addLocation.article_id")
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="">Statut</label>
                      <select  class="form-control" wire:model="addLocation.statut_location_id" @error('addLocation.statut_location_id') is-invalid @enderror required>
                       <option value="" wire:model="addLocation.statut_location_id" @error('addLocation.statut_location_id') is-invalid @enderror></option>
                          @foreach ($statut_location as $statut_location)
                       <option value="{{$statut_location->id}}">{{ $statut_location->nom }}</option>
                          @endforeach
                      </select>

                      @error("addLocation.statut_location_id")
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="">Date début</label>
                      <input type="date" wire:model="addLocation.dateDebut" @error('addLocation.dateDebut') is-invalid @enderror id="date" class="form-control" onchange="invoicedue(event);" required >
                      @error("addLocation.dateDebut")
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                      <label for="">Date Fin</label>
                      <input type="date" wire:model="addLocation.dateFin" id="date" class="form-control" disabled onchange="invoicedue(event);" required >
                    </div>

                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    <button type="button" wire:click="goToListLocation()" class="btn btn-danger">Retouner à la liste des
                        locations</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </div>
</div>

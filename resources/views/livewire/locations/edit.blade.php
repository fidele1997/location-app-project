<div class="row p-4 pt-5">
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'édition client</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
              <form role="form" wire:submit.prevent="updateLocations()" method="POST">
                <div class="card-body">

                    <div class="d-flex">
                      
                    </div>
                    <div class="form-group">
                      <label for="">Clients</label>
                      <select  class="form-control" wire:model="editLocation.client"  @error('editLocation.client') is-invalid @enderror>
                        <option value=""></option>
                         @foreach ($clients as $client)
                        <option value="{{$client->id}}">{{ $client->nom }} {{ $client->prenom }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="">Date début</label>
                      <input type="date" wire:model="editLocation.dateDebut" @error('editLocation.dateDebut') is-invalid @enderror id="date" class="form-control" onchange="invoicedue(event);" required >
                    </div>

                    <div class="form-group">
                      <label for="">Date Fin</label>
                      <input type="date" wire:model="editLocation.dateFin" id="date"@error('editLocation.dateFin') is-invalid @enderror class="form-control" onchange="invoicedue(event);" required >
                    </div>

                    <div class="form-group">
                      <label for="">Statut</label>
                      <select  class="form-control" @error('editLocation.statut_location') is-invalid @enderror wire:model="editLocation.statut_location">
                        <option value=""></option>
                         @foreach ($statuts as $statuts)
                        <option value="{{$statuts->id}}">{{ $statuts->nom }}</option>
                        @endforeach
                      </select>
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

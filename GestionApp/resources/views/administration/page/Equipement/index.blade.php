@extends('administration.layout.aside')
@section('content')
<div id="main" class="main">
    <div class="row">
        <div class="col-md-4">
            <div class="pagetitle">
                <h1>Liste Equipement</h1>
                <nav>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Liste Equipement</li>
                  </ol>
                </nav>
            </div>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <a href="{{ route('create-equipement') }}" class="btn btn-primary w-100"  >Ajouter Equipement</a>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center">Liste du Staff</h5>

          <!-- Table with stripped rows -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Equipement</th>
                <th scope="col">Numéro Série</th>
                <th scope="col">ID Produit</th>
                <th scope="col">Equipemnt Type</th>
                <th scope="col">Region</th>
                <th scope="col">Site</th>
                <th scope="col">Etat</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($liste_equipements as $item)
                <tr>
                    <th scope="row"></th>
                    <td>{{ $item->equipement }}</td>
                    <td>{{ $item->serialnumber }}</td>
                    <td>{{ $item->productnumber }}</td>
                    <td>{{ $item->Equipement->intitule }}</td>
                    <td>{{ $item->Region->nom }}</td>
                    <td>{{ $item->Site->site }}</td>
                    <td>{{ $item->State->intitule }}</td>
                    <td>
                        <a class="text-black" data-bs-toggle="modal" data-bs-target="#VisionnerEquipement" href=""><i class="bi bi-eye"></i></a>&nbsp;
                        <a class="text-black" data-bs-toggle="modal" data-bs-target="#ModifierEquipement" href="{{ 'afficher-modification',$item->id }}"><i class="bi bi-pencil"></i></a>&nbsp;
                        <a class="text-black" href=""><i class="bi bi-trash"></i></a>
                    </td>
                </tr>

                @endforeach

            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
    </div>

    <!-- Les modals -->

    <div class="card">
          <!-- Modal VisionnerEquipement -->
          <div class="modal fade" id="VisionnerEquipement" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Basic Modal</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>

          <!-- Modal ModifierEquipement -->
          <div class="modal fade" id="ModifierEquipement" tabindex="-1">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="text-center">Modifier Equipement</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title"></h5>

                          <form action="{{ route('creation-equipements') }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="equipement" name="equipement" placeholder="Equipement">
                                    <label for="floatingName">Equipement</label>
                                </div>
                                <div class="text-danger">
                                    @error("equipement")
                                        {{ $message }}
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="serialnumber" name="serialnumber" placeholder="Numéro Série">
                                    <label for="floatingName">Numéro Série</label>
                                </div>
                                <div class="text-danger">
                                    @error("serialnumber")
                                        {{ $message }}
                                    @enderror
                                </div>

                            </div>


                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="equipementtype" name="equipementtype" aria-label="Equipement Type">
                                        <option value="">Equipement Type</option>
                                        @foreach ($equipement_type as $item)
                                            <option value="{{ $item->id  }}">{{ $item->intitule }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Equipement Type</label>
                                </div>
                                <div class="text-danger">
                                    @error("equipementtype")
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="state_id" name="state_id" aria-label="Etat">
                                        <option value="">Etat</option>
                                        @foreach ($state_equipement as $item)
                                            <option value="{{ $item->id }}">{{ $item->intitule }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Etat</label>
                                </div>
                                <div class="text-danger">
                                    @error("state_id")
                                        {{ $message }}
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="location_id" name="location_id" aria-label="Region">
                                        <option value="">Region</option>
                                        @foreach ($region_liste as $item)
                                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelect">Region</label>
                                </div>
                                <div class="text-danger">
                                    @error("location_id")
                                        {{ $message }}
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select" id="site_id" name="site_id" aria-label="Equipement Type">
                                        <option value="">Site</option>
                                        @foreach ($site_liste as $item)
                                            <option value="{{ $item->id }}">{{ $item->site }}</option>
                                        @endforeach

                                    </select>
                                    <label for="floatingSelect">Site</label>
                                </div>
                                <div class="text-danger">
                                    @error("site_id")
                                        {{ $message }}
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="productnumber" name="productnumber" placeholder="Numéro Produit">
                                    <label for="floatingEmail">Numéro Produit</label>
                                </div>
                                <div class="text-danger">
                                    @error("productnumber")
                                        {{ $message }}
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="available" name="available" placeholder="Password">
                                    <label for="">Available </label>
                                </div>
                                <div class="text-danger">
                                    @error("available")
                                        {{ $message }}
                                    @enderror
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="feedback" name="feedback" placeholder="City">
                                    <label for="floatingCity">Feedback</label>
                                </div>
                                <div class="text-danger">
                                    @error('feedback')
                                        {{ $message }}
                                    @enderror
                                </div>

                            </div>
                            <div class="col-6">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Observation" id="observation" name="observation" style="height: 100px;"></textarea>
                                <label for="floatingTextarea">Observation</label>
                                <div class="text-danger">
                                    @error("observation")
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-secondary">Fermer</button>
                                <button type="submit" class="btn btn-primary">Enregistrement</button>
                            </div>

                        </form>
                        </div>
                      </div>

                </div>
                <div class="modal-footer">
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

    @if(Session::has('message'))
        <script>
            swal("message", "{{ Session::get('message') }}", 'success', {
                showConfirmButton: false,
                title: 'Bon travail !',
                timer: 15000
            });
        </script>
    @endif

</div>
@endsection

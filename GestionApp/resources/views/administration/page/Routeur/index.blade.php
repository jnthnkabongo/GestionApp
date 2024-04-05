@extends('administration.layout.aside')
@section('content')
<div id="main" class="main">
    <div class="row">
        <div class="col-md-4">
            <div class="pagetitle">
                <h1>Liste Routeur</h1>
                <nav>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Liste Routeur</li>
                  </ol>
                </nav>
            </div>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
            <button class="btn btn-primary w-100">Enregistrer</button>
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
                <th scope="col">Name</th>
                <th scope="col">Position</th>
                <th scope="col">Age</th>
                <th scope="col">Age</th>
                <th scope="col">Age</th>
                <th scope="col">Start Date</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Brandon Jacob</td>
                <td>Designer</td>
                <td>28</td>
                <td>2016-05-25</td>
                <td>233</td>
                <td>345</td>
                <td>
                    <a class="text-black" href=""><i class="bi bi-eye"></i></a>&nbsp;
                    <a class="text-black" href=""><i class="bi bi-pencil"></i></a>&nbsp;
                    <a class="text-black" href=""><i class="bi bi-trash"></i></a>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Bridie Kessler</td>
                <td>Developer</td>
                <td>35</td>
                <td>2014-12-05</td>
                <td>3553</td>
                <td>3456</td>
                <td>
                    <a class="text-black" href=""><i class="bi bi-eye"></i></a>&nbsp;
                    <a class="text-black" href=""><i class="bi bi-pencil"></i></a>&nbsp;
                    <a class="text-black" href=""><i class="bi bi-trash"></i></a>
                </td>
              </tr>

            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
    </div>

</div>
@endsection

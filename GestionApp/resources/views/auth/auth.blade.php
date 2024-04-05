@extends('administration.layout.entete')
@section('content')
<main class="bg-light">
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
                <div class="card mb-3">
                    <div id="cardAuth" class="card-body">
                        <div class="pt-4 pb-3 text-center">
                            <img src="{{ asset('assets/img/bboxx.png') }}" height="120px" width="350px" alt="">
                        </div>
                        <form class="bg-white tertiary row g-3 needs-validation pb-3" >
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="col-12">
                                <div class="text-center">
                                    <label class="form-check-label" for="rememberMe">Mot de passe oublié ?</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </section>

    </div>
  </main><!-- End #main -->

@endsection

@include('Site.includes.header')

<section class="pt-5">

    <div class="container">

        <div class="position-absolute start-100 bottom-0 translate-middle-x d-none d-xl-block ms-xl-n4"><img
                src="{{url('images/dest/shape.svg')}}" alt="destination"/></div>
        <div class="mb-7 text-center">
            <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">Reservar Pacote</h3>
        </div>

        <div class="row">

            <div class="col-md-4 mb-4">
                <div><img class="card-img-top"
                          src="{{url('storage/'.$package->image)}}"
                          alt="Rome, Italty"/>
                    <h3>Reserva Pacote: {{ $package->name }}</h3>
                    <p>Informações:</p>
                    <p>Data de início: {{ $package->start_date }}</p>
                    <p>Preço: {{ $package->price }}</p>

                    <form action="{{ route('package.createReservation', $package->id) }}" method="POST">
                        @csrf
                        <!-- Campos de solicitação de reserva -->
                        <input type="text" name="name" placeholder="Seu nome" required>
                        <input type="email" name="email" placeholder="Seu email" required>
                        <button type="submit" class="btn btn-success">Enviar Solicitação</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@include('Site.includes.footer')

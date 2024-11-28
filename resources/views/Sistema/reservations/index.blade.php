@include('Site.includes.header')

<!-- <section> begin ============================-->
<section class="pt-10">
    <div class="container">
        <div class="py-8 px-5 position-relative text-center"
             style="background-color: rgba(223, 215, 249, 0.199); border-radius: 20px;">

            <!-- Imagens decorativas, ajustando a posição -->
            <div class="position-absolute start-100 top-0 translate-middle ms-md-n3 ms-n4 mt-3">
                <img src="{{url('images/cta/send.png')}}"
                     style="max-width: 70px;"
                     alt="send icon" />
            </div>

            <div class="position-absolute end-0 top-0 z-index--1">
                <img src="{{url('images/cta/shape-bg2.png')}}"
                     style="max-width: 264px;"
                     alt="cta shape" />
            </div>

            <div class="position-absolute start-0 bottom-0 ms-3 z-index--1 d-none d-sm-block">
                <img src="{{url('images/cta/shape-bg1.png')}}"
                     style="max-width: 340px;"
                     alt="cta shape" />
            </div>

            <!-- Conteúdo principal -->
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <h2 class="text-secondary lh-1-7 mb-7">Reservar Pacote</h2>

                    <div class="input-group-icon">
                        <div class="mb-4">
                            <form action="{{ route('package.createReservation', $package->id) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
                                @csrf

                                <!-- Imagem do pacote -->
                                <div class="text-center mb-4">
                                    <img class="img-fluid rounded" src="{{ url('storage/'.$package->image) }}" alt="{{ $package->name }}" style="max-width: 100%; height: auto;" />
                                </div>

                                <!-- Título do pacote -->
                                <h3 class="text-center mb-4">{{ $package->name }}</h3>

                                <!-- Exibir as atrações relacionadas ao pacote -->
                                <div class="mb-4">
                                    <h4>Atrações Relacionadas:</h4>
                                    <div class="row">
                                        @forelse($data as $item)
                                            <div class="col-12 col-md-4 mb-3">
                                                <div class="card">
                                                    <img src="{{ url('storage/'.$item->image) }}" alt="{{ $item->name }}" class="card-img-top" style="height: 150px; object-fit: cover;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $item->name }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p>Este pacote não possui atrações cadastradas.</p>
                                        @endforelse
                                    </div>
                                </div>

                                <p><strong>Data de início:</strong> {{ $package->start_date }}</p>
                                <p><strong>Preço:</strong> R$ {{ number_format($package->price, 2, ',', '.') }}</p>

                                <!-- Campos para Data, Nome, Email, Telefone -->
                                <div class="row mb-4">
                                    <!-- Data de Reserva -->
                                    <div class="col-md-6 mb-3">
                                        <label for="reservation_date" class="form-label">Data de Reserva</label>
                                        <input type="date" id="reservation_date" name="reservation_date" class="form-control" required>
                                    </div>

                                    <!-- Nome -->
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Seu Nome</label>
                                        <input type="text" id="name" name="name" class="form-control" required>
                                    </div>

                                    <!-- E-mail -->
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Seu E-mail</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>

                                    <!-- Telefone -->
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Seu Telefone</label>
                                        <input type="tel" id="phone" name="phone" class="form-control" required placeholder="(XX) XXXXX-XXXX">
                                    </div>
                                </div>

                                <!-- Botão de enviar -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-danger btn-lg orange-gradient-btn">
                                        Reservar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->
</section>
<!-- <section> close ============================-->

@include('Site.includes.footer')

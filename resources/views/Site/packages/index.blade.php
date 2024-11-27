<!-- <section> begin ============================-->
<section class="pt-5" id="destination">

    <div class="container">
        <div class="position-absolute start-100 bottom-0 translate-middle-x d-none d-xl-block ms-xl-n4"><img
                src="{{url('images/dest/shape.svg')}}" alt="destination"/></div>
        <div class="mb-7 text-center">
            <h5 class="text-secondary">Top Vendas </h5>
            <h3 class="fs-xl-10 fs-lg-8 fs-7 fw-bold font-cursive text-capitalize">Nossos Pacotes</h3>
        </div>
        <div class="row">

            @forelse($packages as $package)
                <div class="col-md-4 mb-4">
                    <div class="card overflow-hidden shadow"><img class="card-img-top"
                                                                  src="{{url('storage/'.$package->image)}}"
                                                                  alt="Rome, Italty"/>
                        <div class="card-body py-4 px-3">
                            <div class="d-flex flex-column flex-lg-row justify-content-between mb-3">
                                <h4 class="text-secondary fw-medium">
                                    <a
                                        class="link-900 text-decoration-none stretched-link"
                                        href="{{route('package.description', $package->id)}}"
                                    >
                                        {{$package->name}}
                                    </a>
                                </h4>
                                <!-- <span class="fs-1 fw-medium">$5,42k</span> -->
                            </div>
                            <div class="d-flex align-items-center">
                                <img src="{{url('images/dest/navigation.svg')}}"
                                     style="margin-right: 14px" width="20"
                                     alt="navigation"
                                />
                                <span class="fs-0 fw-medium">10 Days Trip</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div><!-- end of .container-->

</section>
<!-- <section> close ============================-->

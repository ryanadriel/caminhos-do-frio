
<section style="padding-top: 7rem;">
    <div class="bg-holder" style="background-image:url('images/hero/hero-bg.svg');">
    </div>
    <!--/.bg-holder-->

    <div class="container">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row align-items-center">
            <div class="col-md-5 col-lg-6 order-0 order-md-1 text-end"><img class="pt-7 pt-md-0 hero-img"
                                                                            src="{{url('images/hero/main-image.png')}}"
                                                                            alt="hero-header"/></div>
            <div class="col-md-7 col-lg-6 text-md-start text-center py-6">
                <h4 class="fw-bold text-danger mb-3">Descubra os Destinos da Serra Paraibana</h4>
                <h1 class="hero-title">Explore e viva uma experiência inesquecível.</h1>
                <p class="mb-4 fw-medium">Roteiros pensados para quem busca história, aventura e charme. <br
                        class="d-none d-xl-block"/>Descubra trilhas, engenhos, cachoeiras que só o interior da Paraíba <br>pode oferecer.
                <div class="text-center text-md-start"><a
                        class="btn btn-primary btn-lg me-md-4 mb-3 mb-md-0 border-0 primary-btn-shadow" href="#destination"
                        role="button">Conheça</a>
                    <div class="w-100 d-block d-md-none"></div>
                    <a href="#!" role="button" data-bs-toggle="modal" data-bs-target="#popupVideo"><span
                            class="btn btn-danger round-btn-lg rounded-circle me-3 danger-btn-shadow"> <img
                                src="{{url('images/hero/play.svg')}}" width="15" alt="paly"/></span></a><span
                        class="fw-medium">Demonstração</span>
                    <div class="modal fade" id="popupVideo" tabindex="-1" aria-labelledby="popupVideo"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <iframe class="rounded" style="width:100%;max-height:500px;" height="500px"
                                        src="https://www.youtube.com/embed/_lhdhL4UDIo" title="YouTube video player"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen="allowfullscreen"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

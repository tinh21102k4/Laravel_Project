@extends('client.layout.Main')
@section('content-client')
    <div class="py-3"></div>
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 mb-4">
                    <h1 class="h2 mb-4">Search results for
                        <mark>{{ str_replace(' ', '+', trim(request()->search)) }}</mark>
                    </h1>
                </div>
                <div class="col-lg-10">
                    @foreach ($news as $new)
                        <article class="card mb-4">
                            <div class="row card-body">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <div class="post-slider slider-sm">
                                        <img src="{{ asset('clients/images/post/post-10.jpg') }}" class="card-img"
                                            alt="post-thumb" style="height:200px; object-fit: cover;">
                                        <img src="{{ asset('clients/images/post/post-1.jpg') }}" class="card-img"
                                            alt="post-thumb" style="height:200px; object-fit: cover;">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h3 class="h4 mb-3"><a class="post-title" href="{{ route('client.detailNews', ['id'=>$new->id]) }}">{{ $new->title }}</a></h3>
                                    <ul class="card-meta list-inline">
                                        <li class="list-inline-item">
                                            <a href="author-single.html" class="card-meta-author">
                                                <img src="{{ asset('clients/images/john-doe.jpg') }}" alt="John Doe">
                                                <span>duy tinh</span>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="ti-timer"></i>3 Min To Read
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="ti-calendar"></i>15 jan, 2020
                                        </li>
                                        <li class="list-inline-item">
                                            <ul class="card-meta-tag list-inline">
                                                <li class="list-inline-item"><a href="tags.html">Demo</a></li>
                                                <li class="list-inline-item"><a href="tags.html">Elements</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <p>{{ $new->content }}</p>
                                    <a href="{{ route('client.detailNews', ['id'=>$new->id]) }}" class="btn btn-outline-primary">Read More</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    {{-- <article class="card mb-4">
                        <div class="row card-body">
                            <div class="col-12">
                                <h3 class="h4 mb-3"><a class="post-title" href="post-details.html">Cheerful Loving Couple
                                        Bakers Drinking Coffee</a></h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <a href="author-single.html" class="card-meta-author">
                                            <img src="images/kate-stone.jpg" alt="Kate Stone">
                                            <span>Kate Stone</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-timer"></i>2 Min To Read
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-calendar"></i>14 jan, 2020
                                    </li>
                                    <li class="list-inline-item">
                                        <ul class="card-meta-tag list-inline">
                                            <li class="list-inline-item"><a href="tags.html">Wow</a></li>
                                            <li class="list-inline-item"><a href="tags.html">Tasty</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <p>It’s no secret that the digital industry is booming. From exciting startups to global
                                    brands, companies are reaching out to digital agencies, responding to the new
                                    possibilities available.</p>
                                <a href="post-details.html" class="btn btn-outline-primary">Read More</a>
                            </div>
                        </div>
                    </article> --}}
                </div>
            </div>
        </div>
    </section>
@endsection

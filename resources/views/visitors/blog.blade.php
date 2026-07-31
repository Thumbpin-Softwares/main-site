@extends('layout.visitor', ['title' => 'Insights & Ideas | Thumbpin Creative Blog Gurgaon', 
                            'description' => 'Explore the Thumbpin blog for expert insights on branding, digital marketing, and creative trends to help your business grow online.'])

@section('head')
<style>
    .title:after {
    background-color: #aaa;
    content: "";
    display: block;
    height: 2px;
    margin-top: 10px;    
    transform: translateY(-.2em);
    width: 6em;}
</style>
@endsection

@section('content')

<main>

    {{-- ====================== Blog-Hero-Sec Area ====================== --}}
    <div class="blog-hero-sec top-sec bg-black">
        <div class="container h-100-only">
            <div class="row align-items-center h-100-only">
                <div class="col-md-7 col-lg-6">
                    <div class="content-box">
                        <h1 class="title">
                            Blog
                        </h1>
                        {{-- <div class="des">
                            <p>

                            </p>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-5 col-lg-6 d-none d-md-block">
                    <div class="sec-img">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/contact-sec.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Blog-Hero-Sec Area ====================== --}}

    {{-- ====================== Sec-13 Area ====================== --}}
    <div class="sec-13">
        <div class="container">
            <div class="row">                
                <div class="col-md-8">   
                    <div class="row">
                    @if (isset($posts))
                        @foreach ($posts as $post)
                            <div class="col-sm-6 col-md-6">
                                <div class="blog-card">
                                    <div class="img">
                                        <a href="{{ route('blog-detail', ['slug' => $post->slug]) }}">
                                            <img src="{{ Voyager::image($post->image) }}" alt="{{$post->title}}">
                                        </a>
                                    </div>
                                    <div class="content-box">
                                        <div class="date">
                                            <span>
                                                {{ date('M d, Y', strtotime($post->created_at)) }}
                                            </span>
                                        </div>
                                        <div class="title">
                                            <a href="{{ route('blog-detail', ['slug' => $post->slug]) }}">
                                                {{ $post->title }}
                                            </a>
                                        </div>
                                        <div class="des">
                                            <p>
                                                {{ $post->excerpt }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    </div>
                </div>
                <div class="col-md-4 mt-3  py-5" style="background-color: rgba(222, 222, 222, 0.256); align-self:baseline; ">   
                    <aside class="blog__sidebar px-5">
                      
                        <h3 class="py-4 title">Blog Category</h3>
                        <ul class="cate">
                            @foreach ($categories as $category)
                            <li class="mb-2" style="list-style: none;">
                                <a style="text-decoration: none; color:black" href="{{ route('blogs-category', $category->slug) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                        </ul>                       
                    </aside>
                </div>   
            </div>
        </div>
    </div>
    {{-- ====================== End Sec-13 Area ====================== --}}

</main>

@endsection

@section('script')

@endsection

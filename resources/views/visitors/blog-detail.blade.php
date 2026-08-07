{{-- The description prefers the post's own meta_description, then its excerpt,
     then a trimmed body, so every post ships a real one instead of the site default. --}}
@extends('layout.visitor', [
    'title' => $post->title,
    'description' => \Illuminate\Support\Str::limit(
        trim(strip_tags($post->meta_description ?: ($post->excerpt ?: $post->body))), 155
    ),
    'header_black' => 'bg-black',
    'footer_black' => 'footer-black',
])

@section('head')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection

@section('content')

<main>

    {{-- ====================== Sec-14 Area ====================== --}}
    <div class="sec-14">
        <div class="container">
            <h1 class="title">
                {{ $post->title }}
            </h1>
            <div class="date">
                By {{ $post->name }} on {{ date('M d, Y', strtotime($post->created_at)) }}
            </div>
            <div class="blog-content">
                <p>
                    {!! $post->body !!}
                </p>
                {{-- <p>In what has sent the advertising fraternity scurrying to their therapists, employees have opened
                    mailboxes today to find an astonishing number of unread emails.</p>
                <p><span id="more-614"></span></p>
                <p>If reports are to be believed, it appears that most clients haven’t really grasped the concept of ‘on
                    a break’. Revered (and coincidentally also Reverend) psychologist <strong>Father Feegr</strong>
                    says, ‘the reports are untrue, it wasn’t me. There’s simply no evidence.’</p>
                <p>When he was reminded that this was another story altogether, and not the one where there were
                    allegations against him for defiling a church candle, he composed himself and said again, ‘I think
                    clients think that the Christmas break is a very Western concept, and hence, must not be adopted by
                    India. Also, advertising agencies are never allowed to shut, because what happens when there’s an
                    urgent need of a social media post?’</p>
                <p><strong>Karan Amin, founder of 010</strong>, says that his agency has Mondays off, because that day
                    is for learning. He goes on to say that there should be a mechanism where emails sent between 26 Dec
                    to 2 Jan should just bounce back. He then goes on to make a reel about it.</p>
                <p>Meanwhile, employees across the globe have resorted to various means to deal with the onslaught of
                    unread emails. Some have decided to delete all. While others are painstakingly going through every
                    single one, and writing back diligently, while a few others have outright put in their resignation
                    papers, saying they’ll just move to Goa and do something there.</p>
                <p>When prodded with the question ‘what’, there was a pregnant pause, followed by a screaming silence.
                </p>
                <p>Unread emails and work aside, the journalists at The Voice Company, a strange new agency that seems
                    to be doing even stranger things, wish you and your loved ones a terrific (okay fine, tolerable)
                    2022.</p> --}}
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="categories">
                        @if (isset($tags))
                            @foreach ($tags as $tag)
                                <a href="{{route('tag',['slug'=>$tag->tag_slug])}}"># {{ $tag->tag_name }}</a>
                            @endforeach
                        @endif
                        <div class="post">
                            <span>
                                Posted in
                            </span>
                            <a href="#">
                                Uncategorized
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="social-link">
                        <a href="https://www.facebook.com/Thumbpinpvtltd" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/Thumbpin2" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.behance.net/thumbpicreativs/appreciated" target="_blank">
                            <i class="fab fa-behance"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Sec-14 Area ====================== --}}

    {{-- ====================== Sec-15 Area ====================== --}}
    <div class="sec-15">
        <div class="container-fluid">
            <div class="row align-items-center c-padding">
                <div class="col-6">
                    @if (!empty(\TCG\Voyager\Models\Post::where('status','PUBLISHED')->find($post->id - 1)))
                        @php $prevPost=(\TCG\Voyager\Models\Post::find($post->id - 1)) @endphp
                            <a href="{{route('blog-detail',['slug'=>$prevPost->slug])}}" class="nav nav-prev">
                                <div class="icon">
                                    <i class="fal fa-chevron-left"></i>
                                </div>
                                <div class="info">
                                    <span>Previous</span>
                                    <div class="title text-overflow">
                                        {{ $prevPost->title }}
                                    </div>
                                </div>
                            </a>
                    @endif
                </div>
                <div class="col-6">
                    @if (!empty(\TCG\Voyager\Models\Post::where('status','PUBLISHED')->find($post->id + 1)))
                        @php $prevPost=(\TCG\Voyager\Models\Post::find($post->id + 1)) @endphp
                            <a href="{{route('blog-detail',['slug'=>$prevPost->slug])}}" class="nav nav-next">
                                <div class="info">
                                    <span>Next</span>
                                    <div class="title text-overflow">
                                        {{ $prevPost->title }}
                                    </div>
                                </div>
                                <div class="icon">
                                    <i class="fal fa-chevron-right"></i>
                                </div>
                            </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Sec-15 Area ====================== --}}

    {{-- ====================== Sec-16 Area ====================== --}}
    <div class="sec-16">
        <div class="container">
            <div class="post-slider">
                <div class="owl-carousel">
                    @foreach ($related_posts as $related)
                        <div class="slide">
                            <div class="blog-card">
                                <div class="img">
                                    <a href="{{ route('blog-detail', ['slug' => $related->slug]) }}">
                                        <img src="{{ Voyager::image( $related->image ) }}" alt="blog">
                                    </a>
                                </div>
                                <div class="content-box">
                                    <div class="date">
                                        <span>
                                            {{ date('M d, Y', strtotime($post->created_at)) }}
                                        </span>
                                    </div>
                                    <div class="title">
                                        <a href="{{ route('blog-detail', ['slug' => $related->slug]) }}">
                                            {{ $related->title }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="slide">
                        <div class="blog-card">
                            <div class="img">
                                <a href="#blog">
                                    <img src="{{ config('app.url') }}/assets/img/work/digital/03.jpg" alt="blog">
                                </a>
                            </div>
                            <div class="content-box">
                                <div class="date">
                                    <span>
                                        January 13, 2022
                                    </span>
                                </div>
                                <div class="title">
                                    <a href="#blog">
                                        Mutiny at The Voice Company
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="blog-card">
                            <div class="img">
                                <a href="#blog">
                                    <img src="{{ config('app.url') }}/assets/img/work/digital/03.jpg" alt="blog">
                                </a>
                            </div>
                            <div class="content-box">
                                <div class="date">
                                    <span>
                                        January 13, 2022
                                    </span>
                                </div>
                                <div class="title">
                                    <a href="#blog">
                                        Mutiny at The Voice Company
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="blog-card">
                            <div class="img">
                                <a href="#blog">
                                    <img src="{{ config('app.url') }}/assets/img/work/digital/03.jpg" alt="blog">
                                </a>
                            </div>
                            <div class="content-box">
                                <div class="date">
                                    <span>
                                        January 13, 2022
                                    </span>
                                </div>
                                <div class="title">
                                    <a href="#blog">
                                        Mutiny at The Voice Company
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="blog-card">
                            <div class="img">
                                <a href="#blog">
                                    <img src="{{ config('app.url') }}/assets/img/work/digital/03.jpg" alt="blog">
                                </a>
                            </div>
                            <div class="content-box">
                                <div class="date">
                                    <span>
                                        January 13, 2022
                                    </span>
                                </div>
                                <div class="title">
                                    <a href="#blog">
                                        Mutiny at The Voice Company
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="blog-card">
                            <div class="img">
                                <a href="#blog">
                                    <img src="{{ config('app.url') }}/assets/img/work/digital/03.jpg" alt="blog">
                                </a>
                            </div>
                            <div class="content-box">
                                <div class="date">
                                    <span>
                                        January 13, 2022
                                    </span>
                                </div>
                                <div class="title">
                                    <a href="#blog">
                                        Mutiny at The Voice Company
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="blog-card">
                            <div class="img">
                                <a href="#blog">
                                    <img src="{{ config('app.url') }}/assets/img/work/digital/03.jpg" alt="blog">
                                </a>
                            </div>
                            <div class="content-box">
                                <div class="date">
                                    <span>
                                        January 13, 2022
                                    </span>
                                </div>
                                <div class="title">
                                    <a href="#blog">
                                        Mutiny at The Voice Company
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="blog-card">
                            <div class="img">
                                <a href="#blog">
                                    <img src="{{ config('app.url') }}/assets/img/work/digital/03.jpg" alt="blog">
                                </a>
                            </div>
                            <div class="content-box">
                                <div class="date">
                                    <span>
                                        January 13, 2022
                                    </span>
                                </div>
                                <div class="title">
                                    <a href="#blog">
                                        Mutiny at The Voice Company
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="blog-card">
                            <div class="img">
                                <a href="#blog">
                                    <img src="{{ config('app.url') }}/assets/img/work/digital/03.jpg" alt="blog">
                                </a>
                            </div>
                            <div class="content-box">
                                <div class="date">
                                    <span>
                                        January 13, 2022
                                    </span>
                                </div>
                                <div class="title">
                                    <a href="#blog">
                                        Mutiny at The Voice Company
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="blog-card">
                            <div class="img">
                                <a href="#blog">
                                    <img src="{{ config('app.url') }}/assets/img/work/digital/03.jpg" alt="blog">
                                </a>
                            </div>
                            <div class="content-box">
                                <div class="date">
                                    <span>
                                        January 13, 2022
                                    </span>
                                </div>
                                <div class="title">
                                    <a href="#blog">
                                        Mutiny at The Voice Company
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="blog-card">
                            <div class="img">
                                <a href="#blog">
                                    <img src="{{ config('app.url') }}/assets/img/work/digital/03.jpg" alt="blog">
                                </a>
                            </div>
                            <div class="content-box">
                                <div class="date">
                                    <span>
                                        January 13, 2022
                                    </span>
                                </div>
                                <div class="title">
                                    <a href="#blog">
                                        Mutiny at The Voice Company
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide">
                        <div class="blog-card">
                            <div class="img">
                                <a href="#blog">
                                    <img src="{{ config('app.url') }}/assets/img/work/digital/03.jpg" alt="blog">
                                </a>
                            </div>
                            <div class="content-box">
                                <div class="date">
                                    <span>
                                        January 13, 2022
                                    </span>
                                </div>
                                <div class="title">
                                    <a href="#blog">
                                        Mutiny at The Voice Company
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Sec-16 Area ====================== --}}

</main>

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
$('.post-slider .owl-carousel').owlCarousel({
    dotsEach: true,
    responsive: {
        0: {
            items: 2,
            nav: false,
            margin: 12,
        },
        576: {
            items: 3,
            nav: false,
            margin: 12,
        },
        862: {
            items: 4,
            nav: true,
            dots: false,
            margin: 12,
        },
    },
});
</script>

@endsection

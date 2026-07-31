@extends('layout.visitor', [
    'title' => 'Thank You | Thumbpin',
    'description' => 'Thanks for getting in touch with Thumbpin. Our team will review your enquiry and get back to you shortly.',
    'footer_black' => 'footer-black',
])

@section('head')
    <style>
        .main-content-wrapper{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 160px 20px 60px;
        }

        .wrapper h1{
            text-shadow: 0px 4px 3px rgb(0 0 0 / 40%), 0px 8px 13px rgb(0 0 0 / 10%), 0px 18px 23px rgb(0 0 0 / 10%);
            font-size: 4em;
            font-weight: 800;
            letter-spacing: 3px;
            color: var(--primary-color);
            margin: 0;
            margin-bottom: 20px;
        }

        .wrapper p {
            letter-spacing: 1px;
            font-size: 1.3em;
            color: black;
            margin: 0;
        }

        .go-home {
            text-decoration: none;
            border: none;
            outline: none;
            display: inline-block;
            font-weight: bold;
            text-transform: capitalize;
            border-radius: 30px;
            box-shadow: 0 8px 16px rgb(0 0 0 / 40%);
            background-color: var(--primary-color);
            color: #fff;
            padding: 10px 50px;
            margin: 30px 0;
        }

        @media screen and (max-width: 575px){
            .main-content-wrapper{
                padding: 140px 12px 40px;
            }
            .wrapper h1{
                font-size: 2.8em;
            }
            .wrapper p{
                font-size: 1em;
            }
            .go-home{
                font-size: 0.8em;
            }
        }

    </style>
@endsection

@section('content')
    <main class="main-content-wrapper">
        <div class="wrapper">
            <h1>Thank you !</h1>
            <p>Thank You For Your Enquiry</p>
            <p>Our experts are currently reviewing your enquiry.</p>
            <a href="{{ route('home') }}">
                <button type="button" class="go-home">go home</button>
            </a>
        </div>
    </main>
@endsection

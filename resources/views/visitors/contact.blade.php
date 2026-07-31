@extends('layout.visitor', ['title' => 'Get in Touch – Thumbpin Agency Gurgaon',
                            'description'=>'Ready to grow your brand? Contact Thumbpin in Gurgaon for full-service advertising, branding, and digital strategy support.'])
@section('head')
    <style>
        .sec-11 .sec-12 {
            padding: 0px
        }

        .sec-11 .sec-12 .h2 {
            color: #000;
            font-size: 22px;
            margin-bottom: 30px;
        }

        .sec-11 .sec-12 .contact-info {
            margin: 40px 0px 0px;
        }

        .sec-11 .form-2 .input-field .file-box {
            display: block;
            width: 100%;
            border: none;
            outline: none;
            box-shadow: none;
            border-radius: 0;
            background-color: #fff;
            color: #555;
            padding: 12px 15px;
        }

        .sec-11 .form-2 .input-field .file-box,
        .sec-11 .form-2 .input-field select {
            border: 2px solid #555;
        }

        .sec-11 .sec-12 .contact-info .email a,
        .sec-11 .sec-12 .contact-info .address,
        .sec-11 .sec-12 .contact-info .state-name {
            color: #000
        }
    </style>
@endsection

@section('content')
    <main>

        {{-- ====================== Contact-Hero-Sec Area ====================== --}}
        <div class="contact-hero-sec top-sec bg-black">
            <div class="container h-100-only">
                <div class="row align-items-center h-100-only">
                    <div class="col-md-7 col-lg-6">
                        <div class="content-box">
                            <h1 class="title">
                                c
                                <img src="{{ config('app.url') }}/assets/img/shape-01.png" alt="img">
                                ntact
                            </h1>
                            <div class="des">
                                <p>
                                    Where will your story go next?
                                    <br>
                                    Let's find out.
                                </p>
                            </div>
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
        {{-- ====================== End Contact-Hero-Sec Area ====================== --}}

        {{-- ====================== Sec-11 Area ====================== --}}
        <div class="sec-11">
            <div class="container">
                {{-- <div class="h2">
                Where will your story go next?
            </div>
            <div class="h3">
                Let's find out.
            </div> --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-1">
                            <form action="{{ route('contact-submit') }}" method="POST">
                                @csrf
                                <input type="hidden" name="url" value="{{ Request::url() }}">
                                <div class="title">
                                    Book A Call
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-field">
                                            <input type="text" name="name" placeholder="Full Name" required>
                                        </div>
                                    </div>

                                    <div class="w-100"></div>

                                    <div class="col-md-12">
                                        <div class="input-field">
                                            <input type="email" name="email" placeholder="Email Id" required>
                                        </div>
                                    </div>

                                    <div class="w-100"></div>

                                    <div class="col-md-12">
                                        <div class="input-field">
                                            <input type="number" name="mobile" placeholder="Phone No." required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-field">
                                            <textarea rows="3" name="message" placeholder="What we can create for you"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-submit">
                                            <input type="submit" value="Submit">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="sec-12 pt-3 mt-5">
                            <div class="h2">
                                Select the task and be a part of us.
                            </div>
                            <div class="form-2">
                                <form action="{{ route('task-submit') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="url" value="{{ Request::url() }}">
                                    <div class="row">
                                        <div class="w-100"></div>
                                        <div class="col-md-12">
                                            <div class="input-field">
                                                <select name="task" required>
                                                    <option value="" selected hidden>Select a Task</option>
                                                    <option value="Copywriter">Copywriter</option>
                                                    <option value="Graphic Designer">Graphic Designer</option>
                                                    <option value="Business Development">Business Development</option>
                                                    <option value="Client Servicing">Client Servicing</option>
                                                    <option value="Creative Strategist">Creative Strategist</option>
                                                    <option value="Art Direction">Art Direction</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="input-field">
                                                <div class="file-box">
                                                    <label>
                                                        <input type="file" name="file" required>
                                                        <p data-placeholder="Attachment *"></p>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-100"></div>
                                        <div class="col-md-6">
                                            <div class="input-submit">
                                                <input type="submit" value="Submit">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-lg-0 mt-5">
                        <div class="sec-12 ">
                            <div class="contact-info mt-0">
                                <div class="state-name">
                                    Gurugram, India
                                </div>
                                <div class="email">
                                    <a href="mailto:brajesh@thumbpin.in">brajesh@thumbpin.in</a>
                                    {{-- <a href="mailto:irum@thumbpin.in">irum@thumbpin.in</a> --}}
                                    <br>
                                    <a href="tel:+91 97735 11447">+91 97735 11447</a>
                                </div>
                                <div class="address">
                                    Thumbpin Private Limited
                                    <br>
                                    Spaze Itech Park, Tower B1, 6th floor, office 657, sector- 49 Gurugram - 122018
                                </div>
                                <div class="state-name">
                                    Mumbai, Maharashtra
                                </div>
                                <div class="email">
                                    <a href="mailto:brajesh@thumbpin.in">brajesh@thumbpin.in</a>
                                    <br>
                                    <a href="tel:+91 97735 11447">+91 97735 11447</a>
                                </div>
                                <div class="address">
                                    Thumbpin Private Limited
                                    <br>
                                    A-1801, Sai Mannat, sector-34 A, Khargar, Navi Mumbai, 410210
                                </div>
                                <div class="state-name">
                                    Lucknow, Uttar Pradesh
                                </div>
                                <div class="email">
                                    <a href="mailto:info@thumbpin.in">info@thumbpin.in</a>
                                    {{-- <a href="mailto:irum@thumbpin.in">irum@thumbpin.in</a> --}}
                                    {{-- <br>
                            <a href="tel:+91 9871622462">+91 9871622462</a> --}}
                                </div>
                                <div class="address">
                                    Thumbpin Private Limited
                                    <br>
                                    313/2 insaf nagar sector 10 Indira Nagar near pani gaon palace, Sector 10, Indira Nagar,
                                    Lucknow, India, 226016
                                </div>
                                <div class="state-name">
                                    Dubai, UAE
                                </div>
                                <div class="email">
                                    <a href="mailto:brajesh@thumbpin.in">brajesh@thumbpin.in</a>
                                    <br>
                                    <a href="tel:+971 50 685 9213">+971 50 685 9213</a>
                                </div>
                                <div class="address mb-0">
                                    Thumbpin Private Limited
                                    <br>
                                    101, Deyaar building, Al Barsha 1, Dubai, UAE
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ====================== End Sec-11 Area ====================== --}}

        {{-- ====================== Sec-12 Area ====================== --}}
        <div class="sec-12 bg-black">
            <div class="container">
                {{-- <div class="h2">
                Select the task and be a part of us.
            </div> --}}
                {{-- <div class="form-2">
                <form action="{{ route('task-submit') }}" method="POST">
                    @csrf
                    <input type="hidden" name="url" value="{{ Request::url() }}">
                    <div class="row">
                         <div class="col-md-6">
                            <div class="input-field">
                                <input type="text" placeholder="The Task ...">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="input-field">
                                <select name="task">
                                    <option value="">Select a Task</option>
                                    <option value="task 1">Copywriter</option>
                                    <option value="task 2">Graphic Designer</option>
                                    <option value="task 3">Business Development</option>
                                    <option value="task 4">Client Servicing</option>
                                    <option value="task 5">Creative Strategist</option>
                                    <option value="task 6">Art Direction</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="input-submit">
                                <input type="submit" value="Submit Task">
                            </div>
                        </div>
                    </div>
                </form>
            </div> --}}
                {{-- <div class="contact-info">
                <div class="state-name">
                    Gurugram, India
                </div>
                <div class="email">
                    <a href="mailto:irum@thumbpin.in">irum@thumbpin.in</a>
                    <br>
                    <a href="tel:+91 9871622462">+91 9871622462</a>
                </div>
                <div class="address">
                    Thumbpin Private Limited
                    <br>
                    Building number 108, 5th floor Ramada hotel, lane , sector 44 Gurugram, Haryana 122003
                </div>
                <div class="state-name">
                    Mumbai, Maharashtra
                </div>
                <div class="email">
                    <a href="mailto:brajesh@thumbpin.in">brajesh@thumbpin.in</a>
                    <br>
                    <a href="tel:+91 97735 11447">+91 97735 11447</a>
                </div>
                <div class="address">
                    Thumbpin Private Limited
                    <br>
                    A-1801, Sai Mannat, sector-34 A, Khargar, Navi Mumbai, 410210
                </div>
                <div class="state-name">
                    Lucknow, Uttar Pradesh
                </div>
                <div class="email">
                    <a href="mailto:irum@thumbpin.in">irum@thumbpin.in</a>
                    <br>
                    <a href="tel:+91 9871622462">+91 9871622462</a>
                </div>
                <div class="address">
                    Thumbpin Private Limited
                    <br>
                    313/2 insaf nagar sector 10 Indira Nagar near pani gaon palace, Sector 10, Indira Nagar, Lucknow, India, 226016
                </div>
                <div class="state-name">
                    Dubai, UAE
                </div>
                <div class="email">
                    <a href="tel:+971 52 614 4261">+971 52 614 4261</a>
                </div>
                <div class="address">
                    Thumbpin Private Limited
                    <br>
                    101, Deyaar building, Al Barsha 1, Dubai, UAE
                </div>
            </div> --}}
                <div class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3509.24176623132!2d77.10680911445131!3d28.411960900781636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d21ebde2d9991%3A0x1c82f17a55c61e8e!2sThumbpin%20Private%20Limited!5e0!3m2!1sen!2sin!4v1642832799692!5m2!1sen!2sin"
                        style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
        {{-- ====================== End Sec-12 Area ====================== --}}

    </main>
@endsection

@section('script')
@endsection

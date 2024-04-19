<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CodePen - nice-forms.css</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="{{ asset('css/stylecompany.css') }}">

</head>

<body>
    @include('dashboard')
    <!-- partial:index.partial.html -->

    <div class="demo-page">
        <main class="demo-page-content">
            <section>
                @if (session('succses'))
                    <div>
                        {{ session('succses') }}
                    </div>
                @endif

                <form action="{{ url('createcompany') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="nice-form-group">
                        <label for="name">Name company</label>
                        <input id="name" name="name" type="text" placeholder="Name company" required
                            value="{{ old('name') }}" />
                        @error('name')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="nice-form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="text" placeholder="Your email" required
                            value="{{ old('email') }}" />
                        @error('email')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="nice-form-group">
                        <label for="logo">Logo</label>
                        <input id="logo" name="logo" type="file" accept="image/*"
                            value="{{ old('logo') }}" />
                        @error('logo')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="nice-form-group">
                        <label for="website">Website URL</label>
                        <input id="website" name="website" type="text" placeholder="www.example.com" required
                            value="{{ old('website') }}" />
                        @error('website')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="nice-form-group">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </section>
        </main>
    </div>


</body>

</html>

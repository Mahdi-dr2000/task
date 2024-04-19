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

                <form id="myForm" action="{{ route('storeemployee') }}" method="POST">
                    @csrf
                    <input name="idcompany" type="text" value="{{ $idcompany }}">
                    <div class="nice-form-group">
                        <label for="fname">first name</label>
                        <input id="fname" name="fname" type="text" placeholder="first name" required
                            value="{{ old('fname') }}" />
                        @error('fname')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="nice-form-group">
                        <label for="lname">last name</label>
                        <input id="lname" name="lname" type="text" placeholder="last name" required
                            value="{{ old('lname') }}" />
                        @error('lname')
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
                        <label for="phone">phone</label>
                        <input id="phone" name="phone" type="text" placeholder="phone" required
                            value="{{ old('phone') }}" />
                        @error('phone')
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

<script>
    // document.getElementById('myForm').addEventListener('submit', function(event) {
    //     event.preventDefault();
    //     var fname = document.getElementById('fname').value;
    //     var lname = document.getElementById('lname').value;
    //     var email = document.getElementById('email').value;
    //     var phone = document.getElementById('phone').value;

    //     var errors = [];

    //     if (fname.trim() === '') {
    //         errors.push('First name is required.');
    //     }
    //     if (lname.trim() === '') {
    //         errors.push('Last name is required.');
    //     }
    //     if (email.trim() === '') {
    //         errors.push('Email is required.');
    //     } else if (!isValidEmail(email)) {
    //         errors.push('Invalid email format.');
    //     }
    //     if (phone.trim() === '') {
    //         errors.push('Phone number is required.');
    //     } else if (!isValidPhone(phone)) {
    //         errors.push('phone must be 10 digets.');
    //     }

    //     if (errors.length > 0) {
    //         alert(errors.join('\n'));
    //         return false;
    //     } else {
    //         this.submit();
    //     }
    // });

    // function isValidEmail(email) {
    //     var re = /\S+@\S+\.\S+/;
    //     return re.test(email);
    // }

    // function isValidPhone(phone) {
    //     var re = /^\d{10}$/;
    //     return re.test(phone);
    // }
</script>

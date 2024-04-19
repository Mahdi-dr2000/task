<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>


    @include('dashboard')


    <div style="text-align: center;">






        <div class="table-container">
            <table align="center">
                <thead>
                    <tr>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Logo</th>
                        <th style="text-align: center;">Website</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @if ($company)
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $company->name }}</td>
                        @else
                            <td>Company not found</td>
                        @endif
                        <td style="text-align: right;">
                            @if ($company)
                                {{ $company->email ?? 'No email available' }}
                            @else
                                Company not found
                            @endif
                        </td>
                        <td style="text-align: right;">
                            @if ($company && $company->logo)
                                <img src="{{ Storage::url($company->logo) }}"
                                    style="max-width: 100px; max-height: 100px;">
                            @else
                                No logo available
                            @endif
                        </td>

                        <td style="text-align: right;">
                            @if ($company && $company->website)
                                {{ $company->website }}
                            @else
                                No website available
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>





        <section class="intro">
            <div class="gradient-custom-1 h-100">
                <div class="mask d-flex align-items-center h-100">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="table-responsive bg-white">
                                    <table class="table mb-0">

                                        <thead>
                                            <tr>
                                                <th scope="col">First name</th>
                                                <th scope="col">Lname</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">delete</th>
                                                <th scope="col">edit</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <div>
                                                <form action="{{ url('createemployee') }}" method="POST"
                                                    style="display: inline-block;">
                                                    @csrf
                                                    <input type="hidden" name="idcompany" value="{{ $company->id }}">
                                                    <button type="submit">Create Employee</button>
                                                </form>
                                            </div>
                                </div>
                                @foreach ($employee as $employy)
                                    <tr>
                                        <th scope="row" style="color: #666666;">
                                            {{ $employy->fname }}
                                        </th>
                                        <td> {{ $employy->lname }}</td>
                                        <td> {{ $employy->email }}</td>
                                        <td> {{ $employy->phone }}</td>
                                        <td class="align-middle text-center text-sm">
                                            <form method="POST">
                                                <input type="hidden" value="{{ $employy->id }}" name="id"
                                                    readonly>
                                                @csrf
                                                <button type="submit">remove</button>
                                            </form>
                                        </td>
                                        <td id="{{ $employy->id }}" class="align-middle">
                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="modal" data-target="#editCompanyModal"
                                                data-id="{{ $employy->id }}" data-fname="{{ $employy->fname }}"
                                                data-lname="{{ $employy->lname }}" data-email="{{ $employy->email }}"
                                                data-phone="{{ $employy->phone }}">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                </table>
                                {{ $employee->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>


















    <div class="modal fade" id="editCompanyModal" tabindex="-1" role="dialog" aria-labelledby="editCompanyModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCompanyModalLabel">Edit employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form id="editCompanyForm" method="POST" action="{{ url('updateemployee') }}">
                        @csrf
                        <input type="hidden" name="id" id="id">

                        <div class="form-group">
                            <label for="fname">fname </label>
                            <input type="text" class="form-control" id="fname" name="fname"
                                {{ old('fname') }}>
                            @error('fname')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="lname">lname</label>
                            <input type="text" class="form-control" id="lname" name="lname"
                                {{ old('lname') }}>
                            @error('lname')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                {{ old('email') }}>
                            @error('email')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                {{ old('phone') }}>
                            @error('phone')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#createemployee').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var company_id = button.data('idcompany');

            // Assuming you need company_id in your modal, you can use it here
            $('#company_id').val(company_id);
        });
    });
</script>














{{-- <script>
    $('#editCompanyModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var fname = button.data('fname');
        var lname = button.data('lname');
        var email = button.data('email');
        var phone = button.data('phone');


        var modal = $(this);
        modal.find('#id').val(id);
        modal.find('#fname').val(fname);
        modal.find('#lname').val(lname);
        modal.find('#email').val(email);
        modal.find('#phone').val(phone);



    });
</script> --}}

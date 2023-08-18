<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body style="background-color: #1e40af">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body px-4">
                        <div class="d-flex justify-content-center mb-3">
                            <img src="{{ asset('assets/img/logo-smk.png') }}" alt="" width="60">
                        </div>
                        <form action="{{ route('processLogin') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="siswa" selected>Siswa</option>
                                    <option value="guru">Guru</option>
                                    <option value="admin">Admin</option>
                                </select>

                            </div>
                            <div class="form-group mb-3" id="studentFields">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="number" name="nis" id="nis" class="form-control">
                            </div>
                            <div class="form-group mb-3" id="teacherFields" style="display: none">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" name="nik" id="nik" class="form-control">
                            </div>
                            <div class="form-group mb-3" id="adminFields" style="display: none">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <a href="" class="text-decoration-none">Lupa password?</a>
                            <button type="submit" class="btn btn-primary w-100 mt-3">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const roleSelect = document.getElementById('role');
        const studentFields = document.getElementById('studentFields');
        const teacherFields = document.getElementById('teacherFields');
        const adminFields = document.getElementById('adminFields');
        const nis = document.getElementById('nis');
        const nik = document.getElementById('nik');
        const email = document.getElementById('email');

        roleSelect.addEventListener('change', function() {
            const selectedRole = roleSelect.value;
            if (selectedRole === 'guru') {
                teacherFields.style.display = 'block'
                studentFields.style.display = 'none'
                adminFields.style.display = 'none'
                nis.value = null
                email.value = null;
            } else if (selectedRole == 'siswa') {
                studentFields.style.display = 'block'
                teacherFields.style.display = 'none'
                adminFields.style.display = 'none'
                nik.value = null;
                email.value = null;
            } else {
                adminFields.style.display = 'block'
                studentFields.style.display = 'none'
                teacherFields.style.display = 'none'
                nik.value = null;
                nis.value = null
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
</body>

</html>

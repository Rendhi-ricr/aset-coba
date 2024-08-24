<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <form method="POST" action="/register">
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <h3 class="card-title text-center mb-4">Sign Up</h3>
                            <form>
                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="fullName" name="nama_lengkap" placeholder="Enter your full name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="fakultas">Fakultas</label>
                                    <select class="form-select" id="fakultas" name="fakultas" required>
                                        <option value="">Pilih Fakultas</option>
                                        <option value="Fakultas Ilmu Administrasi">Fakultas Ilmu Administrasi</option>
                                        <option value="Fakultas Teknik">Fakultas Teknik</option>
                                        <option value="Fakultas Ilmu Hukum">Fakultas Ilmu Hukum</option>
                                        <option value="Fakultas Ilmu Komputer">Fakultas Ilmu Komputer</option>
                                        <option value="Fakultas Ilmu Komunikasi">Fakultas Ilmu Komunikasi</option>
                                        <option value="Fakultas Pertanian">Fakultas Pertanian</option>
                                        <option value="Fakultas Keguruan dan Ilmu Pendidikan">Fakultas Keguruan dan Ilmu Pendidikan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No Telepon</label>
                                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Enter your password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cpassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="cpassword" name="confirm_password" placeholder="Enter your password" required>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                                <div class="mt-3 text-center">
                                    <p>Already have an account? <a href="/login">Login here</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
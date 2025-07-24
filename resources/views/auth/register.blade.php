<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Production System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <h2 class="text-center mb-4">Register New Account</h2>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="no_scan" class="form-label">Employee ID</label>
                    <input type="text" class="form-control" id="no_scan" name="no_scan" required>
                </div>
                <div class="mb-3">
                    <label for="dept" class="form-label">Department</label>
                    <select class="form-select" id="dept" name="dept" required>
                        <option value="">Select Department</option>
                        <option value="Production">Production</option>
                        <option value="Quality Control">Quality Control</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="IT">IT</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Position</label>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
                 <div class="mb-3">
                    <label for="profile" class="form-label">Profile Picture (optional)</label>
                    <input type="file" class="form-control" id="profile" name="profile" accept="image/*" onchange="previewImage(event)">
                    <div class="mt-3 text-center">
                        <img id="profilePreview" src="{{ asset('images/default-profile.png') }}" alt="Profile Preview" class="img-thumbnail" style="max-height: 150px;">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>

            <div class="mt-3 text-center">
                <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('profilePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = "{{ asset('images/default-profile.png') }}";
        }
    }
</script>

</body>
</html>

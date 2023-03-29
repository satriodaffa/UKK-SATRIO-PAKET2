<!doctype html>
<html lang="en">
  <head>
  	<title>Login 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="login/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(login/images/bg-1.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Registrasi</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										
									</p>
								</div>
			      	</div>
						<form action="{{ route('pekat.register') }}" class="signin-form" method="POST">
                                @csrf
			      		<div class="form-group mt-3">
			      			<input type="text" class="form-control" name="nik" required>
			      			<label class="form-control-placeholder" for="nik">NIK</label>
			      		</div>
                          <div class="form-group mt-3">
                            <input type="text" class="form-control" name="nama" required>
                            <label class="form-control-placeholder" for="nama">Nama</label>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="username" required>
                            <label class="form-control-placeholder" for="username">Username</label>
                        </div>
		            <div class="form-group">
		              <input id="password-field" type="password" class="form-control" name="password" required>
		              <label class="form-control-placeholder" for="password">Password</label>
		              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
		            </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="telp" required>
                        <label class="form-control-placeholder" for="telp">No Telp</label>
                    </div>
                    <div class="form-group mt-3">
                    <select name="jk"  class="form-control " class="form-control-placeholder" >
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option> 
                    </select>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="alamat" required>
                        <label class="form-control-placeholder" for="alamat">Alamat</label>
                    </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Registrasi</button>
		            </div>
		          </form>
		          <p class="text-center">Sudah Punya akun? <a class="small" href="{{route('login-user')}}">Login</a></p>
                  <p class="text-center"><a class="small" href="{{route('pekat.index')}}">Kembali ke halaman utama</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="login/js/jquery.min.js"></script>
  <script src="login/js/popper.js"></script>
  <script src="login/js/bootstrap.min.js"></script>
  <script src="login/js/main.js"></script>

	</body>
</html>


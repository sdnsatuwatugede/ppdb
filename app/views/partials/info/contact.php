<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

<style>
	.cus{
	text-align: left;
	font-family: 'Poppins', sans-serif;
	color: blue;
	font-weight: bold;
	}

	h2{
		font-family: 'Poppins', sans-serif;
		font-weight: bold;
	}

	h3{
		font-family: 'Poppins', sans-serif;
		font-weight: bold;
	}
	h4{
		font-family: 'Poppins', sans-serif;
		color: blue;
	}
</style>
<div class="container">
	<div class="jumbotron text-center">
		<h3>PPDB SD NEGERI 1 WATUGEDE</h3>
		<h4>TAHUN PELAJARAN 2022 - 2023</h4>
	</div>
	<div style="margin:40px 0">
		<div class="row">
			<div class="col-sm-5">
				<div class="panel-body panel">
					<?php $this::display_page_errors(); ?>
					<h4>Share Infomasi </h4>
					<hr />
					<form method="post" action="<?php print_link("info/contact"); ?>">
						<div class="form-group">
							<input type="text" class="form-control" required id="name" name="name" placeholder="Enter Your name *">
						</div>

						<div class="form-group">
							<input type="email" class="form-control" required id="email" name="email" placeholder="Enter Your email *">
						</div>

						<div class="form-group">
							<textarea class="form-control" id="msg" name="msg" rows="4" required placeholder="Enter your Message *"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Kirim</button>
					</form>

				</div>
			</div>

			<div class="col-sm-7">
				<div class="panel panel-body">
					<h4>Silikan Menghubungi Kontak di bawah</h4>
					<hr />

					<p>
						<b class="chead"><span class="material-icons">location </span>Alamat | Location</b><br />
						<p class="adr clearfix">
							<span class="adr-group">
								<span class="street-address">Jalan Candra Kirana</span><br>
								<span class="postal-code">P.O. Box 65153</span><br>
								<span class="country-name">Watugede, Singosari</span>
							</span>
						</p>
					</p>
					<hr />
					<p>
						<b class="chead"><span class="material-icons">contact_phone</span> Phone</b><br />
						<span class="editContent"> 0341441951  / 085259089099</span>
					</p>
					<hr />

					<p>
						<b class="chead"><span class="material-icons">email</span> </b><br />
						<a href="https://ppdb.sdnwatugede.web.id" class="editContent">support@<?php echo SITE_NAME ?></a>
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
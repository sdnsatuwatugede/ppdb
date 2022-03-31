<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbartopleft = array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => '<i class="fa fa-home "></i>'
		),
		
		array(
			'path' => 'data_siswa', 
			'label' => 'Data Siswa', 
			'icon' => '<i class="fa fa-user "></i>'
		),
		
		array(
			'path' => 'user', 
			'label' => 'User', 
			'icon' => '<i class="fa fa-users "></i>'
		)
	);
		
	
	
			public static $jenis_kelamin = array(
		array(
			"value" => "Laki - laki", 
			"label" => "Laki - Laki", 
		),
		array(
			"value" => "Perempuan", 
			"label" => "Perempuan", 
		),);
		
			public static $kewarga = array(
		array(
			"value" => "Indonesia", 
			"label" => "Indonesia (WNI)", 
		),
		array(
			"value" => "Asing", 
			"label" => "Asing (WNI)", 
		),);
		
			public static $Agama = array(
		array(
			"value" => "Islam", 
			"label" => "Islam", 
		),
		array(
			"value" => "Kristen", 
			"label" => "Kristen", 
		),
		array(
			"value" => "Katholik", 
			"label" => "Katholik", 
		),
		array(
			"value" => "Hindu", 
			"label" => "Hindu", 
		),
		array(
			"value" => "Budha", 
			"label" => "Budha", 
		),
		array(
			"value" => "Konghucu", 
			"label" => "Konghucu", 
		),);
		
			public static $keb_khusus_s = array(
		array(
			"value" => "Tidak", 
			"label" => "Tidak", 
		),
		array(
			"value" => "Netra (A)", 
			"label" => "Netra (A)", 
		),
		array(
			"value" => "Rungu (B)", 
			"label" => "Rungu (B)", 
		),
		array(
			"value" => "Grahita Ringan ©", 
			"label" => "Grahita Ringan ©", 
		),
		array(
			"value" => "Grahita Sedang (C1)", 
			"label" => "Grahita Sedang (C1)", 
		),
		array(
			"value" => "Daksa Ringan (D)", 
			"label" => "Daksa Ringan (D)", 
		),
		array(
			"value" => "Daksa Sedang (D1)", 
			"label" => "Daksa Sedang (D1)", 
		),
		array(
			"value" => "Laras ( E)", 
			"label" => "Laras ( E)", 
		),
		array(
			"value" => "Wicara (F)", 
			"label" => "Wicara (F)", 
		),
		array(
			"value" => "Tuna Ganda (G)", 
			"label" => "Tuna Ganda (G)", 
		),
		array(
			"value" => "Hiperaktif (G)", 
			"label" => "Hiperaktif (G)", 
		),
		array(
			"value" => "Hiperaktif (H)", 
			"label" => "Hiperaktif (H)", 
		),
		array(
			"value" => "Cerdas Istimewa (i)", 
			"label" => "Cerdas Istimewa (i)", 
		),
		array(
			"value" => "Bakat Istimewa (J)", 
			"label" => "Bakat Istimewa (J)", 
		),
		array(
			"value" => "Kesulitan Belajar (K)", 
			"label" => "Kesulitan Belajar (K)", 
		),
		array(
			"value" => "Indigo (O)", 
			"label" => "Indigo (O)", 
		),
		array(
			"value" => "Down Sindrome (P)", 
			"label" => "Down Sindrome (P)", 
		),
		array(
			"value" => "Autis (Q)", 
			"label" => "Autis (Q)", 
		),);
		
			public static $tmp_tg = array(
		array(
			"value" => "Bersama Orang tua", 
			"label" => "Bersama Orang tua", 
		),
		array(
			"value" => "Wali", 
			"label" => "Wali", 
		),
		array(
			"value" => "Kos", 
			"label" => "Kos", 
		),
		array(
			"value" => "Asrama", 
			"label" => "Asrama", 
		),
		array(
			"value" => "Panti Asuhan", 
			"label" => "Panti Asuhan", 
		),
		array(
			"value" => "Lainnya", 
			"label" => "Lainnya", 
		),);
		
			public static $moda_trans = array(
		array(
			"value" => "Jalan Kaki", 
			"label" => "Jalan Kaki", 
		),
		array(
			"value" => "Kendaraan Pribadi", 
			"label" => "Kendaraan Pribadi", 
		),
		array(
			"value" => "Kendaraan Umum/Angkot/Pete-pete", 
			"label" => "Kendaraan Umum/Angkot/Pete-pete", 
		),
		array(
			"value" => "Jemputan Sekolah", 
			"label" => "Jemputan Sekolah", 
		),
		array(
			"value" => "Kereta Api", 
			"label" => "Kereta Api", 
		),
		array(
			"value" => "Ojek", 
			"label" => "Ojek", 
		),
		array(
			"value" => "Andong/Bendi/Sado/Dokar/Delman/Beca", 
			"label" => "Andong/Bendi/Sado/Dokar/Delman/Beca", 
		),
		array(
			"value" => "Perahu Penyebrangan/Rakit/Getek", 
			"label" => "Perahu Penyebrangan/Rakit/Getek", 
		),
		array(
			"value" => "Lainnya", 
			"label" => "Lainnya", 
		),);
		
			public static $th_lhr_ayah = array(
		array(
			"value" => "1950", 
			"label" => "1950", 
		),
		array(
			"value" => "1951", 
			"label" => "1951", 
		),
		array(
			"value" => "1952", 
			"label" => "1952", 
		),
		array(
			"value" => "1953", 
			"label" => "1953", 
		),
		array(
			"value" => "1954", 
			"label" => "1954", 
		),
		array(
			"value" => "1955", 
			"label" => "1955", 
		),
		array(
			"value" => "1956", 
			"label" => "1956", 
		),
		array(
			"value" => "1957", 
			"label" => "1957", 
		),
		array(
			"value" => "1958", 
			"label" => "1958", 
		),
		array(
			"value" => "1959", 
			"label" => "1959", 
		),
		array(
			"value" => "1960", 
			"label" => "1960", 
		),
		array(
			"value" => "1961", 
			"label" => "1961", 
		),
		array(
			"value" => "1962", 
			"label" => "1962", 
		),
		array(
			"value" => "1963", 
			"label" => "1963", 
		),
		array(
			"value" => "1964", 
			"label" => "1964", 
		),
		array(
			"value" => "1965", 
			"label" => "1965", 
		),
		array(
			"value" => "1966", 
			"label" => "1966", 
		),
		array(
			"value" => "1967", 
			"label" => "1967", 
		),
		array(
			"value" => "1968", 
			"label" => "1968", 
		),
		array(
			"value" => "1969", 
			"label" => "1969", 
		),
		array(
			"value" => "1970", 
			"label" => "1970", 
		),
		array(
			"value" => "1971", 
			"label" => "1971", 
		),
		array(
			"value" => "1972", 
			"label" => "1972", 
		),
		array(
			"value" => "1973", 
			"label" => "1973", 
		),
		array(
			"value" => "1974", 
			"label" => "1974", 
		),
		array(
			"value" => "1975", 
			"label" => "1975", 
		),
		array(
			"value" => "1976", 
			"label" => "1976", 
		),
		array(
			"value" => "1977", 
			"label" => "1977", 
		),
		array(
			"value" => "1978", 
			"label" => "1978", 
		),
		array(
			"value" => "1979", 
			"label" => "1979", 
		),
		array(
			"value" => "1980", 
			"label" => "1980", 
		),
		array(
			"value" => "1981", 
			"label" => "1981", 
		),
		array(
			"value" => "1982", 
			"label" => "1982", 
		),
		array(
			"value" => "1983", 
			"label" => "1983", 
		),
		array(
			"value" => "1984", 
			"label" => "1984", 
		),
		array(
			"value" => "1985", 
			"label" => "1985", 
		),
		array(
			"value" => "1986", 
			"label" => "1986", 
		),
		array(
			"value" => "1987", 
			"label" => "1987", 
		),
		array(
			"value" => "1988", 
			"label" => "1988", 
		),
		array(
			"value" => "1989", 
			"label" => "1989", 
		),
		array(
			"value" => "1990", 
			"label" => "1990", 
		),
		array(
			"value" => "1991", 
			"label" => "1991", 
		),
		array(
			"value" => "1992", 
			"label" => "1992", 
		),
		array(
			"value" => "1993", 
			"label" => "1993", 
		),
		array(
			"value" => "1994", 
			"label" => "1994", 
		),
		array(
			"value" => "1995", 
			"label" => "1995", 
		),
		array(
			"value" => "1996", 
			"label" => "1996", 
		),
		array(
			"value" => "1997", 
			"label" => "1997", 
		),
		array(
			"value" => "1998", 
			"label" => "1998", 
		),
		array(
			"value" => "1999", 
			"label" => "1999", 
		),
		array(
			"value" => "2000", 
			"label" => "2000", 
		),
		array(
			"value" => "2001", 
			"label" => "2001", 
		),
		array(
			"value" => "2002", 
			"label" => "2002", 
		),
		array(
			"value" => "2003", 
			"label" => "2003", 
		),
		array(
			"value" => "2004", 
			"label" => "2004", 
		),
		array(
			"value" => "2005", 
			"label" => "2005", 
		),
		array(
			"value" => "2006", 
			"label" => "2006", 
		),
		array(
			"value" => "2007", 
			"label" => "2007", 
		),
		array(
			"value" => "2008", 
			"label" => "2008", 
		),
		array(
			"value" => "2009", 
			"label" => "2009", 
		),
		array(
			"value" => "2010", 
			"label" => "2010", 
		),
		array(
			"value" => "2011", 
			"label" => "2011", 
		),
		array(
			"value" => "2012", 
			"label" => "2012", 
		),
		array(
			"value" => "2013", 
			"label" => "2013", 
		),
		array(
			"value" => "2014", 
			"label" => "2014", 
		),
		array(
			"value" => "2015", 
			"label" => "2015", 
		),
		array(
			"value" => "2016", 
			"label" => "2016", 
		),
		array(
			"value" => "2017", 
			"label" => "2017", 
		),);
		
			public static $pendidikan_ayah = array(
		array(
			"value" => "Tidak Sekolah", 
			"label" => "Tidak Sekolah", 
		),
		array(
			"value" => "Putus SD", 
			"label" => "Putus SD", 
		),
		array(
			"value" => "SD sederajat", 
			"label" => "SD sederajat", 
		),
		array(
			"value" => "SMP Sederajat", 
			"label" => "SMP Sederajat", 
		),
		array(
			"value" => "SMA Sederajat", 
			"label" => "SMA Sederajat", 
		),
		array(
			"value" => "D1", 
			"label" => "D1", 
		),
		array(
			"value" => "D2", 
			"label" => "D2", 
		),
		array(
			"value" => "D3", 
			"label" => "D3", 
		),
		array(
			"value" => "D4/S1", 
			"label" => "D4/S1", 
		),
		array(
			"value" => "S2", 
			"label" => "S2", 
		),
		array(
			"value" => "S3", 
			"label" => "S3", 
		),);
		
			public static $pekerjaan_ayah = array(
		array(
			"value" => "Tidak bekerja", 
			"label" => "Tidak bekerja", 
		),
		array(
			"value" => "Nelayan", 
			"label" => "Nelayan", 
		),
		array(
			"value" => "Petani", 
			"label" => "Petani", 
		),
		array(
			"value" => "Peternak", 
			"label" => "Peternak", 
		),
		array(
			"value" => "PNS/TNI/Polri", 
			"label" => "PNS/TNI/Polri", 
		),
		array(
			"value" => "Karyawan Swasta", 
			"label" => "Karyawan Swasta", 
		),
		array(
			"value" => "Pedagang Kecil", 
			"label" => "Pedagang Kecil", 
		),
		array(
			"value" => "Pedagang Besar", 
			"label" => "Pedagang Besar", 
		),
		array(
			"value" => "Wiraswasta", 
			"label" => "Wiraswasta", 
		),
		array(
			"value" => "Wirausaha", 
			"label" => "Wirausaha", 
		),
		array(
			"value" => "Buruh", 
			"label" => "Buruh", 
		),
		array(
			"value" => "Pensiunan", 
			"label" => "Pensiunan", 
		),
		array(
			"value" => "Tenaga Kerja Indonesia", 
			"label" => "Tenaga Kerja Indonesia", 
		),
		array(
			"value" => "Tidak dapat diterapkan", 
			"label" => "Tidak dapat diterapkan", 
		),
		array(
			"value" => "Sudah Meninggal", 
			"label" => "Sudah Meninggal", 
		),
		array(
			"value" => "Lainnya", 
			"label" => "Lainnya", 
		),);
		
			public static $penghasilan_ay = array(
		array(
			"value" => "Kurang dari Rp 1.000.000", 
			"label" => "Kurang dari Rp 1.000.000", 
		),
		array(
			"value" => "Rp 1.000.000 - Rp 2.000.000", 
			"label" => "Rp 1.000.000 - Rp 2.000.000", 
		),
		array(
			"value" => "Lebih dari Rp 2.000.000", 
			"label" => "Lebih dari Rp 2.000.000", 
		),
		array(
			"value" => "Kurang dari Rp. 500,000", 
			"label" => "Kurang dari Rp. 500,000", 
		),
		array(
			"value" => "Rp. 500,000 - Rp. 999,999", 
			"label" => "Rp. 500,000 - Rp. 999,999", 
		),
		array(
			"value" => "Rp. 1,000,000 - Rp. 1,999,999", 
			"label" => "Rp. 1,000,000 - Rp. 1,999,999", 
		),
		array(
			"value" => "Rp. 2,000,000 - Rp. 4,999,999", 
			"label" => "Rp. 2,000,000 - Rp. 4,999,999", 
		),
		array(
			"value" => "Rp. 5,000,000 - Rp. 20,000,000", 
			"label" => "Rp. 5,000,000 - Rp. 20,000,000", 
		),
		array(
			"value" => "Lebih dari Rp. 20,000,000", 
			"label" => "Lebih dari Rp. 20,000,000", 
		),
		array(
			"value" => "Tidak Berpenghasilan", 
			"label" => "Tidak Berpenghasilan", 
		),
		array(
			"value" => "Lainnya", 
			"label" => "Lainnya", 
		),);
		
			public static $role = array(
		array(
			"value" => "Admin", 
			"label" => "Admin", 
		),
		array(
			"value" => "Guru", 
			"label" => "Guru", 
		),
		array(
			"value" => "Siswa", 
			"label" => "Siswa", 
		),);
		
}
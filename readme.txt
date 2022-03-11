Judul : Sistem Informasi Pendaftaran Siswa Baru SD N 6 Jimbaran
Deksripsi : Sistem yang digunakan untuk melakukan pendaftaran dengan dua akses calon siswa dan admin. 
	    Pendaftar dapat melakukan pendaftaran dan memeriksa status apakah (diterima, cadangan, tidak diterima). 
	    Admin dapat mengelola data user dan data pendaftarancalon siswa
Library : DomPdf untuk membuat file pdf, Bootstrap sebagai framework css
Bahasa pemgorgraman : PHP
Database : MySQL
Folder :
- Admin -> admin.php : halaman utama admin
	-> datapendaftar.php : untuk menampilkan list data pendaftar dalam bentuk tabel
	-> datauser.php : untuk menampilkan list data user dalam bentuk tabel
	-> deletedatapendaftar.php : untuk menghapus data pendaftar yang dipilih
	-> deleteuser : untuk menghapus data user yang dipilih
	-> detaildatapendaftar.php : untuk menampilkan detail data pendaftar dan memuat fungsi update
	-> tambahpendaftar.php : untuk menambahkan data pendaftarbaru
	-> tambahuser.php : untuk menambahkan data user baru
	-> updateuser.php : untuk merubah data user yang ada.
- Siswa	-> pendaftaran.php : untuk melakukan pendaftaran siswa baru
	-> siswa.php : halaman utama siswa
	-> statuspendaftaran.php : untuk menampilkan status pendaftaran calon siswa (diterima, cadangan, tidak diterima)
- Asset -> css : memuat file css bootstrap dan custom tampilan web
	-> img : memuat file gambar yang digunakan
	-> js : memuat file javascript bootstrap 

->daftar.php untuk melakukan pendaftaran akun user
->index.php untuk menampilkan halaman utama situs
->koneksi.php untuk menghubungkan ke database
->login.php untuk menampilkan halaman login dan masuk ke sistem
->logout.php untuk menghapus sesi sistem dan mengarahkan kembali ke halaman utama situs


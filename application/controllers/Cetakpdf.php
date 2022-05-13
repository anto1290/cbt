<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetakpdf extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->library('Pdf');
  }

  function cetakEtik()
  {
    $pdf = new FPDF('P', 'mm', 'A4');
    // Membuat Halaman Baru
    $pdf->AddPage();
    // Set Title Document
    $pdf->SetTitle('Kode Etik Guru', true);
    // Setting Jenis Font
    $pdf->SetFont('Times', 'B', '30');
    // Mencetak String
    $pdf->Cell(0, 8, 'KODE ETIK GURU INDONESIA', 0, 1, 'C');
    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(20, 15, '', 0, 1);
    $pdf->SetFont('Times', '', '16');
    $pdf->Cell(5, 9, '1.');
    $pdf->Cell(5, 9, 'Guru berbakti membimbing anak didik seutuhnya untuk membentuk manusia', 0, 2, 'c');
    $pdf->Cell(5, 9, 'pembangun yang berjiwa Pancasila.', 0, 1);
    $pdf->Cell(5, 9, '2.');
    $pdf->Cell(5, 9, 'Guru memiliki kejujuran Profesional dalam menerapkan Kurikulum sesuai dengan', 0, 2, 'c');
    $pdf->Cell(5, 9, 'kebutuhan anak didik masing-masing.', 0, 1);
    $pdf->Cell(5, 9, '3.');
    $pdf->Cell(5, 9, 'Guru mengadakan komunikasi terutama dalam memperoleh informasi tentang anak', 0, 2, 'c');
    $pdf->Cell(5, 9, 'didik, tetapi menghindarkan diri dari segala bentuk penyalahgunaan.', 0, 1);
    $pdf->Cell(5, 9, '4.');
    $pdf->Cell(5, 9, 'Guru menciptakan suasana kehidupan sekolah dan memelihara hubungan dengan ', 0, 2, 'c');
    $pdf->Cell(5, 9, 'orang tua murid sebaik-baiknya bagi kepentingan anak didik.', 0, 1);
    $pdf->Cell(5, 9, '5.');
    $pdf->Cell(5, 9, 'Guru memelihara hubungan dengan masyarakat disekitar sekolahnya maupun ', 0, 2, 'c');
    $pdf->Cell(5, 9, 'masyarakat yang luas untuk kepentingan pendidikan.', 0, 1);
    $pdf->Cell(5, 9, '6.');
    $pdf->Cell(5, 9, 'Guru secara sendiri-sendiri dan atau bersama-sama berusaha mengembangkan ', 0, 2, 'c');
    $pdf->Cell(5, 9, 'dan meningkatkan mutu Profesinya.', 0, 1);
    $pdf->Cell(5, 9, '7.');
    $pdf->Cell(5, 9, 'Guru menciptakan dan memelihara hubungan antara sesama guru baik berdasarkan', 0, 2, 'c');
    $pdf->Cell(5, 9, 'lingkungan maupun didalamhubungan keseluruhan.', 0, 1);
    $pdf->Cell(5, 9, '8.');
    $pdf->Cell(5, 9, 'Guru bersama-sama memelihara membina dan meningkatkan mutu Organisasi Guru ', 0, 2, 'c');
    $pdf->Cell(5, 9, 'Profesional sebagai sarana pengabdiannya.', 0, 1);
    $pdf->Cell(5, 9, '9.');
    $pdf->Cell(5, 9, 'Guru melaksanakan segala ketentuan yang merupakan kebijaksanaan Pemerintah ', 0, 2, 'c');
    $pdf->Cell(5, 9, 'dalam bidang Pendidikan.', 0, 1);
    $pdf->Output();
  }
  function ikrarGuru()
  {
    $pdf = new FPDF('P', 'mm', 'A4');
    // Membuat Halaman Baru
    $pdf->AddPage();
    // Set Title Document
    $pdf->SetTitle('Ikrar Guru', true);
    // Setting Jenis Font
    $pdf->SetFont('Times', 'B', '30');
    // Mencetak String
    $pdf->Cell(0, 8, 'IKRAR GURU INDONESIA', 0, 1, 'C');
    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(20, 15, '', 0, 1);
    $pdf->SetFont('Times', '', '16');
    $pdf->Cell(5, 9, '1.');
    $pdf->Cell(5, 9, 'Kami Guru Indonesia, adalah insan pendidik bangsa yang beriman dan', 0, 2, 'c');
    $pdf->Cell(5, 9, 'bertaqwa kepada Tuhan Yang Maha Esa.', 0, 1);
    $pdf->Cell(5, 9, '2.');
    $pdf->Cell(5, 9, 'Kami Guru Indonesia, adalah pengemban dan pelaksanan cita-cita dan ', 0, 2, 'c');
    $pdf->Cell(5, 9, 'Proklamasi Kemerdekaan Republik Indonesia, pembela dan pengamal', 0, 2);
    $pdf->Cell(5, 9, 'Pancasila yang setia pada UUD45.', 0, 1);
    $pdf->Cell(5, 9, '3.');
    $pdf->Cell(5, 9, 'Kami Guru Indonesia, bertekad bulat mewujudkan tujuan nasional dalam ', 0, 2, 'c');
    $pdf->Cell(5, 9, 'mencerdaskan kehidupan bangsa.', 0, 1);
    $pdf->Cell(5, 9, '4.');
    $pdf->Cell(5, 9, 'Kami Guru Indonesia, bersatu dalam wadah organisasi perjuangan Persatuan ', 0, 2, 'c');
    $pdf->Cell(5, 9, 'Guru Republik Indonesia, membina persatuan dan kesatuan bangsa yang  ', 0, 2);
    $pdf->Cell(5, 9, 'berwatak kekeluargaan. ', 0, 1);
    $pdf->Cell(5, 9, '5.');
    $pdf->Cell(5, 9, 'Kami Guru Indonesia, menjunjung tinggi kode Etik Guru Indonesia sebagai ', 0, 2, 'c');
    $pdf->Cell(5, 9, 'pedoman tingkah laku profesi dalam pengabdian terhadap Bangsa,Negara ', 0, 2);
    $pdf->Cell(5, 9, 'serta kemanusiaan .', 0, 1);
    $pdf->Output();
  }

  function tertibGuru()
  {
    $pdf = new FPDF('P', 'mm', 'A4');
    // Membuat Halaman Baru
    $pdf->AddPage();
    // Set Title Document
    $pdf->SetTitle('Tata Tertib Guru', true);
    // Setting Jenis Font
    $pdf->SetFont('Times', 'B', '30');
    // Mencetak String
    $pdf->Cell(0, 8, 'TATA TERTIB GURU', 0, 1, 'C');
    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(20, 15, '', 0, 1);
    $pdf->SetFont('Times', '', '16');
    $pdf->Cell(7, 9, '1.');
    $pdf->Cell(7, 9, 'Berkewajiban datang dan pulang tepat waktu sesuai dengan jadwal yang ', 0, 2, 'c');
    $pdf->Cell(7, 9, 'telah ditentukan.', 0, 1);
    $pdf->Cell(7, 9, '2.');
    $pdf->Cell(7, 9, 'Berbakti membimbing anak didik seutuhnya untuk membentuk manusia ', 0, 2, 'c');
    $pdf->Cell(7, 9, 'pembangunan yang pancasila', 0, 1);
    $pdf->Cell(7, 9, '3.');
    $pdf->Cell(7, 9, 'Memiliki kejujuran profesional dalam menerapkan kurikulum sesuai ', 0, 2, 'c');
    $pdf->Cell(7, 9, 'dengan kebutuhan anak didik masing-masing.', 0, 1);
    $pdf->Cell(7, 9, '4.');
    $pdf->Cell(7, 9, 'Mengadakan komunikasi tertutama dalam memperoleh informasi tentang   ', 0, 2, 'c');
    $pdf->Cell(7, 9, 'anak didik, tetapi menghindari diri dari segala bentuk penyalahgunaan. ', 0, 1);
    $pdf->Cell(7, 9, '5.');
    $pdf->Cell(7, 9, 'Menciptakan suasana kehidupan sekolah dan memelihara hubungan dengan ', 0, 2, 'c');
    $pdf->Cell(7, 9, 'orang tua murid sebaik-baiknya bagi kepentingan anak didik.', 0, 1);
    $pdf->Cell(7, 9, '6.');
    $pdf->Cell(7, 9, 'Memelihara hubungan baik dengan masyarakat disekitar sekolahnya maupun ', 0, 2, 'c');
    $pdf->Cell(7, 9, 'masyarakat yang lebih luas untuk kepentingan pendidikan.', 0, 1);
    $pdf->Cell(7, 9, '7.');
    $pdf->Cell(7, 9, 'Secara sendiri-sendiri dan atau bersama-sama berusaha mengembangkan dan ', 0, 2, 'c');
    $pdf->Cell(7, 9, 'meningkatkan mutu profesinya.', 0, 1);
    $pdf->Cell(7, 9, '8.');
    $pdf->Cell(7, 9, 'Menciptakan dan memelihara hubungan antara sesama guru, baik berdasarkan ', 0, 2, 'c');
    $pdf->Cell(7, 9, 'lingkungan kerja, maupun dalam hubungan keseluruhan.', 0, 1);
    $pdf->Cell(7, 9, '9.');
    $pdf->Cell(7, 9, 'Secara bersama-sama memelihara, membina dan meningkatkan mutu organisasi ', 0, 2, 'c');
    $pdf->Cell(7, 9, 'guru profesional sebagai sarana pengabdian.', 0, 1);
    $pdf->Cell(7, 9, '10.');
    $pdf->Cell(7, 9, 'Melaksanakan segala ketentuan yang merupakan kebijakan pemerintah dalam ', 0, 2, 'c');
    $pdf->Cell(7, 9, 'bidang pendidikan.', 0, 1);
    $pdf->Cell(7, 9, '11.');
    $pdf->Cell(7, 9, 'Memberikan teladan dan menjaga nama baik lembaga dan profesi.', 0, 1);
    $pdf->Cell(7, 9, '12.');
    $pdf->Cell(7, 9, 'Meningkatkan kualifikasi akademik dan kompetensi secara berkelanjutan sejalan', 0, 2, 'c');
    $pdf->Cell(7, 9, 'dengan pengembangan ilmu pengetahuan, teknologi dan seni.', 0, 1);
    $pdf->Cell(7, 9, '13.');
    $pdf->Cell(7, 9, 'Memotivasi peserta didik dalam memanfaatkan waktu untuk belajar diluar ', 0, 2, 'c');
    $pdf->Cell(7, 9, 'jam sekolah.', 0, 1);
    $pdf->Cell(7, 9, '');
    $pdf->Cell(7, 9, '', 0, 2, 'c');
    $pdf->Cell(7, 9, '', 0, 1);
    $pdf->Cell(7, 9, '');
    $pdf->Cell(7, 9, '', 0, 2, 'c');
    $pdf->Cell(7, 9, '', 0, 1);
    $pdf->Cell(7, 9, '14.');
    $pdf->Cell(7, 9, 'Memberikan keteladanan dalam meciptakan budaya membaca, budaya belajar ', 0, 2, 'c');
    $pdf->Cell(7, 9, 'dan budaya bersih.', 0, 1);
    $pdf->Cell(7, 9, '15.');
    $pdf->Cell(7, 9, 'Bertindak obyektif dan tidak diskriminatif atas dasar pertimbangan jenis  ', 0, 2, 'c');
    $pdf->Cell(7, 9, 'kelamin,agama, suku, ras, kondisi fisik tertentu atau latar belakang keluarga ', 0, 2);
    $pdf->Cell(7, 9, 'dan status sosial ekonomi peserta didik dalam pembelajaran.', 0, 1);
    $pdf->Cell(7, 9, '16.');
    $pdf->Cell(7, 9, 'Mentaati tata tertib dan peraturan perundang-undangan, kode etik guru serta', 0, 2, 'c');
    $pdf->Cell(7, 9, 'nilai-nilai agama dan etika.', 0, 1);
    $pdf->Cell(7, 9, '17.');
    $pdf->Cell(7, 9, 'Berpakaian yang menutup aurat bagi yang beragama Islam dan sesuai norma sosial ', 0, 2, 'c');
    $pdf->Cell(7, 9, 'masyarakat/norma kepatuhan bagi yang beragama lain.', 0, 1);
    $pdf->Cell(7, 9, '18.');
    $pdf->Cell(7, 9, 'Tidak merokok selama berada di lingkungan satuan pendidikan.', 0, 1, 'c');
    $pdf->Output();
  }

  function pembiasaan()
  {
    $pdf = new FPDF('P', 'mm', 'A4');
    // Membuat Halaman Baru
    $pdf->AddPage();
    // Set Title Document
    $pdf->SetTitle('Pembiasaan Guru', true);
    // Set Margin Kertas
    $pdf->SetMargins(5, 20);
    // Setting Jenis Font
    $pdf->SetFont('Times', 'B', '30');
    // Mencetak String
    $pdf->Cell(0, 8, 'PEMBIASAAN GURU', 0, 1, 'C');
    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(20, 15, '', 0, 1);
    $pdf->SetFont('Times', '', '16');
    $pdf->Cell(5, 9, '');
    $pdf->Cell(5, 9, 'Pengembangan karakter peserta didik dapat dilakukan dengan membiasakan', 0, 2);
    $pdf->Cell(5, 9, 'perilaku positif tertentu dalam kehidupan sehari-hari. Pembiasaan merupakan ', 0, 2);
    $pdf->Cell(5, 9, 'proses pembentukan sikap dan perilaku yang relatif menetap dan bersifat otomatis  ', 0, 2);
    $pdf->Cell(5, 9, 'melalui proses pembelajaran yang berulang-ulang, baik dilakukan secara bersama- ', 0, 2);
    $pdf->Cell(5, 9, 'sama ataupun sendiri-sendiri. Hal tersebut juga akan menghasilkan suatu kompetensi. ', 0, 2);
    $pdf->Cell(5, 9, 'Pengembangan karakter melalui pembiasaan ini dapat dilakukan secara terjadwal  ', 0, 2);
    $pdf->Cell(5, 9, 'atau tidak terjadwal baik di dalam maupun di luar kelas. Kegiatan pembiasaan di', 0, 2);
    $pdf->Cell(5, 9, 'sekolah terdiri atas Kegiatan Rutin, Spontan, Terprogram dan Keteladanan.', 0, 2);
    $pdf->SetFont('Times', 'B', '18');
    $pdf->Cell(100, 9, '1. Kegiatan Rutin', 0, 2);
    $pdf->SetFont('Times', '', '16');
    $pdf->Cell(7, 9, '');
    $pdf->Cell(10, 9, 'Kegiatan rutin adalah kegiatan yang dilakukan secara reguler dan terus', 0, 1);
    $pdf->Cell(5, 9, '');
    $pdf->Cell(100, 9, 'menerus di sekolah. Tujuannya untuk membiasakan siswa melakukan', 0, 2);

    $pdf->Cell(100, 9, 'sesuatu dengan baik.', 0, 2);
    $pdf->Cell(100, 9, 'Kegiatan pembiasaan yang termasuk kegiatan rutin adalah sebagai berikut :', 0, 2);
    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Berdoa sebelum memulai kegiatan', 0, 1);
    $pdf->Cell(5, 9, '');
    $pdf->Cell(100, 9, 'Kegiatan ini bertujuan untuk membiasakan peserta didik berdoa sebelum  ', 0, 2);
    $pdf->Cell(100, 9, 'memuliasegala aktifitas. Kegiatan dilaksanakan setiap pagi secara terpusat ', 0, 2);
    $pdf->Cell(100, 9, 'dari ruang informasi dimana pada setiap pagi dengan petugas yang terjadwal.', 0, 2);

    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Hormat Bendera Merah Putih', 0, 1);
    $pdf->Cell(5, 9, '');
    $pdf->Cell(100, 9, 'Kegiatan ini bertujuan untuk menanamkan jiwa nasionalisme dan bangga sebagai ', 0, 2);
    $pdf->Cell(100, 9, 'bangsa pada peserta didik. Bendera Merah Putih telah dipasang di masing masing', 0, 2);
    $pdf->Cell(100, 9, 'kelas dan aba aba dipimpin oleh petugas yang terjadwal.', 0, 2);

    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Sholat Dhuhur Berjamaah', 0, 1);
    $pdf->Cell(5, 9, '');
    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Kebersihan Kelas', 0, 1);
    // Kedua
    $pdf->SetFont('Times', 'B', '18');
    $pdf->Cell(5, 9, '');
    $pdf->Cell(7, 9, '', 0, 2, 'c');
    $pdf->Cell(100, 9, '2. Kegiatan Spontan', 0, 2);
    $pdf->SetFont('Times', '', '16');
    $pdf->Cell(7, 9, '');
    $pdf->Cell(10, 9, 'Kegiatan spontan adalah kegiatan yang dapat dilakukan tanpa dibatasi oleh', 0, 1);
    $pdf->Cell(5, 9, '');
    $pdf->Cell(100, 9, 'waktu, tempat dan ruang. Hal ini bertujuan memberikan pendidikan secara ', 0, 2);
    $pdf->Cell(100, 9, 'spontan, terutama dalam membiasakan bersikap sopan santun, dan sikap ', 0, 2);
    $pdf->Cell(100, 9, 'terpuji lainnya. Contoh:', 0, 2);


    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Membiasakan mengucapkan salam dan bersalaman kepada guru, karyawan ', 0, 2);
    $pdf->Cell(100, 9, 'dan sesama siswa.', 0, 1);
    $pdf->Cell(5, 9, '');
    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Membiasakan bersikap sopan santun.', 0, 1);
    $pdf->Cell(5, 9, '');
    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Membiasakan membuang sampah pada tempatnya.', 0, 1);
    $pdf->Cell(5, 9, '');
    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Membiasakan antre.', 0, 1);
    $pdf->Cell(5, 9, '');
    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Membiasakan menghargai pendapat orang lain.', 0, 1);
    $pdf->Cell(5, 9, '');
    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Membiasakan minta izin masuk/keluar kelas atau ruangan.', 0, 1);
    $pdf->Cell(5, 9, '');
    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Membiasakan menolong atau membantu orang lain.', 0, 1);
    $pdf->Cell(5, 9, '');
    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Membiasakan menyalurkan aspirasi melalui media yang ada di sekolah,', 0, 2);
    $pdf->Cell(100, 9, 'seperti Majalah Dinding dan Kotak Curhat BK.', 0, 1);
    $pdf->Cell(5, 9, '');
    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Membiasakan konsultasi kepada guru pembimbing dan atau guru lain ', 0, 2);
    $pdf->Cell(100, 9, 'sesuai kebutuhan.', 0, 1);
    // Ketiga
    $pdf->SetFont('Times', 'B', '18');
    $pdf->Cell(5, 9, '');
    $pdf->Cell(5, 9, '');
    $pdf->Cell(7, 9, '', 0, 2, 'c');
    $pdf->Cell(100, 9, '3. Kegiatan Terprogram', 0, 2);
    $pdf->SetFont('Times', '', '16');
    $pdf->Cell(7, 9, '');
    $pdf->Cell(10, 9, 'Kegiatan Terprogram ialah kegiatan yang dilaksanakan secara bertahap ', 0, 1);
    $pdf->Cell(5, 9, '');
    $pdf->Cell(100, 9, 'disesuaikan dengan kalender pendidikan atau jadwal yang telah ditetapkan. ', 0, 2);
    $pdf->Cell(100, 9, 'Membiasakan kegiatan ini artinya membiasakan siswa dan personil sekolah ', 0, 2);
    $pdf->Cell(100, 9, 'aktif dalam melaksanakan kegiatan sekolah sesuai dengan kemampuan', 0, 2);
    $pdf->Cell(100, 9, 'dan bidang masing-masing.', 0, 2);
    $pdf->Cell(100, 9, 'Contoh:', 0, 1);
    $pdf->Cell(10, 9, '');
    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Kegiatan Class Meeting', 0, 1);
    $pdf->Cell(10, 9, '');
    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Kegiatan memperingati hari-hari besar nasional   ', 0, 1);
    $pdf->Cell(10, 9, '');
    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Kegiatan Karyawisata', 0, 1);
    $pdf->Cell(10, 9, '');
    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Kegiatan Kemah Akhir Tahun Pelajaran (KATP)', 0, 1);
    $pdf->Cell(10, 9, '');
    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Kegiatan rutin pembiasaan', 0, 1);
    $pdf->Cell(10, 9, '');
    $pdf->Cell(10, 9, '=>');
    $pdf->Cell(100, 9, 'Kegiatan ini dilakukan setiap hari sekolah sebelum pembelajaran dimulai. ', 0, 2);
    $pdf->Cell(100, 9, 'Tujuannya adalah untuk membiasakan diri dan meningkatkan kedisiplinan ', 0, 2);
    $pdf->Cell(100, 9, 'siswa. Kegiatan ini telah terjadwal sebagai berikut :', 0, 2);
    $pdf->Cell(10, 9, '1.');
    $pdf->Cell(100, 9, 'Hari Senin  (Upacara Bendera Merah Putih)', 0, 1);
    $pdf->Cell(10, 9, '');
    $pdf->Cell(10, 9, '');
    $pdf->Cell(10, 9, '2.');
    $pdf->Cell(100, 9, 'Hari Selasa  (Literasi Membaca)', 0, 1);
    $pdf->Cell(10, 9, '');
    $pdf->Cell(10, 9, '');
    $pdf->Cell(10, 9, '3.');
    $pdf->Cell(100, 9, 'Hari Rabu  (Literasi Membaca)', 0, 1);
    $pdf->Cell(10, 9, '');
    $pdf->Cell(10, 9, '');
    $pdf->Cell(10, 9, '4.');
    $pdf->Cell(100, 9, 'Hari Kamis  (Kegiatan Pramuka)', 0, 1);
    $pdf->Cell(10, 9, '');
    $pdf->Cell(10, 9, '');
    $pdf->Cell(10, 9, '5.');
    $pdf->Cell(100, 9, 'Hari Jumat  (Senam Pagi,Jumat Bersih)', 0, 1);
    // EMpat
    $pdf->SetFont('Times', 'B', '18');
    $pdf->Cell(5, 9, '');
    $pdf->Cell(5, 9, '');
    $pdf->Cell(7, 9, '', 0, 2, 'c');
    $pdf->Cell(100, 9, '4. Kegiatan Keteladanan', 0, 2);
    $pdf->SetFont('Times', '', '16');
    $pdf->Cell(7, 9, '');
    $pdf->Cell(10, 9, 'Kegiatan Keteladanan, yaitu kegiatan dalam bentuk perilaku sehari-hari ', 0, 1);
    $pdf->Cell(5, 9, '');
    $pdf->Cell(100, 9, 'hari yang dapat dijadikan contoh . ', 0, 2);
    $pdf->Cell(100, 9, 'Contoh:', 0, 1);

    $pdf->Cell(12, 9, '');
    $pdf->Cell(100, 9, '=> Membiasakan berpakaian rapi', 0, 1);
    $pdf->Cell(12, 9, '');
    $pdf->Cell(100, 9, '=> Mebiasakan datang tepat waktu', 0, 1);
    $pdf->Cell(12, 9, '');
    $pdf->Cell(100, 9, '=> Membiasakan berbahasa dengan baik', 0, 1);
    $pdf->Cell(12, 9, '');
    $pdf->Cell(100, 9, '=> Membiasakan rajin membaca', 0, 1);
    $pdf->Cell(12, 9, '');
    $pdf->Cell(100, 9, '=> Membiasakan bersikap ramah', 0, 1);

    $pdf->Output();
  }
  // Cetak berita Acara
  function Cetakberita()
  {
    date_default_timezone_set("Asia/Jakarta");
    $uri3 = ($this->uri->segment(3));
    $info = $this->db->query("SELECT * FROM infosekolah")->row();
    $berita = $this->db->query("SELECT * FROM beritaacara WHERE idBerita = '$uri3'")->row();
    $guru = $this->db->query("SELECT * FROM guru WHERE nama_lengkap = '$berita->pengawas1'")->row();
    $guru2 = $this->db->query("SELECT * FROM guru WHERE nama_lengkap = '$berita->pengawas2'")->row();
    $daftar_hari = array(
      'Sunday' => 'Minggu',
      'Monday' => 'Senin',
      'Tuesday' => 'Selasa',
      'Wednesday' => 'Rabu',
      'Thursday' => 'Kamis',
      'Friday' => 'Jumat',
      'Saturday' => 'Sabtu'
    );
    $Bulan = array(
      'January' => 'Januari',
      'February' => 'Febuari',
      'March' => 'Maret',
      'April' => 'April',
      'May' => 'Mei',
      'June' => 'Juni',
      'July' => 'Juli',
      'August' => 'Agustus',
      'September' => 'September',
      'October' => 'Oktober',
      'November' => 'November',
      'December' => 'Desember',
    );
    $tanggal = $berita->tglBerita;
    $namaHari = date('l', strtotime($tanggal));
    $namaBulan = date('F', strtotime($tanggal));
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetTitle('Berita Acara ' . $berita->nama_mapel, true);
    $pdf->Image(base_url() . 'gambar/logo/smk.jpg', 6, 8, 40,40);
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(0, 10, "$info->namaSekolah", 0, 1, 'C');
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 2, 'Terakreditasi B', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 11);
    $pdf->Cell(0, 15, 'Darmawan Park', 0, 2, 'C');
    $pdf->Cell(200, 1, "$info->Alamat - Bogor $info->kodePos", 0, 1, 'C');
    $pdf->Cell(200, 10, "Telp : (021) - $info->Telp NPSN : $info->NPSN", 0, 1, 'C');
    $pdf->Cell(200, 2, "E-mail : $info->Email Website : $info->Website", 0, 1, 'C');
    $pdf->Line(10, 55, 200, 55);
    $pdf->Cell(0, 10, "", 0, 2);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 2, "BERITA ACARA", 0, 1, 'C');
    $pdf->Cell(0, 10, "PELAKSANAAN " . strtoupper($berita->jenisUjian), 0, 1, 'C');
    $pdf->Cell(0, 2, "Tahun Ajaran $berita->tahunAjaran", 0, 2, 'C');
    $pdf->SetFont('Arial', '', 13);
    $pdf->Cell(0, 5, "", 0, 2);
    $pdf->Cell(0, 15, "Pada hari ini " . strtolower($daftar_hari[$namaHari]) . " tanggal " . date('d', strtotime($tanggal)) . " bulan " . strtolower($Bulan[$namaBulan]) . " tahun " . date('Y', strtotime($tanggal)) . ",Pukul " . date("H:i", strtotime($berita->waktuMulai)) . " sampai dengan " . date("H:i", strtotime($berita->waktuAkhir)), 0, 1);
    $pdf->Cell(0, 2, "Waktu Indonesia Barat.", 0, 1);
    $pdf->Cell(0, 4, "", 0, 2);
    $pdf->Cell(0, 10, "a. Telah Diselenggarakan $berita->jenisUjian", 0, 1);
    $pdf->Cell(0, 2, "", 0, 2);
    // Nama Sekolah
    $pdf->Cell(5, 3, "", 0, 0);
    $pdf->Cell(80, 3, "Nama Sekolah ", 0, 0);
    $pdf->Cell(80, 3, ": $info->namaSekolah", 0, 1);
    // Ruangan
    $pdf->Cell(5, 5, "", 0, 0);
    $pdf->Cell(80, 5, "Ruang ", 0, 0);
    $pdf->Cell(0, 5, ": $berita->ruangUjian", 0, 1,);
    // Mapel
    $pdf->Cell(5, 5, "", 0, 0);
    $pdf->Cell(80, 5, "Mata Pelajaran ", 0, 0);
    $pdf->Cell(0, 5, ": $berita->nama_mapel", 0, 1,);
    // Jumlah Siswa
    $pdf->Cell(5, 5, "", 0, 0);
    $pdf->Cell(80, 5, "Jumlah Peserta ", 0, 0);
    $pdf->Cell(0, 5, ": $berita->jumlahSiswa", 0, 1,);
    // Siswa Hadir
    $pdf->Cell(5, 5, "", 0, 0);
    $pdf->Cell(80, 5, "Jumlah Peserta Hadir ", 0, 0);
    $pdf->Cell(0, 5, ": $berita->jumlahSiswaHadir", 0, 1,);
    // Siswa Tidak Hadir
    $pdf->Cell(5, 5, "", 0, 0);
    $pdf->Cell(80, 5, "Jumlah Peserta Tidak Hadir ", 0, 0);
    $pdf->Cell(0, 5, ": $berita->jumlahSiswaTidak", 0, 1,);
    // Ket Siswa Tidak Hadir
    $pdf->Cell(5, 5, "", 0, 0);
    $pdf->Cell(80, 5, "Nomor Induk Siswa Tidak Hadir", 0, 0);
    $pdf->Cell(80, 5, ":", 0, 1);
    $pdf->Cell(5, 5, "", 0, 0);
    $pdf->Cell(185, 20, "$berita->ket_tidak_hadir", 1, 1);
    // B

    $pdf->Cell(5, 3, "", 0, 1);
    $pdf->Cell(5, 3, "b.", 0, 0);
    $pdf->Cell(80, 3, "Catatan selama $berita->jenisUjian", 0, 0);
    $pdf->Cell(90, 3, ":", 0, 1);
    $pdf->Cell(5, 3, "", 0, 1);
    $pdf->Cell(5, 3, "", 0, 0);
    $pdf->Cell(185, 20, "$berita->catatan", 1, 1, 'C');
    // TTD
    $pdf->Cell(5, 5, "", 0, 1);
    $pdf->Cell(5, 5, "", 0, 0);
    $pdf->Cell(5, 5, "Yang membuat berita acara :", 0, 1);
    if ($berita->pengawas2 != NULL) {
      $pdf->Cell(0, 5, "", 0, 1,);
      $pdf->Cell(5, 8, "", 0, 0);
      $pdf->Cell(150, 8, "", 0, 0);
      $pdf->Cell(0, 8, "TTD", 0, 0);
      $pdf->Cell(0, 8, "", 0, 1,);
      $pdf->Cell(5, 5, "1.", 0, 0);
      $pdf->Cell(40, 5, "Pengawas", 0, 0);
      $pdf->Cell(75, 5, "$berita->pengawas1", 'B', 1);
      $pdf->Cell(5, 5, "", 0, 0);
      $pdf->Cell(40, 5, "NIK/NIP", 0, 0);
      $pdf->Cell(90, 5, "$guru->nip", 0, 0);
      $pdf->Cell(5, 5, "1.", 0, 0);
      $pdf->Cell(40, 5, "", 'B', 0);
      // Batas Pengawas 1
      $pdf->Cell(0, 10, "", 0, 1,);
      $pdf->Cell(5, 5, "2.", 0, 0);
      $pdf->Cell(40, 5, "Pengawas", 0, 0);
      $pdf->Cell(75, 5, "$berita->pengawas2", 'B', 1);
      $pdf->Cell(5, 5, "", 0, 0);
      $pdf->Cell(40, 5, "NIK/NIP", 0, 0);
      $pdf->Cell(90, 5, "$guru2->nip", 0, 0);
      $pdf->Cell(5, 5, "2.", 0, 0);
      $pdf->Cell(40, 5, "", 'B', 0);
      // Batas Pengawas 2
      $pdf->Cell(0, 10, "", 0, 1,);
      $pdf->Cell(5, 5, "3.", 0, 0);
      $pdf->Cell(40, 5, "Kepala Sekolah", 0, 0);
      $pdf->Cell(75, 5, "Rahmat Darsono, SE., MM", 'B', 1);
      $pdf->Cell(5, 5, "", 0, 0);
      $pdf->Cell(40, 5, "NIK/NIP", 0, 0);
      $pdf->Cell(90, 5, "19680103.201509.001", 0, 0);
      $pdf->Cell(5, 5, "3.", 0, 0);
      $pdf->Cell(40, 5, "", 'B', 0);

      // Footer
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(0, 19, "", 0, 1,);
      $pdf->Cell(8, 5, "", 1, 0,);
      $pdf->Cell(5, 5, "", 0, 0,);
      $pdf->Cell(162, 5, "SMK DARMAWAN", 1, 0, 'C');
      $pdf->Cell(5, 5, "", 0, 0,);
      $pdf->Cell(8, 5, "", 1, 1,);
    } else {
      $pdf->Cell(0, 10, "", 0, 1,);
      $pdf->Cell(5, 5, "", 0, 0);
      $pdf->Cell(90, 5, "Pengawas", 0, 0);
      $pdf->Cell(0, 5, "Kepala Sekolah", 0, 0);
      $pdf->Cell(0, 30, "", 0, 1,);
      $pdf->Cell(5, 5, "", 0, 0);
      $pdf->Cell(75, 5, "$berita->pengawas1", 'B', 0,);
      $pdf->Cell(15, 5, "", 0, 0,);
      $pdf->Cell(75, 5, "Rahmat Darsono, SE., MM", 'B', 0,);
      $pdf->Cell(0, 5, "", 0, 1,);
      $pdf->Cell(5, 5, "", 0, 0);
      $pdf->Cell(90, 5, "NIK : $guru->nip ", 0, 0);
      $pdf->Cell(90, 5, "NIK : 19680103.201509.001", 0, 0,);

      // Footer
      $pdf->SetFont('Arial', 'B', 10);
      $pdf->Cell(0, 22, "", 0, 1,);
      $pdf->Cell(8, 5, "", 1, 0,);
      $pdf->Cell(5, 5, "", 0, 0,);
      $pdf->Cell(162, 5, "SMK DARMAWAN", 1, 0, 'C');
      $pdf->Cell(5, 5, "", 0, 0,);
      $pdf->Cell(8, 5, "", 1, 1,);
    }
    $pdf->Output();
  }
  function kartuUji()
  {
    $pdf = new FPDF('P', 'mm', 'A4');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial', 'B', 16);
    // mencetak string 
    $pdf->Image(base_url() . 'gambar/logo/smk.png', 11, 12, -600);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(95, 14, '', 1, 0);
    // $pdf->Cell(95, -20, 'SMK Darmawan', 0, 1, 'C');
    $pdf->Text(47, 13.5, "SMK DARMAWAN");
    $pdf->SetFont('Arial', '', 7);
    $pdf->Text(25, 16, "Jalan Gunung Pancar No 03 Kp. Wates RT.004/RW.001 - Bogor 16811");
    $pdf->Text(40, 18.5, "Telp: (021) - 879 515 26 NPSN: 69953897");
    //$pdf->Cell(95, 30, 'Jalan Gunung Pancar No 03 Kp. Wates RT.004 / RW 001', 0, 0, 'C');

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(2, 14, '', 0, 0);
    $pdf->Image(base_url() . 'gambar/logo/smk.png', 108, 12, -600);
    $pdf->Text(145, 13.5, "SMK DARMAWAN");
    $pdf->SetFont('Arial', '', 7);
    $pdf->Text(122, 16, "Jalan Gunung Pancar No 03 Kp. Wates RT.004/RW.001 - Bogor 16811");
    $pdf->Text(137, 18.5, "Telp: (021) - 879 515 26 NPSN: 69953897");
    $pdf->Cell(95, 14, '', 1, 1);
    $pdf->Image(base_url() . 'gambar/logo/smk.png', 11, 12, -600);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(95, 14, '', 1, 0);
    // $pdf->Cell(95, -20, 'SMK Darmawan', 0, 1, 'C');
    $pdf->Text(47, 13.5, "SMK DARMAWAN");
    $pdf->SetFont('Arial', '', 7);
    $pdf->Text(25, 16, "Jalan Gunung Pancar No 03 Kp. Wates RT.004/RW.001 - Bogor 16811");
    $pdf->Text(40, 18.5, "Telp: (021) - 879 515 26 NPSN: 69953897");
    $pdf->Output();
  }
}

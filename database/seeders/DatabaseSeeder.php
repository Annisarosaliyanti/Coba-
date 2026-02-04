<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\StrukturOrganisasi;
use App\Models\Service;
use App\Models\News;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Create profiles
        Profile::create([
            'type' => 'sambutan',
            'title' => 'Sambutan Camat Sungai Pinang',
            'content' => '<p>Assalamu\'alaikum Wr. Wb.</p><p>Puji syukur kita panjatkan ke hadirat Allah SWT, karena atas rahmat dan karunia-Nya, Website Kecamatan Sungai Pinang dapat hadir di tengah-tengah masyarakat.</p><p>Website ini merupakan wujud nyata komitmen kami dalam meningkatkan pelayanan publik dan transparansi informasi kepada masyarakat. Melalui website ini, kami berharap dapat memberikan informasi yang akurat, cepat, dan mudah diakses oleh seluruh lapisan masyarakat.</p><p>Semoga website ini dapat menjadi jembatan komunikasi yang efektif antara pemerintah kecamatan dengan masyarakat, serta mendukung terciptanya tata kelola pemerintahan yang baik (good governance).</p><p>Wassalamu\'alaikum Wr. Wb.</p>',
            'is_active' => true,
            'order' => 1,
        ]);

        Profile::create([
            'type' => 'pimpinan',
            'title' => 'Profil Camat Sungai Pinang',
            'content' => '<p><strong>Nama:</strong> H. Ahmad Rizal, S.Sos., M.Si</p><p><strong>NIP:</strong> 19750315 199803 1 001</p><p><strong>Jabatan:</strong> Camat Sungai Pinang</p><p><strong>Pendidikan:</strong></p><ul><li>S1 Ilmu Pemerintahan - Universitas Riau</li><li>S2 Administrasi Publik - Universitas Indonesia</li></ul><p><strong>Riwayat Jabatan:</strong></p><ul><li>2020 - Sekarang: Camat Sungai Pinang</li><li>2017 - 2020: Sekretaris Kecamatan Bukit Raya</li><li>2014 - 2017: Kasi Pemerintahan Kecamatan Sukajadi</li></ul>',
            'is_active' => true,
            'order' => 2,
        ]);

        Profile::create([
            'type' => 'sejarah',
            'title' => 'Sejarah Kecamatan Sungai Pinang',
            'content' => '<p>Kecamatan Sungai Pinang merupakan salah satu kecamatan di Kota Samarinda yang memiliki sejarah panjang dalam perkembangan kota. Kecamatan ini terbentuk berdasarkan Peraturan Daerah sebagai upaya untuk meningkatkan pelayanan kepada masyarakat.</p><p>Wilayah Kecamatan Sungai Pinang terletak di bagian tengah Kota Samarinda dengan luas wilayah sekitar 34,16 km². Kecamatan ini terdiri dari beberapa kelurahan yang memiliki karakteristik beragam, mulai dari pemukiman padat hingga kawasan perkantoran.</p><p>Sejak pembentukannya, Kecamatan Sungai Pinang terus berkembang menjadi salah satu pusat kegiatan ekonomi dan pemerintahan di Kota Samarinda.</p>',
            'is_active' => true,
            'order' => 3,
        ]);

        Profile::create([
            'type' => 'visi_misi',
            'title' => 'Visi & Misi Kecamatan Sungai Pinang',
            'content' => '<h3>VISI</h3><p>"Terwujudnya Kecamatan Sungai Pinang yang Maju, Mandiri, dan Sejahtera melalui Pelayanan Prima dan Pembangunan Berkelanjutan"</p><h3>MISI</h3><ol><li>Meningkatkan kualitas pelayanan publik yang prima dan berbasis teknologi informasi</li><li>Mendorong partisipasi masyarakat dalam pembangunan kecamatan</li><li>Mewujudkan tata kelola pemerintahan yang bersih, transparan, dan akuntabel</li><li>Meningkatkan kesejahteraan masyarakat melalui pemberdayaan ekonomi lokal</li><li>Membangun infrastruktur yang memadai dan ramah lingkungan</li></ol>',
            'is_active' => true,
            'order' => 4,
        ]);

        Profile::create([
            'type' => 'tupoksi',
            'title' => 'Tugas Pokok dan Fungsi',
            'content' => '<p>Berdasarkan Peraturan Walikota, Kecamatan mempunyai tugas pokok menyelenggarakan urusan pemerintahan umum, mengkoordinasikan kegiatan pemberdayaan masyarakat, dan melaksanakan sebagian urusan otonomi daerah yang dilimpahkan oleh Walikota.</p><h3>Fungsi Kecamatan:</h3><ol><li>Penyelenggaraan urusan pemerintahan umum di tingkat kecamatan</li><li>Pengoordinasian kegiatan pemberdayaan masyarakat</li><li>Pengoordinasian upaya penyelenggaraan ketentraman dan ketertiban umum</li><li>Pengoordinasian penerapan dan penegakan Perda dan Peraturan Walikota</li><li>Pengoordinasian pemeliharaan prasarana dan sarana pelayanan umum</li><li>Pengoordinasian penyelenggaraan kegiatan pemerintahan yang dilakukan oleh Perangkat Daerah di tingkat kecamatan</li><li>Pembinaan dan pengawasan penyelenggaraan kegiatan kelurahan</li><li>Pelaksanaan Urusan Pemerintahan yang menjadi kewenangan kota yang tidak dilaksanakan oleh unit kerja Pemerintah Kota yang ada di kecamatan</li></ol>',
            'is_active' => true,
            'order' => 5,
        ]);

        // Create struktur organisasi
        $camat = StrukturOrganisasi::create([
            'name' => 'H. Ahmad Rizal, S.Sos., M.Si',
            'position' => 'Camat',
            'order' => 1,
            'is_active' => true,
        ]);

        $sekretaris = StrukturOrganisasi::create([
            'name' => 'Drs. Muhammad Yusuf, M.AP',
            'position' => 'Sekretaris Kecamatan',
            'parent_id' => $camat->id,
            'order' => 2,
            'is_active' => true,
        ]);

        StrukturOrganisasi::create([
            'name' => 'Hj. Siti Aminah, S.E.',
            'position' => 'Kasi Pemerintahan',
            'parent_id' => $camat->id,
            'order' => 3,
            'is_active' => true,
        ]);

        StrukturOrganisasi::create([
            'name' => 'Ir. Bambang Sutrisno',
            'position' => 'Kasi Ekonomi & Pembangunan',
            'parent_id' => $camat->id,
            'order' => 4,
            'is_active' => true,
        ]);

        StrukturOrganisasi::create([
            'name' => 'Dra. Nurul Hidayati',
            'position' => 'Kasi Kesejahteraan Rakyat',
            'parent_id' => $camat->id,
            'order' => 5,
            'is_active' => true,
        ]);

        StrukturOrganisasi::create([
            'name' => 'Ahmad Fauzi, S.H.',
            'position' => 'Kasi Ketentraman & Ketertiban',
            'parent_id' => $camat->id,
            'order' => 6,
            'is_active' => true,
        ]);

        // Create sample services
        Service::create([
            'category' => 'pemerintahan',
            'name' => 'Pembuatan Surat Pengantar KTP',
            'description' => 'Layanan pembuatan surat pengantar untuk pembuatan KTP baru atau perpanjangan KTP.',
            'requirements' => "Fotokopi Kartu Keluarga (KK)\nSurat Pengantar dari RT/RW\nPas foto 3x4 (2 lembar)\nFormulir permohonan",
            'procedure' => "1. Mengambil formulir permohonan di loket pelayanan\n2. Mengisi formulir dengan lengkap\n3. Menyerahkan berkas persyaratan\n4. Menunggu verifikasi berkas\n5. Mengambil surat pengantar yang sudah jadi",
            'duration' => '1 hari kerja',
            'cost' => 'Gratis',
            'order' => 1,
            'is_active' => true,
        ]);

        Service::create([
            'category' => 'pemerintahan',
            'name' => 'Legalisir Dokumen',
            'description' => 'Layanan legalisasi dokumen resmi untuk keperluan administrasi.',
            'requirements' => "Dokumen asli yang akan dilegalisir\nFotokopi dokumen\nSurat pengantar dari instansi (jika diperlukan)",
            'procedure' => "1. Menyerahkan dokumen asli dan fotokopi\n2. Petugas memverifikasi dokumen\n3. Dokumen dilegalisir dan distempel\n4. Mengambil dokumen yang sudah dilegalisir",
            'duration' => '1-2 jam',
            'cost' => 'Gratis',
            'order' => 2,
            'is_active' => true,
        ]);

        Service::create([
            'category' => 'ekonomi',
            'name' => 'Rekomendasi Izin Usaha',
            'description' => 'Layanan pemberian rekomendasi untuk pengurusan izin usaha di tingkat kecamatan.',
            'requirements' => "Fotokopi KTP\nFotokopi Kartu Keluarga\nSurat Keterangan Domisili Usaha dari Kelurahan\nPas foto 3x4 (2 lembar)",
            'procedure' => "1. Mengajukan permohonan di loket pelayanan\n2. Menyerahkan berkas persyaratan\n3. Survei lokasi (jika diperlukan)\n4. Proses penerbitan rekomendasi\n5. Pengambilan surat rekomendasi",
            'duration' => '3 hari kerja',
            'cost' => 'Gratis',
            'order' => 1,
            'is_active' => true,
        ]);

        Service::create([
            'category' => 'kesra',
            'name' => 'Surat Keterangan Tidak Mampu',
            'description' => 'Layanan penerbitan surat keterangan tidak mampu untuk keperluan administrasi.',
            'requirements' => "Fotokopi KTP\nFotokopi Kartu Keluarga\nSurat Pengantar dari RT/RW\nSurat Pengantar dari Kelurahan",
            'procedure' => "1. Menyerahkan berkas persyaratan\n2. Verifikasi data oleh petugas\n3. Proses penerbitan surat\n4. Pengambilan surat keterangan",
            'duration' => '1 hari kerja',
            'cost' => 'Gratis',
            'order' => 1,
            'is_active' => true,
        ]);

        Service::create([
            'category' => 'trantib',
            'name' => 'Izin Keramaian',
            'description' => 'Layanan penerbitan izin keramaian untuk acara yang melibatkan banyak orang.',
            'requirements' => "Surat permohonan\nFotokopi KTP penanggungjawab\nDenah lokasi acara\nJadwal dan susunan acara",
            'procedure' => "1. Mengajukan surat permohonan\n2. Menyerahkan berkas persyaratan\n3. Koordinasi dengan pihak keamanan\n4. Proses penerbitan izin\n5. Pengambilan surat izin",
            'duration' => '3-5 hari kerja',
            'cost' => 'Gratis',
            'order' => 1,
            'is_active' => true,
        ]);

        // Create sample news
        News::create([
            'title' => 'Camat Sungai Pinang Resmikan Pos Pelayanan Terpadu Baru',
            'slug' => 'camat-resmikan-pos-pelayanan-terpadu-baru',
            'excerpt' => 'Dalam rangka meningkatkan kualitas pelayanan kepada masyarakat, Camat Sungai Pinang meresmikan Pos Pelayanan Terpadu (Posyandu) baru di Kelurahan Sidodadi.',
            'content' => '<p>Kecamatan Sungai Pinang - Camat Sungai Pinang, H. Ahmad Rizal, S.Sos., M.Si, hari ini meresmikan Pos Pelayanan Terpadu (Posyandu) baru yang berlokasi di Kelurahan Sidodadi.</p><p>Peresmian ini merupakan bagian dari program peningkatan pelayanan kesehatan masyarakat yang digagas oleh Pemerintah Kota.</p><p>"Dengan adanya Posyandu baru ini, kami berharap akses masyarakat terhadap layanan kesehatan dasar semakin mudah dan terjangkau," ujar Camat dalam sambutannya.</p><p>Posyandu baru ini dilengkapi dengan berbagai fasilitas modern termasuk ruang pemeriksaan yang nyaman, area tunggu yang memadai, serta peralatan kesehatan yang lengkap.</p>',
            'category' => 'Kegiatan',
            'is_published' => true,
            'published_at' => now(),
            'author_id' => 1,
            'views' => 125,
        ]);

        News::create([
            'title' => 'Pelaksanaan Musyawarah Perencanaan Pembangunan Kecamatan 2024',
            'slug' => 'musrenbang-kecamatan-2024',
            'excerpt' => 'Kecamatan Sungai Pinang menggelar Musyawarah Perencanaan Pembangunan (Musrenbang) tingkat Kecamatan guna menyusun prioritas pembangunan tahun 2024.',
            'content' => '<p>Bertempat di Aula Kecamatan Sungai Pinang, telah dilaksanakan Musyawarah Perencanaan Pembangunan (Musrenbang) Tingkat Kecamatan untuk tahun anggaran 2024.</p><p>Kegiatan yang dihadiri oleh seluruh Lurah, tokoh masyarakat, dan perwakilan organisasi kemasyarakatan ini bertujuan untuk menampung aspirasi masyarakat terkait prioritas pembangunan di wilayah Kecamatan Sungai Pinang.</p><p>Beberapa usulan program yang disampaikan antara lain perbaikan infrastruktur jalan, peningkatan fasilitas umum, dan pengembangan UMKM lokal.</p>',
            'category' => 'Pembangunan',
            'is_published' => true,
            'published_at' => now()->subDays(3),
            'author_id' => 1,
            'views' => 89,
        ]);

        News::create([
            'title' => 'Sosialisasi Program Bantuan Sosial di Kecamatan Sungai Pinang',
            'slug' => 'sosialisasi-bansos',
            'excerpt' => 'Dalam rangka memastikan penyaluran bantuan sosial tepat sasaran, Kecamatan Sungai Pinang mengadakan sosialisasi kepada warga penerima manfaat.',
            'content' => '<p>Kecamatan Sungai Pinang menggelar kegiatan sosialisasi Program Bantuan Sosial yang ditujukan bagi masyarakat kurang mampu di wilayah kecamatan.</p><p>Sosialisasi ini bertujuan untuk memberikan pemahaman kepada masyarakat mengenai jenis-jenis bantuan yang tersedia, kriteria penerima, serta tata cara pendaftaran dan pencairan bantuan.</p><p>Diharapkan dengan adanya sosialisasi ini, penyaluran bantuan sosial dapat berjalan dengan lancar dan tepat sasaran.</p>',
            'category' => 'Pengumuman',
            'is_published' => true,
            'published_at' => now()->subDays(7),
            'author_id' => 1,
            'views' => 156,
        ]);

        // Create contact
        Contact::create([
            'address' => 'Jl. Raya Sungai Pinang No. 1, Kelurahan Sungai Pinang Dalam, Kecamatan Sungai Pinang, Kota Samarinda, Kalimantan Timur 75117',
            'phone' => '(0541) 123456',
            'email' => 'kec.sungaipinang@samarindakota.go.id',
            'fax' => '(0541) 123457',
            'maps_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.667614707307!2d117.15183631475395!3d-0.5058799996063892!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f8c2d1c5e9f%3A0x8e7c0a5b0a5f6c3e!2sSamarinda%2C%20East%20Kalimantan!5e0!3m2!1sen!2sid!4v1640000000000!5m2!1sen!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'working_hours' => "Senin - Kamis: 07:30 - 16:00 WIB\nJumat: 07:30 - 11:30 WIB\nSabtu - Minggu: Libur",
            'social_media' => [
                'facebook' => 'https://facebook.com/kecsungaipinang',
                'instagram' => 'https://instagram.com/kecsungaipinang',
                'twitter' => null,
                'youtube' => null,
            ],
        ]);

        // Create settings
        Setting::set('site_name', 'Kecamatan Sungai Pinang');
        Setting::set('site_description', 'Website Resmi Kecamatan Sungai Pinang - Kota Samarinda');
        Setting::set('welcome_title', 'Selamat Datang');
        Setting::set('welcome_text', 'Website Resmi Kecamatan Sungai Pinang Kota Samarinda');
    }
}

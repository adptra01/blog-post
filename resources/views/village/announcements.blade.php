@extends('layouts.blog')

@section('title', 'Pengumuman Desa Tangkit')
@section('description', 'Informasi terbaru pengumuman dan agenda kegiatan Desa Tangkit')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-primary via-secondary to-accent">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto text-white">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Pengumuman Desa
            </h1>
            <p class="text-xl sm:text-2xl lg:text-3xl font-light leading-relaxed">
                Informasi Terbaru & Agenda Kegiatan
            </p>
        </div>
    </section>

    <!-- Announcements Section -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container-custom">
            <!-- Filter Tabs -->
            <div class="flex flex-wrap justify-center mb-12">
                <button class="btn-filter active" data-filter="all">Semua</button>
                <button class="btn-filter" data-filter="urgent">Penting</button>
                <button class="btn-filter" data-filter="event">Kegiatan</button>
                <button class="btn-filter" data-filter="info">Informasi</button>
            </div>

            <!-- Announcements Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="announcements-grid">
                <!-- Urgent Announcement -->
                <div class="announcement-card urgent bg-red-50 dark:bg-red-900/20 border-l-4 border-red-500">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-red-100 dark:bg-red-800 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-exclamation-triangle text-red-600 dark:text-red-400 text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="badge-urgent">PENTING</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">28 Sep 2025</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                                Vaksinasi COVID-19 Booster Gratis
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                                Pemerintah Desa Tangkit bekerja sama dengan Puskesmas Tangkit akan menyelenggarakan vaksinasi COVID-19 booster gratis untuk warga desa.
                            </p>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                <p><strong>Lokasi:</strong> Balai Desa Tangkit</p>
                                <p><strong>Waktu:</strong> 30 September 2025, 08:00 - 12:00 WIB</p>
                                <p><strong>Syarat:</strong> Membawa KTP dan sudah vaksin dosis 2</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event Announcement -->
                <div class="announcement-card event bg-blue-50 dark:bg-blue-900/20 border-l-4 border-blue-500">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-800 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-calendar-alt text-blue-600 dark:text-blue-400 text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="badge-event">KEGIATAN</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">25 Sep 2025</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                                Hari Kesadaran Nasional (HKN) 2025
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                                Peringatan Hari Kesadaran Nasional di Desa Tangkit dengan berbagai kegiatan edukasi dan sosialisasi.
                            </p>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                <p><strong>Lokasi:</strong> Lapangan Desa Tangkit</p>
                                <p><strong>Waktu:</strong> 28 September 2025, mulai pukul 08:00 WIB</p>
                                <p><strong>Kegiatan:</strong> Upacara, edukasi, dan bazaar UMKM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Announcement -->
                <div class="announcement-card info bg-green-50 dark:bg-green-900/20 border-l-4 border-green-500">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-green-100 dark:bg-green-800 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-info-circle text-green-600 dark:text-green-400 text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="badge-info">INFORMASI</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">20 Sep 2025</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                                Pembagian Bantuan Sembako PKH
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                                Informasi jadwal pembagian bantuan sembako Program Keluarga Harapan (PKH) bulan September 2025.
                            </p>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                <p><strong>Lokasi:</strong> Balai Desa Tangkit</p>
                                <p><strong>Jadwal:</strong> 1-15 Oktober 2025</p>
                                <p><strong>Penerima:</strong> Keluarga PKH terdaftar</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event Announcement -->
                <div class="announcement-card event bg-purple-50 dark:bg-purple-900/20 border-l-4 border-purple-500">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-800 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-users text-purple-600 dark:text-purple-400 text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="badge-event">KEGIATAN</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">15 Sep 2025</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                                Sosialisasi Program Desa Tangkit Maju
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                                Sosialisasi program pembangunan desa untuk meningkatkan kesejahteraan masyarakat Desa Tangkit.
                            </p>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                <p><strong>Lokasi:</strong> Aula Desa Tangkit</p>
                                <p><strong>Waktu:</strong> 20 September 2025, 19:00 - 21:00 WIB</p>
                                <p><strong>Peserta:</strong> Seluruh warga Desa Tangkit</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Urgent Announcement -->
                <div class="announcement-card urgent bg-orange-50 dark:bg-orange-900/20 border-l-4 border-orange-500">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-orange-100 dark:bg-orange-800 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-orange-600 dark:text-orange-400 text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="badge-urgent">PENTING</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">10 Sep 2025</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                                Pendaftaran BPJS Kesehatan Gratis
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                                Pemerintah desa membuka pendaftaran BPJS Kesehatan gratis untuk warga kurang mampu.
                            </p>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                <p><strong>Lokasi:</strong> Kantor Desa Tangkit</p>
                                <p><strong>Pendaftaran:</strong> 15-30 September 2025</p>
                                <p><strong>Kuota:</strong> Terbatas, prioritas warga kurang mampu</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Announcement -->
                <div class="announcement-card info bg-teal-50 dark:bg-teal-900/20 border-l-4 border-teal-500">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-teal-100 dark:bg-teal-800 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-graduation-cap text-teal-600 dark:text-teal-400 text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center space-x-2 mb-2">
                                <span class="badge-info">INFORMASI</span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">5 Sep 2025</span>
                            </div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">
                                Beasiswa Pendidikan Tinggi 2025
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                                Informasi pendaftaran beasiswa pendidikan tinggi untuk putra-putri Desa Tangkit yang berprestasi.
                            </p>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                <p><strong>Pendaftaran:</strong> 1-30 Oktober 2025</p>
                                <p><strong>Syarat:</strong> IPK minimal 3.5, surat rekomendasi</p>
                                <p><strong>Kontak:</strong> Kepala Desa atau Ketua RW</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button class="btn-secondary">
                    Muat Lebih Banyak
                </button>
            </div>
        </div>
    </section>

    <!-- Calendar Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    Kalender Kegiatan
                </h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Jadwal kegiatan rutin dan agenda penting Desa Tangkit dalam satu bulan ke depan
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Monthly Calendar -->
                <div class="bg-white dark:bg-gray-700 rounded-xl p-6 shadow-lg">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 text-center">
                        September 2025
                    </h3>

                    <div class="grid grid-cols-7 gap-2 mb-4">
                        <div class="text-center text-sm font-medium text-gray-500 dark:text-gray-400">Min</div>
                        <div class="text-center text-sm font-medium text-gray-500 dark:text-gray-400">Sen</div>
                        <div class="text-center text-sm font-medium text-gray-500 dark:text-gray-400">Sel</div>
                        <div class="text-center text-sm font-medium text-gray-500 dark:text-gray-400">Rab</div>
                        <div class="text-center text-sm font-medium text-gray-500 dark:text-gray-400">Kam</div>
                        <div class="text-center text-sm font-medium text-gray-500 dark:text-gray-400">Jum</div>
                        <div class="text-center text-sm font-medium text-gray-500 dark:text-gray-400">Sab</div>
                    </div>

                    <div class="grid grid-cols-7 gap-2">
                        <!-- Calendar days would be dynamically generated -->
                        <div class="text-center text-sm p-2"></div>
                        <div class="text-center text-sm p-2">1</div>
                        <div class="text-center text-sm p-2">2</div>
                        <div class="text-center text-sm p-2">3</div>
                        <div class="text-center text-sm p-2">4</div>
                        <div class="text-center text-sm p-2">5</div>
                        <div class="text-center text-sm p-2">6</div>
                        <div class="text-center text-sm p-2">7</div>
                        <div class="text-center text-sm p-2">8</div>
                        <div class="text-center text-sm p-2">9</div>
                        <div class="text-center text-sm p-2">10</div>
                        <div class="text-center text-sm p-2">11</div>
                        <div class="text-center text-sm p-2">12</div>
                        <div class="text-center text-sm p-2">13</div>
                        <div class="text-center text-sm p-2 bg-primary/10 text-primary font-bold rounded">14</div>
                        <div class="text-center text-sm p-2">15</div>
                        <div class="text-center text-sm p-2">16</div>
                        <div class="text-center text-sm p-2">17</div>
                        <div class="text-center text-sm p-2">18</div>
                        <div class="text-center text-sm p-2">19</div>
                        <div class="text-center text-sm p-2">20</div>
                        <div class="text-center text-sm p-2 bg-secondary/10 text-secondary font-bold rounded">21</div>
                        <div class="text-center text-sm p-2">22</div>
                        <div class="text-center text-sm p-2">23</div>
                        <div class="text-center text-sm p-2">24</div>
                        <div class="text-center text-sm p-2">25</div>
                        <div class="text-center text-sm p-2">26</div>
                        <div class="text-center text-sm p-2">27</div>
                        <div class="text-center text-sm p-2 bg-accent/10 text-accent font-bold rounded">28</div>
                        <div class="text-center text-sm p-2">29</div>
                        <div class="text-center text-sm p-2">30</div>
                    </div>

                    <div class="mt-6 space-y-2">
                        <div class="flex items-center space-x-2 text-sm">
                            <div class="w-3 h-3 bg-primary rounded-full"></div>
                            <span class="text-gray-600 dark:text-gray-300">Hari Kesadaran Nasional</span>
                        </div>
                        <div class="flex items-center space-x-2 text-sm">
                            <div class="w-3 h-3 bg-secondary rounded-full"></div>
                            <span class="text-gray-600 dark:text-gray-300">Sosialisasi Program Desa</span>
                        </div>
                        <div class="flex items-center space-x-2 text-sm">
                            <div class="w-3 h-3 bg-accent rounded-full"></div>
                            <span class="text-gray-600 dark:text-gray-300">Vaksinasi COVID-19</span>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Events -->
                <div class="bg-white dark:bg-gray-700 rounded-xl p-6 shadow-lg">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">
                        Agenda Mendatang
                    </h3>

                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-primary font-bold text-sm">28</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Hari Kesadaran Nasional</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Lapangan Desa Tangkit</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">28 Sep 2025, 08:00 WIB</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-secondary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-secondary font-bold text-sm">30</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Vaksinasi COVID-19 Booster</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Balai Desa Tangkit</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">30 Sep 2025, 08:00-12:00 WIB</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-accent font-bold text-sm">15</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Pembagian Bantuan Sembako</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Balai Desa Tangkit</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">1-15 Okt 2025</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <span class="text-primary font-bold text-sm">20</span>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900 dark:text-white">Sosialisasi Program Desa Maju</h4>
                                <p class="text-sm text-gray-600 dark:text-gray-300">Aula Desa Tangkit</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">20 Sep 2025, 19:00 WIB</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-600">
                        <a href="#" class="text-primary hover:underline text-sm font-medium">
                            Lihat Semua Agenda →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Subscription -->
    <section class="py-16 bg-primary text-white">
        <div class="container-custom text-center">
            <h2 class="text-3xl font-bold mb-4">
                Dapatkan Informasi Terbaru
            </h2>
            <p class="text-xl mb-8 opacity-90">
                Berlangganan newsletter untuk mendapatkan pengumuman dan informasi penting Desa Tangkit
            </p>

            <form class="max-w-md mx-auto flex gap-4">
                <input type="email" placeholder="Masukkan email Anda" class="flex-1 px-4 py-3 rounded-lg text-gray-900" required>
                <button type="submit" class="btn-secondary">
                    Berlangganan
                </button>
            </form>
        </div>
    </section>
@endsection

<style>
.btn-filter {
    @apply px-6 py-2 mx-2 mb-4 rounded-full font-medium transition-colors duration-200;
    @apply bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-primary hover:text-white;
}

.btn-filter.active {
    @apply bg-primary text-white;
}

.announcement-card {
    @apply rounded-xl p-6 shadow-lg transition-transform duration-200 hover:scale-105;
}

.badge-urgent {
    @apply px-2 py-1 text-xs font-bold rounded-full bg-red-100 dark:bg-red-800 text-red-800 dark:text-red-200;
}

.badge-event {
    @apply px-2 py-1 text-xs font-bold rounded-full bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200;
}

.badge-info {
    @apply px-2 py-1 text-xs font-bold rounded-full bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.btn-filter');
    const announcementCards = document.querySelectorAll('.announcement-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Add active class to clicked button
            button.classList.add('active');

            const filter = button.dataset.filter;

            announcementCards.forEach(card => {
                if (filter === 'all' || card.classList.contains(filter)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>

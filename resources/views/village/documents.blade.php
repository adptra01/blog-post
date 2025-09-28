@extends('layouts.blog')

@section('title', 'Dokumen & Peraturan Desa Tangkit')
@section('description', 'Koleksi dokumen resmi, peraturan desa, dan informasi publik Desa Tangkit')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-primary via-secondary to-accent">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto text-white">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Dokumen & Peraturan
            </h1>
            <p class="text-xl sm:text-2xl lg:text-3xl font-light leading-relaxed">
                Informasi Publik Desa Tangkit
            </p>
        </div>
    </section>

    <!-- Document Categories -->
    <section class="py-8 bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700">
        <div class="container-custom">
            <div class="flex flex-wrap justify-center space-x-4">
                <button class="doc-filter active" data-filter="all">Semua</button>
                <button class="doc-filter" data-filter="peraturan">Peraturan Desa</button>
                <button class="doc-filter" data-filter="keuangan">Keuangan</button>
                <button class="doc-filter" data-filter="laporan">Laporan</button>
                <button class="doc-filter" data-filter="program">Program</button>
                <button class="doc-filter" data-filter="administrasi">Administrasi</button>
            </div>
        </div>
    </section>

    <!-- Documents Grid -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container-custom">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="documents-grid">
                <!-- Peraturan Desa -->
                <div class="document-card peraturan group">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 h-full">
                        <div class="flex items-start space-x-4 mb-4">
                            <div class="w-12 h-12 bg-red-100 dark:bg-red-900/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-gavel text-red-600 dark:text-red-400 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <span class="badge-peraturan">Peraturan Desa</span>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mt-2">
                                    Peraturan Desa Nomor 5 Tahun 2024
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                    Tentang Pengelolaan Keuangan Desa
                                </p>
                            </div>
                        </div>

                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                            <p><strong>Nomor:</strong> 05/2024</p>
                            <p><strong>Tanggal:</strong> 15 Agustus 2024</p>
                            <p><strong>Status:</strong> Berlaku</p>
                        </div>

                        <div class="flex space-x-2">
                            <button class="btn-outline flex-1 text-sm">
                                <i class="fas fa-eye mr-2"></i>
                                Lihat
                            </button>
                            <button class="btn-primary flex-1 text-sm">
                                <i class="fas fa-download mr-2"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <div class="document-card peraturan group">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 h-full">
                        <div class="flex items-start space-x-4 mb-4">
                            <div class="w-12 h-12 bg-red-100 dark:bg-red-900/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-gavel text-red-600 dark:text-red-400 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <span class="badge-peraturan">Peraturan Desa</span>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mt-2">
                                    Peraturan Desa Nomor 3 Tahun 2024
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                    Tentang Retribusi Pelayanan Desa
                                </p>
                            </div>
                        </div>

                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                            <p><strong>Nomor:</strong> 03/2024</p>
                            <p><strong>Tanggal:</strong> 10 Juni 2024</p>
                            <p><strong>Status:</strong> Berlaku</p>
                        </div>

                        <div class="flex space-x-2">
                            <button class="btn-outline flex-1 text-sm">
                                <i class="fas fa-eye mr-2"></i>
                                Lihat
                            </button>
                            <button class="btn-primary flex-1 text-sm">
                                <i class="fas fa-download mr-2"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Keuangan -->
                <div class="document-card keuangan group">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 h-full">
                        <div class="flex items-start space-x-4 mb-4">
                            <div class="w-12 h-12 bg-green-100 dark:bg-green-900/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-calculator text-green-600 dark:text-green-400 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <span class="badge-keuangan">Keuangan</span>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mt-2">
                                    APBDes Tahun 2025
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                    Anggaran Pendapatan dan Belanja Desa
                                </p>
                            </div>
                        </div>

                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                            <p><strong>Tahun:</strong> 2025</p>
                            <p><strong>Total Anggaran:</strong> Rp 2.8 Miliar</p>
                            <p><strong>Status:</strong> Disahkan</p>
                        </div>

                        <div class="flex space-x-2">
                            <button class="btn-outline flex-1 text-sm">
                                <i class="fas fa-eye mr-2"></i>
                                Lihat
                            </button>
                            <button class="btn-primary flex-1 text-sm">
                                <i class="fas fa-download mr-2"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Laporan -->
                <div class="document-card laporan group">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 h-full">
                        <div class="flex items-start space-x-4 mb-4">
                            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-chart-line text-blue-600 dark:text-blue-400 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <span class="badge-laporan">Laporan</span>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mt-2">
                                    Laporan Pertanggungjawaban 2024
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                    Realisasi APBDes Tahun Anggaran 2024
                                </p>
                            </div>
                        </div>

                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                            <p><strong>Periode:</strong> Januari - Desember 2024</p>
                            <p><strong>Realisasi:</strong> 95.2%</p>
                            <p><strong>Status:</strong> Final</p>
                        </div>

                        <div class="flex space-x-2">
                            <button class="btn-outline flex-1 text-sm">
                                <i class="fas fa-eye mr-2"></i>
                                Lihat
                            </button>
                            <button class="btn-primary flex-1 text-sm">
                                <i class="fas fa-download mr-2"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Program -->
                <div class="document-card program group">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 h-full">
                        <div class="flex items-start space-x-4 mb-4">
                            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-project-diagram text-purple-600 dark:text-purple-400 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <span class="badge-program">Program</span>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mt-2">
                                    Rencana Kerja Pemerintah Desa 2025
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                    RKPD Desa Tangkit Tahun 2025
                                </p>
                            </div>
                        </div>

                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                            <p><strong>Tahun:</strong> 2025</p>
                            <p><strong>Prioritas:</strong> 5 Program Utama</p>
                            <p><strong>Status:</strong> Disusun</p>
                        </div>

                        <div class="flex space-x-2">
                            <button class="btn-outline flex-1 text-sm">
                                <i class="fas fa-eye mr-2"></i>
                                Lihat
                            </button>
                            <button class="btn-primary flex-1 text-sm">
                                <i class="fas fa-download mr-2"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Administrasi -->
                <div class="document-card administrasi group">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 h-full">
                        <div class="flex items-start space-x-4 mb-4">
                            <div class="w-12 h-12 bg-orange-100 dark:bg-orange-900/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-file-alt text-orange-600 dark:text-orange-400 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <span class="badge-administrasi">Administrasi</span>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mt-2">
                                    Buku Data Desa 2024
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                    Data lengkap kependudukan dan potensi desa
                                </p>
                            </div>
                        </div>

                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                            <p><strong>Tahun:</strong> 2024</p>
                            <p><strong>Data:</strong> 2,847 Jiwa</p>
                            <p><strong>Status:</strong> Update</p>
                        </div>

                        <div class="flex space-x-2">
                            <button class="btn-outline flex-1 text-sm">
                                <i class="fas fa-eye mr-2"></i>
                                Lihat
                            </button>
                            <button class="btn-primary flex-1 text-sm">
                                <i class="fas fa-download mr-2"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <!-- More documents -->
                <div class="document-card keuangan group">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 h-full">
                        <div class="flex items-start space-x-4 mb-4">
                            <div class="w-12 h-12 bg-green-100 dark:bg-green-900/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-money-bill-wave text-green-600 dark:text-green-400 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <span class="badge-keuangan">Keuangan</span>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mt-2">
                                    Laporan Realisasi ADD 2024
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                    Alokasi Dana Desa Tahun 2024
                                </p>
                            </div>
                        </div>

                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                            <p><strong>Periode:</strong> 2024</p>
                            <p><strong>Nominal:</strong> Rp 1.2 Miliar</p>
                            <p><strong>Realisasi:</strong> 98.5%</p>
                        </div>

                        <div class="flex space-x-2">
                            <button class="btn-outline flex-1 text-sm">
                                <i class="fas fa-eye mr-2"></i>
                                Lihat
                            </button>
                            <button class="btn-primary flex-1 text-sm">
                                <i class="fas fa-download mr-2"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <div class="document-card laporan group">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 h-full">
                        <div class="flex items-start space-x-4 mb-4">
                            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-users text-blue-600 dark:text-blue-400 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <span class="badge-laporan">Laporan</span>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mt-2">
                                    Laporan Kegiatan Posyandu 2024
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                    Program kesehatan ibu dan anak
                                </p>
                            </div>
                        </div>

                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                            <p><strong>Periode:</strong> Januari - Desember 2024</p>
                            <p><strong>Peserta:</strong> 450 Ibu & Anak</p>
                            <p><strong>Cakupan:</strong> 85%</p>
                        </div>

                        <div class="flex space-x-2">
                            <button class="btn-outline flex-1 text-sm">
                                <i class="fas fa-eye mr-2"></i>
                                Lihat
                            </button>
                            <button class="btn-primary flex-1 text-sm">
                                <i class="fas fa-download mr-2"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>

                <div class="document-card program group">
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 h-full">
                        <div class="flex items-start space-x-4 mb-4">
                            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-graduation-cap text-purple-600 dark:text-purple-400 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <span class="badge-program">Program</span>
                                <h3 class="text-lg font-bold text-gray-900 dark:text-white mt-2">
                                    Program Pendidikan Tangkit Cerdas
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                    Beasiswa dan bantuan pendidikan
                                </p>
                            </div>
                        </div>

                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                            <p><strong>Target:</strong> 50 Siswa Berprestasi</p>
                            <p><strong>Anggaran:</strong> Rp 150 Juta</p>
                            <p><strong>Status:</strong> Berjalan</p>
                        </div>

                        <div class="flex space-x-2">
                            <button class="btn-outline flex-1 text-sm">
                                <i class="fas fa-eye mr-2"></i>
                                Lihat
                            </button>
                            <button class="btn-primary flex-1 text-sm">
                                <i class="fas fa-download mr-2"></i>
                                Unduh
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12">
                <button class="btn-secondary" id="load-more-docs">
                    Muat Lebih Banyak Dokumen
                </button>
            </div>
        </div>
    </section>

    <!-- Request Document Section -->
    <section class="py-16 bg-primary text-white">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">
                    Permintaan Dokumen
                </h2>
                <p class="text-xl mb-8 opacity-90">
                    Tidak menemukan dokumen yang Anda cari? Ajukan permintaan dokumen secara online
                </p>
            </div>

            <div class="max-w-2xl mx-auto">
                <form class="bg-white/10 backdrop-blur-sm rounded-xl p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Nama Lengkap *
                            </label>
                            <input type="text" class="fi-input w-full bg-white/20 border-white/30 text-white placeholder-white/70" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Nomor Telepon *
                            </label>
                            <input type="tel" class="fi-input w-full bg-white/20 border-white/30 text-white placeholder-white/70" placeholder="08xxxxxxxxxx" required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">
                            Email (Opsional)
                        </label>
                        <input type="email" class="fi-input w-full bg-white/20 border-white/30 text-white placeholder-white/70" placeholder="email@example.com">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">
                            Dokumen yang Diminta *
                        </label>
                        <textarea rows="4" class="fi-input w-full bg-white/20 border-white/30 text-white placeholder-white/70" placeholder="Jelaskan dokumen yang Anda butuhkan secara detail..." required></textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2">
                            Keperluan *
                        </label>
                        <select class="fi-input w-full bg-white/20 border-white/30 text-white" required>
                            <option value="">Pilih keperluan</option>
                            <option value="pribadi">Keperluan Pribadi</option>
                            <option value="bisnis">Keperluan Bisnis</option>
                            <option value="pendidikan">Keperluan Pendidikan</option>
                            <option value="penelitian">Penelitian</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <button type="submit" class="btn-secondary w-full">
                        Ajukan Permintaan Dokumen
                    </button>
                </form>

                <div class="text-center mt-8">
                    <p class="text-white/80">
                        Dokumen akan diproses dalam 2-3 hari kerja setelah pengajuan.
                        <br>
                        Untuk informasi lebih lanjut, hubungi kantor desa.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Archive Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-800">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    Arsip Dokumen
                </h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Koleksi dokumen lengkap dari tahun ke tahun untuk referensi dan transparansi pemerintahan desa
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-700 rounded-xl p-6 text-center shadow-lg">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-archive text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Arsip 2020-2024</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Dokumen lengkap 5 tahun terakhir</p>
                    <button class="btn-outline w-full">Jelajahi Arsip</button>
                </div>

                <div class="bg-white dark:bg-gray-700 rounded-xl p-6 text-center shadow-lg">
                    <div class="w-16 h-16 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-search text-secondary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Pencarian Dokumen</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Temukan dokumen dengan mudah</p>
                    <button class="btn-outline w-full">Cari Dokumen</button>
                </div>

                <div class="bg-white dark:bg-gray-700 rounded-xl p-6 text-center shadow-lg">
                    <div class="w-16 h-16 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-info-circle text-accent text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Bantuan</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Panduan mengakses dokumen</p>
                    <button class="btn-outline w-full">Lihat Panduan</button>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
.doc-filter {
    @apply px-6 py-2 mx-2 mb-4 rounded-full font-medium transition-colors duration-200;
    @apply bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 hover:bg-primary hover:text-white;
}

.doc-filter.active {
    @apply bg-primary text-white;
}

.document-card {
    @apply transition-all duration-300;
}

.badge-peraturan {
    @apply px-3 py-1 text-xs font-bold rounded-full bg-red-100 dark:bg-red-800 text-red-800 dark:text-red-200;
}

.badge-keuangan {
    @apply px-3 py-1 text-xs font-bold rounded-full bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-200;
}

.badge-laporan {
    @apply px-3 py-1 text-xs font-bold rounded-full bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-blue-200;
}

.badge-program {
    @apply px-3 py-1 text-xs font-bold rounded-full bg-purple-100 dark:bg-purple-800 text-purple-800 dark:text-purple-200;
}

.badge-administrasi {
    @apply px-3 py-1 text-xs font-bold rounded-full bg-orange-100 dark:bg-orange-800 text-orange-800 dark:text-orange-200;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.doc-filter');
    const documentCards = document.querySelectorAll('.document-card');

    // Filter functionality
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const filter = button.dataset.filter;

            documentCards.forEach(card => {
                if (filter === 'all' || card.classList.contains(filter)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });

    // Load more functionality
    let currentDocCount = 9;
    const loadMoreBtn = document.getElementById('load-more-docs');

    loadMoreBtn.addEventListener('click', () => {
        // In a real application, this would load more documents from the server
        // For now, we'll just show a message
        loadMoreBtn.textContent = 'Semua Dokumen Sudah Dimuat';
        loadMoreBtn.disabled = true;
    });
});
</script>

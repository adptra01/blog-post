@extends('layouts.blog')

@section('title', 'Kontak & Layanan Desa Tangkit')
@section('description', 'Informasi kontak, layanan, dan pengaduan masyarakat Desa Tangkit')

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden bg-gradient-to-br from-primary via-secondary to-accent">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto text-white">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Kontak & Layanan
            </h1>
            <p class="text-xl sm:text-2xl lg:text-3xl font-light leading-relaxed">
                Pemerintah Desa Tangkit Siap Melayani Anda
            </p>
        </div>
    </section>

    <!-- Contact Information -->
    <section class="py-16 bg-white dark:bg-gray-900">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Details -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">
                        Informasi Kontak
                    </h2>

                    <div class="space-y-8">
                        <!-- Office Address -->
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-primary text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Kantor Desa</h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    Jl. Raya Tangkit No. 1<br>
                                    Desa Tangkit, Kecamatan Tangkit<br>
                                    Kabupaten Bogor, Jawa Barat 16820
                                </p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-secondary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-secondary text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Telepon</h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    (021) 1234-5678<br>
                                    WhatsApp: +62 812-3456-7890
                                </p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-accent text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Email</h3>
                                <p class="text-gray-600 dark:text-gray-300">
                                    info@desatangkit.go.id<br>
                                    admin@desatangkit.go.id
                                </p>
                            </div>
                        </div>

                        <!-- Office Hours -->
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-clock text-primary text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Jam Layanan</h3>
                                <div class="text-gray-600 dark:text-gray-300">
                                    <p><strong>Senin - Kamis:</strong> 08:00 - 16:00 WIB</p>
                                    <p><strong>Jumat:</strong> 08:00 - 11:00 WIB</p>
                                    <p><strong>Sabtu - Minggu:</strong> Tutup</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">
                        Lokasi Kantor
                    </h2>

                    <div class="bg-gray-200 dark:bg-gray-700 rounded-xl h-96 flex items-center justify-center">
                        <div class="text-center">
                            <i class="fas fa-map-marked-alt text-4xl text-gray-400 dark:text-gray-500 mb-4"></i>
                            <p class="text-gray-500 dark:text-gray-400">Peta Lokasi Kantor Desa Tangkit</p>
                            <p class="text-sm text-gray-400 dark:text-gray-500 mt-2">
                                (Google Maps embed akan ditampilkan di sini)
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="container-custom">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                    Layanan Desa Tangkit
                </h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Berbagai layanan administrasi dan pelayanan publik yang tersedia di Desa Tangkit
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-id-card text-primary text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Administrasi Kependudukan</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        KTP, KK, Akta Kelahiran, Surat Pindah, dll.
                    </p>
                    <span class="text-primary text-sm font-medium">Syarat & Ketentuan →</span>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg">
                    <div class="w-12 h-12 bg-secondary/10 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-home text-secondary text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Surat Tanah & Bangunan</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        IMB, Surat Keterangan Tanah, dll.
                    </p>
                    <span class="text-secondary text-sm font-medium">Informasi Lengkap →</span>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg">
                    <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-users text-accent text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Bantuan Sosial</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        PKH, BPNT, PBI, dan program bantuan lainnya.
                    </p>
                    <span class="text-accent text-sm font-medium">Daftar Penerima →</span>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg">
                    <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-graduation-cap text-primary text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Pendidikan & Beasiswa</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        PIP, Beasiswa, Bantuan Pendidikan.
                    </p>
                    <span class="text-primary text-sm font-medium">Program Tersedia →</span>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg">
                    <div class="w-12 h-12 bg-secondary/10 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-heartbeat text-secondary text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Kesehatan</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        Posyandu, Imunisasi, KB, dll.
                    </p>
                    <span class="text-secondary text-sm font-medium">Jadwal Layanan →</span>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow-lg">
                    <div class="w-12 h-12 bg-accent/10 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-tractor text-accent text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">Pertanian & Peternakan</h3>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                        Bantuan bibit, pupuk, ternak, dll.
                    </p>
                    <span class="text-accent text-sm font-medium">Program Pertanian →</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Complaint Form Section -->
    <section class="py-16 bg-white dark:bg-gray-800">
        <div class="container-custom">
            <div class="max-w-2xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">
                        Form Pengaduan Masyarakat
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300">
                        Laporkan keluhan, saran, atau masukan Anda untuk kemajuan Desa Tangkit
                    </p>
                </div>

                <form class="bg-gray-50 dark:bg-gray-700 rounded-xl p-8 shadow-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Nama Lengkap *
                            </label>
                            <input type="text" class="fi-input w-full" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Nomor Telepon *
                            </label>
                            <input type="tel" class="fi-input w-full" placeholder="08xxxxxxxxxx" required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Email (Opsional)
                        </label>
                        <input type="email" class="fi-input w-full" placeholder="email@example.com">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Kategori Pengaduan *
                        </label>
                        <select class="fi-input w-full" required>
                            <option value="">Pilih kategori</option>
                            <option value="infrastruktur">Infrastruktur</option>
                            <option value="kebersihan">Kebersihan Lingkungan</option>
                            <option value="keamanan">Keamanan</option>
                            <option value="kesehatan">Kesehatan</option>
                            <option value="pendidikan">Pendidikan</option>
                            <option value="administrasi">Administrasi</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Isi Pengaduan *
                        </label>
                        <textarea rows="5" class="fi-input w-full" placeholder="Jelaskan pengaduan atau saran Anda secara detail..." required></textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Lampiran (Opsional)
                        </label>
                        <input type="file" class="fi-input w-full" accept="image/*,.pdf,.doc,.docx">
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                            Format: JPG, PNG, PDF, DOC, DOCX. Maksimal 5MB.
                        </p>
                    </div>

                    <div class="flex items-center mb-6">
                        <input type="checkbox" id="privacy" class="fi-checkbox mr-3" required>
                        <label for="privacy" class="text-sm text-gray-600 dark:text-gray-300">
                            Saya menyetujui bahwa data pribadi saya akan digunakan sesuai dengan
                            <a href="#" class="text-primary hover:underline">Kebijakan Privasi</a>
                        </label>
                    </div>

                    <button type="submit" class="btn-primary w-full">
                        Kirim Pengaduan
                    </button>
                </form>

                <div class="text-center mt-8">
                    <p class="text-gray-600 dark:text-gray-300">
                        Atau hubungi kami langsung melalui WhatsApp:
                        <a href="https://wa.me/6281234567890" class="text-primary hover:underline font-medium">
                            +62 812-3456-7890
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection

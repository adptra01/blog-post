<x-blog-layout>
    <!-- Hero Section -->
    <section class="relative h-[400px] overflow-hidden bg-gradient-to-br from-[var(--color-secondary-500)] to-[var(--color-primary-500)]">
        <div class="absolute inset-0 opacity-20">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <pattern id="pattern-contact" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="20" cy="20" r="1" fill="white"/>
                </pattern>
                <rect x="0" y="0" width="100%" height="100%" fill="url(#pattern-contact)"/>
            </svg>
        </div>

        <div class="relative container mx-auto px-4 h-full flex items-center">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 animate-slide-up">Hubungi Kami</h1>
                <p class="text-lg text-white/90 animate-fade-in">Sampaikan pertanyaan, saran, atau pengaduan Anda</p>
            </div>
        </div>
    </section>

    <!-- Contact Info & Form Section -->
    <section class="py-16 bg-[var(--color-neutral-50)]">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto grid lg:grid-cols-5 gap-8">
                <!-- Contact Information -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Office Info Card -->
                    <div class="bg-white rounded-2xl p-8 shadow-lg">
                        <div class="w-14 h-14 bg-gradient-to-br from-[var(--color-primary-500)] to-[var(--color-accent-500)] rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-[var(--color-neutral-dark)] mb-6">Kantor Desa Tangkit</h3>

                        <!-- Address -->
                        <div class="space-y-4">
                            <div class="flex gap-4">
                                <svg class="w-6 h-6 text-[var(--color-primary-500)] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <div>
                                    <div class="text-xs text-[var(--color-neutral-500)] mb-1">Alamat</div>
                                    <p class="text-sm text-[var(--color-neutral-700)] leading-relaxed">
                                        Jl. Raya Desa Tangkit<br>
                                        Kec. Pangkalan Kuras<br>
                                        Kab. Pelalawan, Riau 28300
                                    </p>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <svg class="w-6 h-6 text-[var(--color-primary-500)] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <div>
                                    <div class="text-xs text-[var(--color-neutral-500)] mb-1">Telepon</div>
                                    <a href="tel:+6276112345678" class="text-sm text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] transition-colors">
                                        (0761) 123-4567
                                    </a>
                                </div>
                            </div>

                            <div class="flex gap-4">
                                <svg class="w-6 h-6 text-[var(--color-primary-500)] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <div>
                                    <div class="text-xs text-[var(--color-neutral-500)] mb-1">Email</div>
                                    <a href="mailto:info@desatangkit.id" class="text-sm text-[var(--color-neutral-700)] hover:text-[var(--color-primary-500)] transition-colors">
                                        info@desatangkit.id
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Office Hours Card -->
                    <div class="bg-gradient-to-br from-[var(--color-primary-500)] to-[var(--color-accent-500)] rounded-2xl p-8 shadow-lg text-white">
                        <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Jam Pelayanan</h3>
                        <div class="space-y-2 text-white/90">
                            <div class="flex justify-between py-2 border-b border-white/20">
                                <span>Senin - Jumat</span>
                                <span class="font-semibold">08:00 - 16:00</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-white/20">
                                <span>Sabtu</span>
                                <span class="font-semibold">08:00 - 12:00</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span>Minggu & Libur</span>
                                <span class="font-semibold">Tutup</span>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-white rounded-2xl p-8 shadow-lg">
                        <h3 class="text-lg font-bold text-[var(--color-neutral-dark)] mb-4">Media Sosial</h3>
                        <div class="flex gap-3">
                            <a href="#" class="w-12 h-12 flex items-center justify-center bg-[#1877F2] text-white rounded-xl hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-12 h-12 flex items-center justify-center bg-[#E4405F] text-white rounded-xl hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                                </svg>
                            </a>
                            <a href="#" class="w-12 h-12 flex items-center justify-center bg-[#25D366] text-white rounded-xl hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-3">
                    <div class="bg-white rounded-2xl p-8 shadow-lg">
                        <h3 class="text-2xl font-bold text-[var(--color-neutral-dark)] mb-6">Form Pengaduan & Saran</h3>

                        <form method="POST" action="#" enctype="multipart/form-data" class="space-y-6">
                            @csrf

                            <div class="grid md:grid-cols-2 gap-6">
                                <!-- Nama -->
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-[var(--color-neutral-700)] mb-2">
                                        Nama Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text"
                                           id="name"
                                           name="name"
                                           required
                                           class="w-full px-4 py-3 border-2 border-[var(--color-neutral-300)] rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-primary-500)] focus:border-transparent transition-all"
                                           placeholder="Masukkan nama lengkap Anda">
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-sm font-semibold text-[var(--color-neutral-700)] mb-2">
                                        Email <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email"
                                           id="email"
                                           name="email"
                                           required
                                           class="w-full px-4 py-3 border-2 border-[var(--color-neutral-300)] rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-primary-500)] focus:border-transparent transition-all"
                                           placeholder="contoh@email.com">
                                </div>
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-[var(--color-neutral-700)] mb-2">
                                    Nomor Telepon/WhatsApp <span class="text-red-500">*</span>
                                </label>
                                <input type="tel"
                                       id="phone"
                                       name="phone"
                                       required
                                       class="w-full px-4 py-3 border-2 border-[var(--color-neutral-300)] rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-primary-500)] focus:border-transparent transition-all"
                                       placeholder="08xx-xxxx-xxxx">
                            </div>

                            <!-- Subject -->
                            <div>
                                <label for="subject" class="block text-sm font-semibold text-[var(--color-neutral-700)] mb-2">
                                    Subjek <span class="text-red-500">*</span>
                                </label>
                                <select id="subject"
                                        name="subject"
                                        required
                                        class="w-full px-4 py-3 border-2 border-[var(--color-neutral-300)] rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-primary-500)] focus:border-transparent transition-all">
                                    <option value="">Pilih Subjek</option>
                                    <option value="pengaduan">Pengaduan</option>
                                    <option value="saran">Saran & Masukan</option>
                                    <option value="pertanyaan">Pertanyaan Umum</option>
                                    <option value="permohonan">Permohonan Informasi</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="block text-sm font-semibold text-[var(--color-neutral-700)] mb-2">
                                    Pesan <span class="text-red-500">*</span>
                                </label>
                                <textarea id="message"
                                          name="message"
                                          rows="6"
                                          required
                                          class="w-full px-4 py-3 border-2 border-[var(--color-neutral-300)] rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-primary-500)] focus:border-transparent transition-all resize-none"
                                          placeholder="Tuliskan pesan Anda di sini..."></textarea>
                            </div>

                            <!-- File Upload -->
                            <div>
                                <label for="attachment" class="block text-sm font-semibold text-[var(--color-neutral-700)] mb-2">
                                    Lampiran (opsional)
                                </label>
                                <div class="relative">
                                    <input type="file"
                                           id="attachment"
                                           name="attachment"
                                           accept="image/*,.pdf,.doc,.docx"
                                           class="w-full px-4 py-3 border-2 border-dashed border-[var(--color-neutral-300)] rounded-lg focus:outline-none focus:ring-2 focus:ring-[var(--color-primary-500)] focus:border-transparent transition-all file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[var(--color-primary-50)] file:text-[var(--color-primary-600)] hover:file:bg-[var(--color-primary-100)]">
                                </div>
                                <p class="text-xs text-[var(--color-neutral-500)] mt-2">
                                    Format: JPG, PNG, PDF, DOC (Max: 5MB)
                                </p>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-4">
                                <button type="submit"
                                        class="w-full px-8 py-4 bg-gradient-to-r from-[var(--color-primary-500)] to-[var(--color-accent-500)] text-white font-bold rounded-xl hover:shadow-xl hover:scale-105 transition-all flex items-center justify-center gap-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto">
                <h2 class="text-3xl font-bold text-[var(--color-neutral-dark)] mb-8 text-center">Lokasi Kantor Desa</h2>
                <div class="aspect-video bg-[var(--color-neutral-200)] rounded-2xl overflow-hidden shadow-xl">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127643.94203928188!2d101.31598655820312!3d0.44799789999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a8f3b6e6c3a3%3A0x2b0b0b0b0b0b0b0b!2sPangkalan%20Kuras%2C%20Riau!5e0!3m2!1sen!2sid!4v1234567890"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full h-full">
                    </iframe>
                </div>
                <p class="text-center text-sm text-[var(--color-neutral-600)] mt-4">
                    <a href="https://maps.google.com/?q=Desa+Tangkit+Pelalawan" target="_blank" class="text-[var(--color-primary-500)] hover:text-[var(--color-primary-600)] font-medium">
                        Buka di Google Maps →
                    </a>
                </p>
            </div>
        </div>
    </section>
</x-blog-layout>

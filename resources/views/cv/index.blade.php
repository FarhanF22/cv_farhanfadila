@extends('layouts.main')

@section('content')

<section class="py-5 bg-light">
        <div class="container">
                <section class="py-4">
                        <div class="cv-slider container">
                                <div class="cv-slider-viewport position-relative">
                                        <div class="slides d-flex">
				<!-- Slide 1: Home / Hero -->
				<div class="slide px-3" style="min-width:100%">
					<div class="row align-items-center">
						<div class="col-lg-8">
							<div class="hero-card p-5 rounded animated-hero">
								<h1 class="display-5 fw-bold">Halo, Saya <span class="text-primary">{{ $cvData->nama_lengkap }}</span></h1>
								<p class="lead text-muted">{{ $cvData->deskripsi_singkat }}</p>
								<div class="mt-4 d-flex gap-2">
									<a class="btn btn-primary btn-lg" href="mailto:{{ $cvData->email }}">Hubungi Saya</a>
									<a class="btn btn-outline-primary btn-lg" href="#biodata" data-anchor="biodata">Lihat Biodata</a>
								</div>
							</div>
						</div>
					</div>
				</div>                                                <!-- Slide 2: Biodata -->
                                                <div class="slide px-3" style="min-width:100%">
                                                        <div class="row justify-content-center">
                                                                <div class="col-12 col-lg-10">
                                                                        <div class="bg-white rounded shadow-sm overflow-hidden">
                                                                                <!-- Header section dengan background -->
                                                                                <div class="text-center" style="background: linear-gradient(135deg, #2563eb 0%, #0ea5a4 100%); padding: 2.5rem 2rem;">
                                                                                        <div style="flex:0 0 130px; margin:0 auto 1.2rem;">
                                                                                                @if(!empty($cvData->foto_path))
                                                                                                        <img src="{{ asset($cvData->foto_path) }}" alt="{{ $cvData->nama_lengkap }}" class="img-fluid rounded-circle" style="width:130px;height:130px;object-fit:cover;border:4px solid white;">
                                                                                                @else
                                                                                                        <img src="{{ asset('images/default-avatar.svg') }}" alt="{{ $cvData->nama_lengkap }}" class="img-fluid rounded-circle" style="width:130px;height:130px;object-fit:cover;border:4px solid white;">
                                                                                                @endif
                                                                                        </div>
                                                                                        <h2 class="text-white fw-bold mb-1" style="font-size: 2rem;">{{ $cvData->nama_lengkap }}</h2>
                                                                                        <p class="text-white opacity-75 mb-0" style="font-size: 1.1rem;">{{ $cvData->deskripsi_singkat }}</p>
                                                                                </div>

                                                                                <!-- Content section -->
                                                                                <div style="padding: 2.5rem;">
                                                                                        <div class="row g-4">
                                                                                                <!-- Email -->
                                                                                                <div class="col-md-6">
                                                                                                        <div class="d-flex gap-3">
                                                                                                                <div style="flex:0 0 50px;" class="d-flex align-items-center justify-content-center">
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36" fill="#2563eb"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                                                                                                                </div>
                                                                                                                <div>
                                                                                                                        <div class="small text-muted" style="font-size: 0.95rem;">Email</div>
                                                                                                                        <div style="font-size: 1.1rem; font-weight: 500;">{{ $cvData->email ?? '—' }}</div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>

                                                                                                <!-- Phone -->
                                                                                                <div class="col-md-6">
                                                                                                        <div class="d-flex gap-3">
                                                                                                                <div style="flex:0 0 50px;" class="d-flex align-items-center justify-content-center">
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36" fill="#0ea5a4"><path d="M17.92 7.02C17.45 6.18 16.51 5.55 15.5 5.55c-.6 0-1.14.2-1.69.35-1.12.23-2.26.44-3.31.44-1.05 0-2.19-.21-3.31-.44C6.64 5.75 6.1 5.55 5.5 5.55c-1.01 0-1.95.63-2.42 1.47C2.25 8.39 2 10.03 2 12c0 1.97.25 3.61.58 4.98.47.84 1.41 1.47 2.42 1.47.6 0 1.14-.2 1.69-.35 1.12-.23 2.26-.44 3.31-.44 1.05 0 2.19.21 3.31.44.55.15 1.09.35 1.69.35 1.01 0 1.95-.63 2.42-1.47.33-1.37.58-3.01.58-4.98 0-1.97-.25-3.61-.58-4.98zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/></svg>
                                                                                                                </div>
                                                                                                                <div>
                                                                                                                        <div class="small text-muted" style="font-size: 0.95rem;">Telepon</div>
                                                                                                                        <div style="font-size: 1.1rem; font-weight: 500;">{{ $cvData->telepon ?? '—' }}</div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>

                                                                                                <!-- Address -->
                                                                                                <div class="col-md-12">
                                                                                                        <div class="d-flex gap-3">
                                                                                                                <div style="flex:0 0 50px;" class="d-flex align-items-center justify-content-center">
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36" fill="#2563eb"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-13c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5z"/></svg>
                                                                                                                </div>
                                                                                                                <div>
                                                                                                                        <div class="small text-muted" style="font-size: 0.95rem;">Alamat</div>
                                                                                                                        <div style="font-size: 1.1rem; font-weight: 500;">{{ $cvData->alamat ?? '—' }}</div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>

                                                                                        <!-- Action buttons -->
                                                                                        <div class="mt-4 pt-3 border-top d-flex gap-2">
                                                                                                <a href="mailto:{{ $cvData->email }}" class="btn btn-primary flex-grow-1" style="padding: 0.85rem 1.5rem; font-size: 1rem;">Hubungi Saya</a>
                                                                                                <a href="#" class="btn btn-outline-primary flex-grow-1" style="padding: 0.85rem 1.5rem; font-size: 1rem;">Unduh CV</a>
                                                                                        </div>
                                                                        </div>
                                                                </div>
                                                                </div>
                                                        </div>
                                                </div>

				<!-- Slide 3: Pendidikan -->
				<div class="slide px-3" style="min-width:100%">
					<div class="row">
						<div class="col-12 mb-4">
							<h3 class="section-title">Pendidikan</h3>
							<p class="text-muted small">Riwayat pendidikan formal saya</p>
						</div>
						@if($cvData->pendidikan->count())
							@foreach($cvData->pendidikan as $p)
								<div class="col-lg-6 mb-3">
									<div class="p-4 bg-white rounded shadow-sm border-start" style="border-left:4px solid #2563eb;">
										<div class="d-flex align-items-start gap-2 mb-2">
											<svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="#2563eb"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2m-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
											<div>
												<div class="fw-bold">{{ $p->jenjang }}</div>
												<div class="text-primary fw-600" style="font-size:.95rem;">{{ $p->jurusan }}</div>
												<div class="small text-muted mt-1">{{ $p->institusi }}</div>
												<div class="small text-muted mt-1"><strong>{{ $p->tahun_mulai }} - {{ $p->tahun_selesai ?? 'Sekarang' }}</strong></div>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						@else
							<div class="col-12">
								<div class="alert alert-info">Belum ada data pendidikan.</div>
							</div>
						@endif
					</div>
				</div>                                                <!-- Slide 4: Pengalaman -->
                                                <div class="slide px-3" style="min-width:100%">
                                                        <div class="row">
                                                                <div class="col-12 mb-4">
                                                                        <h3 class="section-title">Pengalaman Kerja</h3>
                                                                        <p class="text-muted small">Pengalaman profesional dan pekerjaan sebelumnya</p>
                                                                </div>
                                                                @if($cvData->pengalaman->count())
                                                                        @foreach($cvData->pengalaman as $p)
                                                                                <div class="col-12 mb-3">
                                                                                        <div class="p-4 bg-white rounded shadow-sm border-start" style="border-left:4px solid #0ea5a4;">
                                                                                                <div class="d-flex justify-content-between align-items-start mb-2">
                                                                                                        <div>
                                                                                                                <div class="fw-bold" style="font-size:1.05rem;">{{ $p->posisi }}</div>
                                                                                                                <div style="color:#0ea5a4; font-weight:600;">{{ $p->nama_perusahaan }}</div>
                                                                                                        </div>
                                                                                                        <div class="badge bg-light text-muted">{{ $p->tahun_mulai }} - {{ $p->tahun_selesai ?? 'Sekarang' }}</div>
                                                                                                </div>
                                                                                                <p class="mb-0 mt-2 small text-muted">{{ $p->deskripsi_tugas }}</p>
                                                                                        </div>
                                                                                </div>
                                                                        @endforeach
                                                                @else
                                                                        <div class="col-12">
                                                                                <div class="alert alert-info">Belum ada data pengalaman.</div>
                                                                        </div>
                                                                @endif
                                                        </div>
                                                </div>

                                                <!-- Slide 5: Keahlian -->
                                                <div class="slide px-3" style="min-width:100%">
                                                        <div class="row">
                                                                <div class="col-12 mb-4">
                                                                        <h3 class="section-title">Keahlian & Teknologi</h3>
                                                                        <p class="text-muted small">Kemampuan dan teknologi yang saya kuasai</p>
                                                                </div>
                                                                @if($cvData->keahlian->count())
                                                                        <div class="col-12">
                                                                                <div class="d-flex flex-wrap gap-3 bg-white p-4 rounded shadow-sm">
                                                                                        @foreach($cvData->keahlian as $k)
                                                                                                <div class="px-3 py-2 rounded" style="background:linear-gradient(135deg, #eef2ff, #f0fdfa); border:1px solid rgba(37,99,235,0.1);">
                                                                                                        <span class="fw-600" style="color:#0f172a;">{{ $k->nama_keahlian }}</span>
                                                                                                </div>
                                                                                        @endforeach
                                                                                </div>
                                                                        </div>
                                                                @else
                                                                        <div class="col-12">
                                                                                <div class="alert alert-info">Belum ada keahlian tercatat.</div>
                                                                        </div>
                                                                @endif
                                                        </div>
                                                </div>
                                        </div>

                                        <!-- controls -->
                                        <div class="d-flex justify-content-between mt-3">
                                                <div>
                                                        <button class="cv-slider-prev btn btn-sm btn-outline-secondary" aria-label="Previous">
                                                                <svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                                                                <span class="visually-hidden">Prev</span>
                                                        </button>
                                                </div>
                                                <div class="cv-slide-indicator">
                                                        @for($i=0;$i<5;$i++)
                                                                <button class="btn btn-sm btn-outline-secondary mx-1" aria-label="Slide {{ $i + 1 }}"></button>
                                                        @endfor
                                                </div>
                                                <div>
                                                        <button class="cv-slider-next btn btn-sm btn-outline-secondary" aria-label="Next">
                                                                <svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                                                                <span class="visually-hidden">Next</span>
                                                        </button>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </section>
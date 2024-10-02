// function showSummary() {
//     // Ambil nilai dari setiap field
//     const nama = document.getElementById('nama').value;
//     const tempatLahir = document.getElementById('tempat-lahir').value;
//     const tanggalLahir = document.getElementById('tanggal-lahir').value;
//     const pekerjaan = document.getElementById('pekerjaan').value;
//     const agama = document.getElementById('agama').value;
    
//     // Menangkap file yang diunggah (hanya nama file)
//     const ktp = document.getElementById('ktp').files[0]?.name || 'Belum diunggah';
//     const ktm = document.getElementById('ktm').files[0]?.name || 'Belum diunggah';
//     const transkip = document.getElementById('transkip').files[0]?.name || 'Belum diunggah';
//     const krs = document.getElementById('krs').files[0]?.name || 'Belum diunggah';
//     const suratAktif = document.getElementById('surat-aktif').files[0]?.name || 'Belum diunggah';

//     // Simpan data di localStorage
//     localStorage.setItem('nama', nama);
//     localStorage.setItem('tempatLahir', tempatLahir);
//     localStorage.setItem('tanggalLahir', tanggalLahir);
//     localStorage.setItem('pekerjaan', pekerjaan);
//     localStorage.setItem('agama', agama);
//     localStorage.setItem('ktp', ktp);
//     localStorage.setItem('ktm', ktm);
//     localStorage.setItem('transkip', transkip);
//     localStorage.setItem('krs', krs);
//     localStorage.setItem('suratAktif', suratAktif);

//     // Redirect ke halaman ringkasan
//     window.location.href = 'ringkasan.html';
// }

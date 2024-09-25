document.querySelector('form').addEventListener('submit', function(event) {
    let isValid = true;
    
    const inputs = document.querySelectorAll('input[required], select[required]');
    inputs.forEach(function(input) {
        if (!input.value) {
            isValid = false;
            input.classList.add('error');
        } else {
            input.classList.remove('error');
        }
    });

    if (!isValid) {
        event.preventDefault();
        alert('Harap lengkapi semua data yang diperlukan.');
    }
});

document.getElementById('resetPasswordForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah form dari pengiriman default
    
    const email = document.getElementById('email').value;
    
    // Contoh fungsionalitas untuk mengirim email (hanya contoh)
    // Di dunia nyata, Anda perlu menggunakan API atau backend untuk ini
    if (validateEmail(email)) {
        // Simulasi pengiriman email
        alert(`Link reset kata sandi telah dikirim ke ${email}`);
        
    } else {
        alert('Email tidak valid.');
    }
});

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regex sederhana untuk validasi email
    return re.test(String(email).toLowerCase());
}

document.getElementById('accountForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Mencegah form dari pengiriman default
    
    // Mengambil data dari input
    const nama = document.getElementById('nama').value;
    const tempatLahir = document.getElementById('tempat-lahir').value;
    const tanggalLahir = document.getElementById('tanggal-lahir').value;
    const pekerjaan = document.getElementById('pekerjaan').value;
    const agama = document.getElementById('agama').value;
    
    // Menampilkan data di halaman
    const output = `
        <strong>Nama Lengkap:</strong> ${nama}<br>
        <strong>Tempat Lahir:</strong> ${tempatLahir}<br>
        <strong>Tanggal Lahir:</strong> ${tanggalLahir}<br>
        <strong>Pekerjaan:</strong> ${pekerjaan}<br>
        <strong>Agama:</strong> ${agama}<br>
    `;

    document.getElementById('outputData').innerHTML = output;
    document.getElementById('output').style.display = 'block';
});
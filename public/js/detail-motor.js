const opsi = document.getElementById('opsi')
const lamaSewa = document.getElementById('lama-sewa')
const hargaInput = document.getElementById('price')

let html = ''
for(let i = 1; i <= 31; i++) {
    html += `<option value="${i} hari">${i} hari</option>`
}
hargaInput.value = 'Rp 80.000'
lamaSewa.innerHTML = html;
opsi.addEventListener('change', function() {
    const value = opsi.value;
    switch(value) {
        case 'hari' : harian() 
            break;
        case 'minggu' : mingguan() 
            break;
        case 'bulan' : bulanan()
            break;

    }
})
lamaSewa.addEventListener('change', function() {
    const value = opsi.value;
    switch(value) {
        case 'hari': hargaInput.value = `Rp ${new Intl.NumberFormat('id-ID').format(parseInt(this.value) * 8000)}`
            break;
        case 'minggu': hargaInput.value = `Rp ${new Intl.NumberFormat('id-ID').format(parseInt(this.value) * 400000)}`
            break;
        case 'bulan': hargaInput.value = `Rp ${new Intl.NumberFormat('id-ID').format(parseInt(this.value) * 1000000)}`
            break;
    }
    
})
 function harian()  {
    lamaSewa.innerHTML = ''
    hargaInput.value = 'Rp 80.000'
    for(let i = 1; i <= 31; i++) {
        lamaSewa.innerHTML += `<option value="${i}">${i} hari</option>`
    }
}
 function bulanan()  {
    hargaInput.value = 'Rp 1.000.000'
    lamaSewa.innerHTML = ''
    for(let i = 1; i <= 12; i++) {
        lamaSewa.innerHTML += `<option value="${i}">${i} bulan</option>`
    }
}
 function mingguan()  {
    hargaInput.value = 'Rp 800.000'
    lamaSewa.innerHTML = ''
    for(let i = 1; i <= 4; i++) {
        lamaSewa.innerHTML += `<option value="${i}">${i} minggu</option>`
    }
}
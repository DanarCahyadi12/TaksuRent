const opsi = document.getElementById('opsi')
const lamaSewa = document.getElementById('lama-sewa')
const hargaInput = document.getElementById('price')
const checkbox = document.getElementById('checkbox')
const sewaBtn= document.getElementById('sewa-button')

harian()
checkbox.addEventListener('change', function() {
    this.checked ? sewaBtn.removeAttribute('disabled') : sewaBtn.setAttribute('disabled', true) 
})
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
        case 'hari': hargaInput.value = `Rp ${new Intl.NumberFormat('id-ID').format(parseInt(this.value) * 80000)}`
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
    const currentMonth = new Date().getMonth() + 1
    const numDays = new Date(new Date().getFullYear(), currentMonth, 0).getDate()
    console.log(numDays);
    for(let i = 1; i <= numDays; i++) {
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
    hargaInput.value = 'Rp 400.000'
    lamaSewa.innerHTML = ''
    for(let i = 1; i <= 4; i++) {
        lamaSewa.innerHTML += `<option value="${i}">${i} minggu</option>`
    }
}
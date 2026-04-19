const tambahInput = () => {
    const container = document.getElementById('container');
    const row = document.createElement('div');
    row.className = 'row';
    const input = document.createElement('input');
    input.type = 'number';
    input.step = 'any';
    input.name = 'angka[]';
    input.placeholder = 'Masukkan angka';
    input.required = true;
    const btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'remove';
    btn.innerText = 'Hapus';
    btn.onclick = function () {
        if (!confirm("Yakin mau hapus input ini?")) return;
        container.removeChild(row);
    };
    row.appendChild(input);
    row.appendChild(btn);
    container.appendChild(row);
}

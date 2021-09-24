INSERT INTO pengguna (
        id_pengguna,
        nama,
        alamat,
        phone,
        email,
        username,
        password,
        level
    )
VALUES (
        UUID(),
        'Trisa',
        'Kejobong',
        '082325150653',
        'trisaapbg@gmail.com',
        'trisaam.3',
        'kjshdgujwhbdmsdbjkshdjlwk.',
        'Super Admin'
    ),
    (
        UUID(),
        'Abdul',
        'Purbalingga',
        '081541243224',
        'hakim@gmail.com',
        'abdull.3',
        'kjshdgujwhbdmsdbjkshdjlwk.',
        'Admininstrator'
    ),
    (
        UUID(),
        'hakimm',
        'Kejobong',
        '082325150653',
        'hakimpbg@gmail.com',
        'hakimm.3',
        'kjshdgujwhbdmsdbjkshdjlwk.',
        'Super Admin'
    );
desc barang_keluar;
select id_pengguna,
    nama
from pengguna;
INSERT INTO barang_keluar (
        id_barang_keluar,
        id_pengguna,
        id_barang,
        qty,
        tanggal_keluar
    )
VALUES (
        UUID(),
        '22eee5b7-1cdc-11ec-a276-c63cd8871bef',
        UUID(),
        14,
        '2020-12-3'
    ),
    (
        UUID(),
        '22f38459-1cdc-11ec-a276-c63cd8871bef',
        UUID(),
        10,
        '2021-2-3'
    ),
    (
        UUID(),
        '22f386e2-1cdc-11ec-a276-c63cd8871bef',
        UUID(),
        6,
        '2022-8-4'
    );
select pengguna.nama,
    pengguna.alamat,
    barang_keluar.id_barang,
    barang_keluar.qty
from pengguna
    left join barang_keluar on pengguna.id_pengguna =.barang_keluar.id_pengguna;
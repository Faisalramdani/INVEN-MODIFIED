@extends('layout.sidenav-layout') <!-- atau layout utama kamu -->

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="card px-5 py-5">
                    <div class="row justify-content-between">
                        <div class="align-items-center col">
                            <h4>Agent Trasactions</h4>
                        </div>
                        <!-- Tombol untuk membuka modal Tambah Transaksi -->
                        <div class="align-items-center col">
                            <button class="float-end btn bg-gradient-primary m-0" data-bs-toggle="modal"
                                data-bs-target="#add-transaction-modal">Tambah Transaksi</button>
                        </div>

                    </div>
                    <hr class="bg-dark">
                    <table id="tableData" class="table">
                        <thead>
                            <tr class="bg-light">
                                <th>Image</th>
                                <th>Nama</th>
                                <th>Biaya Admin</th>
                                <th>Saldo Awal</th>
                                <th>Saldo Akhir</th>
                                <th>Nilai Transaksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableList">
                            <!-- Data akan di-inject dari Javascript -->
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal Tambah Transaksi -->
    <div class="modal fade" id="add-transaction-modal" tabindex="-1" aria-labelledby="addTransactionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTransactionModalLabel">Tambah Transaksi</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addTransactionForm" action="" method="POST">
                        <div class="form-group">
                            <label for="transactionName">Nama Transaksi</label>
                            <input type="text" class="form-control" id="transactionName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="transactionPrice">Biaya Admin</label>
                            <input type="number" class="form-control" id="transactionPrice" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="transactionSaldoAwal">Saldo Awal</label>
                            <input type="number" class="form-control" id="transactionSaldoAwal" name="saldo_awal" required>
                        </div>
                        <div class="form-group">
                            <label for="transactionSaldoAkhir">Saldo Akhir</label>
                            <input type="number" class="form-control" id="transactionSaldoAkhir" name="saldo_akhir"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="transactionNilai">Nilai Transaksi</label>
                            <input type="number" class="form-control" id="transactionNilai" name="nilai" required>
                        </div>
                        <div class="form-group">
                            <label for="transactionCategory">Kategori</label>
                            <select class="form-control" id="transactionCategory" name="category_id" required>
                                <option value="1">Tarik Tunai</option>
                                <option value="2">Transfer</option>
                                <option value="3">Top Up Dompet Digital</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit Transaksi -->
    <div class="modal fade" id="edit-transaction-modal" tabindex="-1" aria-labelledby="editTransactionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editTransactionModalLabel">Edit Transaksi</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editTransactionForm">
                        <input type="hidden" id="editTransactionId">
                        <div class="form-group">
                            <label for="editTransactionName">Nama Transaksi</label>
                            <input type="text" class="form-control" id="editTransactionName" required>
                        </div>
                        <div class="form-group">
                            <label for="editTransactionPrice">Biaya Admin</label>
                            <input type="number" class="form-control" id="editTransactionPrice" required>
                        </div>
                        <div class="form-group">
                            <label for="editTransactionSaldoAwal">Saldo Awal</label>
                            <input type="number" class="form-control" id="editTransactionSaldoAwal" required>
                        </div>
                        <div class="form-group">
                            <label for="editTransactionSaldoAkhir">Saldo Akhir</label>
                            <input type="number" class="form-control" id="editTransactionSaldoAkhir" required>
                        </div>
                        <div class="form-group">
                            <label for="editTransactionNilai">Nilai Transaksi</label>
                            <input type="number" class="form-control" id="editTransactionNilai" required>
                        </div>
                        <div class="form-group">
                            <label for="editTransactionCategory">Kategori</label>
                            <select class="form-control" id="editTransactionCategory" required>
                                <option value="1">Tarik Tunai</option>
                                <option value="2">Transfer</option>
                                <option value="3">Top Up Dompet Digital</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Transaksi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Script Ambil Data --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            getAgentTransactions();
        });

        async function getAgentTransactions() {
            try {
                let res = await axios.get("/api/agent-transactions", {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    }
                });
                console.log(res.data.data);

                let tableList = document.getElementById('tableList');
                tableList.innerHTML = ''; // Mengosongkan tabel sebelum menambah data baru

                res.data.data.forEach(item => {
                    let row = `
                <tr data-id="${item.id}">
                    <td><img src="/images/${item.image ? item.image : 'default.png'}" width="50"></td>
                    <td>${item.name}</td>
                    <td>${item.price}</td>
                    <td>${item.saldo_awal}</td>
                    <td>${item.saldo_akhir}</td>
                    <td>${item.nilai}</td>
                    <td>
                        <button class="btn btn-sm btn-success edit-btn">Edit</button>
                       <button class="btn btn-sm btn-danger delete-btn" data-id="${item.id}">Delete</button>
                    </td>
                </tr>
            `;
                    tableList.innerHTML += row;
                });
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }
    </script>

    {{-- Script Tambah Transaksi --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('addTransactionForm').addEventListener('submit', async function(e) {
                e.preventDefault(); // Ini wajib supaya form tidak reload

                try {
                    const data = {
                        name: document.getElementById('transactionName').value,
                        price: document.getElementById('transactionPrice').value,
                        saldo_awal: document.getElementById('transactionSaldoAwal').value,
                        saldo_akhir: document.getElementById('transactionSaldoAkhir').value,
                        nilai: document.getElementById('transactionNilai').value,
                        category_id: document.getElementById('transactionCategory').value,
                        nilai_rupiah: document.getElementById('transactionPrice')
                            .value, // <-- tambah ini
                    };

                    let response = await axios.post('/api/agent-transactions', data, {
                        headers: {
                            Authorization: `Bearer ${localStorage.getItem('token')}`
                        }
                    });

                    console.log(response); // <-- Tambahkan ini

                    if (response.data.success) {
                        $('#add-transaction-modal').modal('hide');
                        document.getElementById('addTransactionForm').reset();
                        getAgentTransactions();
                        alert('Transaksi berhasil ditambahkan!');
                    } else {
                        alert('Gagal menambahkan transaksi');
                    }
                } catch (error) {
                    console.error('Error adding transaction:', error);
                    alert('Terjadi kesalahan saat menambahkan transaksi');
                }
            });
        });
    </script>

    {{-- Script Edit Data --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tableBody = document.getElementById('tableList');

            tableBody.addEventListener('click', function(e) {
                const row = e.target.closest('tr');
                const id = row.getAttribute('data-id');

                // Kalau klik Edit
                if (e.target.classList.contains('edit-btn')) {
                    // Isi form edit dengan data dari baris tabel
                    document.getElementById('editTransactionId').value = id;
                    document.getElementById('editTransactionName').value = row.children[1].innerText;
                    document.getElementById('editTransactionPrice').value = row.children[2].innerText;
                    document.getElementById('editTransactionSaldoAwal').value = row.children[3].innerText;
                    document.getElementById('editTransactionSaldoAkhir').value = row.children[4].innerText;
                    document.getElementById('editTransactionNilai').value = row.children[5].innerText;

                    // Tampilkan modal Edit
                    var editModal = new bootstrap.Modal(document.getElementById('edit-transaction-modal'));
                    editModal.show();
                }
            });

            // Handle form submit Edit
            document.getElementById('editTransactionForm').addEventListener('submit', async function(e) {
                e.preventDefault();

                const id = document.getElementById('editTransactionId').value;
                const data = {
                    name: document.getElementById('editTransactionName').value,
                    price: document.getElementById('editTransactionPrice').value,
                    saldo_awal: document.getElementById('editTransactionSaldoAwal').value,
                    saldo_akhir: document.getElementById('editTransactionSaldoAkhir').value,
                    nilai: document.getElementById('editTransactionNilai').value,
                    category_id: document.getElementById('editTransactionCategory').value
                };

                try {
                    let response = await axios.put(`/api/agent-transactions/${id}`, data, {
                        headers: {
                            Authorization: `Bearer ${localStorage.getItem('token')}`
                        }
                    });

                    if (response.data.success) {
                        alert('Transaksi berhasil diupdate!');
                        getAgentTransactions(); // refresh table
                        var editModal = bootstrap.Modal.getInstance(document.getElementById(
                            'edit-transaction-modal'));
                        editModal.hide();
                    } else {
                        alert('Gagal mengupdate transaksi');
                    }
                } catch (error) {
                    console.error('Error updating transaction:', error);
                    alert('Terjadi kesalahan saat mengupdate transaksi.');
                }
            });
        });
    </script>

    {{-- Script Hapus Data --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tableBody = document.getElementById('tableList'); // <--- ini harus tableList

            tableBody.addEventListener('click', function(e) {
                if (e.target.classList.contains('delete-btn')) {
                    const row = e.target.closest('tr');
                    const id = row.getAttribute('data-id');

                    if (confirm('Yakin ingin menghapus transaksi ini?')) {
                        fetch(`/api/agent-transactions/${id}`, {
                                method: 'DELETE',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    Authorization: `Bearer ${localStorage.getItem('token')}` // Jangan lupa header auth
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert('Transaksi berhasil dihapus!');
                                    row.remove(); // hapus baris dari tabel
                                } else {
                                    alert('Gagal menghapus transaksi: ' + (data.message ||
                                        'Unknown error'));
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert('Terjadi kesalahan saat menghapus transaksi.');
                            });
                    }
                }
            });
        });
    </script>
@endpush

<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<style>
.container {
    text-align: center;
    margin-top: 100px;
}

.kuantitas {
    font-size: 24px;
}

.tersisa {
    font-size: 18px;
    color: gray;
}

.input-group {
    display: flex;
    align-items: center;
    justify-content: center;

}

.input-group .btn {
    margin: 0 5px;
    display:
}
</style>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card" style="left: auto">
                        <h2 class="card-header">Daftar Barang</h2>
                        <?php
                        $total = 0;
                        $quantity = 0;
                        foreach ($keranjang as $b) :
                            $sub_total = $b['harga'] * $quantity;
                            $total += $sub_total;
                        ?>
                        <div class="row g-0 center">
                            <div class="col-md-1">
                                <input type="checkbox" id="<?= $b['id_barang']; ?>ch" name="vehicle1"
                                    value="<?= $b['nama_barang']; ?>"
                                    onchange="toggleText('<?= $b['id_barang']; ?>')"><br><br>
                                <button type="button" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />

                                    </svg>
                                </button>

                            </div>
                            <div class="col-md-3">
                                <img src="/Img/<?= $b['foto_barang']; ?>" class="img-fluid rounded-start" alt="..."
                                    style="max-height: 150px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title" id="<?= $b['id_barang']; ?>br"><?= $b['nama_barang']; ?></h5>
                                    <p class="card-text">Stok tersisa: <?= $b['stock']; ?></p>
                                    <p class="card-text">Rp.<?= $b['harga']; ?></p>
                                    <div>
                                        <button onclick="decrement('<?= $b['id_barang']; ?>')"
                                            class="btn btn-danger d-inline">-</button>
                                        <input onchange="calculateSubtotal('<?= $b['id_barang']; ?>')"
                                            style="width: 100px" type="number" id="<?= $b['id_barang']; ?>"
                                            class="form-control d-inline" value="<?= $quantity; ?>" min="0"
                                            max="<?= $b['stock']; ?>">
                                        <button onclick="increment('<?= $b['id_barang']; ?>')"
                                            class="btn btn-primary d-inline">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="left: auto">
                        <h2 class="card-header">Total Harga</h2>
                        <?php foreach ($keranjang as $b) : ?>
                        <p class="card-text" id="textku_<?= $b['id_barang']; ?>" style="display: none;">
                            <?= $b['nama_barang']; ?> : Rp.<?= $b['harga'] * $quantity; ?>
                        </p>
                        <?php endforeach; ?>
                        <p class="card-text" id="total_harga">
                            TOTAL : Rp.<?= $total; ?>
                        </p>
                        <div class="row-md-1"><input type="checkbox" id="pesanNanti" onclick="toggleDateTime()"><label
                                for="pesanNanti">Pesan Nanti</label></div>

                        <form method="post" action="<?= base_url('pembeli/checkout'); ?>">
                            <div id="dateTimeContainer" style="display: none;">
                                <label for="appt">Pilih Waktu:</label>


                                <input type="time" id="waktu" name="waktu">
                                <input type="date" id="tanggal" name="tanggal">
                            </div>
                            <!-- Isi form dengan elemen-elemen input yang diperlukan -->
                            <!-- Misalnya, elemen input untuk total, waktu, dan tanggal -->
                            <input type="hidden" name="total" id="total" value="">
                            <button class="btn btn-primary d-inline" type="submit">Bayar</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script>
function toggleDateTime() {
    var checkBox = document.getElementById("pesanNanti");
    var dateTimeContainer = document.getElementById("dateTimeContainer");

    if (checkBox.checked) {
        // Jika checkbox dicentang, tampilkan tanggal dan waktu
        dateTimeContainer.style.display = "block";

    } else {
        // Jika checkbox tidak dicentang, sembunyikan tanggal dan waktu
        dateTimeContainer.style.display = "none";
    }
}


function toggleText(id_barang) {
    var checkbox = document.getElementById(id_barang + 'ch');
    var text = document.getElementById('textku_' + id_barang);
    var totalHarga = document.getElementById('total_harga');
    var namaBarang = document.getElementById(id_barang + 'br')

    if (checkbox.checked) {
        text.style.display = 'block';
        var subTotal = parseInt(text.innerText.match(/\d+/));
        totalHarga.innerText = 'TOTAL : Rp.' + (parseInt(totalHarga.innerText.match(/\d+/)) + subTotal);
    } else {
        text.style.display = 'none';
        var subTotal = parseInt(text.innerText.match(/\d+/));
        totalHarga.innerText = 'TOTAL : Rp.' + (parseInt(totalHarga.innerText.match(/\d+/)) - subTotal);
    }
}

function calculateSubtotal(id_barang) {
    var input = document.getElementById(id_barang);
    var quantity = parseInt(input.value);
    var harga = parseInt(input.parentElement.previousElementSibling.innerText.match(/\d+/));
    var subtotal = quantity * harga;
    var text = document.getElementById('textku_' + id_barang);
    var namaBarang = document.getElementById(id_barang + 'br').innerHTML;
    text.innerText = namaBarang + ' ' + quantity + ' x Rp.' + harga + ' = Rp.' + subtotal;

    var totalHarga = document.getElementById('total_harga');
    var currentTotal = parseInt(totalHarga.innerText.match(/\d+/));
    var previousSubtotal = parseInt(text.innerText.match(/\d+/));

    totalHarga.innerText = 'TOTAL : Rp.' + (currentTotal + subtotal);
    var input2 = document.getElementById('total');
    input2.value = currentTotal + subtotal;
}

function increment(id_barang) {
    var input = document.getElementById(id_barang);
    var currentValue = parseInt(input.value);
    var maxStock = parseInt(input.getAttribute("max"));

    if (currentValue < maxStock) {
        input.value = currentValue + 1;
        calculateSubtotal(id_barang);
    }
}

function decrement(id_barang) {
    var
        input = document.getElementById(id_barang);
    var currentValue = parseInt(input.value);
    if (currentValue > 1) {
        input.value = currentValue - 1;
        calculateSubtotal(id_barang);
    }
}
</script>


<?= $this->endSection(); ?>
<script>
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    $('#nik_user').change(function() {
        var id_user = $(this).val()
        $.ajax({
            type: "GET",
            url: "{{ route('fpb.getUser') }}",
            data: {
                id: id_user,
            },
            dataType: "JSON",
            success: function(data) {
                $('#name_user').val(data.name)
                $('#departement_user').val(data.departement.name)
            }
        })
    })

    $('#add_product').click(function() {
        // Mendapatkan jumlah baris saat ini
        var rowCount = $('#myTable tbody tr').length;

        // Ambil data produk dari hasil query PHP
        var products = <?php echo json_encode($product) ?>

        // Buat variabel untuk menyimpan opsi select
        var productOptions = '<option value="">Pilih Produk</option>';

        // Loop melalui data produk dan tambahkan opsi ke variabel productOptions
        products.forEach(function(product) {
            // Periksa apakah produk sudah dipilih di baris sebelumnya
            var productSelected = false;
            $('#myTable tbody tr select').each(function() {
                var selectedProductId = $(this).val();
                if (selectedProductId == product.id) {
                    productSelected = true;
                    return false; // Keluar dari loop jika produk sudah dipilih
                }
            });

            // Jika produk belum dipilih, tambahkan opsi ke variabel productOptions
            if (!productSelected) {
                productOptions += '<option value="' + product.id + '">' + product.name + '</option>';
                var lokasi_product = 
            }
        });

        // Membuat baris baru dengan opsi produk yang telah dibuat
        var newRow = '<tr>' +
            '<td>' + (rowCount + 1) + '</td>' +
            '<td><select class="form-control select2" style="width: 100%;">' + productOptions +
            '</select></td>' +
            '<td>Lokasi ' + (rowCount + 1) + '</td>' +
            '<td>Tersedia ' + (rowCount + 1) + '</td>' +
            '<td>Kuantiti ' + (rowCount + 1) + '</td>' +
            '<td>Satuan ' + (rowCount + 1) + '</td>' +
            '<td>Keterangan ' + (rowCount + 1) + '</td>' +
            '<td><button class="btn btn-danger btn-sm delete-row"><i class="fas fa-trash"></i></button></td>' +
            '</tr>';

        // Menambahkan baris ke dalam tbody
        $('#myTable tbody').append(newRow);

        // Inisialisasi kembali plugin select2 pada elemen yang baru ditambahkan
        $('.select2').select2();
    });


    // Menambahkan event listener untuk tombol hapus di setiap baris
    $('#myTable').on('click', '.delete-row', function() {
        // Menghapus baris yang berisi tombol yang diklik
        $(this).closest('tr').remove();
        // Mengupdate nomor urut setiap baris setelah penghapusan
        updateRowNumbers();
    });

    // Fungsi untuk mengupdate nomor urut setiap baris
    function updateRowNumbers() {
        $('#myTable tbody tr').each(function(index) {
            $(this).find('td:first').text(index + 1);
        });
    }

    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
    })
</script>

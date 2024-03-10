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
    var addedProductIds = [];
    var increment_index = 1
    $('#add_product').click(function() {
        var allProductElements = document.querySelectorAll('.allProduct');

        // Membuat array untuk menyimpan data
        var dataArray = [];

        // Mengambil data dari setiap elemen dan menambahkannya ke array
        allProductElements.forEach(function(element) {
            dataArray.push(element.value);
        });
        if (dataArray.includes("0")) {
            // Menampilkan pesan kesalahan jika ada nilai 0
            Swal.fire({
                icon: 'info',
                title: 'Silahkan pilih produk terlebih dahulu',
                customClass: {
                    confirmButton: 'btn btn-outline-primary',
                },
                buttonsStyling: false,
            });
            return false; // Atau lakukan penanganan kesalahan sesuai kebutuhan Anda
        }


        // Mendapatkan jumlah baris saat ini
        var rowCount = $('#myTable tbody tr').length;
        increment_index++

        // Ambil data produk dari hasil query PHP
        var products = <?php echo json_encode($product); ?>

        // Buat variabel untuk menyimpan opsi select
        var productOptions = '<option value="0">Pilih Produk</option>';

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
            }
        });

        // Membuat baris baru dengan opsi produk yang telah dibuat
        var newRow = '<tr>' +
            '<td>' + (rowCount + 1) + '</td>' +
            '<td><select class="form-control select2 allProduct" id="id_product_' + increment_index +
            '" name="idProduct[]" onclick="handleClick(' + increment_index + ')" onchange="id_item_(' +
            increment_index +
            ', this.value)"  style="width: 100%;">' + productOptions +
            '</select></td>' +
            '<td><span id="location_' + increment_index + '"></span></td>' +
            '<td><span id="qty_' + increment_index + '"></span></td>' +
            '<td><input type="number" name="qtyDelivery[]" class="form-control" id="qty_input_' +
            increment_index + '" onInput="qty_input(' + increment_index +
            ', this.value)"></td>' +
            '<td><span id="uom_' + increment_index + '"></td>' +
            '<td><input type="text" class="form-control" name="note[]" id="note_' + increment_index +
            '" placeholder="isi keterangan...."></td>' +
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

    // $('#myTable').on('change', '#select_item', function() {
    //     var item_id = $(this).val()
    //     addedProductIds.push(item_id);

    // });
        var save_id_product = '';
    function id_item_(params, value) {
        // console.log(save_id_product);
        var allProductElements = document.querySelectorAll('.allProduct');

        // Membuat set untuk menyimpan nilai unik
        var uniqueValues = new Set();

        // Flag untuk menandai apakah terdapat nilai yang sama
        var hasDuplicate = false;

        // Mengambil data dari setiap elemen
        allProductElements.forEach(function(element) {
            var elementValue = element.value;

            // Jika nilai sudah ada dalam set, atur flag dan keluar dari forEach
            if (uniqueValues.has(elementValue)) {
                hasDuplicate = true;
                return;
            }

            // Tambahkan nilai ke dalam set
            uniqueValues.add(elementValue);
        });

        // Memeriksa apakah ada nilai yang sama
        if (hasDuplicate) {
            // Menampilkan pesan kesalahan jika ada nilai yang sama
            Swal.fire({
                icon: 'info',
                title: 'Product sudah ditambahkan sebelumnya',
                customClass: {
                    confirmButton: 'btn btn-outline-primary',
                },
                buttonsStyling: false,
            })
            $('#id_product_' + params).val(0);

            // Memicu peristiwa perubahan pada select element untuk Select2 menyesuaikan diri
            $('#id_product_' + params).trigger('change');
            return false;
        }
        save_id_product = value

        $.ajax({
            type: "GET",
            url: "{{ route('fpb.getProduct') }}",
            data: {
                id: value,
            },
            dataType: "JSON",
            success: function(data) {
                $('#location_' + params + '').text(data.location.rak_number)
                $('#qty_' + params + '').text(data.qty)
                $('#uom_' + params + '').text(data.uom)
            }
        })

    }

    function qty_input(params, value) {
        var stock_qty_str = document.getElementById('qty_' + params).innerHTML; // or use innerText
        var stock_qty = parseInt(stock_qty_str, 10)
        if (stock_qty < value) {
            Swal.fire({
                icon: 'info',
                title: 'Kuantiti melebihi stok di gudang',
                customClass: {
                    confirmButton: 'btn btn-outline-primary',
                },
                buttonsStyling: false,
            })
            $('#qty_input_' + params + '').val('')
            return false;
        }

    }
</script>

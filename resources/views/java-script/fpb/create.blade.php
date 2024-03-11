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
            '<td><input type="number" value="0" name="qtyDelivery[]" class="form-control qty_product" id="qty_input_' +
            increment_index + '" onInput="qty_input(' + increment_index +
            ', this)"></td>' +
            '<td><span id="uom_' + increment_index + '"></td>' +
            '<td><input type="text" class="form-control" value="" name="note[]" id="note_' + increment_index +
            '" placeholder="isi keterangan...."></td>' +
            '<td id="span_status_' + increment_index + '"></td>' +
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

    var save_id_product = '';

    function id_item_(params, value) {
        $('#qty_input_' + params + '').val(0)
        $('#location_' + params + '').text('')
        $('#qty_' + params + '').text('')
        $('#uom_' + params + '').text('')

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
                if (data.qty == 0) {
                    var status_condition = '<span class="badge bg-danger">Kosong</span>'
                } else {
                    var status_condition = '<span class="badge bg-success">Terpenuhi</span>'
                }
                var spanStatus = document.getElementById('span_status_' + params + '');

                // Memasukkan status ke dalam elemen dengan id "span_status"
                spanStatus.innerHTML = status_condition;
                $('#location_' + params + '').text(data.location.rak_number)
                $('#qty_' + params + '').text(data.qty)
                $('#uom_' + params + '').text(data.uom)
            }
        })

    }

    function qty_input(params, input) {
        input.value = input.value.replace(/-/g, '');

        // Menghapus angka "0" pertama jika ada
        input.value = input.value.replace(/^0+/, '');

        // Jika nilai input tidak valid, set nilai ke 1
        if (!isValidInput(input.value)) {
            input.value = 0;
        }


        var stock_qty_str = document.getElementById('qty_' + params).innerHTML; // or use innerText
        var stock_qty = parseInt(stock_qty_str, 10)
        if (stock_qty < input.value) {
            Swal.fire({
                icon: 'info',
                title: 'Kuantiti melebihi stok di gudang',
                customClass: {
                    confirmButton: 'btn btn-outline-primary',
                },
                buttonsStyling: false,
            })
            $('#qty_input_' + params + '').val(0)
            return false;
        }

    }

    $('#create_fpb').submit(function(e) {

        let validate_input_form = true;
        let validate_qty = true;

        // Flag to track whether to prevent the default behavior
        var allProductElements = document.querySelectorAll('.allProduct');
        var allQtyElements = document.querySelectorAll('.qty_product');

        // Membuat loop untuk setiap elemen
        allProductElements.forEach(function(element) {
            // Mendapatkan nilai dari setiap elemen
            var productValue = parseInt(element.value);

            // Memeriksa apakah nilai sama dengan 0
            if (productValue === 0) {
                validate_input_form = false; // Set the flag to false if the condition is met
                return false; // Exit the forEach loop

            }
        });
        allQtyElements.forEach(function(elementQty) {
            // Mendapatkan nilai dari setiap elemen
            var product_qty = parseInt(elementQty.value);

            // Memeriksa apakah nilai sama dengan 0
            if (product_qty === 0) {
                validate_qty = false; // Set the flag to false if the condition is met
                return false; // Exit the forEach loop

            }
        });
        if (allProductElements.length <= 0) {
            Swal.fire({
                icon: 'info',
                title: 'Mohon tambahkan minimal 1 produk',
                customClass: {
                    confirmButton: 'btn btn-outline-primary',
                },
                buttonsStyling: false,
            })
            return false; // Exit the forEach loop

        }
        if (!validate_input_form) {
            Swal.fire({
                icon: 'info',
                title: 'Mohon pilih produk terlebih dahulu',
                customClass: {
                    confirmButton: 'btn btn-outline-primary',
                },
                buttonsStyling: false,
            })
            return false; // Exit the forEach loop

        }
        if (!validate_qty) {
            Swal.fire({
                icon: 'info',
                title: 'Mohon input kuantiti',
                customClass: {
                    confirmButton: 'btn btn-outline-primary',
                },
                buttonsStyling: false,
            })
            return false; // Exit the forEach loop

        }

        e.preventDefault(); // Prevent the default form submission behavior if the flag is true

        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah anda yakin?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            customClass: {
                confirmButton: 'btn btn-sm btn-outline-primary',
                cancelButton: 'btn btn-sm btn-outline-danger cancel',
            },
            buttonsStyling: false,
        }).then((result) => {
            if (result.isConfirmed) {
                $("#create_fpb").off('submit').submit();
            }
        });
    });


    function isValidInput(value) {
        // Periksa apakah nilai hanya terdiri dari "0" atau memiliki format yang benar
        return /^[1-9]\d*$/.test(value);
    }
</script>
